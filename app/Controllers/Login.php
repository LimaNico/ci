<?php

namespace App\Controllers;
use App\Models\MitgliederModel;


class Login extends BaseController
{
    public function index()
    {
        $model = model(MitgliederModel::class);
        $session = session();


        if (isset($_POST['email']) && isset($_POST['password']))

        {
            if ($model->login() != null)
            {
                $login = $model->login();
                $passwort = $login['passwort'];

                if (password_verify($_POST['password'],$passwort))
                {
                    $session->set([
                        'loggedIn' => true,
                        'userID' => $login['mitgliederID']
                    ]);
                    return redirect()->to(site_url('/aktuellesProjekt'));
                }
            }
        }
        $data['title'] = 'Login';
        return view('templates/header',$data).view('login',$data).view('templates/footer');
    }

}