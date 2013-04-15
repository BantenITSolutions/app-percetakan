<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pemesanan extends CI_Controller {

	function index($uri=0)
	{
		if($this->session->userdata("logged_in")!="")
		{
			$d['mark_dashboard'] = "";
			$d['mark_pelanggan'] = "";
			$d['mark_user'] = "";
			$d['mark_bahan'] = "";
			$d['mark_pemesanan'] = "active";
			$d['mark_pembayaran'] = "";
			$d['mark_jenis_cetakan'] = "";
			$d['mark_jenis_satuan'] = "";
			
			$d['dt_retrieve'] = $this->app_load_data_model->indexs_data_pemesanan($GLOBALS['site_limit_medium'],$uri);
			$this->session->unset_userdata('kode_pelanggan');
			$this->session->unset_userdata('tgl_pesan');
			$this->session->unset_userdata('tgl_selesai');
			$this->session->unset_userdata('jumlah_harga');
			$this->cart->destroy();
			
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/pemesanan/bg_home");
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
			$d['mark_pemesanan'] = "active";
			$d['mark_pembayaran'] = "";
			$d['mark_jenis_cetakan'] = "";
			$d['mark_jenis_satuan'] = "";
			
			$d['no_nota'] = $this->app_load_data_model->getMaxKodePesanan();
			$d['pelanggan'] = $this->db->get("dlmbg_pelanggan");
			$d['tgl_pesan'] = $this->session->userdata("tgl_pesan");
			$d['tgl_selesai'] = $this->session->userdata("tgl_selesai");
			$d['jumlah_harga'] = $this->session->userdata("jumlah_harga");
			
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/pemesanan/bg_input");
 			$this->load->view($GLOBALS['site_theme']."/bg_footer");
		}
		else
		{
			redirect("login");
		}
	}

	function tambah_item()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$d['bahan_baku'] = $this->db->get("dlmbg_bahan_baku");
			
 			$this->load->view($GLOBALS['site_theme']."/pemesanan/bg_input_item",$d);
		}
		else
		{
			redirect("login");
		}
	}

	function tambah_barang_pesanan()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$data = array(
				'id'      => $this->input->post('kode_bahan_baku'),
				'qty'     => $this->input->post('jumlah_bahan'),
				'price'   => $this->input->post('harga_barang'),
				'name'    => $this->input->post('nama_bahan'),
                'options' => array('Satuan' => $this->input->post('satuan')));
			$this->cart->insert($data);
			?>
				<script>
					window.parent.location.reload(true);
				</script>
			<?php
		}
		else
		{
			redirect("login");
		}
	}


	function hapus_pesanan()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$kode = $_GET['kode'];
			$data = array(
				'rowid' => $kode,
				'qty'   => 0);
			$this->cart->update($data);
		}
		else
		{
			redirect("login");
		}
	}

	function ambil_data_bahan()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$kd = $_GET["kode_bahan_baku"];
			$q = $this->db->query("select * from dlmbg_bahan_baku a left join dlmbg_jenis_satuan b on a.id_jenis_satuan=b.id_jenis_satuan where a.kode_bahan_baku='".$kd."'");
			foreach($q->result() as $d)
			{
			?>
			<table cellpadding="0" cellspacing="0" border="0">
			<tr><td width="160">Kode Barang</td><td width="20">:</td><td><input type="text" value="<?php echo $d->kode_bahan_baku; ?>" class="input-read-only"
			 style="width:350px;" name="kode_bahan_baku" readonly="readonly" /></td></tr>
			<tr><td>Nama Bahan</td><td>:</td><td><input type="text" value="<?php echo $d->nama_bahan; ?>" class="input-read-only" style="width:350px;" name=
			"nama_bahan" readonly="readonly" /></td></tr>
			<tr><td>Satuan</td><td>:</td><td><input type="hidden" value="1000" class="input-read-only" name=
			"harga_barang" id="hargabarang" readonly="readonly" />
			<input type="text" value="<?php echo $d->satuan; ?>" class="input-read-only" name=
			"satuan" id="satuan" readonly="readonly" /> </td></tr>
			<tr><td>Jumlah</td><td>:</td><td>
			<select name="jumlah_bahan" class="input-read-only" class="chzn-select">
			<?php
				for($i=0;$i<=$d->stok;$i++)
				{
			?>
				<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
			<?php
				}
			?>
			</select>
			</td></tr>
			</table>
			<?php
			}
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
			$d['mark_pemesanan'] = "active";
			$d['mark_pembayaran'] = "";
			$d['mark_jenis_cetakan'] = "";
			$d['mark_jenis_satuan'] = "";
			
			$d['no_nota'] = $id_param;
			$get_head = $this->db->get_where("dlmbg_pemesanan",array("kode_pemesanan"=>$id_param))->row();
			if($this->session->userdata("kode_pelanggan")=="")
			{
				$set_sess_head['kode_pelanggan'] = $get_head->kode_pelanggan;
				$this->session->set_userdata($set_sess_head);
			}
			$d['tgl_pesan'] = $get_head->tgl_pesan;
			$d['tgl_selesai'] = $get_head->tgl_selesai;
			$d['jumlah_harga'] = $get_head->jumlah_harga;
			$d['status_pembayaran'] = $get_head->status_pembayaran;
			
			$get_detail = $this->db->query("select a.kode_bahan_baku, a.jumlah, b.nama_bahan, b.satuan from dlmbg_pemesanan_detail a left join 
			(select x.nama_bahan, y.satuan, x.kode_bahan_baku from dlmbg_bahan_baku x left join dlmbg_jenis_satuan y on x.id_jenis_satuan=y.id_jenis_satuan) 
			b on a.kode_bahan_baku=b.kode_bahan_baku where a.kode_pemesanan='".$id_param."'");
			
			$in_cart = array();
			foreach($get_detail->result() as $dpd)
			{
				$in_cart[] = array(
				'id'      => $dpd->kode_bahan_baku,
				'qty'     => $dpd->jumlah,
				'price'   => "1000",
				'name'    => $dpd->nama_bahan,
				'options' => array('Satuan' => $dpd->satuan));
			}
			$this->cart->insert($in_cart);
			
			$d['pelanggan'] = $this->db->get("dlmbg_pelanggan");
			
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/pemesanan/bg_input_edit");
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
			$d_header['kode_pemesanan'] = $this->app_load_data_model->getMaxKodePesanan();
			$temp = $d_header['kode_pemesanan'];
			$d_header['tgl_pesan'] = $this->input->post('tgl_pesan');
			$d_header['tgl_selesai'] = $this->input->post('tgl_selesai');
			$d_header['kode_pelanggan'] = $this->input->post('kode_pelanggan');
			$d_header['jumlah_harga'] = $this->input->post('jumlah_harga');
			$d_header['status_pembayaran'] = $this->input->post('status_pembayaran');
			
			$this->db->insert("dlmbg_pemesanan",$d_header);
			foreach($this->cart->contents() as $items)
			{
				$d_detail['kode_pemesanan'] = $temp;
				$d_detail['kode_bahan_baku'] = $items['id'];
				$d_detail['jumlah'] = $items['qty'];
				$this->db->insert("dlmbg_pemesanan_detail",$d_detail);
				
				$d_u['stok'] = $this->app_load_data_model->getBalancedStok($d_detail['kode_bahan_baku'],$d_detail['jumlah']);
				$key['kode_bahan_baku'] = $d_detail['kode_bahan_baku'];
				$this->db->update("dlmbg_bahan_baku",$d_u,$key);
			}
			$this->session->unset_userdata('kode_pelanggan');
			$this->session->unset_userdata('tgl_pesan');
			$this->session->unset_userdata('tgl_selesai');
			$this->session->unset_userdata('jumlah_harga');
			$this->cart->destroy();
			redirect("dashboard/pemesanan");
		}
		else
		{
			redirect("login");
		}
	}

	function set_kd_pelanggan()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$id['kode_pelanggan'] = $_GET['kode_pelanggan'];
			$this->session->set_userdata($id);
		}
		else
		{
			redirect("login");
		}
	}

	function set_tgl_pesanan()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$id['tgl_pesan'] = $_GET['tgl_pesan'];
			$this->session->set_userdata($id);
		}
		else
		{
			redirect("login");
		}
	}

	function set_tgl_selesai()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$id['tgl_selesai'] = $_GET['tgl_selesai'];
			$this->session->set_userdata($id);
		}
		else
		{
			redirect("login");
		}
	}

	function set_jumlah_harga()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$id['jumlah_harga'] = $_GET['jumlah_harga'];
			$this->session->set_userdata($id);
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
			$id['kode_pelanggan'] = $id_param;
			$get = $this->db->delete("dlmbg_pelanggan",$id);
			redirect("dashboard/pelanggan");
		}
		else
		{
			redirect("login");
		}
	}
}
