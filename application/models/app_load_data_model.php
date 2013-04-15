<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_load_data_model extends CI_Model {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 * @keterangan : Model untuk manajemen user login
	 **/
	 
	public function indexs_data_pelanggan($limit,$offset)
	{
		$hasil = "";
		$hasil .= '
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>Nama Pelanggan</th>
					  <th>Jenis Pelanggan</th>
					  <th>Actions</th>
				  </tr>
			  </thead>';
			  
		$tot_hal = $this->db->get("dlmbg_pelanggan");
		$config['base_url'] = base_url() . 'dashboard/pelanggan/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->order_by("kode_pelanggan","DESC")->get("dlmbg_pelanggan",$limit,$offset);
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td>'.$g->nama_pelanggan.'</td>
					<td class="center">'.$g->jenis.'</td>
					<td class="center">
						<a class="btn btn-info" href="'.base_url().'dashboard/pelanggan/edit/'.$g->kode_pelanggan.'">
							<i class="halflings-icon edit halflings-icon"></i>  
						</a>
						<a class="btn btn-danger" href="'.base_url().'dashboard/pelanggan/hapus/'.$g->kode_pelanggan.'" onClick=\'return confirm("Anda yakin?");\'>
							<i class="halflings-icon trash halflings-icon"></i> 
						</a>
					</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function indexs_data_satuan($limit,$offset)
	{
		$hasil = "";
		$hasil .= '
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>Satuan</th>
					  <th>Actions</th>
				  </tr>
			  </thead>';
			  
		$tot_hal = $this->db->get("dlmbg_jenis_satuan");
		$config['base_url'] = base_url() . 'dashboard/satuan/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->order_by("id_jenis_satuan","DESC")->get("dlmbg_jenis_satuan",$limit,$offset);
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td>'.$g->satuan.'</td>
					<td class="center">
						<a class="btn btn-info" href="'.base_url().'dashboard/satuan/edit/'.$g->id_jenis_satuan.'">
							<i class="halflings-icon edit halflings-icon"></i>  
						</a>
						<a class="btn btn-danger" href="'.base_url().'dashboard/satuan/hapus/'.$g->id_jenis_satuan.'" onClick=\'return confirm("Anda yakin?");\'>
							<i class="halflings-icon trash halflings-icon"></i> 
						</a>
					</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function indexs_data_cetakan($limit,$offset)
	{
		$hasil = "";
		$hasil .= '
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>Jenis Cetakan</th>
					  <th>Actions</th>
				  </tr>
			  </thead>';
			  
		$tot_hal = $this->db->get("dlmbg_jenis_cetakan");
		$config['base_url'] = base_url() . 'dashboard/jenis_cetakan/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->order_by("kode_jenis_cetakan","DESC")->get("dlmbg_jenis_cetakan",$limit,$offset);
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td>'.$g->jenis_cetakan.'</td>
					<td class="center">
						<a class="btn btn-info" href="'.base_url().'dashboard/jenis_cetakan/edit/'.$g->kode_jenis_cetakan.'">
							<i class="halflings-icon edit halflings-icon"></i>  
						</a>
						<a class="btn btn-danger" href="'.base_url().'dashboard/jenis_cetakan/hapus/'.$g->kode_jenis_cetakan.'" onClick=\'return confirm("Anda yakin?");\'>
							<i class="halflings-icon trash halflings-icon"></i> 
						</a>
					</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function indexs_data_pengguna($limit,$offset)
	{
		$hasil = "";
		$hasil .= '
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>Nama Pengguna</th>
					  <th>Username</th>
					  <th>Actions</th>
				  </tr>
			  </thead>';
			  
		$tot_hal = $this->db->get("dlmbg_user");
		$config['base_url'] = base_url() . 'dashboard/pengguna/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->order_by("kode_user","DESC")->get("dlmbg_user",$limit,$offset);
		$i=$offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td>'.$g->nama_user.'</td>
					<td class="center">'.$g->username.'</td>
					<td class="center">
						<a class="btn btn-info" href="'.base_url().'dashboard/pengguna/edit/'.$g->kode_user.'">
							<i class="halflings-icon edit halflings-icon"></i>  
						</a>
						<a class="btn btn-danger" href="'.base_url().'dashboard/pengguna/hapus/'.$g->kode_user.'" onClick=\'return confirm("Anda yakin?");\'>
							<i class="halflings-icon trash halflings-icon"></i> 
						</a>
					</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function indexs_data_bahan_baku($limit,$offset)
	{
		$hasil = "";
		$hasil .= '
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>Nama Bahan</th>
					  <th>Stok</th>
					  <th>Satuan</th>
					  <th>Actions</th>
				  </tr>
			  </thead>';
			  
		$tot_hal = $this->db->get("dlmbg_bahan_baku");
		$config['base_url'] = base_url() . 'dashboard/bahan_baku/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->query("select * from dlmbg_bahan_baku a left join dlmbg_jenis_satuan b on a.id_jenis_satuan=b.id_jenis_satuan limit ".$offset.",".$limit."");
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td>'.$g->nama_bahan.'</td>
					<td class="center">'.$g->stok.'</td>
					<td class="center">'.$g->satuan.'</td>
					<td class="center">
						<a class="btn btn-info" href="'.base_url().'dashboard/bahan_baku/edit/'.$g->kode_bahan_baku.'">
							<i class="halflings-icon edit halflings-icon"></i>  
						</a>
						<a class="btn btn-danger" href="'.base_url().'dashboard/bahan_baku/hapus/'.$g->kode_bahan_baku.'" onClick=\'return confirm("Anda yakin?");\'>
							<i class="halflings-icon trash halflings-icon"></i> 
						</a>
					</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function indexs_data_pemesanan($limit,$offset)
	{
		$hasil = "";
		$hasil .= '
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>Tanggal Pesan</th>
					  <th>Tanggal Selesai</th>
					  <th>Nama Pelanggan</th>
					  <th>Total Harga</th>
					  <th>Status Pembayaran</th>
					  <th>Actions</th>
				  </tr>
			  </thead>';
			  
		$tot_hal = $this->db->get("dlmbg_pemesanan");
		$config['base_url'] = base_url() . 'dashboard/pemesanan/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->query("select a.tgl_pesan, a.tgl_selesai, b.nama_pelanggan, a.jumlah_harga, a.status_pembayaran, a.kode_pemesanan
		 from dlmbg_pemesanan a left join dlmbg_pelanggan b on a.kode_pelanggan=b.kode_pelanggan LIMIT ".$offset.",".$limit."");
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td>'.$g->tgl_pesan.'</td>
					<td>'.$g->tgl_selesai.'</td>
					<td>'.$g->nama_pelanggan.'</td>
					<td>'.$g->jumlah_harga.'</td>
					<td>'.$g->status_pembayaran.'</td>
					<td class="center">
						<a class="btn btn-info" href="'.base_url().'dashboard/pemesanan/edit/'.$g->kode_pemesanan.'">
							<i class="halflings-icon edit halflings-icon"></i>  
						</a>
						<a class="btn btn-danger" href="'.base_url().'dashboard/pemesanan/hapus/'.$g->kode_pemesanan.'" onClick=\'return confirm("Anda yakin?");\'>
							<i class="halflings-icon trash halflings-icon"></i> 
						</a>
					</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	
	
	
	
	public function getMaxKodePesanan()
	{
		$q = $this->db->query("select MAX(RIGHT(kode_pemesanan,8)) as kd_max from dlmbg_pemesanan");
		$kd = "";
		if($q->num_rows()>0)
		{
			foreach($q->result() as $k)
			{
				$tmp = ((int)$k->kd_max)+1;
				$kd = sprintf("%08s", $tmp);
			}
		}
		else
		{
			$kd = "00000001";
		}	
		return "PS".$kd;
	}
}

/* End of file app_user_login_model.php */
/* Location: ./application/models/app_user_login_model.php */