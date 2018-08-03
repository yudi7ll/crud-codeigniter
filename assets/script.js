$(function(){

$(function(){ //tanggal
	$('#tanggal').append('<option selected>');
	$('#tanggal option').text('Tanggal');
	
	for(i = 0; i < 31; i++){
		$('#tanggal').append('<option>');
		$('#tanggal option').eq(i+1).text(i+1).val(i+1);
	}
	
	
});

$(function(){ //bulan
	var bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
	$('#bulan').append('<option selected>');
	$('#bulan option').text('Bulan');
	for(var i = 0; i < 12; i++){
		$('#bulan').append('<option>');
		$('#bulan option').eq(i+1).text(bulan[i]).attr('value', i+1);
	}
});

$(function(){ //tahun
	$('#tahun').append('<option selected>');
	$('#tahun option').text('Tahun');
	for(i = 2018; i > 1800; i--){
		$('#tahun').append('<option>');
		$('#tahun option').eq(2019-i).text(i);
	}
	if($('#tahun option').length < 2 && window.location['href'] == 'http://localhost/danger/ci_1/crud/add'){
		window.location.reload();
	}

});	

$(function(){

		// tanggal lahir
	$('#select-ubah').click(function(e){
		e.preventDefault();
		$('div.ajax-date').load('http://localhost/danger/ci_1/index.php/ajax/date');
		$(this).css("display", "none");
		$('.update .select-diubah').css('display', 'inline');
	});
	$('#select-batal').click(function(e){
		e.preventDefault();
		$('div.ajax-date').html('');
		$('#select-ubah').css('display', 'inline');
		$('.update .select-diubah').css('display', 'none');
		$('#tanggal_hidden').attr('name', 'tanggal');
		$('#bulan_hidden').attr('name', 'bulan');
		$('#tahun_hidden').attr('name', 'tahun');
	});

		// foto
	$('#ganti').click(function(e){
		e.preventDefault();
		$(this).css('display', 'none');
		$('.diubah').css('display', 'inline');
		$('#batal-ganti').css('display', 'inline');
		$('img.pas-foto').css('display', 'none');
		$('#foto').css('display', 'block').removeAttr('value');
	});
	$('#batal-ganti').click(function(e){
		e.preventDefault();
		$('.foto').val('').css('display', 'none');
		$('.diubah').css('display', 'none');
		$(this).css('display', 'none');
		$('#ganti').css('display', 'inline');
	});

});

$('.clear-search').on('click', function(){
	trigger('submit');
});

});