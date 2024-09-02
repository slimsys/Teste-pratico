<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Rules\YearCheck;

class Vehicle extends Model
{
    use SoftDeletes;

    protected $fillable = ['placa', 'renavam', 'modelo', 'marca', 'ano', 'proprietario'];

    public function user() {
        return $this->belongsTo('App\User', 'proprietario', 'id');
    }
}
