<?php
include '../../db_con.php';
session_start();
// include 'authcheckkasir.php';

if (isset($_POST['nama_brg'])) {
    $nama_brg = $_POST['nama_brg'];
    $qty = $_POST['jumlah'];
    // $qty = 1;

    //menampilkan data barang
    $data = mysqli_query($dbconnect, "SELECT * FROM stok_brg WHERE nama_brg='$nama_brg'");
    $b = mysqli_fetch_assoc($data);
    // print_r($b);
    // //cek diskon barang
    // $disbarang = mysqli_query($dbconnect, "SELECT * FROM disbarang WHERE barang_id='$b[id_barang]'");
    // $disb = mysqli_fetch_assoc($disbarang);

    // // cek jika di keranjang sudah ada barang yang masuk
    // $key = array_search('nama_brg', $b);
	// // return var_dump($key);

    if (mysqli_num_rows($data) > 0) {
        
        if ($_SESSION['cart'] != null) {
            // return var_dump($_SESSION['cart']);

            $key = array_search($b['nama_brg'], array_column($_SESSION['cart'], 'nama'));

            
            if ($key !== false) {

                header("location:../../../../perdalu/kasir_page.php?pesan=sameitem");
                        
            } else {
                        
                // return var_dump($b);
                //Jika tidak ada yang sesuai akan menjadi barang baru dikeranjang
                $barang = [
                    'kd' => $b['kode_brg'],
                    'nama' => $b['nama_brg'],
                    'harga' => $b['hrg_jual'],
                    'stok' => $b['jumlah'],
                    'qty' => $qty,
                    'diskon' => 0,
                ];
        
                $_SESSION['cart'][] = $barang;
                
                header('location:../../../../perdalu/kasir_page.php');
                        
            }
        } else {
            // return var_dump($b);
            //Jika tidak ada yang sesuai akan menjadi barang baru dikeranjang
            $barang = [
                'kd' => $b['kode_brg'],
                'nama' => $b['nama_brg'],
                'harga' => $b['hrg_jual'],
                'stok' => $b['jumlah'],
                'qty' => $qty,
                'diskon' => 0,
            ];

            $_SESSION['cart'][] = $barang;
            
            header('location:../../../../perdalu/kasir_page.php');
            //merubah urutan tampil pada keranjang
            // krsort($_SESSION['cart']);
        }
    }else {
        header("location:../../../../perdalu/kasir_page.php?pesan=notindatabase");
    }

}
?>