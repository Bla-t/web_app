<?php
class tentang extends Controller
{
  public function index()
  {
    $data['judul'] = 'TENTANG KAMI | BARAKA SARANA TAMA | JASA EKSPEDISI | KURIR';
    $data['kepala'] = '';
    $data['kepala2'] = '';
    $this->view('header', $data);
    $this->view('tentang/index');
    $this->view('footer');
  }
}
