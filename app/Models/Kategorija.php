<?php


namespace App\Models;

use App\Models\Recept;
use \Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategorija extends Model
{
  use SoftDeletes;
  protected $table = 'kategorije';

  protected $fillable = ['naziv' ];

}
