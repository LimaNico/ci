<div class='col-2'>
    <ul class='list-group'>
        <li class='list-group-item'><a class='text-decoration-none' href=<?php echo site_url('/login/logout')?>>Logout</a></li>
        <li class='list-group-item'><a class='text-decoration-none' href=<?php echo site_url('/projekte') ?>>Projekte</a></li>
        <?php if (!empty(session()->get('projektID'))){
            echo "
            <li class='list-group-item'><a class='text-decoration-none' href=". site_url('/aktuellesProjekt/').">Aktuelles Projekt</a></li>
            <li class='list-group-item w-75' style='margin-left: 25%'><a class='text-decoration-none' href=". site_url('/reiter/').">Reiter</a></li>
            <li class='list-group-item w-75' style='margin-left: 25%'><a class='text-decoration-none' href=". site_url('/aufgaben/') .">Aufgaben</a></li>
            <li class='list-group-item w-75' style='margin-left: 25%'><a class='text-decoration-none' href=". site_url('/mitglieder/') .">Mitglieder</a></li>
            ";
        }?>

    </ul>

</div>