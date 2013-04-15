<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class jenis_cetakan extends CI_Controller {

	function index($uri=0)
	{
		if($this->session->userdata("logged_in")!="")
		{
			$d['mark_dashboard'] = "";
			$d['mark_pelanggan'] = "";
			$d['mark_user'] = "";
			$d['mark_bahan'] = "";
			$d['mark_pemesanan'] = "";
			$d['mark_pembayaran'] = "";
			$d['mark_jenis_cetakan'] = "active";
			$d['mark_jenis_satuan'] = "";
			
			$d['dt_retrieve'] = $this->app_load_data_model->indexs_data_cetakan($GLOBALS['site_limit_medium'],$uri);
			
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
			$d['mark_bahan'] = "";
			$d['mark_pemesanan'] = "";
			$d['mark_pembayaran'] = "";
			$d['mark_jenis_cetakan'] = "active";
			$d['mark_jenis_satuan'] = "";
			
			$d['id_param'] = "";
			$d['jenis_cetakan'] = "";
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
			$d['mark_bahan'] = "";
			$d['mark_pemesanan'] = "";
			$d['mark_pembayaran'] = "";
			$d['mark_jenis_cetakan'] = "active";
			$d['mark_jenis_satuan'] = "";
			
			$id['kode_jenis_cetakan'] = $id_param;
			$get = $this->db->get_where("dlmbg_jenis_cetakan",$id)->row();
			$d['id_param'] = $get->kode_jenis_cetakan;
			$d['jenis_cetakan'] = $get->jenis_cetakan;
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
			$dt['jenis_cetakan'] = $_POST['jenis_cetakan'];
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
