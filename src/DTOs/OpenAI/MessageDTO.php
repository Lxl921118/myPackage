<?php

namespace Lxl921118\MyPackage\DTOs\OpenAI;

use ReallifeKip\ImmutableBase\ImmutableBase;
use ReallifeKip\ImmutableBase\DataTransferObject;

/**
 * 訊息 DTO
 * 用於表示對話中的單一訊息
 */
#[DataTransferObject]
final class MessageDTO extends ImmutableBase
{
    /**
     * 訊息角色 (system, user, assistant, tool)
     * @var string
     */
    public readonly string $role;

    /**
     * 訊息內容
     * @var string|array
     */
    public readonly string|array $content;

    /**
     * 工具呼叫資訊
     * @var array|null
     */
    public readonly ?array $tool_calls;

    /**
     * 工具呼叫的 ID
     * @var string|null
     */
    public readonly ?string $tool_call_id;

    /**
     * 訊息名稱
     * @var string|null
     */
    public readonly ?string $name;
}
