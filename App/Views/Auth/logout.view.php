<?php

$layout = 'auth';
/** @var \App\Core\LinkGenerator $link */
?>


<link rel="stylesheet" href="../../../public/css/auth.logout.css">
<link rel="stylesheet" href="../../../public/css/auth.login.css">

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card card-signin">
                <div class="card-body">
                    <h5 class="card-title">You have been logged out</h5>

                    <div class="message-container">
                        <p>
                            You have successfully logged out. <br>
                            <a href="<?= \App\Config\Configuration::LOGIN_URL ?>">Log in again</a> or go back <a href="<?= $link->url("home.index") ?>">to the home page</a>.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
