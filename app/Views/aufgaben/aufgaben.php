<div class="col-10">
    <div class="row w-75">
        <table class="table">
            <thead class="bg-light">
            <tr>
                <th scope="col">Aufgabenbezeichnung:</th>
                <th scope="col">Beschreibung der Aufgabe:</th>
                <th scope="col">Reiter:</th>
                <th scope="col">Zuständig:</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($aufgaben as $aufgabe){
                $string = "";
                $i = 0;
                foreach ($aufgabenzuweisung[$aufgabe['aufgabenID']] as $elem){
                    $string = $string . $elem . ',<br>';
                }
                echo "<tr>
                        <td>".$aufgabe['aufgabenName']."</td>
                        <td>".$aufgabe['aufgabenBeschreibung']."</td>
                        <td>".$aufgabe['reiterName']."</td>
                        <td>".substr($string,0,-5)."</td>
                        <td>
                            <a href=" . site_url('aufgaben/'.$aufgabe['aufgabenID'].'/1/') . " class='btn text-dark'><i class='fa-regular fa-pen-to-square'></i></a>
                            <a
                            class='text-dark'
                            role='button'
                            data-bs-toggle='modal'
                            data-bs-target='#löschBestätigung'
                            data-bs-delete-link='". site_url('aufgaben/'.$aufgabe['aufgabenID'].'/2/')."'><i class='fa-regular fa-trash-can'></i></a>
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
                            <p>Soll die Aufgabe gelöscht werden?</p>
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
            <?php helper('form');
            echo form_open('/aufgaben/submit_ced',[],['todo'=>$todo]);
            echo (isset($selectedAufgabe)) ? form_hidden('aufgabenID',$selectedAufgabe['aufgabenID']) : "";
            ?>
                <label class="form-label" for="aufgabenbezeichnung">Aufgabenbezeichnung:</label>
                <input class="form-control" type="text" name="aufgabenName" placeholder="Aufgabe" value='<?php echo ($todo > 0) ? $selectedAufgabe['aufgabenName'] : ''; echo "' "; echo (($todo==2) ? 'disabled':'')?>>
                <label class="mt-3 form-label" for="aufgabenBeschreibung">Beschreibung der Aufgabe:</label>
                <textarea class="form-control" name="aufgabenBeschreibung" placeholder="Beschreibung" rows="3" <?php echo (($todo==2) ? 'disabled':'')?>><?php echo ($todo > 0) ? $selectedAufgabe['aufgabenBeschreibung'] : ''?></textarea>
                <label for="erstellungsDatum" class="mt-3 form-label">Erstellungsdatum:</label>
                <input type="text" class="form-control" name="erstellungsDatum" placeholder="2022-12-08" value='<?php echo ($todo > 0) ? $selectedAufgabe['erstellungsDatum'] : '';echo "' "; echo (($todo==2) ? 'disabled':'')?>>
                <label for="fälligkeitsDatum" class="mt-3 form-label">fällig bis:</label>
                <input type="text" class="form-control" name="fälligkeitsDatum" placeholder="2023-06-04" value='<?php echo ($todo > 0) ? $selectedAufgabe['fälligkeitsDatum'] : '';echo "' "; echo (($todo==2) ? 'disabled':'')?>>
                <label for="reiterID" class="form-label mt-3">Zugehöriger Reiter:</label>
                <select name="reiterID" class="form-select" <?php echo (($todo==2) ? 'disabled':'')?>>
                    <?php foreach ($reiter as $elem){
                        $selection = "";
                        if (isset($selectedAufgabe)) $selection = ((($elem['reiterID']==$selectedAufgabe['reiterID'])? 'selected':''));
                        echo "<option value='".$elem['reiterID']."'" . $selection .">".$elem['reiterName']."</option>";
                    } ?>
                </select>
                <label for="zuständig" class="form-label mt-3">Zuständig:</label>
                <select name="zuständig[]" class="form-select" multiple <?php echo (($todo==2) ? 'disabled':'')?>>
                    <?php foreach ($mitglieder as $elem){
                        $selection = "";
                        if (isset($selectedAufgabe)) $selection = ((in_array($elem['mitgliederID'],$zuweisungID[$selectedAufgabe['aufgabenID']]))? 'selected':'');
                        echo "<option value='".$elem['mitgliederID']. "'" . $selection
                                .
                                ">".$elem['username'].
                                "</option>";
                    } ?>
                </select>
                <div class="mt-3">
                    <button type="submit" name='<?php echo ($todo==2) ? "btndelete" : "btnsave" ?>' class="btn <?php echo ($todo==2) ? "btn-danger" : "btn-primary" ?>"><?php echo ($todo==2) ? "Löschen" : "Speichern" ?></button>
                    <button type="submit" name="btncancel" class="btn btn-info">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>
