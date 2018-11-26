<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$id_di = $this->input->get('fk_K_DI',true);
		$norec = $this->input->get('fk_NOREC',true);
		//$id_di = 48196;
		//$norec = 160045;
		$rs = $this->db->where('id_di',$id_di)->where('norec',$norec)->get('irigasi_bangunan')->row_array();
		$irigasi_bangunan_iksi = $this->db->where('id_di',$rs['id_di'])->where('norec',$rs['norec'])->get('irigasi_bangunan_iksi')->row_array();
		echo '<pre>';
		print_r($rs);
		print_r($irigasi_bangunan_iksi);
		echo '</pre>';
		$this->load->view('welcome_message',array('irigasi_bangunan'=>$rs,'irigasi_bangunan_iksi'=>$irigasi_bangunan_iksi));
	}
}
