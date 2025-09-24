<?php

namespace Lxl921118\MyPackage\DTOs\OpenAI;

use ReallifeKip\ImmutableBase\ImmutableBase;
use ReallifeKip\ImmutableBase\DataTransferObject;


/**
 * OpenAI Responses API 回應 DTO
 * 用於接收 API 回應的資料結構
 */
#[DataTransferObject]
final class ResponseAPIResponseDTO extends ImmutableBase
{
    /**
     * 回應的唯一識別符
     * @var string
     */
    public readonly string $id;

    /**
     * 物件類型，總是 "response"
     * @var string
     */
    public readonly string $object;

    /**
     * 回應建立的時間戳 (Unix 時間戳，秒)
     * @var int
     */
    public readonly int $created_at;

    /**
     * 回應的狀態：completed, failed, in_progress, cancelled, queued, incomplete
     * @var string
     */
    public readonly string $status;

    /**
     * 是否在背景執行模型回應
     * @var bool|null
     */
    public readonly ?bool $background;

    /**
     * 此回應所屬的對話
     * @var object|null
     */
    public readonly ?object $conversation;

    /**
     * 錯誤物件，當模型無法產生回應時回傳
     * @var object|null
     */
    public readonly ?object $error;

    /**
     * 回應不完整的詳細資訊
     * @var object|null
     */
    public readonly ?object $incomplete_details;

    /**
     * 插入模型上下文的系統或開發者訊息
     * @var string|null
     */
    public readonly ?string $instructions;

    /**
     * 可為回應產生的令牌數上限
     * @var int|null
     */
    public readonly ?int $max_output_tokens;

    /**
     * 最大工具呼叫次數
     * @var int|null
     */
    public readonly ?int $max_tool_calls;

    /**
     * 附加的元資料，最多 16 個 key-value 對
     * @var array|null
     */
    public readonly ?array $metadata;

    /**
     * 用於產生回應的模型 ID，如 gpt-4o 或 o3
     * @var string
     */
    public readonly string $model;

    /**
     * 模型產生的內容項目陣列
     * @var array
     */
    public readonly array $output;

    /**
     * SDK 專用：聚合的文字輸出
     * @var string|null
     */
    public readonly ?string $output_text;

    /**
     * 是否允許模型並行執行工具呼叫
     * @var bool|null
     */
    public readonly ?bool $parallel_tool_calls;

    /**
     * 前一個回應的唯一 ID，用於建立多回合對話
     * @var string|null
     */
    public readonly ?string $previous_response_id;

    /**
     * 提示範本和變數的參考
     * @var object|null
     */
    public readonly ?object $prompt;

    /**
     * 用於快取回應的鍵值
     * @var string|null
     */
    public readonly ?string $prompt_cache_key;

    /**
     * 推理模型的配置選項 (gpt-5 和 o 系列模型專用)
     * @var object|null|array
     */
    public readonly object|array $reasoning;

    /**
     * 用於檢測違反使用政策的穩定識別符
     * @var string|null
     */
    public readonly ?string $safety_identifier;

    /**
     * 用於服務請求的處理類型
     * @var string|null
     */
    public readonly ?string $service_tier;

    /**
     * 採樣溫度，介於 0 到 2 之間
     * @var float|null
     */
    public readonly ?float $temperature;

    /**
     * 模型文字回應的配置選項
     * @var object|null
     */
    public readonly ?object $text;

    /**
     * 模型應如何選擇工具
     * @var string|object|null
     */
    public readonly string|object|null $tool_choice;

    /**
     * 模型在產生回應時可呼叫的工具陣列
     * @var array|null
     */
    public readonly ?array $tools;

    /**
     * 每個令牌位置最可能的令牌數量，介於 0 到 20 之間
     * @var int|null
     */
    public readonly ?int $top_logprobs;

    /**
     * 核心採樣，介於 0 到 1 之間
     * @var float|null
     */
    public readonly ?float $top_p;

    /**
     * 模型回應的截斷策略：auto 或 disabled
     * @var string|null
     */
    public readonly ?string $truncation;

    /**
     * 令牌使用詳細資訊
     * @var object|null
     */
    public readonly ?object $usage;

    /**
     * 已棄用：使用者識別符，建議使用 safety_identifier 和 prompt_cache_key
     * @var string|null
     * @deprecated 使用 safety_identifier 和 prompt_cache_key 替代
     */
    public readonly ?string $user;
}