<?php
class home extends Controller
{
  public function index()
  {
    $data['judul'] = 'HOME | BARAKA SARANA TAMA | JASA EKSPEDISI | KURIR';
    $data['slide'] = $this->model('home_model')->slider();
    $data['jumlah'] = $this->model('home_model')->jumlah();
    $data['kepala'] = '';
    $data['kepala2'] = '';
    $this->view('header', $data);
    $this->view('home/index', $data);
    $this->view('footer');
  }
}
