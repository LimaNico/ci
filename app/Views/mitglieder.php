<?php
$mitglieder = array(
// Erzeuge den ersten Array und speichere einige Werte darin
    array(
        'id' => 1,
        'username' => 'kalenborn',
        'email' => 'kalenborn@example.com',
        'projektID' => 1
    ),
// Erzeuge den zweiten Array und speichere einige Werte darin
    array(
        'id' => 3,
        'username' => 'elena',
        'email' => 'elena@example.com',
        'projektID' => 1
    )
);
?>

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
                <label class="form-label" for="username">Username</label>
                <input class="form-control" type="text" name="username" id="username" placeholder="Username">
                <label class="mt-3" for="email">E-Mail-Adresse:</label>
                <input class="form-control" type="text" name="email" id="email" placeholder="E-Mail-Adresse eingeben">
                <label class="mt-3" for="passwort">Passwort:</label>
                <input class="form-control" type="text" name="passwort" id="passwort" placeholder="Passwort">
                <input class="mt-3" type="checkbox" id="projektZugeordnet">
                <label for="projektZugeordnet">Dem Projekt zugeordnet</label>
            </form>
            <div class="mt-3">
                <button class="btn btn-primary">Speichern</button>
                <button class="btn btn-info">Reset</button>
            </div>
        </div>
    </div>
</div>
