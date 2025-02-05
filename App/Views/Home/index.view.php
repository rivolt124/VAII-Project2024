<?php
/** @var \App\Core\LinkGenerator $link */
/** @var \App\Core\IAuthenticator $auth */
?>
<link rel="stylesheet" href="../../../public/css/home.index.css">
<script src="../../../public/js/home.index.js"></script>

<section class="index-selection home d-flex justify-content-center align-items-center mb-0" style="height: 86vh">
    <div class="login-container text-center ">
        <h1 class="display-4 text-white">UNIZA TRAVEL</h1>
        <p id="greeting" class="text-white"></p>
        <?php if (!$auth->isLogged()): ?>
            <a href="<?= $link->url("auth.login") ?>" class="btn btn-outline-danger mt-2" >Login</a>
            <a href="<?= $link->url("user.register") ?>" class="btn btn-outline-danger mt-2" >Register</a>
        <?php endif; ?>
        <?php if ($auth->isLogged()): ?>
            <a href="<?= $link->url("auth.logout") ?>" id="logoutJava" class="btn btn-outline-danger mt-2">Logout</a>
            <a href="<?= $link->url('user.edit', ['id' => $auth->getLoggedUserId()]) ?>" class="btn btn-outline-danger mt-2" >Edit Account</a>
        <?php endif; ?>
    </div>

</section>
