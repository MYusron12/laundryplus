<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4-800"><?= $title; ?></h1>
  <div class="row">
    <div class="card text-white bg-primary mb-3 mx-auto" style="height: 150px; width: 350px;">
      <div class="card-header"></div>
      <div class="card-body">
        <?php foreach ($pesanansudahselesai as $row) : ?>
          <h5 class="card-title">Status Pesanan yang sudah selesai : <?= $row->id; ?></h5>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="card text-white bg-success mb-3 mx-auto" style="height: 150px; width: 350px;">
      <div class="card-header"></div>
      <div class="card-body">
        <?php foreach ($pesananbelumselesai as $row) : ?>
          <h5 class="card-title">Status Pesanan yang belum selesai : <?= $row->id; ?></h5>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="card text-white bg-warning mb-3 mx-auto" style="height: 150px; width: 350px;">
      <div class="card-header"></div>
      <div class="card-body">
        <?php foreach ($pesananbelumbayar as $row) : ?>
          <h5 class="card-title">Total Pesanan yang belum bayar : <?= $row->id; ?></h5>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="card text-white bg-danger mb-3 mx-auto" style="height: 150px; width: 350px;">
      <div class="card-header"></div>
      <div class="card-body">
        <?php foreach ($pesanansudahbayar as $row) : ?>
          <h5 class="card-title">Total Pesanan yang sudah bayar : <?= $row->id; ?></h5>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6">
      <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
      <?= $this->session->flashdata('message'); ?>
      <a href="<?= base_url('laundry/tambahpesanan') ?>" class="btn btn-primary mb-3">Tambah Pesanan</a>
      <?php foreach ($totalpesanan as $row) : ?>
        <h4>Total Pesanan : <?= $row->id; ?></h4>
      <?php endforeach; ?>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Kode Pesanan</th>
              <th>Tanggal Pesanan</th>
              <th>Nama Pemesan</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($pesanan as $p) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $p['kode_pesanan']; ?></td>
                <td><?= $p['tanggal_pesanan']; ?></td>
                <td><?= $p['nama_pemesan'] ?></td>
                <td>
                  <a href="<?= base_url('laundry/editpesanan/') . $p['id']; ?>" class="badge badge-success">edit</a>
                  <a href="<?= base_url('laundry/hapusPesanan/') . $p['id']; ?>" class="badge badge-danger" onclick="return confirm('apakah akan dihapus')">delete</a>
                  <?php if ($p['status_pembayaran_pesanan'] == 'Belum Bayar') : ?>
                    <a href="<?= base_url('laundry/pembayaranbyid/') . $p['id'] ?>" class="badge badge-primary">bayar</a>
                  <?php endif; ?>
                  <a href="<?= base_url('laundry/cetak/') . $p['id'] ?>" target="_blank" class="badge badge-info">cetak</a>
                  <a href="<?= base_url('laundry/pesanan/') . $p['id']; ?>" class="badge badge-warning" data-toggle="modal" data-target="#newMenuModal<?= $p['id'] ?>">detail</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="table-responsive">
        <h1>Daftar Pembayaran</h1>
        <?php foreach ($totalpembayaran as $row) : ?>
          <h4>Jumlah total data pembayaran : <?= $row->id; ?></h4>
        <?php endforeach; ?>
        <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Kode Pesanan</th>
              <th>Nama Pemesan</th>
              <td>Action</td>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($pembayaran as $p) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $p['kode_pesanan']; ?></td>
                <td><?= $p['nama_pemesan'] ?></td>
                <td>
                  <a href="" class="badge badge-warning" class="badge badge-warning" data-toggle="modal" data-target="#newMenuModalp<?= $p['id'] ?>">detail</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<?php $i = 0;
foreach ($pesanan as $p) : $i++ ?>
  <!-- Modal -->
  <div class="modal fade" id="newMenuModal<?= $p['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="kode_pesanan">Kode Pesanan : <?= $p['kode_pesanan']; ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <p>Tanggal pesanan : <?= $p['tanggal_pesanan']; ?></p>
            <hr>
            <p>Nama pemesan : <?= $p['nama_pemesan']; ?></p>
            <hr>
            <p>Jenis pesanan : <?= $p['jenis_pesanan']; ?></p>
            <hr>
            <p>Keterangan pesanan : <?= $p['keterangan_pesanan']; ?></p>
            <hr>
            <p>Jumlah berat : <?= $p['jumlah_berat']; ?></p>
            <hr>
            <p>Harga : <?= $p['harga']; ?></p>
            <hr>
            <p>Estimasi selesai : <?= $p['estimasi_selesai']; ?></p>
            <hr>
            <p>Status pesanan : <?= $p['status_pesanan']; ?></p>
            <hr>
            <p>Status pembayaran pesanan : <?= $p['status_pembayaran_pesanan']; ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<?php $ix = 0;
foreach ($pembayaran as $p) : $ix++ ?>
  <!-- Modal -->
  <div class="modal fade" id="newMenuModalp<?= $p['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="kode_pesanan">Kode Pesanan : <?= $p['kode_pesanan']; ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <p>Tanggal pesanan : <?= $p['tanggal_pesanan']; ?></p>
            <hr>
            <p>Nama pemesan : <?= $p['nama_pemesan']; ?></p>
            <hr>
            <p>Jenis pesanan : <?= $p['jenis_pesanan']; ?></p>
            <hr>
            <p>Keterangan pesanan : <?= $p['keterangan_pesanan']; ?></p>
            <hr>
            <p>Jumlah berat : <?= $p['jumlah_berat']; ?></p>
            <hr>
            <p>Harga : <?= $p['harga']; ?></p>
            <hr>
            <p>Jumlah bayar : <?= $p['jumlah_bayar']; ?></p>
            <hr>
            <p>Kembalian : <?= $p['kembalian']; ?></p>
            <hr>
            <p>Metode pembayaran : <?= $p['metode_pembayaran']; ?></p>
            <hr>
            <p>Status pembayaran : <?= $p['status_pembayaran']; ?></p>
            <p>Status pesanan : <?= $p['status_pesanan']; ?></p>
            <hr>
            <p>Status pembayaran pesanan : <?= $p['status_pembayaran_pesanan']; ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>