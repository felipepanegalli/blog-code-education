<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class testController extends Controller
{
    public function index($nome)
    {
        return view('test.index', ['nome'=>$nome]);
    }

    public function notas()
    {
        $notas = [
            0 => 'Anotação 1',
            1 => 'Anotação 2',
            2 => 'Anotação 3',
            3 => 'Anotação 4',
            4 => 'Anotação 5',
            5 => 'Anotação 6',
        ];
        return view('test.notas', compact('notas'));
    }
}
