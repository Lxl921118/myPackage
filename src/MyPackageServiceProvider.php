<?php

namespace Lxl921118\MyPackage;

use Illuminate\Support\ServiceProvider;
use Lxl921118\MyPackage\Services\OpenAI\OpenAIService;

class MyPackageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // 合併配置檔案
        $this->mergeConfigFrom(
            __DIR__ . '/config/openai.php',
            'openai'
        );

        // 註冊 OpenAI 服務到容器
        $this->app->singleton('openai', function ($app) {
            return new OpenAIService(
                config('openai.api_key'),
                config('openai.organization_id'),
                config('openai.base_url'),
                config('openai.timeout', 30)
            );
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // 發佈設定檔
        $this->publishes([
            __DIR__ . '/config/openai.php' => config_path('openai.php'),
        ], 'openai-config');
        // 發布所有DTOs
        $this->publishes([
            __DIR__ . '/DTOs' => app_path('DTOs'),
        ], 'openai-dtos');


        
    }
}
