<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kategorija;

class KategorijaController extends Controller
{
    public function dohvatiKategorije()
    {
        $kategorije = Kategorija::all();

        return response()->json([
            'kategorije' => $kategorije
        ]);
    }
    public function dohvatiKorisnike()
    {
        $korisnici = User::all();

        return response()->json([
            'korisnici' => $korisnici
        ]);
    }
}


   

   

