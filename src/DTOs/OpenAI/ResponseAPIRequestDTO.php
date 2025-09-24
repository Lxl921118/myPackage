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
     * 預設為 false
     * @var bool|null
     */
    public readonly ?bool $background;

    /**
     * 此回應所屬的對話
     * 預設為 null
     * 此對話中的項目會附加到此回應請求的 input_items 前面
     * @var string|object|null
     */
    public readonly string|object|null $conversation;

    /**
     * 指定要在模型回應中包含的額外輸出資料
     * 目前支援的值：
     * - web_search_call.action.sources: 包含網頁搜尋工具呼叫的來源
     * - code_interpreter_call.outputs: 包含程式碼解譯器工具呼叫項目中的 Python 程式碼執行輸出
     * - computer_call_output.output.image_url: 包含電腦呼叫輸出的圖片 URL
     * - file_search_call.results: 包含檔案搜尋工具呼叫的搜尋結果
     * - message.input_image.image_url: 包含輸入訊息中的圖片 URL
     * - message.output_text.logprobs: 包含助理訊息的 logprobs
     * - reasoning.encrypted_content: 包含推理 token 的加密版本
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
     * 包含可見輸出 token 和推理 token
     * @var int|null
     */
    public readonly ?int $max_output_tokens;

    /**
     * 內建工具呼叫的最大總數
     * 此最大數量適用於所有內建工具呼叫，而不是每個個別工具
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
     * 預設為 true
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
     * 僅限 gpt-5 和 o 系列模型
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
     * 預設為 'auto'
     * 可選值：'auto', 'default', 'flex', 'priority'
     * @var string|null
     */
    public readonly ?string $service_tier;

    /**
     * 是否儲存產生的模型回應以供稍後透過 API 檢索
     * 預設為 true
     * @var bool|null
     */
    public readonly ?bool $store;

    /**
     * 是否以串流方式傳送模型回應資料
     * 預設為 false
     * 設為 true 時，使用伺服器傳送事件進行串流傳輸
     * @var bool|null
     */
    public readonly ?bool $stream;

    /**
     * 串流回應的選項
     * 預設為 null
     * 只有在設定 stream: true 時才設定此項
     * @var object|null
     */
    public readonly ?object $stream_options;

    /**
     * 取樣溫度，介於 0 和 2 之間
     * 預設為 1
     * 較高的值（如 0.8）會使輸出更隨機，較低的值（如 0.2）會使輸出更專注和確定
     * @var float|null
     */
    public readonly ?float $temperature;

    /**
     * 文字回應的配置選項
     * 可以是純文字或結構化的 JSON 資料
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
     * 支援的工具類別：
     * - 內建工具：OpenAI 提供的工具，如網頁搜尋或檔案搜尋
     * - MCP 工具：透過自訂 MCP 伺服器或預定義連接器的第三方系統整合
     * - 函數呼叫（自訂工具）：由您定義的函數
     * @var array|null
     */
    public readonly ?array $tools;

    /**
     * 在每個 token 位置返回最可能 token 的數量
     * @var int|null
     */
    public readonly ?int $top_logprobs;

    /**
     * 核心取樣的替代方案，稱為核心取樣
     * 預設為 1
     * 模型考慮具有 top_p 機率質量的 token 結果
     * 一般建議修改此參數或 temperature，但不要同時修改兩者
     * @var float|null
     */
    public readonly ?float $top_p;

    /**
     * 模型回應的截斷策略
     * 預設為 'disabled'
     * 'auto': 如果輸入超過模型的上下文窗口大小，模型會截斷回應以適應上下文窗口
     * 'disabled': 如果輸入大小超過模型的上下文窗口大小，請求將失敗並回傳 400 錯誤
     * @var string|null
     */
    public readonly ?string $truncation;

    /**
     * 已棄用：使用 safety_identifier 和 prompt_cache_key 代替
     * @var string|null
     */
    public readonly ?string $user;
}
