<?php

namespace App\Controllers;

use App\Models\ProjektModel;

class Projekte extends BaseController
{
    public function index()
    {
        $model = model(ProjektModel::class);
        $data['title'] = 'Projekte';
        $data['projekte'] = $model->getProjekte();
        $data['todo'] = 0;
        return view('templates/header', $data). view('templates/sidebar',$data) . view('projekte/projekte', $data) . view('templates/footer');
    }

    public function ced_Projekte()
    {

        $id = intval($this->request->getPost('id'));
        $model = model(ProjektModel::class);
        $data['projekte'] = $model->getProjekte();
        $data['title'] = 'Projekte';
        //Create = 0; Edit = 1; Delete = 2; Select = 3
        if(isset($_POST['btnselect'])) {
            $todo = 3;
            session()->set(['projektID'=>$id]);
        }
        else (isset($_POST['btnedit'])) ? $todo = 1 : $todo = 2;

        $data['todo'] = $todo;
        $data['selectedProjekt'] = $model->getProjekt($id);

        return view('templates/header', $data). view('templates/sidebar',$data) . view('projekte/projekte', $data) . view('templates/footer');
    }

    public function submit_ced(){

        $model = model(ProjektModel::class);

        $todo = $_POST['todo'];
        if (isset($_POST['projektID'])) $projektID = $_POST['projektID'];


        $projektName = $this->request->getPost('projektname');
        $projektBeschreibung = $this->request->getPost('projektbeschreibung');

        if (isset($_POST['btnsave']))
        {
            if ($_POST['todo']==0  && !empty($projektName) && !empty($projektBeschreibung))
            {
                $model->insert(['projektName'=>$projektName,'projektBeschreibung'=>$projektBeschreibung,'ersteller'=>$_SESSION['userID']]);
            }
            elseif ($todo == 1)
            {
                if (!empty($projektName))
                    $model->update($projektID,['projektName' => $projektName]);
                if (!empty($projektBeschreibung))
                    $model->update($projektID,['projektBeschreibung'=>$projektBeschreibung]);
            }
        }
        elseif (isset($_POST['btndelete']))
        {
            if (session()->get('projektID')== $projektID) session()->remove('projektID');
                $model->delete($projektID);
        }
        elseif (isset($_POST['btnreset']))
        {
            session()->remove('projektID');
            return redirect()->to(site_url('/projekte'));
        }

        return redirect()->to(site_url('/projekte'));

    }
}