<div class="col-3">
</div>
<div class="col-6">
    <div class="card">
        <div class="card-header">Mitglied <?php echo $todo == 2 ? 'löschen' : 'bearbeiten oder neu erstellen' ?></div>
        <div class="card-body">
            <div class="row">
                <?php
                helper('form');

                echo form_open('mitglieder/submit_edit',[],['todo'=>$todo,'mitgliederID'=>$mitglied['mitgliederID']]);

                echo form_label('Username:','username',['class' => 'form-label']);
                echo form_input('username',$mitglied['username'],['class' => 'form-control']);

                echo form_label('E-Mail:','email',['class' => 'form-label']);
                echo form_input('email',$mitglied['email'],['class' => 'form-control']);

                $session = session();
                if ($session->get('userID') == $mitglied['mitgliederID'])
                {
                    echo form_label('Passwort:','passwort',['class' => 'form-label']);
                    echo form_input('passwort','',['class' => 'form-control']);
                }
                ?>
            </div>
        </div>
        <div class="card-footer">
            <?php
            echo form_submit('btnsubmit','Speichern',['class'=>'btn btn-primary']);
            echo form_button('btncancel','Abbrechen',['class'=>'ml-2 btn btn-danger ']);
            echo form_close();
            ?>
        </div>
    </div>
</div>
<div class="col-3">
</div>

