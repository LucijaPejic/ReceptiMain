<?php


namespace App\Http\Controllers;
use App\Models\Recept;


class ReceptController extends Controller
{

    public function dohvatiRecepte()
    {
        $recepti = Recept::with('autor', 'kategorija')->get();

        return response()->json([
            'recepti' => $recepti
        ]);
    }

}
