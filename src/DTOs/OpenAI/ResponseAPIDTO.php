<?php

namespace Lxl921118\MyPackage\DTOs\OpenAI;

use ReallifeKip\ImmutableBase\ImmutableBase;
use ReallifeKip\ImmutableBase\DataTransferObject;

/**
 * OpenAI Responses API 請求 DTO
 * 用於建立模型回應的請求結構
 */
#[DataTransferObject]
final class ResponseAPIRequestDTO extends ImmutableBase
{
    /**
     * 是否在背景執行模型回應
     * @var bool|null
     */
    public readonly ?bool $background;

    /**
     * 此回應所屬的對話
     * @var string|object|null
     */
    public readonly string|object|null $conversation;

    /**
     * 指定要在模型回應中包含的額外輸出資料
     * @var array|null
     */
    public readonly ?array $include;

    /**
     * 模型的文字、圖像或檔案輸入
     * @var string|array|null
     */
    public readonly string|array|null $input;

    /**
     * 插入到模型上下文中的系統(或開發者)訊息
     * @var string|null
     */
    public readonly ?string $instructions;

    /**
     * 可為回應產生的 token 數量上限
     * @var int|null
     */
    public readonly ?int $max_output_tokens;

    /**
     * 內建工具呼叫的最大總數
     * @var int|null
     */
    public readonly ?int $max_tool_calls;

    /**
     * 可附加到物件的 16 個鍵值對
     * @var array|null
     */
    public readonly ?array $metadata;

    /**
     * 用於產生回應的模型 ID
     * @var string|null
     */
    public readonly ?string $model;

    /**
     * 是否允許模型並行執行工具呼叫
     * @var bool|null
     */
    public readonly ?bool $parallel_tool_calls;

    /**
     * 前一個模型回應的唯一 ID
     * @var string|null
     */
    public readonly ?string $previous_response_id;

    /**
     * 提示模板及其變數的參考
     * @var object|null
     */
    public readonly ?object $prompt;

    /**
     * 用於快取相似請求回應的快取鍵
     * @var string|null
     */
    public readonly ?string $prompt_cache_key;

    /**
     * 推理模型的配置選項
     * @var object|null
     */
    public readonly ?object $reasoning;

    /**
     * 用於偵測違反使用政策用戶的安全識別符
     * @var string|null
     */
    public readonly ?string $safety_identifier;

    /**
     * 指定用於服務請求的處理類型
     * @var string|null
     */
    public readonly ?string $service_tier;

    /**
     * 是否儲存產生的模型回應以供稍後檢索
     * @var bool|null
     */
    public readonly ?bool $store;

    /**
     * 是否以串流方式傳送模型回應資料
     * @var bool|null
     */
    public readonly ?bool $stream;

    /**
     * 串流回應的選項
     * @var object|null
     */
    public readonly ?object $stream_options;

    /**
     * 取樣溫度，介於 0 和 2 之間
     * @var float|null
     */
    public readonly ?float $temperature;

    /**
     * 文字回應的配置選項
     * @var object|null
     */
    public readonly ?object $text;

    /**
     * 模型應如何選擇要使用的工具
     * @var string|object|null
     */
    public readonly string|object|null $tool_choice;

    /**
     * 模型在產生回應時可能呼叫的工具陣列
     * @var array|null
     */
    public readonly ?array $tools;

    /**
     * 在每個 token 位置返回最可能 token 的數量
     * @var int|null
     */
    public readonly ?int $top_logprobs;

    /**
     * 核心取樣的替代方案
     * @var float|null
     */
    public readonly ?float $top_p;

    /**
     * 模型回應的截斷策略
     * @var string|null
     */
    public readonly ?string $truncation;

    /**
     * 已棄用：使用 safety_identifier 和 prompt_cache_key 代替
     * @var string|null
     */
    public readonly ?string $user;
}
