<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Videogame extends Model
{
    /**
     * The table associated with the model.
     * 
     * Par convention, le nom pluriel de la classe sera utilisé comme nom de table sauf si un autre nom est explicitement spécifié.
     *  Ainsi, dans ce cas, Eloquent supposera que le Videogame modèle stocke les enregistrements dans la table videogames. 
     * Vous pouvez spécifier une table personnalisée en définissant une table propriété sur votre modèle:
     * @var string
     */
    protected $table = 'videogame';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}