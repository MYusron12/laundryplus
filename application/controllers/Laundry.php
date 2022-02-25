<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laundry extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('email')) {
      redirect('auth');
    }
    $this->load->model('Laundry_model', 'laundry');
  }

  #pesanan
  public function pesanan()
  {
    $data['title'] = 'Dashboard Pesanan';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['pesanan'] = $this->db->get('pesanan')->result_array();
    $data['pembayaran'] = $this->db->query('select * from pesanan join pembayaran on pembayaran.pesanan_id=pesanan.id')->result_array();
    $data['pesananbelumselesai'] = $this->laundry->pesananBelumSelesai();
    $data['pesanansudahselesai'] = $this->laundry->pesananSudahSelesai();
    $data['pesananbelumbayar'] = $this->laundry->pesananBelumBayar();
    $data['pesanansudahbayar'] = $this->laundry->pesananSudahBayar();
    $data['totalpesanan'] = $this->laundry->totalpesanan();
    $data['totalpembayaran'] = $this->laundry->totalPembayaran();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('laundry/pesanan', $data);
    $this->load->view('templates/footer', $data);
  }
  public function tambahPesanan()
  {
    $data['title'] = 'Tambah Pesanan';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['countid'] = $this->laundry->countId();
    $this->form_validation->set_rules('nama_pemesan', 'Nama Pemesan', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('laundry/tambahpesanan');
      $this->load->view('templates/footer', $data);
    } else {
      $this->laundry->insertPesanan();
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menambah pesanan</div>');
      redirect('laundry/pesanan');
    }
  }
  public function editPesanan($id)
  {
    $data['title'] = 'Edit Pesanan';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['pesananbyid'] = $this->laundry->getPesananById($id);
    $this->form_validation->set_rules('nama_pemesan', 'Nama Pemesan', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('laundry/editpesanan');
      $this->load->view('templates/footer', $data);
    } else {
      $this->laundry->editPesanan($id);
      $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Berhasil mengubah pesanan</div>');
      redirect('laundry/pesanan');
    }
  }
  public function hapusPesanan($id)
  {
    $this->db->delete('pesanan', ['id' => $id]);
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Berhasil menghapus pesanan</div>');
    redirect('laundry/pesanan');
  }

  public function pembayaranById($id)
  {
    $data['title'] = 'Pembayaran';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['pesananbyid'] = $this->laundry->getPesananById($id);

    $this->form_validation->set_rules('jumlah_bayar', 'Jumlah Bayar', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('laundry/pembayaranbyid');
      $this->load->view('templates/footer', $data);
    } else {
      $pesananid = $this->input->post('pesanan_id');
      $jumlahbayar = $this->input->post('jumlah_bayar');
      $kembalian = $this->input->post('kembalian');
      $metodepembayaran = $this->input->post('metode_pembayaran');
      $statuspembayaran = $this->input->post('status_pembayaran');
      $data = [
        'pesanan_id' => $pesananid,
        'jumlah_bayar' => $jumlahbayar,
        'kembalian' => $kembalian,
        'metode_pembayaran' => $metodepembayaran,
        'status_pembayaran' => $statuspembayaran
      ];
      $this->db->insert('pembayaran', $data);

      $this->db->where('id', $id);
      $this->db->set('status_pesanan', $this->input->post('status_pesanan'));
      $this->db->set('status_pembayaran_pesanan', $this->input->post('status_pembayaran_pesanan'));
      $this->db->update('pesanan');

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menginput pembayaran</div>');
      redirect('laundry/pesanan');
    }
  }
  public function cetak($id)
  {
    $data['title'] = 'Bukti Pesanan';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['pesananbyidjoin'] = $this->laundry->getPesananByIdJoin($id);
    $data['pesananbyid'] = $this->laundry->getPesananById($id);
    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [110, 200]]);
    $html = $this->load->view('laundry/cetakpesanan', $data, true);
    $mpdf->WriteHTML($html);
    $mpdf->Output();
  }

  #Pembayaran
  public function pembayaran()
  {
    # code...
  }
  public function tambahPembayaran()
  {
    # code...
  }
  public function editPembayaran($id)
  {
    # code...
  }
  public function hapusPembayaran($id)
  {
    # code...
  }
}
