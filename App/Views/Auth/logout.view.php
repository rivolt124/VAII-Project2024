<?php

$layout = 'auth';
/** @var \App\Core\LinkGenerator $link */
?>

<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #ff8a00, #e52e71);
        overflow-x: hidden;
        height: 100vh;
    }

    .container {
        padding-top: 50px;
        padding-bottom: 50px;
        max-width: 100%;
    }

    .card-signin {
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        background-color: rgba(255, 255, 255, 0.9);
        padding: 30px;
        max-width: 500px;
        margin: auto;
    }

    .card-title {
        font-size: 2rem;
        color: #333;
        margin-bottom: 20px;
        text-align: center;
    }

    .message-container {
        text-align: center;
        font-size: 1.2rem;
        margin-bottom: 20px;
    }

    .message-container a {
        color: #feb47b;
        text-decoration: none;
    }

    .message-container a:hover {
        text-decoration: underline;
    }

    .footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        background-color: #343a40;
        color: white;
        text-align: center;
        padding: 10px;
    }

    .footer p {
        margin: 0;
        font-size: 0.9rem;
    }
    /* generovane pomocou AI */
</style>

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

<footer class="footer">
    <p>UNIZA TRAVEL</p>
    <p>&copy; 2024 UNIZA TRAVEL. All rights reserved.</p>
</footer>
