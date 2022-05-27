<?php
include 'db_con.php';
session_start();
// include 'authcheckkasir.php';

if (isset($_POST['nama_brg'])) {
    $nama_brg = $_POST['nama_brg'];
    $qty = $_POST['jumlah'];
    // $qty = 1;

    //menampilkan data barang
    $data = mysqli_query($dbconnect, "SELECT * FROM stok_brg WHERE nama_brg='$nama_brg'");
    $b = mysqli_fetch_assoc($data);

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

                header("location:admin.php?pageAdmin=kasir&pesan=sameitem");
                
                // //jika ada data yang sesuai di keranjang akan ditambahkan jumlah nya
                // $c_qty = $_SESSION['cart'][$key]['qty'];
                // $_SESSION['cart'][$key]['qty'] = $c_qty;
                    
                    
                // //cek jika ada potongan dan cek jumlah barang lebih besar sama dengan minimum order potongan
                // if ($disb['qty'] && $_SESSION['cart'][$key]['qty'] >= $disb['qty']) {
        
                //     //cek kelipatan jumlah barang dengan batas minimum order
                //     $mod = $_SESSION['cart'][$key]['qty'] % $disb['qty'];
        
                //     if ($mod == 0) {
        
                    //         //Jika benar jumlah barang kelipatan batas minimum order
                    //         $d = $_SESSION['cart'][$key]['qty'] / $disb['qty'];
                    //     } else {
                        
                        //         //Simpan jumlah potongan yang didapat
                        //         $d = ($_SESSION['cart'][$key]['qty'] - $mod) / $disb['qty'];
                        //     }
                        
                        //     //Simpan diskon dengan jumlah kelipatan dikali potongan barang
                        //     $_SESSION['cart'][$key]['diskon'] = $d * $disb['potongan'];
                        // }
                        
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
                
                header('location:admin.php?pageAdmin=kasir');
                        
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
            
            header('location:admin.php?pageAdmin=kasir');
            //merubah urutan tampil pada keranjang
            // krsort($_SESSION['cart']);
        }
    }else{
        header("location:admin.php?pageAdmin=kasir?pesan=notindatabase");
    }

}
?>