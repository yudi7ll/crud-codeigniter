<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller{
	public function date(){
		echo $this->load->view('ajax/date.php',[], TRUE);
	}
}


// nama file : ajax.php
// lokasi file : application/controllers/ajax.php