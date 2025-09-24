<?php

namespace Lxl921118\MyPackage\DTOs\OpenAI;

use ReallifeKip\ImmutableBase\ImmutableBase;
use ReallifeKip\ImmutableBase\DataTransferObject;


/**
 * 對話 DTO
 * 用於表示對話結構
 */
#[DataTransferObject]
final class ConversationDTO extends ImmutableBase
{
    /**
     * 對話的唯一識別符
     * @var string
     */
    public readonly string $id;

    /**
     * 對話中的訊息列表
     * @var array
     */
    public readonly array $messages;

    /**
     * 對話的元資料
     * @var array|null
     */
    public readonly ?array $metadata;

    /**
     * 對話建立的時間戳
     * @var int
     */
    public readonly int $created;
}