<?php

namespace Lxl921118\MyPackage\Services\OpenAI;

use Illuminate\Http\Client\Factory;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Lxl921118\MyPackage\DTOs\OpenAI\ResponseAPIRequestDTO;
use Lxl921118\MyPackage\DTOs\OpenAI\ResponseAPIResponseDTO;

class OpenAIService
{
    protected string $apiKey;
    protected ?string $organizationId;
    protected string $baseUrl;
    protected int $timeout;
    public $responses;

    public function __construct(
        string $apiKey = null,
        ?string $organizationId = null,
        string $baseUrl = 'https://api.openai.com/v1',
        int $timeout = 30
    ) {
        $this->apiKey = $apiKey ?? config('openai.api_key');
        $this->organizationId = $organizationId ?? config('openai.organization_id');
        $this->baseUrl = $baseUrl ?? config('openai.base_url', 'https://api.openai.com/v1');
        $this->timeout = $timeout;

        // 初始化 responses 物件
        $this->responses = new OpenAIResponses($this);
    }

    /**
     * 建立HTTP客戶端
     * @return \Illuminate\Http\Client\PendingRequest
     */
    protected function client()
    {
        $headers = [
            'Authorization' => 'Bearer ' . $this->apiKey,
            'Content-Type' => 'application/json',
        ];

        if ($this->organizationId) {
            $headers['OpenAI-Organization'] = $this->organizationId;
        }

        return Http::withHeaders($headers)
            ->baseUrl($this->baseUrl)
            ->timeout($this->timeout);
    }

    /**
     * 發送 API 請求
     * @param string $endpoint 端點
     * @param ResponseAPIRequestDTO $requestDTO 請求資料物件
     * @return Response
     */
    public function request(string $endpoint, ResponseAPIRequestDTO $requestDTO): Response
    {
        // 將 DTO 轉換為陣列，過濾掉 null 值
        $payload = array_filter(get_object_vars($requestDTO), fn($value) => $value !== null);
        return $this->client()->post($endpoint, $payload);
    }

    /**
     * Chat Completions API
     * @param ResponseAPIRequestDTO $requestDTO 請求資料物件
     * @return ResponseAPIResponseDTO 回應物件
     */
    public function chat(ResponseAPIRequestDTO $requestDTO): ResponseAPIResponseDTO
    {
        // 如果沒有指定模型，使用預設值創建新的 DTO
        if (empty($requestDTO->model)) {
            $requestDTO = $requestDTO->with([
                'model' => config('openai.default_model', 'gpt-5')
            ]);
        }

        $response = $this->request('/responses', $requestDTO);

        if ($response->successful()) {
            return new ResponseAPIResponseDTO($response->json());
        }

        throw new \Exception('OpenAI Responses API 請求失敗: ' . $response->body());
    }
}

class OpenAIResponses
{
    protected OpenAIService $service;

    /**
     * 建構子
     * @param OpenAIService $service
     */
    public function __construct(OpenAIService $service)
    {
        $this->service = $service;
    }

    /**
     * 創建 Chat Completion
     * @param ResponseAPIRequestDTO $requestDTO 請求資料物件
     * @return ResponseAPIResponseDTO 回應物件
     */
    public function create(ResponseAPIRequestDTO $requestDTO): ResponseAPIResponseDTO
    {
        return $this->service->chat($requestDTO);
    }
}
