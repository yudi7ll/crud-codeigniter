<?php  
isset($_GET['search']) ? $search_bar = $_GET['search'] : $search_bar = "";
!isset($links) ? $links = '' : '';

?>
<div class="container">
	<div class="d-flex justify-content-between">
		<a class="btn btn-primary mt-4 mb-4" href="<?php echo base_url(); ?>crud/add">Add</a>
<?php 
	if ($search_bar != ''){
		echo "<p class='mt-4 mb-4 pt-2 text-info'>Result for : ".$search_bar."</p>";
}?>
		 <form action="http://localhost/danger/ci_1/index.php/crud" method="GET" class="search-form form-inline my-2 my-lg-0">
		 <button class="text-secondary font-weight-bold clear-search btn" type="submit" style="position: relative; right: -195px; cursor: pointer; background: none;" onclick="$(this).parent().find('.search').val('');">X</button>
	      <input class="form-control mr-sm-2 search" name="search" type="search" placeholder="Search..." aria-label="Search" value="<?php echo $search_bar; ?>" autofocus="autofocus">
	      <button class="btn btn-outline-success my-2 my-sm-0 search-btn" type="submit">Search</button>
	    </form>	
	</div>
<ajax>
	<table class="table table-striped">
	  <thead>
	    <tr>
	      <th scope="col">NO.</th>
	      <th scope="col">ID</th>
	      <th scope="col">Nama</th>
	      <th scope="col">NISN</th>
	      <th scope="col">Jurusan</th>
	      <th scope="col">Aksi</th>
	    </tr>
	  </thead>
	  <tbody class="view-tbody">
<?php if($get): ?>
	<?php $no = 1; ?>
	<?php foreach($get as $res) : ?>
	    <tr>
	      <th scope="row"><?php echo $no; ?></th>
	      <td><?php echo $res->bioID; ?></td>
	      <td><a class="text-white" href="<?php echo base_url(); ?>crud/get_read/<?php echo $res->bioID; ?>"><?php echo $res->nama; ?></a></td>
	      <td><?php echo $res->nisn; ?></td>
	      <td><?php echo $res->jurusan; ?></td>
	      <th>
	      		<a class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>crud/delete/<?php echo $res->bioID; ?>" onclick="return confirm('Are you sure ?')">Delete</a> | 
				<a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>crud/update/<?php echo $res->bioID; ?>">Edit</a>
	      </th>
	    </tr>
	
	<?php $no++; ?>
	<?php endforeach; ?>
<?php endif; ?>
	  </tbody>
	</table>
<?php  
	if (!$get){
		echo "<h3 class='text-center text-danger'>";
		echo "No Match Result";
		echo "</h3>";
	}
?>	


<?php echo $links; ?>	
</div>

<script>
$('ul.pagination li a').addClass('page-link');
$('ul.pagination .open a').addClass('active');
</script>