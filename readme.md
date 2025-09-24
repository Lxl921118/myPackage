# MyPackage - OpenAI Responses API Laravel Package

一個完整的 Laravel OpenAI Responses API 整合套件，支援最新的 OpenAI Responses API。

## 特色功能

- 🚀 支援 OpenAI 最新 Responses API
- 📦 完整的 DTO (Data Transfer Objects) 支援
- 🎯 Laravel Facade 和依賴注入支援
- ⚙️ 可配置的環境設定
- 🔒 型別安全的資料結構
- 📝 完整的中文註解和文件

## 安裝

### 1. 透過 Composer 安裝

```bash
composer require lxl921118/my-package
```

### 2. 發佈配置檔案

```bash
# 發佈配置檔案
php artisan vendor:publish --tag=openai-config

# 發佈 DTO 檔案 (可選)
php artisan vendor:publish --tag=openai-dtos
```

### 3. 設定環境變數

在你的 `.env` 檔案中加入：

```env
OPENAI_API_KEY=your_openai_api_key_here
OPENAI_ORGANIZATION_ID=your_organization_id_here
OPENAI_BASE_URL=https://api.openai.com/v1
OPENAI_DEFAULT_MODEL=gpt-4o
OPENAI_TIMEOUT=30
```

## 使用方式

### 基本用法 - 使用 Facade

```php
use Lxl921118\MyPackage\Facades\OpenAI;

// 簡單的文字回應
$response = OpenAI::chat([
    'Hello, how are you?'
], [
    'model' => 'gpt-4o',
    'instructions' => 'You are a helpful assistant.'
]);

echo $response->output[0]->content; // 模型的回應
```

### 進階用法 - 使用服務注入

```php
use Lxl921118\MyPackage\Services\OpenAI\OpenAIService;

class ChatController extends Controller 
{
    public function __construct(
        private OpenAIService $openai
    ) {}

    public function chat(Request $request)
    {
        $response = $this->openai->chat([
            $request->input('message')
        ], [
            'model' => 'gpt-4o',
            'max_output_tokens' => 1000,
            'temperature' => 0.7
        ]);
        
        return response()->json([
            'response' => $response->output[0]->content,
            'usage' => $response->usage
        ]);
    }
}
```

### 使用 responses 物件

```php
use Lxl921118\MyPackage\Facades\OpenAI;

// 通過 responses 物件創建回應
$response = OpenAI::responses()->create([
    'What is Laravel?',
    'How does it compare to other frameworks?'
], [
    'model' => 'gpt-4o',
    'instructions' => 'You are a PHP expert.',
    'temperature' => 0.5
]);
```

### 使用 DTOs 進行型別安全操作

```php
use Lxl921118\MyPackage\DTOs\OpenAI\ResponseAPIRequestDTO;
use Lxl921118\MyPackage\Services\OpenAI\OpenAIService;

$requestData = new ResponseAPIRequestDTO(
    model: 'gpt-4o',
    input: ['Tell me about artificial intelligence'],
    instructions: 'You are an AI expert',
    max_output_tokens: 500,
    temperature: 0.8
);

$openai = app(OpenAIService::class);
$response = $openai->chat($requestData->input, [
    'model' => $requestData->model,
    'instructions' => $requestData->instructions,
    'max_output_tokens' => $requestData->max_output_tokens,
    'temperature' => $requestData->temperature
]);
```

### 工具呼叫範例

```php
use Lxl921118\MyPackage\Facades\OpenAI;

$response = OpenAI::chat([
    'What is the weather like in Tokyo?'
], [
    'model' => 'gpt-4o',
    'tools' => [
        [
            'type' => 'function',
            'function' => [
                'name' => 'get_weather',
                'description' => 'Get current weather information',
                'parameters' => [
                    'type' => 'object',
                    'properties' => [
                        'location' => [
                            'type' => 'string',
                            'description' => 'The city name'
                        ]
                    ]
                ]
            ]
        ]
    ]
]);
```

## 配置選項

| 選項 | 環境變數 | 預設值 | 說明 |
|------|----------|--------|------|
| api_key | OPENAI_API_KEY | null | OpenAI API 金鑰 |
| organization_id | OPENAI_ORGANIZATION_ID | null | OpenAI 組織 ID (可選) |
| base_url | OPENAI_BASE_URL | https://api.openai.com/v1 | API 基礎 URL |
| default_model | OPENAI_DEFAULT_MODEL | gpt-4o | 預設模型 |
| timeout | OPENAI_TIMEOUT | 30 | 請求超時時間 (秒) |

## 支援的模型

- GPT-4o
- GPT-4o mini  
- o1-preview
- o1-mini
- 其他 OpenAI 支援的模型

## 支援的 Laravel 版本

- Laravel 9.x
- Laravel 10.x
- Laravel 11.x
- Laravel 12.x

## 系統需求

- PHP ^8.0
- Laravel Framework ^9.0|^10.0|^11.0|^12.0
- Guzzle HTTP Client (Laravel 內建)

## 錯誤處理

套件提供完整的錯誤處理機制：

```php
try {
    $response = OpenAI::chat(['Hello'], ['model' => 'gpt-4o']);
} catch (\Exception $e) {
    // 處理 API 錯誤
    Log::error('OpenAI API Error: ' . $e->getMessage());
    return response()->json(['error' => 'AI 服務暫時無法使用'], 500);
}
```

## 授權

MIT License

## 作者

- **Lxl921118** - [asd22251299@gmail.com](mailto:asd22251299@gmail.com)

## 貢獻

歡迎提交 Pull Request 或回報 Issue！

## 變更日誌

### v1.0.0
- 🎉 初始版本發布
- ✅ 支援 OpenAI Responses API
- ✅ 完整的 DTO 型別支援
- ✅ Laravel Facade 和依賴注入
- ✅ 可配置的環境設定
- ✅ 完整的中文文件和註解

### 未來計劃
- [ ] 支援 Streaming 回應
- [ ] 新增更多工具整合
- [ ] 效能最佳化
- [ ] 單元測試覆蓋