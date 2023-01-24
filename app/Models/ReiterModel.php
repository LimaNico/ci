<?php

namespace App\Models;

use CodeIgniter\Model;

class ReiterModel extends Model
{
    protected $table = 'reiter';
    protected $primaryKey = 'reiterID';

    protected $allowedFields = ['reiterID','reiterName','reiterBeschreibung','projekt'];

    public function getReiter($projektID)
    {
        return $this->builder()->where('projekt',$projektID)->get()->getResultArray();
    }

    public function getProjekt($id = 0){
        if ($id > 0)
        {
            return $this->find($id);
        }
        else return null;
    }
}