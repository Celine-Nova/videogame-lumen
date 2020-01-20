<?php

namespace App\Model;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * Par convention, le nom pluriel de la classe sera utilisé comme nom de table sauf si un autre nom est explicitement spécifié.
     *  Ainsi, dans ce cas, Eloquent supposera que le Videogame modèle stocke les enregistrements dans la table videogames. 
     * Vous pouvez spécifier une table personnalisée en définissant une table propriété sur votre modèle:
     * 
     * @var array
     */
    protected $fillable = [
        'name', 'email',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
}
