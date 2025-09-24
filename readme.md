# MyPackage - OpenAI Responses API Laravel Package

Laravel OpenAI Responses API 整合套件，提供型別安全的 OpenAI API 操作。

## 安裝

```bash
composer require lxl921118/my-package
```

發佈配置檔案：

```bash
php artisan vendor:publish --tag=openai-config
php artisan vendor:publish --tag=openai-dtos
```

設定環境變數：

```env
OPENAI_API_KEY=your_api_key
OPENAI_DEFAULT_MODEL=gpt-5
```

## 使用方式

### Facade 方式

```php
use Lxl921118\MyPackage\Facades\OpenAI;
use Lxl921118\MyPackage\DTOs\OpenAI\ResponseAPIRequestDTO;

$requestDTO = new ResponseAPIRequestDTO([
    'model' => 'gpt-5',
    'input' => 'Hello, how are you?',
    'instructions' => 'You are a helpful assistant.'
]);

$response = OpenAI::chat($requestDTO);
```

### 依賴注入方式

```php
use Lxl921118\MyPackage\Services\OpenAI\OpenAIService;
use Lxl921118\MyPackage\DTOs\OpenAI\ResponseAPIRequestDTO;


public function __construct(private OpenAIService $openai) {}

public function chat(Request $request)
{
    $requestDTO = new ResponseAPIRequestDTO([
        'model' => 'gpt-5',
        'input' => $request->input('message')
    ]);
    
    $response = $this->openai->chat($requestDTO);
    return $response->output;
}
```

## 功能特色

- ✅ 支援 OpenAI Responses API
- ✅ 完整的 DTO 型別安全
- ✅ Laravel Facade 支援
- ✅ 自動依賴注入
- ✅ 可配置的設定檔



## 授權

MIT

