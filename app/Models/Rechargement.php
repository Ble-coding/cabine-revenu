<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;


class Rechargement extends Model
{
    use HasFactory;

    use Authorizable;

    protected $table = 'rechargements';

    protected $fillable = [
        'datere',
        // 'montant',
        'fournisseur_id',
        // 'reseau_id',
        'reseau',
        'montant',
        // 'rechargement_id',
        'nreference',
        'user_id'
    ];

    /**
 * The attributes that should be cast.
 *
 * @var array
 */
protected $casts = [
    'datere' => 'datetime:d-m-Y',
];


    protected static function booted() {

        static::creating(function ($rechargement) {
            $rechargement->user_id = auth()->id();
        });
    }

    public function fournisseur(){
        return $this->belongsTo('App\Models\Fournisseur');
    }


    // public function actes(){
    //     return $this->hasMany('App\Models\Acte');
    // }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
