<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1><?= $title; ?></h1>
  <h5>Laundry plus</h5>
  <small>Jln raya in aja pokoknya nomer 31 RT05/RW03, Kecamatan Aja, Kota Cekartah. </small>
  <p>Kode Pesanan : <?= $pesananbyid['kode_pesanan']; ?></p>
  <p>Nama Pemesan : <?= $pesananbyid['nama_pemesan']; ?></p>
  <p>Tanggal Pesanan : <?= $pesananbyid['tanggal_pesanan']; ?></p>
  <p>Jenis Pesanan : <?= $pesananbyid['jenis_pesanan']; ?></p>
  <p>Keterangan Pesanan : <?= $pesananbyid['keterangan_pesanan']; ?></p>
  <p>Jumlah Berat : <?= $pesananbyid['jumlah_berat']; ?> Gram</p>
  <p>Harga : Rp. <?= $pesananbyid['harga']; ?></p>
  <p>Jumlah Bayar : <?= $pesananbyidjoin['jumlah_bayar']; ?></p>
  <p>Kembalian : <?= $pesananbyidjoin['kembalian']; ?></p>
  <p>Metode Pembayaran : <?= $pesananbyidjoin['metode_pembayaran']; ?></p>
  <p>Status pembayaran : <?= $pesananbyidjoin['status_pembayaran']; ?></p>
  <p>Estimasi Selesai : <?= $pesananbyid['estimasi_selesai']; ?></p>
  <p>Status Pesanan : <?= $pesananbyid['status_pesanan']; ?></p>
</body>

</html>