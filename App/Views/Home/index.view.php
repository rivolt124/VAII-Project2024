<?php
/** @var \App\Core\LinkGenerator $link */
/** @var \App\Core\IAuthenticator $auth */
?>

<style>
    /* Prevent scrolling */
    body {
        margin: 0;
        padding: 0;
        overflow: hidden;
    }

    .footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 50px; /* Fixed height */
        background-color: #343a40;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .footer p {
        margin: 0;
    }
</style>

<section class="index-selection home d-flex justify-content-center align-items-center">
    <div class="container text-center">
        <h1 class="display-4 text-white">UNIZA TRAVEL</h1>
        <?php if (!$auth->isLogged()): ?>
            <a href="<?= $link->url("auth.login") ?>" class="btn btn-outline-danger mt-2" >Login</a>
        <?php endif; ?>
        <?php if ($auth->isLogged()): ?>
            <a href="<?= $link->url("auth.logout") ?>" class="btn btn-outline-danger mt-2">Logout</a>
            <a href="<?= $link->url("flight.index") ?>" class="btn btn-outline-danger mt-2" >Manage Flights</a>
        <?php endif; ?>
    </div>
</section>

<footer class="footer text-center py-3 mt-auto bg-dark text-white">
    <div class="container">
        <p>UNIZA TRAVEL</p>
        <p>&copy; 2024 UNIZA TRAVEL. All rights reserved.</p>
    </div>
</footer>



