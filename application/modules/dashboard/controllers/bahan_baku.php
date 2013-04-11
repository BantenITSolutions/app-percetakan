<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class bahan_baku extends CI_Controller {

	function index($uri=0)
	{
		if($this->session->userdata("logged_in")!="")
		{
			$d['mark_dashboard'] = "";
			$d['mark_pelanggan'] = "";
			$d['mark_user'] = "";
			$d['mark_bahan'] = "active";
			$d['mark_pemesanan'] = "";
			$d['mark_pembayaran'] = "";
			$d['mark_jenis_cetakan'] = "";
			$d['mark_jenis_satuan'] = "";
			
			$d['dt_retrieve'] = $this->app_load_data_model->indexs_data_bahan_baku($GLOBALS['site_limit_medium'],$uri);
			
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/bahan_baku/bg_home");
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
			$d['mark_bahan'] = "active";
			$d['mark_pemesanan'] = "";
			$d['mark_pembayaran'] = "";
			$d['mark_jenis_cetakan'] = "";
			$d['mark_jenis_satuan'] = "";
			
			$d['satuan'] = $this->db->get("dlmbg_jenis_satuan");
			
			$d['id_param'] = "";
			$d['nama_bahan'] = "";
			$d['stok'] = "";
			$d['id_jenis_satuan'] = "";
			$d['st'] = "tambah";
			
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/bahan_baku/bg_input");
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
			$d['mark_bahan'] = "active";
			$d['mark_pemesanan'] = "";
			$d['mark_pembayaran'] = "";
			$d['mark_jenis_cetakan'] = "";
			$d['mark_jenis_satuan'] = "";
			
			$d['satuan'] = $this->db->get("dlmbg_jenis_satuan");
			
			$id['kode_bahan_baku'] = $id_param;
			$get = $this->db->get_where("dlmbg_bahan_baku",$id)->row();
			$d['id_param'] = $get->kode_bahan_baku;
			$d['nama_bahan'] = $get->nama_bahan;
			$d['stok'] = $get->stok;
			$d['id_jenis_satuan'] = $get->id_jenis_satuan;
			$d['st'] = "edit";
			
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/bahan_baku/bg_input");
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
			$id['kode_bahan_baku'] = $_POST['id_param'];
			$dt['nama_bahan'] = $_POST['nama_bahan'];
			$dt['id_jenis_satuan'] = $_POST['id_jenis_satuan'];
			$dt['stok'] = $_POST['stok'];
			$st = $_POST['st'];
			
			if($st=="tambah")
			{
				$this->db->insert("dlmbg_bahan_baku",$dt);
				redirect("dashboard/bahan_baku");
			}
			else if($st=="edit")
			{
				$this->db->update("dlmbg_bahan_baku",$dt,$id);
				redirect("dashboard/bahan_baku");
			}
		}
		else
		{
			redirect("login");
		}
	}

	function hapus($id_param)
	{
		if($this->session->userdata("logged_in")!="")
		{
			$id['kode_bahan_baku'] = $id_param;
			$get = $this->db->delete("dlmbg_bahan_baku",$id);
			redirect("dashboard/bahan_baku");
		}
		else
		{
			redirect("login");
		}
	}
}
