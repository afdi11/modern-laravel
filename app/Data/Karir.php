<?php

namespace App\Data;

use Illuminate\Support\Facades\Date;
use App\Enums\PosisiCalon;

class Karir
{
    public string $jabatan;
    public int $tahunMulai;
    public ?int $tahunSelesai;

    public function __construct($jabatan, $tahunMulai, $tahunSelesai = null) {
        $this->jabatan = $jabatan;
        $this->tahunMulai = $tahunMulai;
        $this->tahunSelesai = $tahunSelesai;
    }
}
