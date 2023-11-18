<?php
class kontak extends Controller
{
  public function index()
  {
    $data['judul'] = 'KONTAK KAMI | BARAKA SARANA TAMA | JASA EKSPEDISI | KURIR';
    $data['kepala'] = '';
    $data['kepala2'] = '';
    $this->view('header', $data);
    $this->view('kontak/index');
    $this->view('footer');
  }
}
