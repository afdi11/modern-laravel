<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Http;
use RuntimeException;

class CapresService
{
    public static function apiCapresku(): Array
    {
        try{
            $response = Http::get("https://mocki.io/v1/92a1f2ef-bef2-4f84-8f06-1965f0fca1a7");
        }catch(RuntimeException $e){
            return [];
        }catch(Exception $e){
            return [];
        }

        return $response->json() ?? [];
    }

    public static function parseTanggalLahir(string $tempatTanggalLahir):string
    {
        $tempatTanggalLahir = explode(", ", $tempatTanggalLahir);
        return $tempatTanggalLahir[1] ?? "";
    }
}
