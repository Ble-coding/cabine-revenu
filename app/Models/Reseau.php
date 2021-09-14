<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;

class Reseau extends Model
{
    use HasFactory;
    use Authorizable;

    protected $table = 'reseaus';

    protected $fillable = [
        'libelle',
        // 'fournisseur_id',
        'user_id'
    ];


    protected static function booted() {

        static::creating(function ($reseau) {
            $reseau->user_id = auth()->id();
        });
    }

    public function fournisseur(){
        return $this->belongsTo('App\Models\Fournisseur');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function activites(){
        return $this->hasMany('App\Models\Activite');
    }


    public function networks(){
        return $this->hasMany('App\Models\Network');
    }

    public function activities(){
        return $this->hasMany('App\Models\Activities');
    }


}
