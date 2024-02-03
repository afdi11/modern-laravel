<?php

namespace App\Console\Commands;

use App\Enums\PosisiCalon;
use App\Services\CapresService;
use Illuminate\Console\Command;

class Capresku extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'capresku';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $data = CapresService::dataCapresku();
        ksort($data);
        echo "Profil Calon Presiden dan Calon Wakil Presiden 2024". PHP_EOL;
        foreach ($data as $keyData => $value) {
            echo "====================== Nomor Urut $keyData ======================". PHP_EOL;
            echo "==========================================================". PHP_EOL;
            foreach($value as $key => $calon){
                echo "Nama : $calon->nama,\nPosisi : $calon->posisi, \nUsia : $calon->usia \n". PHP_EOL;
            }
            echo "==========================================================\n". PHP_EOL;
        }
    }
}
