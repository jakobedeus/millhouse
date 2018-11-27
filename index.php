<?php

session_start();
include 'includes/head-index.php';

?>

    <main class="container">
        <div class="row justify-content-center">
            <div class="col-8 border pad">
                <img src="images/logo_border.png" alt="logo_image">
            </div>
            <div class="col-8">
                <p>Lorem ipsum dolor amet waistcoat echo park live-edge, 
                cliche four loko pinterest tousled cred bespoke raw denim 
                vape 90's brooklyn meditation. Slow-carb vinyl vape cronut 
                gastropub, swag quinoa chillwave. You probably haven't heard 
                of them prism hoodie cray polaroid cronut aesthetic vaporware. 
                Swag affogato aesthetic art party umami poutine seitan. Vaporware 
                fingerstache mlkshk art party iceland shoreditch hella beard thundercats 
                enamel pin taiyaki. Cray vice +1 flannel etsy. Direct trade echo park 
                scenester, cornhole readymade hell of tattooed pour-over actually yr retro.
                </p>
            </div>
        </div> <!-- closing row-->
        <div class="row justify-content-center">
            <div class="col-8 border">
                <div class="accordion" id="accordionExample">
                    <div class="row justify-content-center">
                        <div class="col-5">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Log in</button>
                                    </h5>
                                </div> <!-- closing div card-header-->

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <form action='views/login.php' method='POST'>
                                            <label for='login_username'>Your Username</label>
                                            <input name='username' id='login_username' type='text' required>
                                            <label for='login_password'>Your Password</label>
                                            <input name='password' id='login_password' type='password' required>
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
                                        <form action='views/register.php' method='POST'>
                                            <label for='reg_usernam'>Your Username</label>
                                            <input name='username' id='reg_username' type='text' required>
                                            <label for='reg_password'>Your Password</label>
                                            <input name='password' id='reg_password' type='password' required>
                                            <button type='submit'>Register!</button>
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