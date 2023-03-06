<?php


namespace App\Models;

use App\Models\User;
use App\Models\Kategorija;
use \Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recept extends Model
{
  use SoftDeletes;
  protected $table = 'recepti';

  protected $fillable = [
    'naziv', 'sastojci', 'opis', 'priprema', 'vrijeme_pripreme', 'slika', 'korisnik_id', 'kategorija_id'
  ];

  public function autor()
  {
    return $this->belongsTo(User::class, 'korisnik_id');
  }

  public function kategorija()
  {
    return $this->belongsTo(Kategorija::class, 'kategorija_id');
  }
}
