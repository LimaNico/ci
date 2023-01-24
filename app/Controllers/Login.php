<?php

namespace App\Controllers;
use App\Models\MitgliederModel;


class Login extends BaseController
{
    public function index()
    {
        $model = model(MitgliederModel::class);
        $session = session();

        echo '<pre>';
        echo isset($_POST['btnsubmit']);
        echo '</pre>';

        if (isset($_POST['btnsubmit'])) {
            if ($this->validation->run($this->request->getPost(),'signIn')) {

                if ($model->login() != null) {
                    $login = $model->login();
                    $passwort = $login['passwort'];

                    if (password_verify($_POST['password'], $passwort)) {
                        $session->set([
                            'loggedIn' => true,
                            'userID' => $login['mitgliederID']
                        ]);
                        return redirect()->to(site_url('/aktuellesProjekt'));
                    }else{
                        $data['wrongLogin'] = 'E-Mail oder Passwort falsch';
                    }
                }
            } else{
                $data['title'] = 'Login';
                $data['post'] = $this->request->getPost();
                $data['error'] = $this->validation->getErrors();
                return view('templates/header',$data).view('login',$data).view('templates/footer');
            }
        }
        $data['title'] = 'Login';
        return view('templates/header',$data).view('login',$data).view('templates/footer');
    }

    public function logout(){
        session()->destroy();
        return redirect()->to(site_url('/login'));
    }

}