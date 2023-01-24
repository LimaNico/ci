<?php

namespace App\Controllers;

class AktuellesProjekt extends BaseController
{
    public function index()
    {
        $data['title'] = 'Aktuelles Projekt';

        return view('templates/header',$data).view('templates/sidebar',$data).view('aktuellesProjekt',$data).view('templates/footer');
    }
}