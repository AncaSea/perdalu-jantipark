<?php
include '../../db_con.php';
session_start();
// include 'authcheckkasir.php';

if (isset($_POST['nama_pesan'])) {
    $nama_psn = $_POST['nama_pesan'];
    $qty = $_POST['jumlah'];
    // $qty = 1;

    //menampilkan data barang
    $data = mysqli_query($dbconnect, 
    "SELECT makanan.id, makanan.nama, makanan.role, makanan.jenis, 1 AS jumlah, makanan.harga FROM makanan UNION
     SELECT minuman.id, minuman.nama, minuman.role, minuman.jenis, 1 AS jumlah, minuman.harga FROM minuman UNION
     SELECT * FROM paket_barbar");
	if ($data -> num_rows > 0) {
		while ($row = mysqli_fetch_assoc($data)) {
			// $hasil = $row;
			// print_r($row);
		
            if ($nama_psn == $row['nama']) {
                $sql = mysqli_query($dbconnect, "SELECT makanan.id, makanan.nama, makanan.role, makanan.jenis, 1 AS jumlah, makanan.harga FROM makanan WHERE nama='$nama_psn' UNION
                                                 SELECT minuman.id, minuman.nama, minuman.role, minuman.jenis, 1 AS jumlah, minuman.harga FROM minuman WHERE nama='$nama_psn' UNION
                                                 SELECT * FROM paket_barbar WHERE nama='$nama_psn'");
                $row = mysqli_fetch_assoc($sql);
        
                if (mysqli_num_rows($sql) > 0) {    
                    
                    if ($_SESSION['cartdlm'] != null) {
                        // return var_dump($_SESSION['cart']);
                        $key = array_search($row['nama'], array_column($_SESSION['cartdlm'], 'nama'));
        
                        if ($key !== false) {
        
                            header("location:../../../../admin.php?page=kasir/kasirDalam&pesan=sameitem&accordion2=on");
                                    
                        } else {
                            // return var_dump($b);
                            //Jika tidak ada yang sesuai akan menjadi barang baru dikeranjang
                            $barangdlm = [
                                'id' => $row['id'],
                                'nama' => $row['nama'],
                                'role' => $row['role'],
                                'jenis' => $row['jenis'],
                                'harga' => $row['harga'],
                                'qty' => $qty,
                                // 'diskon' => 0,
                            ];
                    
                            $_SESSION['cartdlm'][] = $barangdlm;
                            
                            header('location:../../../../admin.php?page=kasir/kasirDalam&accordion2=on');
                                    
                        }
                    } else {
                        // return var_dump($b);
                        //Jika tidak ada yang sesuai akan menjadi barang baru dikeranjang
                        $barangdlm = [
                            'id' => $row['id'],
                            'nama' => $row['nama'],
                            'role' => $row['role'],
                            'jenis' => $row['jenis'],
                            'harga' => $row['harga'],
                            'qty' => $qty,
                            // 'diskon' => 0,
                        ];
            
                        $_SESSION['cartdlm'][] = $barangdlm;
                        
                        header('location:../../../../admin.php?page=kasir/kasirDalam&accordion2=on');
                        //merubah urutan tampil pada keranjang
                        // krsort($_SESSION['cart']);
                    }
                }else{
                    header("location:../../../../admin.php?page=kasir/kasirDalam&pesan=notindatabase&accordion2=on");
                }
            }
        }
	}

    // $data2 = mysqli_query($dbconnect, "SELECT * FROM minuman");
    // $b2 = mysqli_fetch_array($data2);
 
    // else if ($nama_brg = $b2['nama']) {
    //     $sql = mysqli_query($dbconnect, "SELECT * FROM minuman WHERE nama='$nama_brg'");
    //     $row = mysqli_fetch_assoc($sql);

    //     if (mysqli_num_rows($sql) > 0) {
            
    //         if ($_SESSION['cart'] != null) {
    //             // return var_dump($_SESSION['cart']);
    //             $key = array_search($row['nama'], array_column($_SESSION['cart'], 'nama'));

    //             if ($key !== false) {

    //                 header("location:../../../../admin.php?page=kasir/kasirDalam&pesan=sameitem");
                            
    //             } else {
    //                 // return var_dump($b);
    //                 //Jika tidak ada yang sesuai akan menjadi barang baru dikeranjang
    //                 $barang = [
    //                     'id' => $row['id'],
    //                     'nama' => $row['nama'],
    //                     'role' => $row['role'],
    //                     'jenis' => $row['jenis'],
    //                     'harga' => $row['harga'],
    //                     'qty' => $qty,
    //                     // 'diskon' => 0,
    //                 ];
            
    //                 $_SESSION['cart'][] = $barang;
                    
    //                 header('location:../../../../admin.php?page=kasir/kasirDalam');
                            
    //             }
    //         } else {
    //             // return var_dump($b);
    //             //Jika tidak ada yang sesuai akan menjadi barang baru dikeranjang
    //             $barang = [
    //                 'id' => $row['id'],
    //                 'nama' => $row['nama'],
    //                 'role' => $row['role'],
    //                 'jenis' => $row['jenis'],
    //                 'harga' => $row['harga'],
    //                 'qty' => $qty,
    //                 // 'diskon' => 0,
    //             ];
    
    //             $_SESSION['cart'][] = $barang;
                
    //             header('location:../../../../admin.php?page=kasir/kasirDalam');
    //             //merubah urutan tampil pada keranjang
    //             // krsort($_SESSION['cart']);
    //         }
    //     }else{
    //         header("location:../../../../admin.php?page=kasir/kasirDalam&pesan=notindatabase");
    //     }
    // } else {
    //     $sql = mysqli_query($dbconnect, "SELECT * FROM paket_barbar WHERE nama='$nama_brg'");
    //     $row = mysqli_fetch_assoc($sql);
        
    //     if (mysqli_num_rows($sql) > 0) {    
            
    //         if ($_SESSION['cart'] != null) {
    //             // return var_dump($_SESSION['cart']);
    //             $key = array_search($row['nama'], array_column($_SESSION['cart'], 'nama'));

    //             if ($key !== false) {

    //                 header("location:../../../../admin.php?page=kasir/kasirDalam&pesan=sameitem");
                            
    //             } else {
    //                 // return var_dump($b);
    //                 //Jika tidak ada yang sesuai akan menjadi barang baru dikeranjang
    //                 $barang = [
    //                     'id' => $row['id'],
    //                     'nama' => $row['nama'],
    //                     'role' => $row['role'],
    //                     'jenis' => $row['jenis'],
    //                     'jenis' => $row['jumlah'],
    //                     'harga' => $row['harga'],
    //                     'qty' => $qty,
    //                     // 'diskon' => 0,
    //                 ];
            
    //                 $_SESSION['cart'][] = $barang;
                    
    //                 header('location:../../../../admin.php?page=kasir/kasirDalam');
                            
    //             }
    //         } else {
    //             // return var_dump($b);
    //             //Jika tidak ada yang sesuai akan menjadi barang baru dikeranjang
    //             $barang = [
    //                 'id' => $row['id'],
    //                 'nama' => $row['nama'],
    //                 'role' => $row['role'],
    //                 'jenis' => $row['jenis'],
    //                 'jumlah' => $row['jumlah'],
    //                 'harga' => $row['harga'],
    //                 'qty' => $qty,
    //                 // 'diskon' => 0,
    //             ];
    
    //             $_SESSION['cart'][] = $barang;
                
    //             header('location:../../../../admin.php?page=kasir/kasirDalam');
    //             //merubah urutan tampil pada keranjang
    //             // krsort($_SESSION['cart']);
    //         }
    //     }else{
    //         header("location:../../../../admin.php?page=kasir/kasirDalam&pesan=notindatabase");
    //     }
    // }
    // //cek diskon barang
    // $disbarang = mysqli_query($dbconnect, "SELECT * FROM disbarang WHERE barang_id='$b[id_barang]'");
    // $disb = mysqli_fetch_assoc($disbarang);

    // // cek jika di keranjang sudah ada barang yang masuk
    // $key = array_search('nama_brg', $b);
	// // return var_dump($key);

    // if (mysqli_num_rows($data) > 0) {
        
    //     if ($_SESSION['cart'] != null) {
    //         // return var_dump($_SESSION['cart']);

    //         $key = array_search($b['nama_brg'], array_column($_SESSION['cart'], 'nama'));

            
    //         if ($key !== false) {

    //             header("location:admin.php?page=kasir/kasirLuar&pesan=sameitem");
                
    //             // //jika ada data yang sesuai di keranjang akan ditambahkan jumlah nya
    //             // $c_qty = $_SESSION['cart'][$key]['qty'];
    //             // $_SESSION['cart'][$key]['qty'] = $c_qty;
                    
                    
    //             // //cek jika ada potongan dan cek jumlah barang lebih besar sama dengan minimum order potongan
    //             // if ($disb['qty'] && $_SESSION['cart'][$key]['qty'] >= $disb['qty']) {
        
    //             //     //cek kelipatan jumlah barang dengan batas minimum order
    //             //     $mod = $_SESSION['cart'][$key]['qty'] % $disb['qty'];
        
    //             //     if ($mod == 0) {
        
    //                 //         //Jika benar jumlah barang kelipatan batas minimum order
    //                 //         $d = $_SESSION['cart'][$key]['qty'] / $disb['qty'];
    //                 //     } else {
                        
    //                     //         //Simpan jumlah potongan yang didapat
    //                     //         $d = ($_SESSION['cart'][$key]['qty'] - $mod) / $disb['qty'];
    //                     //     }
                        
    //                     //     //Simpan diskon dengan jumlah kelipatan dikali potongan barang
    //                     //     $_SESSION['cart'][$key]['diskon'] = $d * $disb['potongan'];
    //                     // }
                        
    //         } else {
                        
    //             // return var_dump($b);
    //             //Jika tidak ada yang sesuai akan menjadi barang baru dikeranjang
    //             $barang = [
    //                 'kd' => $b['kode_brg'],
    //                 'nama' => $b['nama_brg'],
    //                 'harga' => $b['hrg_jual'],
    //                 'stok' => $b['jumlah'],
    //                 'qty' => $qty,
    //                 'diskon' => 0,
    //             ];
        
    //             $_SESSION['cart'][] = $barang;
                
    //             header('location:admin.php?page=kasir/kasirLuar');
                        
    //         }
    //     } else {
    //         // return var_dump($b);
    //         //Jika tidak ada yang sesuai akan menjadi barang baru dikeranjang
    //         $barang = [
    //             'kd' => $b['kode_brg'],
    //             'nama' => $b['nama_brg'],
    //             'harga' => $b['hrg_jual'],
    //             'stok' => $b['jumlah'],
    //             'qty' => $qty,
    //             'diskon' => 0,
    //         ];

    //         $_SESSION['cart'][] = $barang;
            
    //         header('location:admin.php?page=kasir/kasirLuar');
    //         //merubah urutan tampil pada keranjang
    //         // krsort($_SESSION['cart']);
    //     }
    // }else{
    //     header("location:admin.php?page=kasir/kasirLuar&pesan=notindatabase");
    // }
}
?>