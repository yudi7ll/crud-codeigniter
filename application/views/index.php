<noscript>
	<small id="noscript" class="form-text text-danger text-center">
		<h4 class="pt-3 pb-0"><kbd>Very Important!</kbd></h4>
		<kbd>Please Enable Javascript To Input Date!.</kbd>
	</small>
</noscript>
<div class="container mt-4 mb-4">
	<h2>Insert Data</h2>
	<?php echo form_open_multipart(base_url().'crud/add'); ?>
	<?php echo form_hidden('tanggal_ditambahkan', gmdate('Y-m-d H:i:s', time()+3600*8)); ?>
	<?php echo form_hidden('tanggal_diubah', gmdate('Y-m-d H:i:s', time()+3600*8)); ?>
		<div class="row">
		  <div class="form-group col-lg-6 add">
		    <label for="nama">Nama Lengkap</label>
		    <input type="text" name="nama" class="form-control" id="nama" autocomplete="off" placeholder="Masukkan Nama Lengkap" autofocus="autofocus">
		  
		  <div class="form-group add mt-3">
		    <label for="nisn">NISN</label>
		    <input type="text" name="nisn" class="form-control" id="nisn" autocomplete="off" placeholder="Masukkan NISN">
		  </div>
		  <div class="form-group add">
		  		<label for="asal">Asal Sekolah</label>
		   		<input type="text" name="asal_sekolah" class="form-control" id="asal" autocomplete="off" placeholder="Masukkan Asal Sekolah">
		  </div>
			<div class="form-group add">
				<label for="kelas">Kelas</label>
		    	<input type="text" name="kelas" class="form-control" id="kelas" autocomplete="off" placeholder="Masukkan Kelas">
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
		  
		  <div class="form-group">
		   		<div class="form-group mb-1 mt-3 add">
			  		<label for="gender">Jenis Kelamin :</label>
			  	</div>
				<div class="form-check form-check-inline">
				  	<label class="form-check-label">
				    	<input class="form-check-input" type="radio" name="gender" id="pria" value="Laki - Laki">Laki - Laki
			    	</label>
			    </div>
			    <div class="form-check form-check-inline">
			    	<label class="form-check-label">
				    	<input class="form-check-input" type="radio" name="gender" id="perempuan" value="Perempuan">Perempuan
			    	</label>
			    </div>
			    <div class="form-check form-check-inline">
			    	<label class="form-check-label">
				    	<input class="form-check-input" type="radio" name="gender" id="hmm....." value="Tidak Diketahui">hmm.....
			    	</label>
			    </div>
		  	</div>
		  <div class="form-group mt-4 add">
   	 		<label for="tanggal">Tanggal Lahir : </label>
		    <div class="form-inline select-form">
			    <select class="custom-select" name="tanggal" id="tanggal"></select>
			    <select class="custom-select" name="bulan" id="bulan"></select>
			    <select class="custom-select" name="tahun" id="tahun"></select>	
		    	<noscript><small id="noscript" class="form-text text-danger ml-4"><kbd>Javascript Enable Require!.</kbd></small></noscript>
		    </div>
		  </div>
		  <div class="form-group mt-4 add">
		    <label for="foto">PAS Foto</label>
		    <input type="file" name="foto" size="25" class="form-control-file" id="foto">
		    <div class="submit mt-4">
		    	<a href="<?php echo base_url(); ?>" onclick="return confirm('Are you sure want to quit?')"><button type="button" class="btn btn-default submit-btn">Cancel</button></a>
		    	<button type="submit" class="btn btn-primary submit-btn ml-2" name="submit-btn">Submit</button>
		    </div>
		  </div>
		  </div>
		</div>
	</form>
</div>