<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;

class Fournisseur extends Model
{
    use HasFactory;
    use Authorizable;

    protected $table = 'fournisseurs';

    protected $fillable = [
        'nom',
        'contact',
        'user_id'
    ];


    protected static function booted() {

        static::creating(function ($fournisseur) {
            $fournisseur->user_id = auth()->id();
        });
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function networks(){
        return $this->belongsTo('App\Models\Network');
    }


    public function activities(){
        return $this->belongsTo('App\Models\Activities');
    }

    public function reseaus(){
        return $this->hasMany('App\Models\Reseau');
    }

    public function rechargements(){
        return $this->hasMany('App\Models\Rechargement');
    }

    public function activites(){
        return $this->hasMany('App\Models\Activite');
    }

}
