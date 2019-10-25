<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    protected $fillable = ['nome_escolas'];
    protected $primaryKey = 'id_escolas';
    public $timestamps = false;
}


