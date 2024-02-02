<?php

namespace App\Data;

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
        $this->posisi = $posisi;
        $this->tempatLahir = $tempatLahir;
        $this->tanggalLahir = $tanggalLahir;
        $this->usia = $tanggalLahir;
        $this->karir = $karir;
    }
}
