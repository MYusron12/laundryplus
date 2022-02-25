<div class="container-fluid">
  <form method="post" action="">
    <h1><?= $title; ?></h1>
    <div class="row">
      <div class="form-group col-md-2">
        <label for="exampleInputEmail1">Kode Pesanan</label>
        <?php foreach ($countid as $row) : ?>
          <input type="text" class="form-control" id="kode_pesanan" name="kode_pesanan" value="LNDRY00<?= $row->id; ?>">
        <?php endforeach; ?>
      </div>
      <div class="form-group col-md-2">
        <label for="">Jenis Pesanan</label>
        <select name="jenis_pesanan" id="jenis_pesanan" class="form-control">
          <option value="regular">Regular</option>
          <option value="express">Express</option>
        </select>
      </div>
      <div class="form-group col-md-2">
        <label for="">Tanggal Pesanan</label>
        <input type="date" name="tanggal_pesanan" id="tanggal_pesanan" class="form-control">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-4">
        <label for="">Nama Pemesan</label>
        <input type="text" name="nama_pemesan" id="nama_pemesan" class="form-control">
      </div>
      <small id="emailHelp" class="form-text text-muted"><?= form_error('nama_pemesan') ?></small>
      <div class="form-group col-md-2">
        <label for="">Keterangan Pesanan</label>
        <textarea name="keterangan_pesanan" id="keterangan_pesanan"></textarea>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-1">
        <label for="">Berat <small>(gram)</small></label>
        <input type="text" name="jumlah_berat" id="jumlah_berat" class="form-control" onkeyup="totalharga()">
      </div>
      <div class="form-group col-md-1">
        <label for="">Harga</label>
        <input type="text" name="harga" id="harga" class="form-control">
      </div>
      <div class="form-group col-md-2">
        <label for="">Estimasi selesai</label>
        <input type="date" name="estimasi_selesai" id="estimasi_selesai" class="form-control">
      </div>
      <div class="form-group col-md-2">
        <label for="">Status pesanan</label>
        <select name="status_pesanan" id="status_pesanan" class="form-control">
          <option value="Belum selesai">Belum selesai</option>
          <option value="Sudah Selesai">Sudah selesai</option>
        </select>
      </div>
      <div class="form-group col-md-2">
        <label for="">Status pembayaran pesanan</label>
        <select name="status_pembayaran_pesanan" id="status_pembayaran_pesanan" class="form-control">
          <option value="Belum Bayar">Belum Bayar</option>
          <option value="Sudah Bayar">Sudah bayar</option>
        </select>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="<?= base_url('laundry/pesanan'); ?>" class="btn btn-danger">Batal</a>
  </form>
</div>
<script type="text/javascript">
  function totalharga() {
    var berat = document.getElementById('jumlah_berat').value;
    var hargapokok = 7;
    var totalharga = berat * hargapokok;
    document.getElementById('harga').value = totalharga;
  }
</script>