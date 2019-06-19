<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //

    public function aboutUs() {
        $tekstas = "cia yra tekstas apie mus";
        return view('about', ["tekstas" => $tekstas]);
    }

    public function contacts() {
        $vardas = "Grazus vardas";
        return view('contacts', ["vardas" => $vardas]);
    }
}
