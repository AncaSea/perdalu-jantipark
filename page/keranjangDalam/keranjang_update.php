<?php
include '../../db_con.php';
session_start();
// include 'authcheckkasir.php';



// print_r($qty);

if (!empty($_SESSION['cartdlm'])) {
    $cart = $_SESSION['cartdlm'];
    if (isset($_POST['bayar']) && isset($_POST['identitas'])) {
    
        foreach ($cart as $key => $value) {
            // $id = $value['id'];
            // $qty = $value['qty'];

            // echo $kode;
            
            // $cekstok = mysqli_query($dbconnect, "SELECT * FROM stok_brg WHERE kode_brg='$kode'");
            // $getdata = mysqli_fetch_array($cekstok);

            // $storebrg = mysqli_fetch_assoc($cekstok);
            // $kodebrg = $storebrg['kode_brg'];
            // $namabrg = $storebrg['nama_brg'];
            // $_SESSION['idbrg'] = $id;
            // $_SESSION['Qty'] = $qty;

            $_SESSION['byrdlm'] = $_POST['bayar'];
            $_SESSION['identity'] = $_POST['identitas'];
            $_SESSION['ttl'] = $_POST['total'];
            
            // $stoksekarang = $getdata['jumlah'];
            // $updatestok = $stoksekarang - $qty;
     
            // $updatedata = mysqli_query($dbconnect, "UPDATE stok_brg set jumlah = '$updatestok' WHERE kode_brg='$kode'");
            
            // if ($updatedata) {
                header('location:transaksi.php');
            // } else {
            //     header("location:../../../../admin.php?page=kasir/kasirDalam&pesan=updatefailed");
            // }
        }
        
    } else {
        $qty = $_POST['qty'];
        $id = $_POST['id'];

        foreach ($cart as $key => $value) {
            if ($_SESSION['cartdlm'][$key]['id'] === $id) {
                $harga = $value['harga'];
                $sum = $qty * $harga;
                // $sumtext = sum.toString();


                $item = [
                    'id' => $value['id'],
                    'nama' => $value['nama'],
                    'role' => $value['role'],
                    'jenis' => $value['jenis'],
                    'harga' => $value['harga'],
                    'qty' => $qty,
                ];

                $_SESSION['cartdlm'][$key] = $item;
                header("Content-type: application/json");
                echo json_encode($_SESSION['cartdlm']);
            } else {
                // $cartold = $_SESSION['cart'][$key]['qty'];
                // $_SESSION['cart'][$key]['qty'] === $cartold;
            }
        }               // header('location:../../../../admin.php?page=kasir/kasirDalam&accordion2=on&active=yes');
    }            
} else {
    header("location:../../admin.php?page=kasir/kasirDalam&accordion2=on&active=yes&pesan=emptycart");
}