<?php

namespace App\Http\Controllers;

class TestController extends Controller{

    public function test(){
        $db_prefix = env('DB_PREFIX');
        dd($db_prefix);
    }
}
