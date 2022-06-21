<?php 
include 'db_con.php';
session_start();
// remove all session variables
// session_unset();

// print_r($_SESSION);

if (isset($_POST['masuk'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION['User'] = $username;


    if ($_SESSION['User'] == 'admin') {
        $query = mysqli_query($dbconnect, "SELECT * FROM admin_acc WHERE username='$username' and password='$password'");
    
        //mendapatkan hasil dari data
        $data = mysqli_fetch_assoc($query);
        // return var_dump($data);
    
        //mendapatkan nilai jumlah data
        $check = mysqli_num_rows($query);
        // return var_dump($check);
    
        if (!$check) {
            // $_SESSION['error'] = 'Username & password salah';
            header("location:index.php?pesan=gagal");
        } else {
            $_SESSION['namaadmin'] = $data['nama_admin'];
            $_SESSION['user'] = $data['username'];
            $_SESSION['pwd'] = $data['password'];
    
            header('location:admin.php');
        }
    } else if ($_SESSION['User'] == 'kasir'){
        $query = mysqli_query($dbconnect, "SELECT * FROM kasir_acc WHERE username='$username' and password='$password'");
    
        //mendapatkan hasil dari data
        $data = mysqli_fetch_assoc($query);
        // return var_dump($data);
    
        //mendapatkan nilai jumlah data
        $check = mysqli_num_rows($query);
        // return var_dump($check);
    
        if (!$check) {
            // $_SESSION['error'] = 'Username & password salah';
            header("location:index.php?pesan=gagal");
        } else {
            if ($data['username'] == 'kasir') {
                $_SESSION['namakasir'] = $data['nama_kasir'];
                $_SESSION['user'] = $data['username'];
                $_SESSION['pwd'] = $data['password'];
        
                header('location:perdalu/kasir_page.php');
            } else {
                $_SESSION['namakasir'] = $data['nama_kasir'];
                $_SESSION['user'] = $data['username'];
                $_SESSION['pwd'] = $data['password'];
        
                header('location:perdalam/kasir_page.php');
            }
        }
    } else if ($_SESSION['User'] == 'kasir2') {
        $query = mysqli_query($dbconnect, "SELECT * FROM kasir_acc WHERE username='$username' and password='$password'");
    
        //mendapatkan hasil dari data
        $data = mysqli_fetch_assoc($query);
        // return var_dump($data);
    
        //mendapatkan nilai jumlah data
        $check = mysqli_num_rows($query);
        // return var_dump($check);
    
        if (!$check) {
            // $_SESSION['error'] = 'Username & password salah';
            header("location:index.php?pesan=gagal");
        } else {
            $_SESSION['namakasir'] = $data['nama_kasir'];
            $_SESSION['user'] = $data['username'];
            $_SESSION['pwd'] = $data['password'];
    
            header('location:perdalam/kasir_page.php');
        }
    } else {
        $query = mysqli_query($dbconnect, "SELECT * FROM admin_acc WHERE username='$username' and password='$password'");
    
        //mendapatkan hasil dari data
        $data = mysqli_fetch_assoc($query);
        // return var_dump($data);
    
        //mendapatkan nilai jumlah data
        $check = mysqli_num_rows($query);
        // return var_dump($check);
    
        if (!$check) {
            // $_SESSION['error'] = 'Username & password salah';
            header("location:index.php?pesan=gagal");
        } else {
            $_SESSION['namaadmin'] = $data['nama_admin'];
            $_SESSION['user'] = $data['username'];
            $_SESSION['pwd'] = $data['password'];
    
            header('location:admin.php');
        }
    }
}
?>