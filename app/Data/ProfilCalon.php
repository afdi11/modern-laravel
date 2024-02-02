<?php

namespace App\Data;

use Illuminate\Support\Facades\Date;
use App\Enums\PosisiCalon;

class ProfilCalon
{
    public int $nomorUrut;
    public PosisiCalon $posisi;
    public string $tempatLahir;
    public string $tanggalLahir;
    public int $usia;
    public array $karir;

    public function __construct($nomorUrut, $posisi, $tempatLahir, $tanggalLahir, $karir) {
        $this->nomorUrut = $nomorUrut;
        $this->posisi = PosisiCalon::fromKey($posisi);
        $this->tempatLahir = $tempatLahir;
        $this->tanggalLahir = $tanggalLahir;
        $this->usia = $this->hitungUsia($tanggalLahir);
        $this->karir = $karir;
    }

    private function hitungUsia($tanggalLahir) {
        $tanggalLahir = Date::parse($tanggalLahir);
        $now = Date::now();
        $diff = $now->diff($tanggalLahir);
        return $diff->y;
    }
}
