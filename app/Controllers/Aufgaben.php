<?php

namespace App\Controllers;

class Aufgaben extends BaseController
{
    public function index()
    {
        $data['title'] = 'Aufgaben';
        $data['sidebar'] = view('templates/sidebar');
        return view('templates/header', $data). view('templates/sidebar',$data) . view('aufgaben', $data) . view('templates/footer');
    }
}