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
}