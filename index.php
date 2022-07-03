<?php

if(isset($_GET['pesan'])){
    if($_GET['pesan'] == "gagal"){
            $_SESSION['error'] = 'Username & password salah';
    }
}

?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
        crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
        <title>Perdagangan Luar Janti Park</title>

        <!-- JQUERY -->
        <!-- <script type="text/javascript" language="javascript" src="jquery/jquery.js"></script> -->
        <!-- <script type="text/javascript" language="javascript" src="style/style.js"></script> -->

        <link href="assets/css/stylelogin.css" rel="stylesheet" type="text/css" media="all"/>

    </head>
    <body>
        <div style="color: red;margin-bottom: 15px;">
        <?php if (isset($_SESSION['error']) && $_SESSION['error'] != '') { ?>
            <script type="text/javascript">

            swal("ERROR!", "<?php echo $_SESSION['error']; ?>", "error");

            </script>
		<?php }
                $_SESSION['error'] = '';
        ?>
        <div class="wrapper">
            <div class="logo"> <img src="assets/img/user/logo.png" alt=""> </div>
            <form class="p-3 mt-4" method="post" action="proses_login.php" >
                <div class="form-field d-flex align-items-center">
                    <span class="far fa-user"></span> 
                    <input type="text" name="username" id="username" placeholder="Username" required autofocuss>
                </div>
                <div class="form-field d-flex align-items-center">
                    <span class="fas fa-key"></span>
                    <input type="password" name="password" id="pwd" placeholder="Password" required>
                </div>
                <!-- <button class="btn mt-3" name="masuk" >Login</button> -->
                <input type="submit" name="masuk" value="Login" class="btn btn-lg btn-primary btn-block"/>
            </form>
            <div class="text-center mt-3 uper"> 
                UNIT PERDAGANGAN <br>
                JANTI PARK
            </div>
        </div>
        <div class="text-center mt-4 kknt"> 
            Powered  <br>
            KKNT STMIK SINUS
        </div>
    </body>
</html>