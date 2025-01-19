<?php
/** @var string $contentHTML */
/** @var IAuthenticator $auth */
/** @var LinkGenerator $link */

use App\Config\Configuration;
use App\Core\IAuthenticator;
use App\Core\LinkGenerator;

$showFooter = $showFooter ?? true;
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <title><?= Configuration::APP_NAME ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../public/css/styles.css">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-lg-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">UNIZA TRAVEL</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <?php if ($auth->isLogged()): ?>
                    <li class="nav-item"><a class="nav-link" href="<?= $link->url("flight.index") ?>">Manage Flights</a></li>
                <?php endif; ?>
                <li class="nav-item"><a class="nav-link" href="<?= $link->url("users.index") ?>">Active Users</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= $link->url("airplane.index") ?>">Airplanes</a></li>
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

<?php if ($showFooter): ?>
    <footer class="footer text-center py-3 mt-auto bg-dark text-white">
        <div class="container">
            <p>UNIZA TRAVEL</p>
            <p>&copy; 2024 UNIZA TRAVEL. All rights reserved.</p>
        </div>
    </footer>
<?php endif; ?>

</body>
</html>
