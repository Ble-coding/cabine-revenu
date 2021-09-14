<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;

class Network extends Model
{
    use HasFactory;

    use Authorizable;

    protected $table = 'networks';

    protected $fillable = [
        'fournisseur_id',
        'reseau',
        'user_id'
    ];


    protected static function booted() {

        static::creating(function ($network) {
            $network->user_id = auth()->id();
        });
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function reseaus(){
        return $this->belongsTo('App\Models\Reseau');
    }

    public function fournisseur(){
        return $this->belongsTo('App\Models\Fournisseur');
    }
}
