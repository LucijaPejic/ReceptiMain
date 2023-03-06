<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kategorija;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KategorijaController extends Controller
{
    public function index()
    {
        return view('admin.kategorije');
    }
    public function novaKategorija()
    {
        return view('admin.dodajKategoriju');
    }
    public function dodajKategoriju(Request $request)
    {
        $kategorija = new Kategorija();
        $kategorija->naziv = $request->naziv;
        $kategorija->save();
    }

    public function urediKategoriju(Request $request, $id)
    {
        $kategorija = Kategorija::findOrFail($id);

        $kategorija = kategorija::find($id);
        $kategorija->naziv = $request->naziv;
        $kategorija->save();

        return $kategorija;
    }

    public function izbrisiKategoriju($id)
    {
        $kategorija = Kategorija::find($id);
        $kategorija->delete();
    }
}
