<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    //
    protected $table='supplyer';
    protected $primaryKey='id_supplyer';
    protected $fillable=['nama_supplyer','alamat','no_hp'];
}
