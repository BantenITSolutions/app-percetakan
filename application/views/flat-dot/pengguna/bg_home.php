<div id="content" class="span11">
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title="">
			<h2><i class="halflings-icon hdd"></i><span class="break"></span>
			<i class="halflings-icon plus-sign"></i><a href="<?php echo base_url(); ?>dashboard/pengguna/tambah">Tambah Data</a><span class="break"></span>
			Data Pengguna</h2>
		</div>
		<div class="box-content">
			<?php echo form_open("dashboard/pengguna/set"); ?>
			<input type="text" class="input-xlarge" value="<?php echo $this->session->userdata("key"); ?>" name="key" />
			<input type="submit" value="Cari Data" class="btn" />
			<?php echo form_close(); ?>
			<?php echo $dt_retrieve; ?>
			<span class="label label-success">JUMLAH DATA : <?php echo $this->db->get("dlmbg_user")->num_rows(); ?></span>
		</div>
	</div>

</div>
</div>
</div>