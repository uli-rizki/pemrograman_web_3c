<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Prodi;

class ProdiController extends Controller
{
    public function index()
    {
        $prodi = Prodi::get();

        return view('prodi.index', ['prodi' => $prodi]);
    }
}
