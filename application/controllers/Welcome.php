<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->library('ciqrcode'); //meload library barcode
		$this->load->helper('url'); //meload helper url untuk aktifkan base urlnya
        $barcode_create="123456789"; // membuat code barcode yang nilainya 123456789

        //settingang pada barcode 
        $params['data'] = $barcode_create;
		$params['level'] = 'H';
		$params['size'] =5;

		//settingan untuk membuat file barcode dalam format .png dan di simpan dalam folder assets
		$params['savename'] = FCPATH . "assets/".$barcode_create.".png";
		//mulai menggenerate barcode
		$this->ciqrcode->generate($params);

		//mencoba mengeluarkan nilai barcode yang baru saja di generate
		echo '<img src="'.base_url().'assets/'.$barcode_create.'.png" />';
	}
}
