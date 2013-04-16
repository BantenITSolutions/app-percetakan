<head>
	<meta charset="utf-8" />
	<title><?php echo $GLOBALS['site_title'].' - '.$GLOBALS['site_quotes']; ?></title>
	<meta name="description" content="ACME Dashboard Bootstrap Admin Template." />
	<meta name="author" content="Lukasz Holeczek" />
	<meta name="keyword" content="ACME, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link id="bootstrap-style" href="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/css/bootstrap.css" rel="stylesheet" />
	<link href="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/css/bootstrap-responsive.css" rel="stylesheet" />
	<link id="base-style" href="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/css/style.css" rel="stylesheet" />
	<link id="base-style-responsive" href="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/css/style-responsive.css" rel="stylesheet" />
	<link id="base-style-responsive" href="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/css/chosen.css" rel="stylesheet" />
	<script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/js/jquery-1.7.2.min.js"></script>
	<script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/js/jquery-ui-1.8.21.custom.min.js"></script>
	<script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/js/bootstrap.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body>

<div class="container-fluid">
	<div class="row-fluid">
	<div id="content" class="span12">
	<div class="row-fluid sortable">		
		<div class="box span12">
			<div class="box-header" data-original-title="">
				<h2><i class="halflings-icon hdd"></i><span class="break"></span>
				Form Pembayaran</h2>
			</div>
			<div class="box-content">
				<?php echo form_open("dashboard/pemesanan/simpan_pembayaran",'class="form-horizontal"'); ?>
				  <fieldset>
				  
					<div class="control-group">
					  <label class="control-label">No Kwitansi</label>
					  <div class="controls">
						<input type="text" class="input-xlarge" value="<?php echo $kode_pembayaran; ?>" name="kode_pembayaran" required readonly="true" />
					  </div>
					</div>
				  
					<div class="control-group">
					  <label class="control-label">No Nota</label>
					  <div class="controls">
						<input type="text" class="input-xlarge" value="<?php echo $no_nota; ?>" name="no_nota" required readonly="true" />
					  </div>
					</div>
				  
					<div class="control-group">
					  <label class="control-label">Pelanggan</label>
					  <div class="controls">
						<select data-placeholder="Cari nama pelanggan..." class="chzn-select" style="width:400px;" tabindex="2" name="kode_pelanggan" id="kode_pelanggan" 
						disabled="disabled">
						<option value=""></option> 
						<?php
							foreach($pelanggan->result_array() as $dp)
							{
							$pilih='';
							if($dp['kode_pelanggan']==$this->session->userdata("kode_pelanggan"))
							{
							$pilih='selected="selected"';
						?>
							<option value="<?php echo $dp['kode_pelanggan']; ?>" <?php echo $pilih; ?>><?php echo $dp['nama_pelanggan']; ?></option>
						<?php
						}
						else
						{
						?>
							<option value="<?php echo $dp['kode_pelanggan']; ?>"><?php echo $dp['nama_pelanggan']; ?></option>
						<?php
						}
							}
						?>
					</select>
					  </div>
					</div>
				  
					<div class="control-group">
					  <label class="control-label">Tanggal Pesan</label>
					  <div class="controls">
						<input type="text" class="input-xlarge" id="tgl_pesan" value="<?php echo $tgl_pesan; ?>" name="tgl_pesan" required disabled="disabled" />
					  </div>
					</div>
				  
					<div class="control-group">
					  <label class="control-label">Tanggal Selesai</label>
					  <div class="controls">
						<input type="text" class="input-xlarge" id="tgl_selesai" value="<?php echo $tgl_selesai; ?>" name="tgl_selesai" required disabled="disabled" />
					  </div>
					</div>
				  
					<div class="control-group">
					  <label class="control-label">Tanggal Bayar</label>
					  <div class="controls">
						<input type="text" class="input-xlarge" id="tgl_bayar" value="<?php echo $tgl_bayar; ?>" name="tgl_bayar" required />
					  </div>
					</div>
				  
					<div class="control-group">
					  <label class="control-label">Jumlah Bayar</label>
					  <div class="controls">
						<input type="text" class="input-xlarge" id="jumlah_harga" value="<?php echo $jumlah_harga; ?>" name="jumlah_harga" required disabled="disabled" />
					  </div>
					</div>
				  
					<div class="control-group">
					  <label class="control-label">Bayar</label>
					  <div class="controls">
						<input type="text" class="input-xlarge" id="bayar" name="bayar" value="<?php echo $bayar; ?>" required />
					  </div>
					</div>
					
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
						<thead>
							<tr>
								<th>No.</th>
								<th>Nama Bahan Baku</th>
								<th>Jumlah Pakai</th>
							</tr>
						</thead> 
						<?php $i = 1; $no=1;?>
						<?php foreach($this->cart->contents() as $items): ?>
						
						<?php echo form_hidden('rowid[]', $items['rowid']); ?>
						<tr class="content">
							
							<td><?php echo $no; ?></td>
							<td><?php echo $items['name']; ?></td>
							<td><?php echo $items['qty']; ?> 
							<?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value)
							{
								echo $option_value;
							} 
							?>
							</td>
						</tr>
			
					<?php $i++; $no++;?>
					<?php endforeach; ?>
					</table>
					
				  </fieldset>
				<script src="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/js/chosen.jquery.js" type="text/javascript"></script>
				<script type="text/javascript"> 
					$(".chzn-select").chosen();
					$(".chzn-select2").chosen();
				</script>
				<?php echo form_close(); ?> 
			</div>
		</div>
	
	</div>
	</div>
	</div>