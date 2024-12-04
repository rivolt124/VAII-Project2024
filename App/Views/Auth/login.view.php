<?php

$layout = 'auth';
/** @var Array $data */
/** @var \App\Core\LinkGenerator $link */
?>

<style>
    /* General body styling */
    body {
        overflow: hidden;
        margin: 0;
        padding: 0;
    }

    .card-signin {
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border: none;
        background-color: rgba(255, 255, 255, 0.8); /* Slight transparency */
        padding: 30px;
        max-width: 400px;
        width: 100%;
    }

    .card-title {
        font-size: 2rem;
        color: #333;
        margin-bottom: 20px;
    }

    .form-label-group {
        margin-bottom: 1.5rem;
    }

    /* Ensure proper input styling */
    .form-control {
        border-radius: 5px;
        border: 1px solid #ddd;
        font-size: 1.1rem;
        padding: 10px;
        height: 45px;
        width: 100%; /* Ensure full width */
        box-sizing: border-box;
        white-space: nowrap; /* Prevent word wrapping */
    }

    .form-control:focus {
        border-color: #feb47b;
        box-shadow: 0 0 10px rgba(255, 126, 95, 0.5);
        outline: none;
    }

    /* Submit button style */
    .btn-primary {
        background-color: #feb47b;
        border: none;
        color: white;
        font-size: 1.2rem;
        padding: 10px 20px;
        width: 100%;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #ff7e5f;
    }

    /* Error message style */
    .text-danger {
        font-size: 1.1rem;
        font-weight: bold;
    }

    /* Prevent input text from stacking */
    .form-signin input {
        word-wrap: normal;
    }

    /* Responsive design */
    @media (max-width: 768px) {
        .card-signin {
            padding: 20px;
        }

        .card-title {
            font-size: 1.8rem;
        }
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


<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Prihlásenie</h5>
                    <div class="text-center text-danger mb-3">
                        <?= @$data['message'] ?>
                    </div>
                    <form class="form-signin" method="post" action="<?= $link->url("login") ?>">
                        <div class="form-label-group mb-3">
                            <input name="login" type="text" id="login" class="form-control" placeholder="Login"
                                   required autofocus>
                        </div>

                        <div class="form-label-group mb-3">
                            <input name="password" type="password" id="password" class="form-control"
                                   placeholder="Password" required>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary" type="submit" name="submit">Prihlásiť
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer text-center py-3 mt-auto bg-dark text-white">
    <div class="container">
        <p>UNIZA TRAVEL</p>
        <p>&copy; 2024 UNIZA TRAVEL. All rights reserved.</p>
    </div>
</footer>
