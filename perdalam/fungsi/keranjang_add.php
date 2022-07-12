<?php
include '../../db_con.php';
session_start();
// include 'authcheckkasir.php';

if (isset($_POST['nama_pesan'])) {
    $nama_psn = $_POST['nama_pesan'];
    $qty = $_POST['jumlah'];
    // $qty = 1;

    //menampilkan data barang
    // $data = mysqli_query($dbconnect, 
    // "SELECT makanan.id, makanan.nama, makanan.role, makanan.jenis, 1 AS jumlah, makanan.harga FROM makanan UNION
    //  SELECT minuman.id, minuman.nama, minuman.role, minuman.jenis, 1 AS jumlah, minuman.harga FROM minuman UNION
    //  SELECT * FROM paket_barbar");
    // if ($data -> num_rows > 0) {
    // 	while ($row = mysqli_fetch_assoc($data)) {
    // $hasil = $row;
    // print_r($row);

    // if ($nama_psn == $row['nama']) {
    $sql = mysqli_query($dbconnect, "SELECT makanan.id, makanan.nama, makanan.role, makanan.jenis, 1 AS jumlah, makanan.harga FROM makanan WHERE nama='$nama_psn' UNION
                                                 SELECT minuman.id, minuman.nama, minuman.role, minuman.jenis, 1 AS jumlah, minuman.harga FROM minuman WHERE nama='$nama_psn' UNION
                                                 SELECT * FROM paket_barbar WHERE nama='$nama_psn'");
    $row = mysqli_fetch_assoc($sql);

    if ($sql->num_rows > 0) {

        if ($_SESSION['cartdlm'] != null) {
            // return var_dump($_SESSION['cart']);
            $key = array_search($row['nama'], array_column($_SESSION['cartdlm'], 'nama'));

            if ($key !== false) {

                header("location:../../../../perdalam/kasir_page.php?pesan=sameitem");
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

                header('location:../../../../perdalam/kasir_page.php');
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

            header('location:../../../../perdalam/kasir_page.php');
            //merubah urutan tampil pada keranjang
            // krsort($_SESSION['cart']);
        }
    } else {
        header("location:../../../../perdalam/kasir_page.php?pesan=notindatabase");
    }
    // } else {
    //     header("location:../../../../perdalam/kasir_page.php?pesan=notindatabase");
    // }
    // }
    // } else {
    //     header("location:../../../../perdalam/kasir_page.php?pesan=notindatabase");
    // }
}
