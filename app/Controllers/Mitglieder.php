<?php

namespace App\Controllers;

class Mitglieder extends BaseController
{
    public function index()
    {
        $data['title'] = 'Mitglieder';
        $data['sidebar'] = view('templates/sidebar');
        return view('templates/header', $data). view('templates/sidebar',$data) . view('mitglieder', $data) . view('templates/footer');
    }
}