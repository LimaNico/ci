<?php

namespace App\Controllers;

use App\Models\AufgabenModel;
use App\Models\MitgliederModel;
use App\Models\ReiterModel;

class Aufgaben extends BaseController
{
    public function index()
    {
        $model = model(AufgabenModel::class);
        $data['aufgaben'] = $model->getAufgaben(session()->get('projektID'));

        $data['aufgabenzuweisung'] = $model->getZuweisungen(session()->get('projektID'));

        $data['mitglieder'] = model(MitgliederModel::class)->getMitglieder();
        $data['reiter'] = model(ReiterModel::class)->getReiter(session()->get('projektID'));
        $data['zuweisungID'] = model(AufgabenModel::class)->getZuweisungenID(session()->get('projektID'));
        $data['todo'] = 0;
        $data['title'] = 'Aufgaben';
        return view('templates/header', $data). view('templates/sidebar',$data) . view('aufgaben/aufgaben', $data) . view('templates/footer');
    }

    public function ced_Aufgaben($id = 0, $todo = 0)
    {
        $model = model(AufgabenModel::class);

        $data['title'] = 'Aufgaben';
        $data['aufgabenzuweisung'] = $model->getZuweisungen(session()->get('projektID'));
        $data['mitglieder'] = model(MitgliederModel::class)->getMitglieder();
        $data['reiter'] = model(ReiterModel::class)->getReiter(session()->get('projektID'));
        $data['zuweisungID'] = model(AufgabenModel::class)->getZuweisungenID(session()->get('projektID'));
        // Create = 0; Edit = 1; Delete = 2
        if ($todo==2){
            $model->delete($id);
            $todo=0;
        }
        $data['todo'] = $todo;
        $data['aufgaben'] = $model->getAufgaben(session()->get('projektID'));
        if ($id>0 && ($todo == 1 || $todo == 2))
        {
            $data['selectedAufgabe'] = model(AufgabenModel::class)->getAufgabe($id);
        }

        return view('templates/header', $data). view('templates/sidebar',$data) . view('aufgaben/aufgaben', $data) . view('templates/footer');
    }

    public function submit_ced()
    {
        $model = model(AufgabenModel::class);

        $todo = $_POST['todo'];
        if (isset($_POST['aufgabenID'])) $aufgabenID = $_POST['aufgabenID'];

        $aufgabenName = $this->request->getPost('aufgabenName');
        $aufgabenBeschreibung = $this->request->getPost('aufgabenBeschreibung');
        $erstellungsDatum = $this->request->getPost('erstellungsDatum');
        $f??lligkeitsDatum = $this->request->getPost('f??lligkeitsDatum');
        $reiterID = $this->request->getPost('reiterID');
        $zust??ndig = $this->request->getPost('zust??ndig[]');


        if (isset($_POST['btnsave']))
        {
            if ($_POST['todo']==0)
            {
                $model->insert(['aufgabenName'=>$aufgabenName,'aufgabenBeschreibung'=>$aufgabenBeschreibung,
                    'erstellungsDatum'=>$erstellungsDatum,'f??lligkeitsDatum'=>$f??lligkeitsDatum,
                    'reiterID'=>$reiterID]);
                $db      = \Config\Database::connect();
                foreach ($zust??ndig as $item) $db->table('aufgabenzuweisung')->insert(['aufgabenID'=>$model->getInsertID(),'mitgliederID'=>$item]);
            }
            elseif ($todo == 1)
            {
                if (!empty($aufgabenName))
                    $model->update($aufgabenName,['aufgabenName' => $aufgabenName]);
                if (!empty($aufgabenBeschreibung))
                    $model->update($aufgabenBeschreibung,['aufgabenBeschreibung'=>$aufgabenBeschreibung]);
                if (!empty($erstellungsDatum))
                    $model->update($erstellungsDatum,['erstellungsDatum'=>$erstellungsDatum]);
                if (!empty($f??lligkeitsDatum))
                    $model->update($f??lligkeitsDatum,['f??lligkeitsDatum'=>$f??lligkeitsDatum]);
                if (!empty($reiterID))
                    $model->update($reiterID,['reiterID'=>$reiterID]);
            }
        }
        elseif (isset($_POST['btndelete']))
        {
            $model->delete($aufgabenID);
        }
        elseif (isset($_POST['btncancel']))
        {
            return redirect()->to(site_url('/aufgaben'));
        }

        return redirect()->to(site_url('/aufgaben'));

    }
}