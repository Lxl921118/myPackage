<?php

namespace Lxl921118\MyPackage\Services\OpenAI;

use Illuminate\Http\Client\Factory;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

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
     * @param array $payload 請求負載
     * @return Response
     */
    public function request(string $endpoint, array $payload): Response
    {
        return $this->client()->post($endpoint, $payload);
    }

    /**
     * Chat Completions API
     * @param array $options 選項
     * @return object 回應物件
     */
    public function chat(array $input, array $options = []): object
    {
        $payload = array_merge([
            'model' => config('openai.default_model', 'gpt-4o'),
            'input' => $input,
        ], $options);

        $response = $this->request('/responses', $payload);

        if ($response->successful()) {
            return (object) $response->json();
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
     * @param array $options 選項
     * @return object 回應物件
     */
    public function create(array $input, array $options = []): object
    {
        return $this->service->chat($input,$options);
    }
}
