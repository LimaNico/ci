<?php

namespace App\Controllers;

class Reiter extends BaseController
{
    public function index()
    {
        $data['title'] = 'Reiter';
        $data['sidebar'] = view('templates/sidebar');
        return view('templates/header', $data). view('templates/sidebar',$data) . view('reiter', $data) . view('templates/footer');
    }
}