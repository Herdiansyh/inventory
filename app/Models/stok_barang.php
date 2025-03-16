<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class stok_barang extends Model
{
    /**
     * The attributes that aren't mass.
     *
     * @var array
     */
    protected $guarded = [];

    public function Barang(){
      $this->hasMany(Barang::class);
    }
}
