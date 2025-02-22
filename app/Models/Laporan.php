<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function barang()
    {
        $this->hasOne(Barang::class);
    }

    public function users()
    {
        $this->hasMany(User::class);
    }
}
