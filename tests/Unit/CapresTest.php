<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\CapresService;

class CapresTest extends TestCase
{
    /**
     * Test Api Capres
     */
    public function test_api_capres(): void
    {
        $capresku = CapresService::apiCapresku();

        $this->assertContains("calon_presiden", array_keys($capresku));
        $this->assertContains("calon_wakil_presiden", array_keys($capresku));
        $this->assertTrue(count($capresku) > 0);
        $this->assertFalse(empty($capresku));
    }

    public function test_function_parseTanggalLahir():void
    {
        $tempatTanggalLahir = "Madura, 13 Mei 1957";
        $tanggalLahir = CapresService::parseTanggalLahir($tempatTanggalLahir);
        $this->assertEquals("13 Mei 1957", $tanggalLahir);
        $this->assertNotEquals("Madura", $tanggalLahir);
    }

    public function  test_function_parseKarirDariString():void{
        $capresku = CapresService::apiCapresku();

        // Initialize an empty array to hold karir data
        $karirData = [];

        // Extract karir from calon_presiden
        foreach ($capresku['calon_presiden'] as $calon) {
            foreach ($calon['karir'] as $karir) {
                $karirData[] = $karir;
            }
        }

        // Extract karir from calon_wakil_presiden
        foreach ($capresku['calon_wakil_presiden'] as $calon) {
            foreach ($calon['karir'] as $karir) {
                $karirData[] = $karir;
            }
        }

        foreach ($karirData as $karir) {
            try{
                $tests = CapresService::parseKarirDariString($karir);
            }catch(\Throwable $e){
                dd($e, $karir);
            }
            $this->assertIsArray($tests);
            if(is_array($tests)){
                foreach ($tests as $test){
                    $this->assertIsString($test->jabatan);
                    $this->assertIsNumeric($test->tahunMulai);
                }
            }
        }
    }
}
