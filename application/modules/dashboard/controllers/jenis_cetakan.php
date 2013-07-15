<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class jenis_cetakan extends CI_Controller {

	function index($uri=0)
	{
		if($this->session->userdata("logged_in")!="")
		{
			$d['mark_dashboard'] = "";
			$d['mark_pelanggan'] = "";
			$d['mark_user'] = "";
<<<<<<< HEAD
=======
			$d['mark_bahan'] = "";
>>>>>>> 30b93fd26dcb762b9b13b0dde45342c45bc14713
			$d['mark_pemesanan'] = "";
			$d['mark_pembayaran'] = "";
			$d['mark_jenis_cetakan'] = "active";
			$d['mark_jenis_satuan'] = "";
<<<<<<< HEAD
			$d['mark_belum_lunas'] = "";
			
			$d['dt_retrieve'] = $this->app_load_data_model->indexs_data_jenis_cetakan($GLOBALS['site_limit_medium'],$uri);
=======
			
			$d['dt_retrieve'] = $this->app_load_data_model->indexs_data_cetakan($GLOBALS['site_limit_medium'],$uri);
>>>>>>> 30b93fd26dcb762b9b13b0dde45342c45bc14713
			
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/jenis_cetakan/bg_home");
 			$this->load->view($GLOBALS['site_theme']."/bg_footer");
		}
		else
		{
			redirect("login");
		}
	}

	function tambah()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$d['mark_dashboard'] = "";
			$d['mark_pelanggan'] = "";
			$d['mark_user'] = "";
<<<<<<< HEAD
=======
			$d['mark_bahan'] = "";
>>>>>>> 30b93fd26dcb762b9b13b0dde45342c45bc14713
			$d['mark_pemesanan'] = "";
			$d['mark_pembayaran'] = "";
			$d['mark_jenis_cetakan'] = "active";
			$d['mark_jenis_satuan'] = "";
<<<<<<< HEAD
			$d['mark_belum_lunas'] = "";
			
			$d['satuan'] = $this->db->get("dlmbg_jenis_satuan");
			
			$d['id_param'] = "";
			$d['nama_cetakan'] = "";
			$d['harga'] = "";
			$d['id_jenis_satuan'] = "";
=======
			
			$d['id_param'] = "";
			$d['jenis_cetakan'] = "";
>>>>>>> 30b93fd26dcb762b9b13b0dde45342c45bc14713
			$d['st'] = "tambah";
			
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/jenis_cetakan/bg_input");
 			$this->load->view($GLOBALS['site_theme']."/bg_footer");
		}
		else
		{
			redirect("login");
		}
	}

	function edit($id_param)
	{
		if($this->session->userdata("logged_in")!="")
		{
			$d['mark_dashboard'] = "";
			$d['mark_pelanggan'] = "";
			$d['mark_user'] = "";
<<<<<<< HEAD
=======
			$d['mark_bahan'] = "";
>>>>>>> 30b93fd26dcb762b9b13b0dde45342c45bc14713
			$d['mark_pemesanan'] = "";
			$d['mark_pembayaran'] = "";
			$d['mark_jenis_cetakan'] = "active";
			$d['mark_jenis_satuan'] = "";
<<<<<<< HEAD
			$d['mark_belum_lunas'] = "";
			
			$d['satuan'] = $this->db->get("dlmbg_jenis_satuan");
=======
>>>>>>> 30b93fd26dcb762b9b13b0dde45342c45bc14713
			
			$id['kode_jenis_cetakan'] = $id_param;
			$get = $this->db->get_where("dlmbg_jenis_cetakan",$id)->row();
			$d['id_param'] = $get->kode_jenis_cetakan;
<<<<<<< HEAD
			$d['nama_cetakan'] = $get->nama_cetakan;
			$d['harga'] = $get->harga;
			$d['id_jenis_satuan'] = $get->id_jenis_satuan;
=======
			$d['jenis_cetakan'] = $get->jenis_cetakan;
>>>>>>> 30b93fd26dcb762b9b13b0dde45342c45bc14713
			$d['st'] = "edit";
			
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/jenis_cetakan/bg_input");
 			$this->load->view($GLOBALS['site_theme']."/bg_footer");
		}
		else
		{
			redirect("login");
		}
	}

	function simpan()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$id['kode_jenis_cetakan'] = $_POST['id_param'];
<<<<<<< HEAD
			$dt['nama_cetakan'] = $_POST['nama_cetakan'];
			$dt['id_jenis_satuan'] = $_POST['id_jenis_satuan'];
			$dt['harga'] = $_POST['harga'];
=======
			$dt['jenis_cetakan'] = $_POST['jenis_cetakan'];
>>>>>>> 30b93fd26dcb762b9b13b0dde45342c45bc14713
			$st = $_POST['st'];
			
			if($st=="tambah")
			{
				$this->db->insert("dlmbg_jenis_cetakan",$dt);
				redirect("dashboard/jenis_cetakan");
			}
			else if($st=="edit")
			{
				$this->db->update("dlmbg_jenis_cetakan",$dt,$id);
				redirect("dashboard/jenis_cetakan");
			}
		}
		else
		{
			redirect("login");
		}
	}

<<<<<<< HEAD
	function set()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$set['key'] = $_POST['key'];
			$this->session->set_userdata($set);
			redirect("dashboard/jenis_cetakan");
		}
		else
		{
			redirect("login");
		}
	}

=======
>>>>>>> 30b93fd26dcb762b9b13b0dde45342c45bc14713
	function hapus($id_param)
	{
		if($this->session->userdata("logged_in")!="")
		{
			$id['kode_jenis_cetakan'] = $id_param;
			$get = $this->db->delete("dlmbg_jenis_cetakan",$id);
			redirect("dashboard/jenis_cetakan");
		}
		else
		{
			redirect("login");
		}
	}
}
