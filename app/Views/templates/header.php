<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?></title>
    <link href="https://unpkg.com/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          rel="stylesheet" />
    <script src="https://kit.fontawesome.com/376c44d724.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
<div class="container-fluid">
    <header class='bg-light  mt-3 mb-3 p-5 text-center'>
        <h1>Aufgabenplaner: <?php echo $title ?></h1>
    </header>
    <?php
    if ($title != "Login"){
        echo "
        <div class='row'>
        <nav class='navbar navbar-expand-lg bg-body-tertiary'>
            <div class='container-fluid'>
                <a class='navbar-brand' href='".site_url('/login/logout')."'>Logout</a>
                <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNavDropdown' aria-controls='navbarNavDropdown' aria-expanded='false' aria-label='Toggle navigation'>
                    <span class='navbar-toggler-icon'></span>
                </button>
                <div class='collapse navbar-collapse' id='navbarNavDropdown'>
                    <ul class='navbar-nav'>
                        <li class='nav-item'>
                            <a class='nav-link active' aria-current='page' href='".site_url('/projekte')."'>Projekte</a>
                        </li>";
        if (!empty(session()->get('projektID'))){
            echo "
            <li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
            Aktuelles Projekt</a>
                            <ul class='dropdown-menu'>
                                <li><a class='dropdown-item' href='". site_url('/aktuellesProjekt/')."'>Projektübersicht</a></li>
                                <li><hr class='dropdown-divider'></li>
                                <li><a class='dropdown-item' href='". site_url('/reiter/')."'>Reiter</a></li>
                                <li><a class='dropdown-item' href='". site_url('/aufgaben/')."'>Aufgaben</a></li>
                                <li><a class='dropdown-item' href='". site_url('/mitglieder/')."'>Mitglieder</a></li>
                            </ul>";}
    }?>

                    </ul>
                </div>
            </div>
        </nav>


