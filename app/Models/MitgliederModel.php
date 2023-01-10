<?php

namespace App\Models;

use CodeIgniter\Model;

class MitgliederModel extends Model
{
    protected $table = 'mitglieder';
    protected $primaryKey = 'mitgliederID';

    protected $allowedFields = ['mitgliederID','username','email','passwort'];

    public function getMitglieder()
    {
        return $this->findAll();
    }

    public function getMitglied($id = 0){
        if ($id > 0)
        {
            return $this->find($id);
        }
        else return null;
    }

    public function login()
    {
        $builder = $this->builder();
        $builder->select('passwort, mitgliederID');
        $builder->where('mitglieder.email', $_POST['email']);
        $result = $builder->get();


        return $result->getRowArray();

    }
}