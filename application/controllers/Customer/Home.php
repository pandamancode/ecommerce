<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
        
		/*if ($this->session->userdata('uname')==""){
			redirect('Auth');
		}else if ($this->session->userdata('userlevel')<>"ADMIN"){
			redirect('Auth');
		}*/
    }

	public function index()
	{
        if(isset($_POST) && !empty($_POST)){
            if(isset($_POST['kategori'])) {
                $kategori = $this->input->post('kategori');
                $sess['sess_id_kategori'] = $kategori;
                $this->session->set_userdata($sess);
                $data['produk'] = $this->db->get_where("tb_produk",array('id_kategori'=>$kategori));
            }else if(isset($_POST['cari_txt'])){
                $data['produk'] = $this->db->select("*")->from("tb_produk")->like('nama_produk', $this->input->post('cari_txt'))->get();
            }
            $data['content'] = 'customer/produk/produk';
		    $this->load->view('template/main_v',$data);
        }else{
            $data['produk'] = $this->db->select("*")->from("tb_produk")->order_by('nama_produk','RANDOM')->limit(3)->get();
            $data['content'] = 'customer/produk/produk';
		    $this->load->view('template/main_v',$data);
        }
    }

    public function add_to_cart($kd){
        if(isset($kd) && !empty($kd)){
            if($this->session->userdata('logged_in')<>true){
                echo "error";
            }else{
                $produk = $this->db->get_where("tb_produk",array('kode_produk'=>$kd));
                $cek = $this->db->get_where("tb_cart",array('id_pelanggan'=>$this->session->userdata('id'), 'kode_produk'=>$kd, 'checkout'=>'belum'));
                if($cek->num_rows()>0){
                    $where['id_cart'] = $cek->row()->id_cart;
                    $data = array(
                        'tanggal' => date('Y-m-d'),
                        'kode_produk' => $kd,
                        'id_pelanggan' => $this->session->userdata('id'),
                        'qty' =>intval($cek->row()->qty + 1),
                        'harga_jual' => $produk->row()->harga_jual,
                        'total_harga' => $produk->row()->harga_jual * intval($cek->row()->qty + 1),
                    );
                    $this->db->update("tb_cart",$data,$where);
                    echo "success";
                }else{
                    $data = array(
                        'tanggal' => date('Y-m-d'),
                        'kode_produk' => $kd,
                        'id_pelanggan' => $this->session->userdata('id'),
                        'qty' =>'1',
                        'harga_jual' => $produk->row()->harga_jual,
                        'total_harga' => $produk->row()->harga_jual,
                    );
                    $this->db->insert("tb_cart",$data);
                    echo "success";
                }
            }
        }else redirect('home');
    }

    public function opencart(){
        //$data['cart'] = $this->db->get_where("tb_cart",array('id_pelanggan'=>$this->session->userdata('id'), 'checkout'=>'belum'));
       // $data['cart'] = $this->db->select("*")->from("tb_cart")->join("tb_produk","tb_produk.kode_produk=tb_cart.kode_produk")->where("tb_cart.id_pelanggan",$this->session->userdata('id'))->where("tb_cart.checkout","belum")->get();
        echo show_my_modal("customer/cart/modal_cart","md_opencart");
    }

    public function get_data_cart(){
        $cart = $this->db->select("*")->from("tb_cart")->join("tb_produk","tb_produk.kode_produk=tb_cart.kode_produk")->where("tb_cart.id_pelanggan",$this->session->userdata('id'))->where("tb_cart.checkout","belum")->get();
        if($cart->num_rows()>0){
            foreach($cart->result() as $r){
                echo "
                
                <tr>
                    <td data-th='Product'>
                        <div class='row'>
                            <div class='col-sm-2'><img width='40px' src='".base_url('public/produk/'.$r->foto_produk)."' alt='...' class='img-responsive'/></div>
                            <div class='col-sm-10'>
                                <h4 class='nomargin'>$r->nama_produk</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th='Price'>
                        Rp. ".format_rp($r->harga_jual).",-
                        <form method='post' id='f_".$r->id_cart."'><input type='number' onchange='ubah_qty(".$r->id_cart.")' class='form-control text-center' name='qty' id='qty' value='$r->qty'></form>
                    </td>
                    <td data-th='Subtotal' class='text-center'>Rp. ".format_rp($r->harga_jual * $r->qty).",-</td>
                    <td class='actions' data-th=''>
                        <a href='javascript:;' onclick='batalkan(".$r->id_cart.")' class='btn btn-danger btn-flat btn-sm'><i class='fa fa-trash-o'></i></a>								
                    </td>
                </tr>

                ";
            }

        }
    }

    public function update_qty(){
        $cek = $this->db->get_where("tb_cart",array('id_cart' => $this->input->post('id')));
    	if($cek->num_rows()>0){
    		$kode_produk = $cek->row()->kode_produk;
    		$cek_harga = $this->db->get_where("tb_produk",array('kode_produk'=>$kode_produk));
    		if($cek_harga->num_rows()>0){
    			$harga_jual = $cek_harga->row()->harga_jual;
    		}else{
    			$harga_jual = 0;
    		}
    	}

    	$id_penjualan = $this->input->post('id');
    	$qty = $this->input->post('qty');
    	$harga = $harga_jual;
    	$sub = intval($qty * $harga);
    	$data = array(
	    		'qty' => $qty,
	    		'harga_jual' => $harga,
	    		'total_harga' => $sub,
    		);
    	$where['id_cart'] = $this->input->post('id');
    	$this->db->update("tb_cart",$data,$where);
    	echo "success";
    }

    public function batalkan(){
    	$this->db->delete("tb_cart",array('id_cart'=>$this->input->post('id')));
    	echo "success";
    }

    /*AKUN */
    public function login(){
        echo show_my_modal("customer/modal_login","md_login");
    }

    public function register(){
        echo show_my_modal("customer/modal_register","md_register");
    }

    public function sign_up(){
        if(isset($_POST) && !empty($_POST)){
            $pw1 = $this->input->post('password');
            $pw2 = $this->input->post('ConfirmPassword');
            if($pw1<>$pw2){
                $msg = array('status'=>'error','msg'=>'Password Tidak Sama');
                $this->session->set_flashdata($msg);
                redirect('home');
            }else{
                $cek = $this->db->get_where("tb_pelanggan",array('email_pelanggan'=>$this->input->post('Email')));
                if($cek->num_rows()>0){
                    $msg = array('status'=>'error','msg'=>'Email Sudah Terdaftar');
                    $this->session->set_flashdata($msg);
                    redirect('home');
                }else{
                    $data = array(
                        'nama_pelanggan' => $this->input->post('Name'),
                        'email_pelanggan' => $this->input->post('Email'),
                        'password' => md5($this->input->post('password')),
                    );
                    $this->db->insert("tb_pelanggan",$data);
                    $msg = array('status'=>'success','msg'=>'Berhasil Membuat Akun');
                    $this->session->set_flashdata($msg);
                    redirect('home');
                }
            }
        }else redirect('home');
    }

    public function sign_in(){
        if(isset($_POST) && !empty($_POST)){
            $data = array(
                    'email_pelanggan' => addslashes($this->input->post('email')),
                    'password' => md5($this->input->post('password')),
                );

            $cek = $this->db->get_where("tb_pelanggan",$data);

            if($cek->num_rows()>0){
                $uname = $this->input->post('email');
                $this->db->query("UPDATE tb_pelanggan SET last_login=NOW() WHERE email_pelanggan='$uname' ");
                $sess_data = array(
                        'id' => $cek->row()->id_pelanggan,
                        'nama' => $cek->row()->nama_pelanggan,
                        'email' => $cek->row()->email_pelanggan,
                        'logged_in' => true,
                    );
                $this->session->set_userdata($sess_data);
                $msg = array('status'=>'success','msg'=>'Anda Berhasil Login');
                $this->session->set_flashdata($msg);
                redirect('home');
            }else{
                $msg = array('status'=>'error','msg'=>'Masukkan Email dan Password dengan benar');
                $this->session->set_flashdata($msg);
                //$this->session->set_flashdata('status','error');
                //$this->session->set_flashdata('msg','Masukkan Email dan Password dengan benar');
                redirect('home');
            }
        }else redirect('home');
    }

    public function logout(){
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('email');
        session_destroy();
        redirect('home');
    }
    
    public function tes(){
        $data =  ['1','2','3'];
        echo $data[0];
    }
}