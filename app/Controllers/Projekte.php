<?php

namespace App\Controllers;

class Projekte extends BaseController
{
    public function index()
    {
        $data['title'] = 'Projekte';
        $data['sidebar'] = view('templates/sidebar');
        return view('templates/header', $data). view('templates/sidebar',$data) . view('projekte', $data) . view('templates/footer');
    }
}