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
     * 物件類型，通常是 "response"
     * @var string
     */
    public readonly string $object;

    /**
     * 回應建立的時間戳
     * @var int
     */
    public readonly int $created;

    /**
     * 使用的模型
     * @var string
     */
    public readonly string $model;

    /**
     * 回應的狀態
     * @var string
     */
    public readonly string $status;

    /**
     * 回應的輸出項目
     * @var array
     */
    public readonly array $output;

    /**
     * 使用情況統計
     * @var object|null
     */
    public readonly ?object $usage;

    /**
     * 實際使用的服務層級
     * @var string|null
     */
    public readonly ?string $service_tier;

    /**
     * 附加的元資料
     * @var array|null
     */
    public readonly ?array $metadata;
}