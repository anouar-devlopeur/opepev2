<?php 
include './CLASS/cnx.php';

if (isset($_POST['submitConn'])) {
    
    session_start();
    $emailConn = $_POST["emailConn"];
    $mdpConn = $_POST["mdpConn"];
    if (!empty($emailConn) && !empty($mdpConn)) {
       
        if ($login->isValidEmail($emailConn)) {
        $login->login($emailConn, $mdpConn);
        }else {
            echo "<script>alert('Email incorrect ')</script>";
        }

    }
  
}
















include './include/header.php' ?>
<body style="background-color: #132A13 ">
    <section class="sec1 ">
        <div class="overlay" id="overlay"></div>
        <!-- Section: Design Block -->
        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-5 mt-5">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                    <h1 class="my-5 display-5 fw-bold ls-tight" style="color:aliceblue; font-size: 3.2vw;">
                        The best offer <br />
                    </h1>
                    <p class="mb-4 opacity-70" style="color:aliceblue; font-size: 1.2vw;">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                        Temporibus, expedita iusto veniam atque, magni tempora mollitia
                        dolorum consequatur nulla, neque debitis eos reprehenderit quasi
                        ab ipsum nisi dolorem modi. Quos?
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div class="card bg-glass" style="width: 28vw;">
                        <div class="card-body px-4 py-5 px-md-5">
                        

                            <!-- --------------------------------------------------Form_Connection -------------------------------------------->
                            <form method="POST" id="inscriptionForm">
                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="email" name="emailConn" class="form-control" placeholder="Email address" />
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" name="mdpConn" class="form-control" placeholder="Password" />
                                </div>

                                <!-- Submit button -->
                                <button type="submit" name="submitConn" id="submitConnBtn" class="btn btn-block mb-4" style="color:white; background-color: #132A13;" onclick="validateAndSubmitConnForm()">
                                    Se connecter
                                </button>

                                <!-- Inscription button -->
                                <a href="./traitement/signup.php">
                                    S'inscrire
                                </a>
                            </form>
                            <!-- ------------------------------------------------------Fin ------------------------------------------------------------->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

 <?php include './include/footer.php' ?>