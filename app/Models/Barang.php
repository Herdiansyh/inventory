<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
 /**
  * The attributes that aren't mass assignable.
  *
  * @var array
  */
 protected $guarded = [];


 public function laporans()
 {
    $this->hasMany(Laporan::class);
 }

}
