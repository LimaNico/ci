<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjektModel extends Model
{
    protected $table = 'projekte';
    protected $primaryKey = 'projektID';

    protected $allowedFields = ['projektID','projektName','projektBeschreibung','ersteller'];

    public function getProjekte()
    {
        return $this->findAll();
    }

    public function getProjekt($id = 0){
        if ($id > 0)
        {
            return $this->find($id);
        }
        else return null;
    }
}