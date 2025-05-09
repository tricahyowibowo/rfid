<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

	public function __construct()
  {
      parent::__construct();
			$this->load->model('crud_model');
			$this->load->model('cart_model');

  }

	public function index()
	{
		$header['pageTitle'] = "Tugas Akhir";

		$data['keranjang'] = $this->cart_model->GetData();

		$this->load->view('template/header', $header);
		$this->load->view('cart/list_data', $data);
		$this->load->view('template/footer');
	}

	public function add(){
		$kode = $this->input->get('kode');
		$nama_barang = $this->input->get('nama_barang');
		$harga = $this->input->get('harga');
		$jumlah = $this->input->get('jumlah');

		$data = array(
			'kode' => $kode, 
			'nama_barang' => $nama_barang,
			'harga' => $harga, 
			'jumlah' => $jumlah, 
		);

		if($this->cart_model->saveBarang($data)){
			echo "BERHASIL";
		}else{
			echo "ERROR";
		}
	}

	public function insert(){

		// link http://localhost:90/rfid/order?mesin=1&&kode=96-11-51-ae-78
		$no_mesin = $this->input->get('mesin');

		$cekTransaksi = $this->cart_model->cekTransaction($no_mesin);

		$cekKeranjang = $this->cart_model->MaxNoKeranjang();

		if(is_null($cekTransaksi)){
			$no_keranjang = 1;
			$status = 0;
		}else{
			$no_keranjang = $cekKeranjang->no_keranjang;
			$status = $cekKeranjang->status;
		}

		var_dump($cekTransaksi);		
		var_dump($no_keranjang);

		// if ($status == 0){
		// 	$no_keranjang = $no_keranjang;
		// }else{
		// 	$no_keranjang = $no_keranjang+1;
		// }

		// $kode = $this->input->get('kode');


		// $dataRfid = array(
		// 	'no_keranjang' => sprintf("%02d", $no_keranjang),				
		// 	'kode' => $kode, 
		// );

		// if($this->crud_model->input($dataRfid,'keranjang')){
		// 	echo "BERHASIL";
		// }else{
		// 	echo "ERROR";
		// }
	}

	public function formAdd(){

		$this->load->view('view_add');
	}

	public function cashier(){
		$header['pageTitle'] = "Tugas Akhir";

		$no_keranjang = $this->input->get('no_keranjang');

		$data['keranjang'] = $this->cart_model->GetDataById(['no_keranjang' => $no_keranjang]);

		$this->load->view('template/header',$header);
		$this->load->view('cashier',$data);
		$this->load->view('template/footer');
	}

	public function print(){
		$kode = $this->input->get('kode');
		$no_keranjang = $this->input->get('no_keranjang');

		$data = array(
			'status' => 1
		);

		$this->crud_model->update(['no_keranjang' => $no_keranjang], $data, 'keranjang');
		$data['keranjang'] = $this->cart_model->GetDataById(['no_keranjang' => $no_keranjang]);

		$this->load->view('print',$data);
	}
}
