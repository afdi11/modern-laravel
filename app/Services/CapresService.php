<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Http;
use App\Data\Karir;
use RuntimeException;

class CapresService
{
    public static function apiCapresku(): array
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

    public static function parseTanggalLahir(string $tempatTanggalLahir): string {
        $tempatTanggalLahir = explode(", ", $tempatTanggalLahir);
        return is_array($tempatTanggalLahir) && isset($tempatTanggalLahir[1]) ? $tempatTanggalLahir[1] : "";
    }

    public static function parseKarir(array $karir):array
    {
        $data = CapresService::apiCapresku();
        $karir = $data['calon_presiden'][2]['karir'];
        $newKarir = array();
        foreach ($karir as $value) {
            //Checking
            if($value != "" && $value != null){
                //explode data
                $explodeKarir = CapresService::parseKarirDariString($value);
                $newKarir = array_merge($newKarir, $explodeKarir);
            }
        }
        return $newKarir;
    }

    public static function parseKarirDariString(string $data) {
        [$jabatanPart, $yearsPart] = explode('(', $data, 2);
        $jabatan = trim($jabatanPart);
        $yearsPart = rtrim($yearsPart, ")");

        $result = array();

        //Cek Periode
        if (strpos($yearsPart, " dan ") !== false) {
            $periods = explode(" dan ", $yearsPart);
        } elseif (strpos($yearsPart, "/") !== false){
            $periods = explode("/", $yearsPart);
        }else{
            $periods = array($yearsPart);
        }

        foreach ($periods as $period) {
            // Mengurai masing-masing periode
            if(strpos($period, "-") !== false){
                [$tahunMulai, $tahunAkhir] = explode('-', $period);
                if(!is_numeric($tahunAkhir)){
                    $tahunAkhir = now()->year;
                }
            }else{
                $tahunMulai = $period;
            }
            $result[] = new Karir(
                $jabatan ?? "",
                $tahunMulai,
                $tahunAkhir ?? null
            );
        }

        return $result;
    }
}
