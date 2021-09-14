<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    use HasFactory;

    use Authorizable;

    protected $table = 'activites';

    protected $fillable = [
        'date',
        // 'montant',
        'fournisseur_id',
        // 'reseau_id',
        'user_id'
    ];


    protected static function booted() {

        static::creating(function ($activite) {
            $activite->user_id = auth()->id();
        });
    }

    public function fournisseur(){
        return $this->belongsTo('App\Models\Fournisseur');
    }


    public function acts(){
        return $this->hasMany('App\Models\Activities');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

}
