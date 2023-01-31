
<div class="col-10">
    <div class="row w-75">
        <table class="table">
            <thead class="bg-light">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">E-Mail</th>
                <th scope="col">In Projekt</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>

            <?php
            foreach ($mitglieder as $mitglied){
                echo "<tr>
                        <td>".$mitglied['username']."</td>
                        <td>".$mitglied['email']."</td>
                        <td>
                            <input type='checkbox'>
                        </td>
                        <td>
                            <a href=" . site_url('mitglieder/ced_Mitglieder/'.$mitglied['mitgliederID'].'/1/') . " class='btn text-dark'><i class='fa-regular fa-pen-to-square'></i></a>
                            
                            <a
                            class='text-dark'
                            role='button'
                            data-bs-toggle='modal'
                            data-bs-target='#löschBestätigung'
                            data-bs-username='". $mitglied['username']."'
                            data-bs-delete-link='". site_url('mitglieder/ced_Mitglieder/'.$mitglied['mitgliederID'].'/2/')."'><i class='fa-regular fa-trash-can'></i></a>
                        </td>
                       </tr>";
            }
            ?>
            <div class="modal fade" id="löschBestätigung" tabindex="-1" aria-labelledby="löschBestätigungLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="löschBestätigungLabel">Mitglied löschen?</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Soll das Mitglied gelöscht werden?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info" data-bs-dismiss="modal">Abbrechen</button>
                            <a id="deleteBtn" type="button" class="btn btn-danger" >Bestätigen</a>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript" defer>
                const deleteModal = document.getElementById('löschBestätigung')
                deleteModal.addEventListener('show.bs.modal', event => {
                    const button = event.relatedTarget;
                    const username = button.getAttribute('data-bs-username');
                    const del_link = button.getAttribute('data-bs-delete-link');
                    const modalText = deleteModal.querySelector('.modal-body p');
                    const deleteBtn = deleteModal.querySelector('#deleteBtn');

                    modalText.textContent = `Soll das Mitglied gelöscht werden?`;
                    deleteBtn.setAttribute("href", del_link);
                });
            </script>
            </tbody>
        </table>
    </div>
    <div class="row w-75">
        <h2 class="mt-3">Bearbeiten/Erstellen</h2>
        <div>
            <?php
            helper('form');
            echo form_open('mitglieder/submit_ced',[],['todo'=>$todo]);
            if ($todo > 0 && $todo!=2)
            {
                echo form_hidden('mitgliederID',$selectedMitglied['mitgliederID']);
            }
            if (!isset($selectedMitglied)) {
                $selectedMitglied['username'] = '';
                $selectedMitglied['email'] = '';
                $selectedMitglied['mitgliederID'] = null;
            }
            if ($todo == 2){
                echo form_hidden(['username'=>$selectedMitglied['username'],'email'=>$selectedMitglied['email']]);
            }
            ?>
                <label class="form-label" for="username">Username</label>
                <input class="form-control" type="text" name="username" placeholder="Username" value=<?php echo ($selectedMitglied['username'].' '.($todo == 2 ? 'disabled' : '')) ?>>
                <label class="mt-3" for="email">E-Mail-Adresse:</label>
                <input class="form-control" type="text" name="email" placeholder="E-Mail-Adresse eingeben" value=<?php echo ($selectedMitglied['email'].' '.($todo == 2 ? 'disabled' : ''))?>>
                <label class="mt-3" for="passwort">Passwort:</label>
                <input class="form-control" type="text" name="passwort" placeholder="Passwort" <?php
                $session = session();
                echo (($selectedMitglied['mitgliederID']==$session->get('userID') && $todo != 2) || $todo == 0 ) ? '' : 'disabled';
                ?>>
                <input class="mt-3" type="checkbox" id="projektZugeordnet">
                <label for="projektZugeordnet">Dem Projekt zugeordnet</label>
            <div class="mt-3">
                <?php
                if ($todo==2)
                {
                    $buttons = [
                        'submit_text' => 'User löschen',
                        'submit_color' => 'btn-danger',
                        'submit_data' => 'btndelete',
                        'cancel_color' => 'btn-primary'
                    ];
                }
                else $buttons = [
                    'submit_text' => 'Speichern',
                    'submit_color' => 'btn-primary',
                    'submit_data' => 'btnsubmit',
                    'cancel_color' => 'btn-danger'
                ];
                echo form_submit($buttons['submit_data'],$buttons['submit_text'],['class'=>'btn '.$buttons['submit_color']]);
                echo form_submit('btncancel','Abbrechen',['class'=>'ml-2 btn '.$buttons['cancel_color']]);
                ?>
            </div>
            <?php
            echo form_close();
            ?>
        </div>
    </div>
</div>
