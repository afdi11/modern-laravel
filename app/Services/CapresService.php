<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CapresService
{
    public static function apiCapresku(): Array
    {
        $response = Http::get("https://mocki.io/v1/92a1f2ef-bef2-4f84-8f06-1965f0fca1a7");

        return $response->json() ?? [];
    }
}
