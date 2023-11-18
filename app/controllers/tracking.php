<?php
class tracking extends Controller
{
  public function index()
  {
    $data['judul'] = 'TRACKING BARANG | BARAKA SARANA TAMA | JASA EKSPEDISI | KURIR';
    $data['kepala'] = '';
    $data['kepala2'] = '';
    $this->view('header', $data);
    $this->view('tracking/index');
    $this->view('footer');
  }
}
