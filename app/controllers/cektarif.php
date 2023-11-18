<?php
class cektarif extends Controller
{

  public function index()
  {
    $data['judul'] = 'CEK TARIF | BARAKA SARANA TAMA | JASA EKSPEDISI | KURIR';
    $data['kepala'] = '';
    $data['kepala2'] = '';
    $this->view('header', $data);
    $this->view('cektarif/index');
    $this->view('footer');
  }
}
