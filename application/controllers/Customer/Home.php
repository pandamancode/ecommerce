<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
        header('Cache-Control: no-cache, must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0',false);
        header('Pragma: no-cache');
		/*if ($this->session->userdata('uname')==""){
			redirect('Auth');
		}else if ($this->session->userdata('userlevel')<>"ADMIN"){
			redirect('Auth');
		}*/
    }

	public function index()
	{
        if(isset($_POST) && !empty($_POST)){
            $kategori = $this->input->post('kategori');
            $sess['sess_id_kategori'] = $kategori;
            $this->session->set_userdata($sess);
            $data['content'] = 'template/produk';
		    $this->load->view('template/main_v',$data);
        }else{
            $kategori = $this->input->post('kategori');
            $sess['sess_id_kategori'] = $kategori;
            $this->session->set_userdata($sess);
            $data['content'] = 'template/produk';
		    $this->load->view('template/main_v',$data);
        }
    }

    public function pilih_kategori(){
        $kategori = $this->input->post('kategori');

    }
    
}