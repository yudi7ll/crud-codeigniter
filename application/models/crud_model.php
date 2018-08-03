<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Crud_model extends CI_Model {
	public $bioID;
	public $foto;
	public $nama;
	public $jurusan;
	public $asal_sekolah;
	public $kelas;
	public $nisn;
	public $tanggal_lahir;
	public $gender;
	public $tanggal_ditambahkan;
	public $tanggal_diubah;
	public $search;
	
	public function get($limit, $start){
		$this->db->limit($limit, $start);
	
		$this->db->like('nama', $this->search);
		$this->db->or_like('nisn', $this->search);
		$this->db->or_like('jurusan', $this->search);	
				
		$query = $this->db->get('bio');

		if($query->num_rows() > 0){
			foreach($query->result() as $row){
				$data[] = $row;
			}
			return $data;
		}else{
			return FALSE;
		}
	}
	public function get_total(){
		return $this->db->count_all('bio'); 
	}
	public function insert(){
		$this->db->query('INSERT INTO bio VALUES("", 
									"'.$this->foto.'",
									"'.$this->nama.'",
									'.$this->nisn.',
									"'.$this->jurusan.'",
									"'.$this->tanggal_lahir.'",
									"'.$this->gender.'",
									"'.$this->asal_sekolah.'",
									"'.$this->kelas.'",
									"'.$this->tanggal_ditambahkan.'",
									"'.$this->tanggal_diubah.'")');
	}
	public function delete($id){
		$this->db->where('bioID', $id);
		$this->db->delete('bio');
		
	}
	public function get_update($id){
		$this->db->where('bioID', $id);
		return $this->db->get('bio');
	}
	public function set_update($id){
		if ($this->foto == '' or $this->foto == NULL){
			$query = "UPDATE bio SET 
						nama = '$this->nama', 
						jurusan = '$this->jurusan', 
						asal_sekolah = '$this->asal_sekolah', 
						kelas = '$this->kelas', 
						nisn = '$this->nisn', 
						tanggal_lahir = '$this->tanggal_lahir', 
						gender = '$this->gender', 
						tanggal_diubah = '$this->tanggal_diubah',
						tanggal_ditambahkan = '$this->tanggal_ditambahkan'
						WHERE bioID = $id";
			$this->db->query($query);
		}else{
			$this->db->where('bioID', $id);
			$this->db->update('bio', $this);
		}
		
	}
	public function search(){
		$this->db->like('nama', $this->search);
		$this->db->or_like('nisn', $this->search);
		$this->db->or_like('jurusan', $this->search);
		return $data = $this->db->get('bio');
	}
	public function get_read($id){
		$this->db->where('bioID', $id);
		return $this->db->get('bio');
	}
}