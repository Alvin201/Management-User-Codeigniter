<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('GalleryModel');	
	}

	public function index()
	{	
		// data
		$data = array();
		
		$data['general'] = $this->GalleryModel->findAll();   //isi konten
		// template
		$data['body'] = $this->load->view('gallery/index', $data, true);

		$this->load->view('templates/frontend/header');
		$this->load->view('templates/frontend/body', $data);
		$this->load->view('templates/frontend/footer');
		// template
	}
}

