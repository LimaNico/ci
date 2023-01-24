<?php

namespace App\Controllers;

use App\Models\ReiterModel;

class Reiter extends BaseController
{
    public function index()
    {
        $model = model(ReiterModel::class);

        $builder = $model->builder();
        $data['reiter'] = $model->getReiter(session()->get('projektID'));
        $data['title'] = 'Reiter';
        return view('templates/header', $data). view('templates/sidebar',$data) . view('reiter', $data) . view('templates/footer');
    }
}