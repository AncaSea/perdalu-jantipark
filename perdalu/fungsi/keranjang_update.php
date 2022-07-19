<?php
include '../../db_con.php';
session_start();
// include 'authcheckkasir.php';



// print_r($qty);

if (!empty($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    if (isset($_POST['bayar'])) {
    
        foreach ($cart as $key => $value) {
            $kode = $value['kd'];
            $qty = $value['qty'];

            // echo $kode;
            
            $cekstok = mysqli_query($dbconnect, "SELECT * FROM stok_brg WHERE kode_brg='$kode'");;
            $getdata = mysqli_fetch_array($cekstok);
            // $storebrg = mysqli_fetch_assoc($cekstok);
            // $kodebrg = $storebrg['kode_brg'];
            // $namabrg = $storebrg['nama_brg'];
            // $_SESSION['kdbrg'] = $kode;
            // $_SESSION['Qty'] = $qty;
            $_SESSION['byr'] = $_POST['bayar'];
            $_SESSION['ttl'] = $_POST['total'];
            
            $stoksekarang = $getdata['jumlah'];
            $updatestok = $stoksekarang - $qty;
     
            $updatedata = mysqli_query($dbconnect, "UPDATE stok_brg set jumlah = '$updatestok' WHERE kode_brg='$kode'");
            
            if ($updatedata) {
                header('location:transaksi.php');
            } else {
                // header("location:../../../../perdalu/kasir_page.php&pesan=updatefailed");
            }
        }
        
    } else {
        $qty = $_POST['qty'];
    
        foreach ($cart as $key => $value) {
            $_SESSION['cart'][$key]['qty'] = $qty[$key];
        
            $cartbarang = $_SESSION['cart'];
            header("Content-type: application/json");
            echo json_encode($cartbarang);
        }
        // header('location:../../../../perdalu/kasir_page.php');
    }               
} else {
    header("location:../../../../perdalu/kasir_page.php&pesan=emptycart");
}