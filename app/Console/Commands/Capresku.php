<?php

namespace App\Console\Commands;

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
        echo "Profil Calon Presiden dan Calon Wakil Presiden 2024". PHP_EOL;
        // foreach
        // echo "Nomor Urut"
        // echo "========================================". PHP_EOL;
    }
}
