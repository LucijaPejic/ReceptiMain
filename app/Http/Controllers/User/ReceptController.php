<?php

namespace App\Http\Controllers\User;
use App\Models\Recept;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ReceptController extends Controller
{
    public function naslovna()
    {
        return view('user.naslovna');
    }
    public function recepti()
    {
        return view('user.recepti');
    }
    public function about()
    {
        return view('user.oNama');
    }
    public function kontakt()
    {
        return view('user.kontakt');
    }
    public function noviRecept()
    {
        return view('user.dodajRecept');
    }

    public function dodajRecept(Request $request)
    {
        if ($request->slika) {
            $slika = time() . '.' . explode('/', explode(':', substr($request->slika, 0, strpos($request->slika, ';')))[1])[1];

            Image::make($request->slika)->save(public_path('images/' . $slika));
        } else {
            $slika = null;
        }

        $recept = new Recept();
        $recept->naziv = $request->naziv;
        $recept->sastojci = $request->sastojci;
        $recept->opis = $request->opis;
        $recept->priprema = $request->priprema;
        $recept->vrijeme_pripreme =  $request->vrijeme_pripreme;
        $recept->kategorija_id =  $request->kategorija_id;
        $recept->korisnik_id = Auth::user()->id;
        $recept->slika = $slika;
        $recept->save();
    }

}
