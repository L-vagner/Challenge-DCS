<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LigneCommande extends Model
{
    /**
     * La table associée au model.
     *
     * @var string
     */
    protected $table = 'ligne_facturation';

    /**
     * La clée primaire de la table
     *
     * @var string
     */
    protected $primaryKey = 'LF_ID';

    public $timestamps = false;


}
