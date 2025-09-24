<?php

namespace Lxl921118\MyPackage\DTOs\OpenAI;

use ReallifeKip\ImmutableBase\ImmutableBase;
use ReallifeKip\ImmutableBase\DataTransferObject;


/**
 * 使用情況統計 DTO
 * 用於追蹤 token 使用量
 */
#[DataTransferObject]
final class UsageDTO extends ImmutableBase
{
    /**
     * 提示 token 數量
     * @var int
     */
    public readonly int $prompt_tokens;

    /**
     * 完成 token 數量
     * @var int
     */
    public readonly int $completion_tokens;

    /**
     * 總 token 數量
     * @var int
     */
    public readonly int $total_tokens;

    /**
     * 推理 token 數量
     * @var int|null
     */
    public readonly ?int $reasoning_tokens;

    /**
     * 快取讀取 token 數量
     * @var int|null
     */
    public readonly ?int $cached_tokens;
}