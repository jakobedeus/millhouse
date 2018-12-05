<?php

session_start();
include 'includes/head-index.php';
include 'includes/functions.php';

?>
<body class="body_index">
<main class="container">
    <div class="row justify-content-center">
        <div class="col-8 border pad">
            <?php 
            if(isset($_SESSION["username"])){ 
            ?>
                <p><?php header('Location: views/feed.php'); ?> </p>
            <?php
            }
            ?>
            <img src="images/millhouse_logo.png" alt="logo_image">
        </div>
        <div class="col-8">
            <p>Lorem ipsum dolor amet waistcoat echo park live-edge, 
            cliche four loko pinterest tousled cred bespoke raw denim 
            vape 90's brooklyn meditation. Slow-carb vinyl vape cronut 
            gastropub, swag quinoa chillwave. You probably haven't heard 
            </p>
        </div>
    </div> <!-- closing row-->
    <div class="row justify-content-center">
        <div class="col-8 border">
            <div class="accordion" id="accordionExample">
                <div class="row justify-content-center">
                    <div class="col-5">
                        <div>
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link log_in_button" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Log in</button>
                                </h5>
                            </div> <!-- closing div card-header-->
                            <div id="collapseOne" class="collapse show style_log_reg_form" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                <?php
                                    // My function, that echoes out if register fails
                                    $text = access_denied_messages(
                                        'login_failed', 'Username or password is incorrect, please try again.'
                                    );
                                    echo $text;
                                    ?>
                                    <form action='includes/login.php' method='POST'>
                                        <label for='login_username'>Your Username</label>
                                        <input name='username' id='login_username' type='text'>
                                        <label for='login_password'>Your Password</label>
                                        <input name='password' id='login_password' type='password'>
                                        <br>
                                        <button type='submit'>Login!</button>
                                    </form>
                                </div> <!-- closing card-body-->
                            </div> <!-- closing collapse item-->
                        </div> <!-- closing card-->
                    </div> <!-- closing col-4-->
                    <div class="col-5">
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">Register</button>
                                </h5>
                            </div> <!-- closing div card-header-->
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                   <?php
                                    // My function, that echoes out if register fails
                                    $text = access_denied_messages(
                                        'register_failed', 'You need to fill in all fields.'
                                    );
                                    echo $text;
                                    ?>
                                    <?php
                                    // My function, that echoes out if register fails
                                    $text = access_denied_messages(
                                        'register_failed_exist', 'A user with this name already exists, try again.'
                                    );
                                    echo $text;
                                    ?>
                                    <form action='includes/register.php' method='POST'>
                                        <label for='reg_usernam'>Your Username</label>
                                        <input name='username' id='reg_username' type='text'>
                                        <label for='reg_password'>Your Password</label>
                                        <input name='password' id='reg_password' type='password'>
                                        <label for='email'>Your E-mail</label>
                                        <input name='email' id='email' type='text'>
                                        <input name='admin' value='not_admin' type='hidden'>
                                        <input type='submit'value="Register!">
                                    </form>
                                </div>
                            </div>
                        </div> <!-- closing card-->
                    </div>  <!-- closing col-4-->
                </div> <!-- closing row-->
            </div> <!-- closing accordition-->
        </div> <!-- closing col-4-->
    </div> <!-- closing row-->
</main>
<?php
include 'includes/footer-index.php';
?>