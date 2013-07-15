<div id="content" class="span11">
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title="">
			<h2><i class="halflings-icon hdd"></i><span class="break"></span>
			Laporan Pembayaran Bulanan</h2>
		</div>
		<div class="box-content">
			<?php echo form_open("dashboard/laporan_pembayaran/set"); ?>
			<input type="text" class="input-xlarge" id="bulan" value="<?php echo $bulan_cari; ?>" name="bulan" required />
			<input type="hidden" name="jenis" value="bulanan" />
			<input type="submit" value="Lihat Laporan" class="btn btn-small" />
			<?php echo form_close(); ?>
			<?php echo $dt_retrieve; ?>
<<<<<<< HEAD
			<span class="label label-success">JUMLAH DATA : <?php echo $this->db->get("dlmbg_pembayaran")->num_rows(); ?></span>
=======
>>>>>>> 30b93fd26dcb762b9b13b0dde45342c45bc14713
		</div>
	</div>

</div>
</div>
</div>