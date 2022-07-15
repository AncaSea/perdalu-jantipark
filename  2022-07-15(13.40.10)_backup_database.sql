DROP TABLE admin_acc;

CREATE TABLE `admin_acc` (
  `nama_admin` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO admin_acc VALUES("admin1","admin","admin1","admin");
INSERT INTO admin_acc VALUES("Danang","D1","danang","boss");



DROP TABLE brg_kembali;

CREATE TABLE `brg_kembali` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_brg` varchar(255) NOT NULL,
  `id_supp` varchar(255) NOT NULL,
  `nama_supp` varchar(255) NOT NULL,
  `sisa_brg` int(11) NOT NULL,
  `tgl_kembali` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO brg_kembali VALUES("1","kb0015","sp0142","wakidi","100","2022-05-20
");
INSERT INTO brg_kembali VALUES("2","kb0055","sp0001","mukidi","10","2022-05-26");
INSERT INTO brg_kembali VALUES("6","kb0015","sp0142","wakidi","3","2022-06-28");



DROP TABLE brg_masuk;

CREATE TABLE `brg_masuk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_brg` varchar(255) NOT NULL,
  `id_supp` varchar(255) NOT NULL,
  `tgl_masuk` varchar(255) NOT NULL,
  `nama_supp` varchar(255) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hrg_satuan` int(11) NOT NULL,
  `hrg_jual` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4;

INSERT INTO brg_masuk VALUES("19","kb0055","sp0001","2022-05-26","mukidi","celana pendek","10","10000","0","100000");
INSERT INTO brg_masuk VALUES("26","sp4554","sp177","2022-06-04","reka","arem2","10","2000","0","20000");
INSERT INTO brg_masuk VALUES("27","sp9339","sp0005","2022-06-04","andika","peyek","10","2000","0","20000");
INSERT INTO brg_masuk VALUES("28","sp9339","sp0005","2022-06-04","andika","peyek","10","2000","0","20000");
INSERT INTO brg_masuk VALUES("29","sp6664","sp0005","2022-06-04","andika","peyek","20","5000","0","100000");
INSERT INTO brg_masuk VALUES("30","sp6191","sp0005","2022-06-04","andika","peyek","20","5000","0","100000");
INSERT INTO brg_masuk VALUES("31","kb0055","sp0001","2022-06-04","mukidi","celana pendek","50","10000","0","500000");
INSERT INTO brg_masuk VALUES("32","sp7521","sp0005","2022-06-04","andika","peyek","20","5000","0","100000");
INSERT INTO brg_masuk VALUES("34","sp8167","sp0001","2022-06-04","mukidi","peyek","10","5000","0","50000");
INSERT INTO brg_masuk VALUES("35","sp3845","sp0005","2022-06-04","andika","peyek","10","5000","0","50000");
INSERT INTO brg_masuk VALUES("37","sp9316","sp0005","2022-06-04","andika","peyek","10","5000","0","50000");
INSERT INTO brg_masuk VALUES("42","sp9316","sp0005","2022-06-04","andika","peyek","10","6000","0","60000");
INSERT INTO brg_masuk VALUES("44","sp3482","sp0009","2022-06-12","reka","getuk","1","1000","0","1000");
INSERT INTO brg_masuk VALUES("47","sp7761","sp0009","2022-06-12","reka","arem arem1","5","1000","0","5000");
INSERT INTO brg_masuk VALUES("53","sp2854","sp0005","2022-06-12","andika","arem arem","1","5000","0","5000");
INSERT INTO brg_masuk VALUES("54","sp2854","sp0005","2022-06-12","andika","arem arem","1","6000","0","6000");
INSERT INTO brg_masuk VALUES("55","sp2854","sp0005","2022-06-12","andika","arem arem","5","6000","0","30000");
INSERT INTO brg_masuk VALUES("56","sp2854","sp0005","2022-06-12","andika","arem arem","1","6000","7000","6000");
INSERT INTO brg_masuk VALUES("57","sp2854","sp0005","2022-06-12","andika","arem arem","1","7000","8000","7000");
INSERT INTO brg_masuk VALUES("58","kb0015","sp0142","2022-06-13","wakidi","baju polo","1","20000","25000","20000");
INSERT INTO brg_masuk VALUES("59","sp9316","sp0005","2022-06-20","andika","peyek","1","5000","10000","5000");
INSERT INTO brg_masuk VALUES("60","sp9316","sp0005","2022-06-20","andika","peyek","1","5000","6000","5000");
INSERT INTO brg_masuk VALUES("61","sp9316","sp0005","2022-06-20","andika","peyek","1","6000","7000","6000");
INSERT INTO brg_masuk VALUES("62","kb0015","sp0005","2022-06-20","andika","baju polo","1","10000","21000","10000");
INSERT INTO brg_masuk VALUES("63","sp3482","sp0005","2022-06-20","andika","getuk","1","2000","4000","2000");
INSERT INTO brg_masuk VALUES("64","sp3482","sp0005","2022-06-20","andika","getuk","1","1000","2000","1000");
INSERT INTO brg_masuk VALUES("66","sp3482","sp0009","2022-06-26","reka","getuk","3","2000","4000","6000");
INSERT INTO brg_masuk VALUES("67","sp3482","sp0009","2022-06-26","reka","getuk","2","2000","4000","4000");
INSERT INTO brg_masuk VALUES("68","sp3482","sp0009","2022-06-26","reka","getuk","2","2000","4000","4000");
INSERT INTO brg_masuk VALUES("70","kb0071","sp0051","2022-06-28","pudidi","sweater","5","20000","25000","100000");



DROP TABLE kasir_acc;

CREATE TABLE `kasir_acc` (
  `nama_kasir` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO kasir_acc VALUES("kasir1","kasir","kasir1","kasir luar");
INSERT INTO kasir_acc VALUES("kasir2","kasir2","kasir22","kasir dalam");



DROP TABLE makanan;

CREATE TABLE `makanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

INSERT INTO makanan VALUES("1","lele goreng","1","lele","6000");
INSERT INTO makanan VALUES("3","kakap goreng","2","kakap","5000");
INSERT INTO makanan VALUES("7","lele bakar","1","lele","5000");



DROP TABLE minuman;

CREATE TABLE `minuman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

INSERT INTO minuman VALUES("2","teh anget","6","teh","2500");
INSERT INTO minuman VALUES("4","es teh","6","teh","5000");
INSERT INTO minuman VALUES("5","lemon tea","6","teh","5000");
INSERT INTO minuman VALUES("6","tea jus","6","teh","2000");
INSERT INTO minuman VALUES("9","teh tawar","6","teh","1000");



DROP TABLE paket;

CREATE TABLE `paket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `makanan` text NOT NULL,
  `minuman` text NOT NULL,
  `Harga` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO paket VALUES("1","Paket 1","[{\'Kakap Bakar\':1,\'Kakap Goreng\':2}]","","39900");



DROP TABLE paket_barbar;

CREATE TABLE `paket_barbar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

INSERT INTO paket_barbar VALUES("1","paket lele goreng","4","lele","6","20000");
INSERT INTO paket_barbar VALUES("2","paket kakap goreng","5","kakap","4","25000");
INSERT INTO paket_barbar VALUES("3","paket lele bakar","4","lele","6","22000");
INSERT INTO paket_barbar VALUES("4","paket kakap bakar","5","kakap","4","27000");
INSERT INTO paket_barbar VALUES("7","paket ayam goreng","50","ayam","1","15000");



DROP TABLE penjualan;

CREATE TABLE `penjualan` (
  `id_nota` int(11) NOT NULL AUTO_INCREMENT,
  `no_nota` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama_kasir` varchar(255) NOT NULL,
  `tgl_penjualan` varchar(255) NOT NULL,
  `kode_brg` varchar(255) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hrg_jual` int(11) NOT NULL,
  `hrg` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id_nota`),
  KEY `id_kasir` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb4;

INSERT INTO penjualan VALUES("73","496155","kasir","kasir1","2022-05-17","kb0055","celana pendek","4","15000","60000","60000");
INSERT INTO penjualan VALUES("74","722470","kasir","kasir1","2022-05-17","kb0015","baju polo","4","20000","80000","80000");
INSERT INTO penjualan VALUES("75","384795","kasir","kasir1","2022-05-17","kb0083","jeans","1","35000","35000","35000");
INSERT INTO penjualan VALUES("76","532732","kasir","kasir1","2022-05-17","kb0071","sweater","1","25000","25000","25000");
INSERT INTO penjualan VALUES("77","742015","kasir","kasir1","2022-05-17","kb0057","kaos","1","20000","20000","20000");
INSERT INTO penjualan VALUES("78","604339","kasir","kasir1","2022-05-17","kb0055","celana pendek","1","15000","15000","55000");
INSERT INTO penjualan VALUES("79","604339","kasir","kasir1","2022-05-17","kb0015","baju polo","2","20000","40000","55000");
INSERT INTO penjualan VALUES("80","350827","kasir","kasir1","2022-05-17","kb0055","celana pendek","4","15000","60000","60000");
INSERT INTO penjualan VALUES("81","832694","kasir","kasir1","2022-05-17","kb0055","celana pendek","4","15000","60000","205000");
INSERT INTO penjualan VALUES("82","832694","kasir","kasir1","2022-05-17","kb0071","sweater","5","25000","125000","205000");
INSERT INTO penjualan VALUES("83","832694","kasir","kasir1","2022-05-17","kb0015","baju polo","1","20000","20000","205000");
INSERT INTO penjualan VALUES("84","457530","kasir","kasir1","2022-05-17","kb0055","celana pendek","5","15000","75000","255000");
INSERT INTO penjualan VALUES("85","457530","kasir","kasir1","2022-05-17","kb0015","baju polo","1","20000","20000","255000");
INSERT INTO penjualan VALUES("86","457530","kasir","kasir1","2022-05-17","kb0083","jeans","1","35000","35000","255000");
INSERT INTO penjualan VALUES("87","457530","kasir","kasir1","2022-05-17","kb0071","sweater","5","25000","125000","255000");
INSERT INTO penjualan VALUES("88","167436","kasir","kasir1","2022-05-23","kb0055","celana pendek","1","15000","15000","35000");
INSERT INTO penjualan VALUES("89","167436","kasir","kasir1","2022-05-23","kb0015","baju polo","1","20000","20000","35000");
INSERT INTO penjualan VALUES("100","560801","admin","admin1","2022-06-20","kb0055","celana pendek","1","15000","15000","40000");
INSERT INTO penjualan VALUES("101","885626","admin","admin1","2022-06-20","kb0015","baju polo","1","25000","25000","40000");
INSERT INTO penjualan VALUES("102","885626","admin","admin1","2022-06-20","kb0055","celana pendek","1","15000","15000","40000");
INSERT INTO penjualan VALUES("103","377053","","","2022-06-23","kb0015","baju polo","1","21000","21000","21000");
INSERT INTO penjualan VALUES("104","784533","admin","admin1","2022-06-28","kb0055","celana pendek","1","15000","15000","15000");



DROP TABLE penjualan_dalam;

CREATE TABLE `penjualan_dalam` (
  `id_nota` int(11) NOT NULL AUTO_INCREMENT,
  `no_nota` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama_kasir` varchar(255) NOT NULL,
  `tgl_penjualan` varchar(255) NOT NULL,
  `nama_pesanan` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_pesan` int(11) NOT NULL,
  `hrg_jual` int(11) NOT NULL,
  `hrg` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id_nota`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4;

INSERT INTO penjualan_dalam VALUES("1","351341","admin","admin1","2022-06-13","lele bakar","1","lele","1","1","6000","6000","6000");
INSERT INTO penjualan_dalam VALUES("2","478426","admin","admin1","2022-06-14","lele goreng","1","lele","5","5","5000","30000","30000");
INSERT INTO penjualan_dalam VALUES("3","781931","admin","admin1","2022-06-14","paket lele goreng","4","lele","2","12","20000","40000","40000");
INSERT INTO penjualan_dalam VALUES("4","592931","admin","admin1","2022-06-14","kakap goreng","2","kakap","4","4","5000","20000","20000");
INSERT INTO penjualan_dalam VALUES("5","748253","admin","admin1","2022-06-14","lele goreng","1","lele","6","6","5000","30000","30000");
INSERT INTO penjualan_dalam VALUES("6","849102","admin","admin1","2022-06-14","paket lele bakar","4","lele","2","12","22000","44000","44000");
INSERT INTO penjualan_dalam VALUES("59","996792","admin","admin1","2022-06-17","lele bakar","1","lele","1","1","6000","6000","9000");
INSERT INTO penjualan_dalam VALUES("60","996792","admin","admin1","2022-06-17","es teh","6","teh","1","1","3000","3000","9000");
INSERT INTO penjualan_dalam VALUES("61","651993","admin","admin1","2022-06-17","paket lele goreng","4","lele","1","6","20000","20000","26000");
INSERT INTO penjualan_dalam VALUES("62","651993","admin","admin1","2022-06-17","lele bakar","1","lele","1","1","6000","6000","26000");
INSERT INTO penjualan_dalam VALUES("63","512226","admin","admin1","2022-06-17","paket lele goreng","4","lele","2","12","20000","40000","115000");
INSERT INTO penjualan_dalam VALUES("64","512226","admin","admin1","2022-06-17","paket kakap goreng","5","kakap","3","12","25000","75000","115000");
INSERT INTO penjualan_dalam VALUES("65","187809","admin","admin1","2022-06-18","teh anget","6","teh","1","1","2500","2500","2500");
INSERT INTO penjualan_dalam VALUES("67","748776","admin","admin1","2022-06-23","paket kakap kukus","5","kakap","1","2","10000","10000","10000");
INSERT INTO penjualan_dalam VALUES("68","921796","kasir2","kasir2","2022-06-23","paket kakap goreng","5","kakap","1","4","25000","25000","25000");
INSERT INTO penjualan_dalam VALUES("69","380461","kasir2","kasir2","2022-06-23","paket kakap bakar","5","kakap","1","4","27000","27000","27000");
INSERT INTO penjualan_dalam VALUES("70","424135","admin","admin1","2022-07-12","paket lele bakar","4","lele","1","6","22000","22000","22000");
INSERT INTO penjualan_dalam VALUES("71","328522","admin","admin1","2022-07-12","paket lele bakar","4","lele","1","6","22000","22000","22000");



DROP TABLE role;

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4;

INSERT INTO role VALUES("1","lele","lele");
INSERT INTO role VALUES("2","kakap","kakap");
INSERT INTO role VALUES("3","ayam","ayam");
INSERT INTO role VALUES("4","paket lele","lele");
INSERT INTO role VALUES("5","paket kakap","kakap");
INSERT INTO role VALUES("6","teh","teh");
INSERT INTO role VALUES("50","paket ayam","ayam");



DROP TABLE role_akun;

CREATE TABLE `role_akun` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO role_akun VALUES("1","boss");
INSERT INTO role_akun VALUES("2","admin");
INSERT INTO role_akun VALUES("3","kasir luar");
INSERT INTO role_akun VALUES("4","kasir dalam");



DROP TABLE stok_brg;

CREATE TABLE `stok_brg` (
  `kode_brg` varchar(255) NOT NULL,
  `nama_supp` varchar(255) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hrg_beli` int(11) NOT NULL,
  `hrg_jual` int(11) NOT NULL,
  PRIMARY KEY (`kode_brg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO stok_brg VALUES("kb0015","wakidi","baju polo","9975","10000","15000");
INSERT INTO stok_brg VALUES("kb0055","mukidi","celana pendek","10031","10000","15000");
INSERT INTO stok_brg VALUES("kb0057","odin","kaos","9992","15000","20000");
INSERT INTO stok_brg VALUES("kb0071","pudidi","sweater","9980","20000","25000");
INSERT INTO stok_brg VALUES("kb0083","yudi","jeans","9992","30000","35000");
INSERT INTO stok_brg VALUES("sp2854","andika","arem arem","50","7000","8000");
INSERT INTO stok_brg VALUES("sp3482","reka","getuk","7","2000","4000");
INSERT INTO stok_brg VALUES("sp7761","reka","arem arem1","5","1000","2000");
INSERT INTO stok_brg VALUES("sp9316","andika","peyek","23","6000","7000");



DROP TABLE supplier;

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_supp` varchar(255) NOT NULL,
  `nama_supp` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

INSERT INTO supplier VALUES("1","sp0001","mukidi","81273154683","janti");
INSERT INTO supplier VALUES("2","sp0041","odin","81345324562","janti");
INSERT INTO supplier VALUES("3","sp0051","pudidi","81532645424","delanggu
");
INSERT INTO supplier VALUES("4","sp0067","yudi","85463642472","tulung
");
INSERT INTO supplier VALUES("5","sp0142","wakidi","81351463153","cabeyan");
INSERT INTO supplier VALUES("7","sp0009","reka","746775735852","delanggu");
INSERT INTO supplier VALUES("9","sp0005","andika","36454677","kts");



