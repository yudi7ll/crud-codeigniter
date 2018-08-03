<noscript>
	<small id="noscript" class="form-text text-danger text-center">
		<h4 class="pt-3 pb-0"><kbd>Very Important!</kbd></h4>
		<kbd>Please Enable Javascript First!.</kbd>
	</small>
</noscript>
<?php foreach($get->result() as $res); ?>
<div class="container mt-4 mb-4 update">
	<h2>Insert Data</h2>
	<?php echo form_open_multipart(base_url().'crud/update/'.$res->bioID); ?>
	<?php echo form_hidden('tanggal_ditambahkan', $res->tanggal_ditambahkan); ?>
	<?php echo form_hidden('tanggal_diubah', gmdate('Y-m-d H:i:s', time()+3600*8)); ?>
		<div class="row">
		  <div class="form-group col-lg-6 add">
		    <label for="nama">Nama Lengkap</label>
		    <input type="text" name="nama" class="form-control" id="nama" autocomplete="off" placeholder="Masukkan Nama Lengkap" autofocus="autofocus" value="<?php echo $res->nama; ?>">
		  
		  <div class="form-group add mt-3">
		    <label for="nisn">NISN</label>
		    <input type="text" name="nisn" class="form-control" id="nisn" autocomplete="off" placeholder="Masukkan NISN" value="<?php echo $res->nisn; ?>">
		  </div>
		  <div class="form-group add">
		  		<label for="asal">Asal Sekolah</label>
		   		<input type="text" name="asal_sekolah" class="form-control" id="asal" autocomplete="off" placeholder="Masukkan Asal Sekolah" value="<?php echo $res->asal_sekolah; ?>">
		  </div>
			<div class="form-group add">
				<label for="kelas">Kelas</label>
		    	<input type="text" name="kelas" class="form-control" id="kelas" autocomplete="off" placeholder="Masukkan Kelas" value="<?php echo $res->kelas; ?>">
			</div>
			</div>

		  <div class="form-group col-lg-6 add">
	    	<label for="jurusan">Pilih Jurusan</label>
		    <select class="form-control" name="jurusan" id="jurusan">
		    	<option value="Sistem Informasi">Sistem Informasi</option>
		    	<option value="Sistem Komputer">Sistem Komputer</option>
		    	<option value="Management Informatika">Management Informatika</option>
		    	<option value="Multimedia">Multimedia</option>
		    </select>

			<?php 
				echo "<script>";
				echo "for(i = 0; i < $('#jurusan option').length; i++){";
				echo "if($('#jurusan option').eq(i).val() == '".$res->jurusan."'){";
				echo "$('#jurusan option').eq(i).attr('selected', 'selected');";
				echo "}}";
				echo "</script>";
			 ?>
		  
		  <div class="form-group">
		   		<div class="form-group mb-1 mt-3 add">
			  		<label for="gender">Jenis Kelamin :</label>
			  	</div>
				<div class="form-check form-check-inline">
				  	<label class="form-check-label">
				    	<input class="form-check-input gender" type="radio" name="gender" id="pria" value="Laki - Laki">Laki - Laki
			    	</label>
			    </div>
			    <div class="form-check form-check-inline">
			    	<label class="form-check-label">
				    	<input class="form-check-input gender" type="radio" name="gender" id="perempuan" value="Perempuan">Perempuan
			    	</label>
			    </div>
			    <div class="form-check form-check-inline">
			    	<label class="form-check-label">
				    	<input class="form-check-input gender" type="radio" name="gender" id="hmm....." value="Tidak Diketahui">hmm.....
			    	</label>
			    </div>
		  	</div>
		<?php  
		echo "<script>";
		echo "for(i = 0; i < 3; i++){";
		echo "if ($('.gender').eq(i).val() == '".$res->gender."'){";
		echo "$('.gender').eq(i).attr('checked', 'checked');";
		echo "}}";
		echo "</script>";

		$date = explode('-', $res->tanggal_lahir);
		$tanggal = $date[2];
		$bulan = $date[1];
		$tahun = $date[0];

		?>
		  <div class="form-group mt-4 add">
   	 		<label for="tanggal">Tanggal Lahir : </label>
   	 		<kbd class="bg-danger select-diubah ml-4">Diubah</kbd>
		    <div class="form-inline select-form mb-1 date-select">
	   	 		<div class="mt-1 tanggal_lahir"><?php echo $tanggal.'-'.$bulan.'-'.$tahun;?>
	   	 			<input type="hidden" id="tanggal_hidden" value="<?php echo $tanggal; ?>">
	   	 			<input type="hidden" id="bulan_hidden" value="<?php echo $bulan; ?>">
	   	 			<input type="hidden" id="tahun_hidden" value="<?php echo $tahun; ?>">

   	 				<button type="button" class="btn btn-primary ml-4 tanggal_lahir btn-sm" id="select-ubah">Ubah</button>
		   	 		<div class="ajax-date mt-2">
		   	 			 <select class="custom-select d-none" name="tanggal">
					    	<option value="<?php echo $tanggal; ?>" selected="selected"></option>
					    </select>
					    <select class="custom-select d-none" name="bulan">
					    	<option value="<?php echo $bulan; ?>" selected="selected"></option>
					    </select>
					    <select class="custom-select d-none" name="tahun">
					    	<option value="<?php echo $tahun; ?>" selected="selected"></option>
					    </select>
		   	 		</div>
			   	</div>
		    	<noscript><small id="noscript" class="form-text text-danger ml-4"><kbd>Javascript Enable Require!.</kbd></small></noscript>
		    </div>
		  </div>
		  <div class="form-group mt-4 add">
		    <label>PAS Foto</label >
		    <kbd class="bg-danger ml-1 diubah">Diubah</kbd>
		    <img src="<?php echo base_url(); ?>assets/uploads/<?php echo $res->foto; ?>" alt="pas foto" class="mt-1 d-block mb-1 pas-foto" width="92">
		    <button type="button" class="btn btn-primary btn-sm" id="ganti">Ganti Foto</button>
		    <input type="file" name="foto" size="25" class="form-control-file foto" id="foto" value="<?php echo base_url();?>/assets/uploads/<?php echo $res->foto;?>">
		    <button class="btn btn-primary btn-sm mt-1" id="batal-ganti">Batal Ganti Foto</button>

		    <div class="submit mt-4">
		    	<button type="button" class="btn btn-danger submit-btn mr-2" onclick="if(confirm('Reset All Data ?')){window.location.reload()}">Reset</button>
		    	<a href="<?php echo base_url(); ?>"><button type="button" class="btn btn-default submit-btn">Cancel</button></a>
		    	<button type="submit" class="btn btn-primary submit-btn ml-2" name="submit-btn">Save</button>
		    </div>
		  </div>
		  </div>
		</div>
	</form>
</div>

<!-- <script>
	window.onbeforeunload = function(){
		return 'Exit?';
	};
</script> -->


