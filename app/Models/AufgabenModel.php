<?php

namespace App\Models;

use CodeIgniter\Model;

class AufgabenModel extends Model
{
    protected $table = 'aufgaben';
    protected $primaryKey = 'aufgabenID';

    protected $allowedFields = ['aufgabenID','aufgabenName','aufgabenBeschreibung','erstellungsdatum','fälligkeitsDatum','reiterID'];

    public function getAufgaben($projektID)
    {

        return $this->builder()->join('reiter','reiter.reiterID = aufgaben.reiterID')->where('reiter.projekt',$projektID)->get()->getResultArray();
    }

    public function getAufgabe($id = 0){
        if ($id > 0)
        {
            return $this->find($id);
        }
        else return null;
    }

    public function getProjektID($aufgabenID){
        return $this->builder->select('projektID')->join('reiter','reiter.reiterID = aufgaben.reiterID')->where('aufgabenID',$aufgabenID)->get()->getResultArray();
    }

    public function getZuweisungen($projektID){
        $array = $this->getAufgaben($projektID);
        $zuweisung = array();
        $db      = \Config\Database::connect();
        for ($i = 0; $i < count($array);$i++){
            $builder = $db->table('aufgabenzuweisung')->select('username')->join('mitglieder','mitglieder.mitgliederID = aufgabenzuweisung.mitgliederID')->where('aufgabenID',$array[$i]['aufgabenID']);

            foreach ($builder->get()->getResultArray() as $item){
                $zuweisung[$array[$i]['aufgabenID']][] = $item['username'];
            }
        }
        return $zuweisung;
    }

    public function getZuweisungenID($projektID){
        $array = $this->getAufgaben($projektID);
        $zuweisung = array();
        $db      = \Config\Database::connect();
        for ($i = 0; $i < count($array);$i++){
            $builder = $db->table('aufgabenzuweisung')->select('mitglieder.mitgliederID')->join('mitglieder','mitglieder.mitgliederID = aufgabenzuweisung.mitgliederID')->where('aufgabenID',$array[$i]['aufgabenID']);

            foreach ($builder->get()->getResultArray() as $item){
                $zuweisung[$array[$i]['aufgabenID']][] = $item['mitgliederID'];
            }
        }
        return $zuweisung;
    }
}