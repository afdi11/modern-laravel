<?php

namespace App\Http\Controllers;

use App\Services\CapresService;
use Illuminate\Http\Request;

class Capresku extends Controller
{
    public function index(){
        $data = CapresService::dataCapresku();
        return view('capresku', ['data' => $data]);
    }
}
