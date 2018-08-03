<?php foreach($get->result() as $res); ?>

<div class="container">
	<h2 class="mt-4 mb-4 read-h2">Biodata Mahasiswa</h2>
</div>
<img class="read-img mt-4" src="<?php echo base_url(); ?>assets/uploads/<?php echo $res->foto; ?>" alt="pas foto">
<div class="container read-container">
	<div class="row">
		<div class="col-md-4 col-sm-6 col">
			<p class="head">Nama</p>
			<p class="head">NISN</p>
			<p class="head">Jurusan</p>
			<p class="head">Tanggal Lahir</p>
			<p class="head">Jenis Kelamin</p>
			<p class="head">Asal Sekolah</p>
			<p class="head">Kelas</p>
			<a href="<?php echo base_url(); ?>"><button class="btn btn-danger mt-4">Back</button></a>
		</div>
		<div class="col-md-8 col-sm-6 col">
			<p>: <?php echo $res->nama; ?></p>
			<p>: <?php echo $res->nisn; ?></p>
			<p>: <?php echo $res->jurusan; ?></p>
			<p>: <?php echo date('d-m-Y', strtotime($res->tanggal_lahir)); ?></p>
			<p>: <?php echo $res->gender; ?></p>
			<p>: <?php echo $res->asal_sekolah; ?></p>
			<p>: <?php echo $res->kelas; ?></p>
		</div>
	</div>
</div>




<!-- lokasi file : application/views/read.php -->