<?php 
include './CLASS/cnx.php';
session_start();
$userId = $_SESSION['idUtl'];

if (empty($_SESSION['idUtl'])|| isset($_POST['logout'])) {
    $_SESSION['idUtl'] = "";
    session_destroy();
    header('location: index.php');
    exit();
}


include './include/heder2.php';
?>


    <!-- ..........................................rechercher ................................................-->
    <section>

    </section>

    <hr color="black" size="1" style=" margin-top: 100px">

    <?php
    // Sélectionner tous les thèmes depuis la base de données
    $themesResult= $Theme->get_theme();
        foreach($themesResult as $theme ) {
            $themeTitle = $theme['nomTh'];
            $themeDescription = $theme['descriptionTh'];
            $themeImage = $theme['imageTh'];
            $idth = $theme['idTh'];
    ?>

            <section class="sec1 d-flex" style="width: 100%;">
                <div class="division1" style="width: 42%">
                    <img src="plantes/<?php echo $themeImage; ?>.jpg" style="height: 45vw; width:40vw; padding:24px " alt="<?php echo $themeTitle; ?>">
                </div>
                <div class="division2" style="width: 58%; padding:24px ">
                    <div>
                        <h1><?php echo  $themeTitle; ?></h1>
                        <p><?php echo $themeDescription; ?></p>
                    </div>
                    <div class="division12" style=" margin-top:40px">
                        <a href="./article.php?id=<?php echo $idth; ?>" style="text-decoration: none;">
                            <table>
                                <tr>
                                    <td style=" border: 1px solid black;  padding: 10px; width:35vw ; gap:50px" class="d-flex">
                                        <img src="plantes/<?php echo $themeImage; ?>.jpg" style="height: 10vw;width:10vw" alt="<?php echo $themeTitle; ?>">
                                        <div class="d-flex flex-column">
                                            <h3 style="color: black;">Tout sur... <?php echo $themeTitle; ?></h3>
                                            <div class="d-flex" style=" align-items: center; gap:10px">
                                                <a href="./article.php?id=<?php echo $idth; ?>" name="idth" style="color: black; text-decoration: none;">En savoir plus</a>
                                                <svg width="14" height="12" viewBox="0 0 14 12" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M-4.97198e-07 6.77851L11.0896 6.77851L7.06538 10.8992L8.14044 12L14 6L8.14044
                                                4.41415e-07L7.06538 1.10082L11.0896 5.22149L-3.61078e-07 5.22149L-4.97198e-07 6.77851Z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </a>
                    </div>
                </div>

            </section>
            <hr color="black" size="1">
    <?php
        }
    
    ?>


    <?php include './include/footer2.php' ?>