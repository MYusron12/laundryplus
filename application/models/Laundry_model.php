
<?php

use phpDocumentor\Reflection\Types\This;

defined('BASEPATH') or exit('No direct script access allowed');

class Laundry_model extends CI_Model
{
  #Pesanan
  public function insertPesanan()
  {
    $this->db->insert('pesanan', [
      'kode_pesanan' => $this->input->post('kode_pesanan', true),
      'tanggal_pesanan' => $this->input->post('tanggal_pesanan', true),
      'nama_pemesan' => $this->input->post('nama_pemesan', true),
      'jenis_pesanan' => $this->input->post('jenis_pesanan', true),
      'keterangan_pesanan' => $this->input->post('keterangan_pesanan', true),
      'jumlah_berat' => $this->input->post('jumlah_berat', true),
      'harga' => $this->input->post('harga', true),
      'estimasi_selesai' => $this->input->post('estimasi_selesai', true),
      'status_pesanan' => $this->input->post('status_pesanan', true),
      'status_pembayaran_pesanan' => $this->input->post('status_pembayaran_pesanan', true)
    ]);
  }
  public function getPesananById($id)
  {
    return $this->db->get_where('pesanan', ['id' => $id])->row_array();
  }
  public function getPesananByIdJoin($id)
  {
    $query = "SELECT * FROM pesanan join pembayaran on pembayaran.pesanan_id=pesanan.id where pesanan_id = $id";
    return $this->db->query($query)->row_array();
  }
  public function editPesanan()
  {
    $data = [
      'kode_pesanan' => $this->input->post('kode_pesanan', true),
      'tanggal_pesanan' => $this->input->post('tanggal_pesanan', true),
      'nama_pemesan' => $this->input->post('nama_pemesan', true),
      'jenis_pesanan' => $this->input->post('jenis_pesanan', true),
      'keterangan_pesanan' => $this->input->post('keterangan_pesanan', true),
      'jumlah_berat' => $this->input->post('jumlah_berat', true),
      'harga' => $this->input->post('harga', true),
      'estimasi_selesai' => $this->input->post('estimasi_selesai', true),
      'status_pesanan' => $this->input->post('status_pesanan', true),
      'status_pembayaran_pesanan' => $this->input->post('status_pembayaran_pesanan', true)
    ];
    $this->db->where('id', $this->input->post('id'));
    $this->db->update('pesanan', $data);
  }
  public function countId()
  {
    $query = "select count(id) as id from pesanan";
    return $this->db->query($query)->result();
  }
  public function pesananBelumSelesai()
  {
    # code... select count(id) as id from pesanan where status_pesanan = 'Belum Selesai'
    $query = "select count(id) as id from pesanan where status_pesanan = 'Belum Selesai'";
    return $this->db->query($query)->result();
  }
  public function pesananSudahSelesai()
  {
    # code... select count(id) as id from pesanan where status_pesanan = 'Sudah Selesai'
    $query = "select count(id) as id from pesanan where status_pesanan = 'Sudah Selesai'";
    return $this->db->query($query)->result();
  }
  public function pesananBelumBayar()
  {
    # code... select count(a.id) as id FROM pesanan A join pembayaran b on b.pesanan_id=a.id where b.status_pembayaran = 'Belum Lunas'
    $query = "select count(a.id) as id FROM pesanan A join pembayaran b on b.pesanan_id=a.id where b.status_pembayaran = 'Belum Lunas'";
    return $this->db->query($query)->result();
  }
  public function pesananSudahBayar()
  {
    # code... select count(a.id) as id FROM pesanan A join pembayaran b on b.pesanan_id=a.id where b.status_pembayaran = 'Lunas'
    $query = "select count(a.id) as id FROM pesanan A join pembayaran b on b.pesanan_id=a.id where b.status_pembayaran = 'Lunas'";
    return $this->db->query($query)->result();
  }
  public function totalPesanan()
  {
    $query = "select count(id) as id from pesanan";
    return $this->db->query($query)->result();
  }
  public function totalPembayaran()
  {
    $query = "select count(id) as id from pembayaran";
    return $this->db->query($query)->result();
  }
}
