<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bairro extends Model
{
    protected $fillable=['nome_bairros'];
    protected $primaryKey = 'id_bairros';
    public $timestamps = false;

}
