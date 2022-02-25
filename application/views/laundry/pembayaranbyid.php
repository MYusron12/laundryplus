<div class="container-fluid">
  <form method="post" action="">
    <h1><?= $title; ?></h1>
    <input type="hidden" name="pesanan_id" id="pesanan_id" value="<?= $pesananbyid['id'] ?>">
    <div class="row">
      <div class="form-group col-md-6">
        <label for="exampleInputEmail1">Kode Pesanan : <strong><?= $pesananbyid['kode_pesanan'] ?></strong> </label>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label for="">Jenis Pesanan : <strong><?= $pesananbyid['jenis_pesanan'] ?></strong></label>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label for="">Tanggal Pesanan : <strong><?= $pesananbyid['tanggal_pesanan'] ?></strong></label>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-4">
        <label for="">Nama Pemesan : <strong><?= $pesananbyid['nama_pemesan'] ?></strong></label>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label for="">Keterangan Pesanan : <strong><?= $pesananbyid['keterangan_pesanan'] ?></strong></label>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label for="">Berat : <strong><?= $pesananbyid['jumlah_berat'] ?> Gram</strong></label>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label for="">Estimasi Selesai : <strong><?= $pesananbyid['estimasi_selesai'] ?></strong></label>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-2">
        <label for="">Harga</label>
        <input type="text" name="harga" id="harga" class="form-control" value="<?= $pesananbyid['harga'] ?>" readonly>
      </div>
      <div class="form-group col-md-2">
        <label for="">Status pesanan</label>
        <select name="status_pesanan" id="status_pesanan" class="form-control">
          <option value="<?= $pesananbyid['status_pesanan'] ?>"><?= $pesananbyid['status_pesanan'] ?></option>
          <option value="Sudah Selesai">Sudah selesai</option>
          <option value="Belum selesai">Belum selesai</option>
        </select>
      </div>
      <div class="form-group col-md-2">
        <label for="">Status pembayaran pesanan</label>
        <select name="status_pembayaran_pesanan" id="status_pembayaran_pesanan" class="form-control">
          <option value="<?= $pesananbyid['status_pembayaran_pesanan'] ?>"><?= $pesananbyid['status_pembayaran_pesanan'] ?></option>
          <option value="Sudah Selesai">Sudah Bayar</option>
          <option value="Belum selesai">Belum Bayar</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-2">
        <label for="">Jumlah Bayar</label>
        <input type="text" name="jumlah_bayar" id="jumlah_bayar" class="form-control" value="" onkeyup="hitungkembalian()">
      </div>
      <div class="form-group col-md-2">
        <label for="">Kembalian</label>
        <input type="text" name="kembalian" id="kembalian" class="form-control" value="">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-2">
        <label for="">Metode pembayaran</label>
        <input type="text" name="metode_pembayaran" id="metode_pembayaran" class="form-control" value="Tunai">
      </div>
      <div class="form-group col-md-2">
        <label for="">Status pembayaran</label>
        <select name="status_pembayaran" id="status_pembayaran" class="form-control">
          <option value="Lunas">Lunas</option>
          <option value="Belum Lunas">Belum Lunas</option>
        </select>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="<?= base_url('laundry/pesanan'); ?>" class="btn btn-danger">Batal</a>
  </form>
</div>
<script type="text/javascript">
  function hitungkembalian() {
    var harga = document.getElementById('harga').value;
    var jumlahbayar = document.getElementById('jumlah_bayar').value;
    var kembalian = jumlahbayar - harga;
    document.getElementById('kembalian').value = kembalian;
  }
</script>