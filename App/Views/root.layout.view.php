<?php

/** @var string $contentHTML */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Core\LinkGenerator $link */
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <title><?= \App\Config\Configuration::APP_NAME ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <script src="public/js/script.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-light sticky-lg-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">UNIZA TRAVEL</a>
        <button onclick="scrollToTop()" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <?php if ($auth->isLogged()): ?>
                    <li class="nav-item"><a class="nav-link" href="<?= $link->url("flight.index") ?>">Manage Flights</a></li>
                <?php endif; ?>
                <li class="nav-item"><a class="nav-link" href="<?= $link->url("home.index") ?>">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= $link->url("home.about") ?>">About</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= $link->url("home.contact") ?>">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid mt-3">
    <div class="web-content">
        <?= $contentHTML ?>
    </div>
</div>

<script>
    function scrollToTop() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
</script>
</body>
</html>
