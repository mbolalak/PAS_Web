<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.about', [
            'title' => "About",
            'nama' => "Hanan Titor",
            'class' => "11 PPLG 3",
            'guthib' => "https://github.com/mbolalak?tab=repositories"
        ]);
    }
}
