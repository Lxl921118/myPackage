<?php

return [
    /*
    |--------------------------------------------------------------------------
    | OpenAI API Configuration
    |--------------------------------------------------------------------------
    */

    'api_key' => env('OPENAI_API_KEY'),

    'organization_id' => env('OPENAI_ORGANIZATION_ID'),

    'base_url' => env('OPENAI_BASE_URL', 'https://api.openai.com/v1'),

        'default_model' => env('OPENAI_DEFAULT_MODEL', 'gpt-4o'),

    'timeout' => env('OPENAI_TIMEOUT', 30),
];