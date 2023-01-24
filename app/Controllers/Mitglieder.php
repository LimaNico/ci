<?php

namespace App\Controllers;

use App\Models\MitgliederModel;

class Mitglieder extends BaseController
{
    public function index()
    {
        $model = model(MitgliederModel::class);

        $data['title'] = 'Mitglieder';
        $data['mitglieder'] = $model->getMitglieder();
        $data['todo'] = 0;

        return view('templates/header', $data). view('templates/sidebar',$data) . view('mitglieder/mitglieder', $data) . view('templates/footer');
    }

    public function ced_Mitglieder($id = 0, $todo = 0)
    {
        $model = model(MitgliederModel::class);
        $data['mitglieder'] = $model->getMitglieder();
        $data['title'] = 'Mitglieder';
        // Create = 0; Edit = 1; Delete = 2
        $data['todo'] = $todo;
        if ($id>0 && ($todo == 1 || $todo == 2))
        {
            $data['selectedMitglied'] = model(MitgliederModel::class)->getMitglied($id);
        }

        return view('templates/header', $data). view('templates/sidebar',$data) . view('mitglieder/mitglieder', $data) . view('templates/footer');
        //return view('templates/header',$data).view('mitglieder/edit',$data).view('templates/footer');
    }

    public function submit_ced()
    {
        $model = model(MitgliederModel::class);

        $todo = $_POST['todo'];
        if (isset($_POST['mitgliederID'])) $mitgliederID = $_POST['mitgliederID'];

        $username = $_POST['username'];
        $email = $_POST['email'];

        if (isset($_POST['btnsubmit']))
        {
            if ($_POST['todo']==0 && isset($_POST['passwort']) && !empty($username) && !empty($email))
            {
                $model->insert(['username'=>$username,'email'=>$email,'passwort'=>password_hash($_POST['passwort'],PASSWORD_DEFAULT,['cost'=>10])]);
            }
            elseif ($todo == 1)
            {
                if (!empty($username))
                    $model->update($mitgliederID,['username' => $username]);
                if (!empty($email))
                    $model->update($mitgliederID,['email'=>$email]);
                if (isset($_POST['passwort']) && !empty($_POST['passwort']))
                    $model->update($mitgliederID,['passwort'=>password_hash($_POST['passwort'],PASSWORD_DEFAULT,['cost'=>10])]);
            }
        }
        elseif (isset($_POST['btndelete']))
        {
            $model->delete($mitgliederID);
        }
        elseif (isset($_POST['btncancel']))
        {
            return redirect()->to(site_url('/mitglieder'));
        }

        return redirect()->to(site_url('/mitglieder'));

    }
}