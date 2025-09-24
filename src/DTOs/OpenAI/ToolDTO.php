<?php

namespace Lxl921118\MyPackage\DTOs\OpenAI;

use ReallifeKip\ImmutableBase\ImmutableBase;
use ReallifeKip\ImmutableBase\DataTransferObject;

/**
 * 工具 DTO
 * 用於定義模型可使用的工具
 */
#[DataTransferObject]
final class ToolDTO extends ImmutableBase
{
    /**
     * 工具類型 (function, web_search, file_search, code_interpreter 等)
     * @var string
     */
    public readonly string $type;

    /**
     * 函數工具的詳細資訊
     * @var object|null
     */
    public readonly ?object $function;

    /**
     * 內建工具的設定
     * @var object|null
     */
    public readonly ?object $settings;
}