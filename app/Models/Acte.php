<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;

class Acte extends Model
{
    use HasFactory;
    use Authorizable;

    protected $table = 'actes';

    protected $fillable = [
        'reseau',
        'montant',
        'rechargement_id',
        'nreference'
        // 'user_id'
    ];

    protected $casts = [
        'created_at' => 'datetime:d-m-Y',
    ];

    protected static function booted() {

        static::creating(function ($actes) {
            $actes->user_id = auth()->id();
        });
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    // public function rechargement(){
    //     return $this->belongsTo('App\Models\Rechargement');
    // }

    public function fournisseur(){
        return $this->belongsTo('App\Models\Fournisseur');
    }
}
