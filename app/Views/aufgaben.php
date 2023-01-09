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


            $aufgaben = array(
                array(
                    'aufgabenID' => 0,
                    'aufgabenBezeichnung' => 'HTML Datei erstellen',
                    'aufgabenBeschreibung' => 'HTML Datei erstellen',
                    'reiterID' => 'ToDo',    //0 == T ODO; 1  == Erledigt, 2== Verschoben
                    'zuständig' => 'Max Mustermann'
                ),

                array(
                    'aufgabenID' => 1,
                    'aufgabenBezeichnung' => 'CSS Datei erstellen',
                    'aufgabenBeschreibung' => 'CSS Datei erstellen',
                    'reiterID' => 'ToDo',
                    'zuständig' => 'Max Mustermann'
                ),

                array(
                    'aufgabenID' => 2,
                    'aufgabenBezeichnung' => 'PC eingeschaltet',
                    'aufgabenBeschreibung' => 'PC eingeschaltet',
                    'reiterID' => 'Erledigt',
                    'zuständig' => 'Max Mustermann'
                ),

                array(
                    'aufgabenID' => 3,
                    'aufgabenBezeichnung' => 'Kaffee trinken',
                    'aufgabenBeschreibung' => 'Kaffee trinken',
                    'reiterID' => 'Erledigt',
                    'zuständig' => 'Petra Müller'
                ),

                array(
                    'aufgabenID' => 4,
                    'aufgabenBezeichnung' => 'Für die Uni lernen',
                    'aufgabenBeschreibung' => 'Für die Uni lernen',
                    'reiterID' => 'Verschoben',
                    'zuständig' => 'Max Mustermann'
                ),

            );

            foreach ($aufgaben as $aufgabe){
                echo "<tr>
                        <td>".$aufgabe['aufgabenBezeichnung']."</td>
                        <td>".$aufgabe['aufgabenBeschreibung']."</td>
                        <td>".$aufgabe['reiterID']."</td>
                        <td>".$aufgabe['zuständig']."</td>
                        <td>
                            <i class='fa-regular fa-pen-to-square'></i>
                            <i class='fa-regular fa-trash-can'></i>
                        </td>
                    </tr>";
            }

            ?>
            </tbody>
        </table>
    </div>
    <div class="row w-75">
        <h2 class="mt-3">Bearbeiten/Erstellen</h2>
        <div>
            <form action="">
                <label class="form-label" for="aufgabenbezeichnung">Aufgabenbezeichnung:</label>
                <input class="form-control" type="text" name="aufgabenbezeichnung" id="aufgabenbezeichnung" placeholder="Aufgabe">
                <label class="mt-3 form-label" for="aufgabenBeschreibung">Beschreibung der Aufgabe:</label>
                <textarea class="form-control" name="aufgabenBeschreibung" id="aufgabenBeschreibung" placeholder="Beschreibung" rows="3" ></textarea>
                <label for="erstellungsDatum" class="mt-3 form-label">Erstellungsdatum:</label>
                <input type="text" class="form-control" name="erstellungsDatum" id="erstellungsDatum" placeholder="01.01.19">
                <label for="fälligkeitsDatum" class="mt-3 form-label">fällig bis:</label>
                <input type="text" class="form-control" name="fälligkeitsDatum" id="fälligkeitsDatum" placeholder="01.01.19">
                <label for="reiter-select" class="form-label mt-3">Zugehöriger Reiter:</label>
                <select name="reiter-select" id="reiter-select" class="form-select" >
                    <option selected>ToDo</option>
                    <option>Erledigt</option>
                    <option>Verschoben</option>
                </select>
                <label for="zuständig-select" class="form-label mt-3">Zuständig:</label>
                <select name="zuständig-select" id="zuständig-select" class="form-select" >
                    <option selected>Max Mustermann</option>
                    <option>Petra Müller</option>
                </select>
            </form>
            <div class="mt-3">
                <button class="btn btn-primary">Speichern</button>
                <button class="btn btn-info">Reset</button>
            </div>
        </div>
    </div>
</div>
