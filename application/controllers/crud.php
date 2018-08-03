<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Crud extends CI_Controller{
	public function index(){
		$this->load->view('header');
		$this->load->model('Crud_model');
		$this->model = $this->Crud_model;
		$this->load->library('pagination');
		$params = [];
		isset($_GET['search']) ? $this->model->search = $_GET['search']: '';

		$start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$get_total = $this->model->get($this->model->get_total(), $start_index);
		$total_records = $get_total ? count($get_total) : FALSE ;

		$params['get'] = $this->model->get($total_records, 0);
		if(!isset($_GET['search']) or $_GET['search'] == NULL){
			if ($total_records > 0){
				$config = [
					'base_url'=>base_url().'crud/index',
					'uri_segment'=>3,
					'per_page'=>5,
					'total_rows'=>$total_records,
					'full_tag_open'=>'<nav><ul class="pagination d-flex justify-content-center mt-4"><li class="page-item">',
					'full_tag_close'=>'</li></ul></nav>',
					'first_tag_open'=>'<li class="page-item">',
					'first_tag_close'=>'</li>',
					'last_tag_open'=>'<li class="page-item">',
					'last_tag_close'=>'</li>',
					'prev_tag_open'=>'<li class="page-item">',
					'prev_tag_close'=>'</li>',
					'next_tag_open'=>'<li class="page-item">',
					'next_tag_close'=>'</li>',
					'num_tag_open'=>'<li class="page-item">',
					'num_tag_close'=>'</li>',
					'cur_tag_open'=>'<li class="page-item active"><a>',
					'cur_tag_close'=>'</a><span class="sr-only">(current)</span></li>'
				];

				$params['get'] = $this->model->get($config['per_page'], $start_index);
				$this->pagination->initialize($config);
				$params['links'] = $this->pagination->create_links();
			}
		}
		$this->load->view('form_view.php', $params);

		$this->load->view('footer');
	}
	public function add(){
		if (isset($_POST['submit-btn'])){
			$this->load->model('Crud_model');
			$add = $this->Crud_model;

			$config = [
				'upload_path'=> './assets/uploads',
				'allowed_types'=>'jpg|png|jpeg|png|gif',
				'max_size'=>'20000'];
			$this->load->library('upload', $config);
			$add->nama = $_POST['nama'];
			$add->nisn = $_POST['nisn'];
			$add->jurusan = $_POST['jurusan'];	
			$add->tanggal_lahir = $_POST['tahun'].'-'.$_POST['bulan'].'-'.$_POST['tanggal'];
			$add->gender = $_POST['gender'];
			$add->asal_sekolah = strtoupper($_POST['asal_sekolah']);
			$add->kelas = strtoupper($_POST['kelas']);
			$add->tanggal_ditambahkan = $_POST['tanggal_ditambahkan'];

			if($this->upload->do_upload('foto')){
				$add->foto = $this->upload->file_name;
				$add->insert();
				$this->load->view('upload', ['foto'=>$this->upload->data()]);
				echo "<script>";
				echo "alert('Berhasil Ditambahkan');";
				echo "</script>";
				redirect(base_url().'crud', 'refresh');
			}else{
				$this->load->view('header');
				$this->load->view('index.php');
				$this->load->view('footer');
			}
		}else{
			$this->load->view('header');
			$this->load->view('index.php');
			$this->load->view('footer');	
		}

		
	}
	public function delete($id){
		$this->load->view('header');

		$this->load->model('Crud_model');
		$model = $this->Crud_model;
		$model->delete($id);

		redirect(base_url().'crud', 'refresh');

		$this->load->view('footer');
	}
	public function update($id){
		$this->load->view('header');
		$this->load->model('Crud_model');
		$get = $this->Crud_model->get_update($id);
		$this->load->view('update.php', ['get'=>$get]);

		
		if (isset($_POST['submit-btn'])){
			$this->load->model('Crud_model');
			$get = $this->Crud_model;
			$get->bioID = $id;
			$get->nama = $_POST['nama'];
			$get->nisn = $_POST['nisn'];
			$get->asal_sekolah = strtoupper($_POST['asal_sekolah']);
			$get->kelas = strtoupper($_POST['kelas']);
			$get->jurusan = $_POST['jurusan'];
			$get->gender = $_POST['gender'];
			$get->tanggal_lahir = $_POST['tahun'].'-'.$_POST['bulan'].'-'.$_POST['tanggal'];
			$get->tanggal_ditambahkan = $_POST['tanggal_ditambahkan'];
			$get->tanggal_diubah = $_POST['tanggal_diubah'];

			$config = [
				'upload_path'=> './assets/uploads',
				'allowed_types'=>'jpg|png|jpeg|png|gif',
				'max_size'=>'20000'];
			$this->load->library('upload', $config);
			if($this->upload->do_upload('foto')){
				$get->foto = $this->upload->file_name;
			}

			$get->set_update($id);
				
			echo "<script>";
			echo "alert('All Changes Saved For : ".$get->bioID." ".$get->nama."');";
			echo "</script>";
			redirect(base_url('crud'), 'refresh');
		}
		$this->load->view('footer');
	}
	public function search(){
		$this->load->view('header');

		$this->load->model('Crud_model');
		$get = $this->Crud_model;
		$get->search = $_GET['search'];
		$this->load->view('form_view', ['get'=>$get->search()]);

		$this->load->view('footer');
	}
	public function get_read($id){
		$this->load->view('header');
		$this->load->model('Crud_model');
		$get = $this->Crud_model;
		$this->load->view('read', ['get'=>$get->get_read($id)]);

		$this->load->view('footer');
	}
}


// nama file : crud.php
// lokasi file : application/controllers/crud.php