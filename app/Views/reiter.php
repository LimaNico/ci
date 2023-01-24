
<div class="col-10">
    <div class="row w-75">
        <table class="table">
            <thead class="bg-light">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Beschreibung</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($reiter as $elem){
                echo "<tr>
            <td>{$elem['reiterName']}</td>
            <td>".$elem['reiterBeschreibung']."</td>
            <td>
              <i class='fa-regular fa-pen-to-square'></i>
              <i class='fa-regular fa-trash-can'></i>
            </td>
          </tr>";
            };
            ?>
            </tbody>
        </table>
    </div>
    <div class="row w-75">
        <h2 class="mt-3">Bearbeiten/Erstellen</h2>
        <div>
            <form action="">
                <label class="form-label" for="reitername">Bezeichnung des Reiters:</label>
                <input class="form-control" type="text" name="reitername" id="reitername" placeholder="Reiter">
                <label class="mt-3" for="reiterBeschreibung">Beschreibung:</label>
                <textarea class="form-control" name="reiterBeschreibung" id="reiterBeschreibung" placeholder="Beschreibung" rows="3" ></textarea>
            </form>
            <div class="mt-3">
                <button class="btn btn-primary">Speichern</button>
                <button class="btn btn-info">Reset</button>
            </div>
        </div>
    </div>
</div>
