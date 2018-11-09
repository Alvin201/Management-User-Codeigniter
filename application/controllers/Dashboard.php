<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends My_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('LoginModel');
		$this->load->model('AdminModel');	
		$this->load->model('GalleryModel');

		$assets = $this->assets();
		$_css = array($assets['css']['bootstrap'], $assets['css']['font_awesome'], $assets['css']['metis'], $assets['css']['sb_admin'], $assets['css']['dataTables'],);
		$_js_top = array($assets['js']['jquery'], $assets['js']['bootstrap']);
		$_js_bottom = array($assets['js']['dataTables'], $assets['js']['metis'], $assets['js']['sb_admin']);

		$this->data['asset_css'] = implode("\n", $_css);
		$this->data['asset_js_top'] = implode("\n", $_js_top);
		$this->data['asset_js_bottom'] = implode("\n", $_js_bottom);
			

	}

	function index()
	{
		if($this->session->userdata('user') === NULL){
	            redirect(site_url('dashboard/login'));
	        }
	
			$this->data['title'] = "Dashboard Admin";
			$this->data['header'] = "Dashboard";

			$this->data['body'] = $this->load->view('home/dashboard', $this->data, true);
			$this->load->view('templates/backend/header');
			$this->load->view('templates/backend/body', $this->data);
			$this->load->view('templates/backend/footer');
	}

	function login()
	{
			$this->data['title'] = "Login Admin";
			$this->data['header'] = "Login Admin";

			$this->data['body'] = $this->load->view('login/index', $this->data, true);
			$this->load->view('templates/backend/header');
			$this->load->view('login/index', $this->data);
			$this->load->view('templates/backend/footer');
	}

	function validate()
        {
            $this->LoginModel->validate();
    
            if($this->form_validation->run() == FALSE)
            {
                //$this->load->view('login');
                $output['error'] = true;
				$output['message'] = 'required';
            }
            else
            {
                $where = array(
						'username' => $this->input->post('username'),
						'password' => md5($this->input->post('password'))
				);
				$model = $this->LoginModel->findAll($where);
				$count = sizeof($model);

			if($count === 1){
					$session = [];

					foreach ($model as $key => $value) {
						$session['id_admin'] = $value->id_admin;        
						$session['username'] = $value->username; 
						$session['password'] = $value->password;
						$session['idrole'] = $value->idrole; 
						$session['namerole'] = $value->namerole; 
					}
                $data = $this->LoginModel->findAll($where);
             
	              if($data){
	                $this->session->set_userdata('user', $session);
					$output['message'] = 'Logging in. Please wait...';
	                } 
            }
	              else{
	                 $output['error'] = true;
					 $output['message'] = 'Login Invalid';  
	                }
            }
            echo json_encode($output); 
        
        }

	function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url('dashboard/login'));
	}
	//==================================================================================================================================================//
	function contactadmin()
	{
		if($this->session->userdata('user') === NULL){
	            redirect(site_url('dashboard/login'));
	        }

		$models = (new AdminModel)->findAll();

		$this->data['title'] = "Master Data";
		$this->data['header'] = "Master Data";

		$this->data['models'] = $models;
		$this->data['body'] = $this->load->view('contact/_tablecontact', $this->data, true);
		$this->load->view('templates/backend/header');
		$this->load->view('templates/backend/body', $this->data);
		$this->load->view('templates/backend/footer');
	}

	function editadmin($id = false)
	{
		if($this->session->userdata('user') === NULL){
	            redirect(site_url('dashboard/login'));
	        }
	        
		$model = new AdminModel;
		if($id){
			$model = $model->findOne(array('id_admin'=>$id));
		}
		
		$role = $this->LoginModel->findAllRole(); //combo
		$this->data['role'] = $role; //combo

		$this->data['title'] = "Form Data Admin";
		$this->data['header'] = "Data Admin";
		$this->data['model'] = $model;

		if($this->input->is_ajax_request()){
			$this->data['ajax'] = true;
			die($this->load->view('contact/_form', $this->data, true));
		}

		$this->data['body'] = $this->load->view('contact/input', $this->data, true);
		$this->load->view('templates/backend/header');
		$this->load->view('templates/backend/body', $this->data);
		$this->load->view('templates/backend/footer');
	}

	function saveedit()
	{
		$output = array('error'=>false, 'msg'=>null);
		$created_at = date('Y-m-d H:i:s');
		$admin = new AdminModel;
		$admin->id_admin = $this->input->post('id_admin');
		$admin->username = $this->input->post('username');
		$admin->password = md5($this->input->post('password'));
		$admin->email = $this->input->post('email');
		$admin->updated_at = $created_at;
		$admin->created_at = $created_at;
		$admin->idrole = $this->input->post('idrole');

		$admin->validate();
		if(!$this->form_validation->run()){
			$msg = validation_errors('<div role="alert" class="alert alert-danger alert-dismissible fade in"> <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>','</div>');

			if($this->input->is_ajax_request()){
				$output['error'] = true;
				$output['msg'] = $msg;
				return $this->output
				            ->set_content_type('application/json')
				            ->set_output(json_encode($output, 128));
			}

			$this->session->set_flashdata('msg', $msg);
			redirect(site_url('dashboard/editadmin/'.$admin->id_admin));
		}

		$save = $admin->save();
		if($this->input->is_ajax_request()){
			$output['msg'] = '<div role="alert" class="alert alert-success alert-dismissible fade in"> <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button> Success.</div>';
			return $this->output
			            ->set_content_type('application/json')
			            ->set_output(json_encode($output, 128));
		}

		redirect(site_url('dashboard/contactadmin'));
	}

	//==================================================================================================================================================//
	function gallery()
	{
		if($this->session->userdata('user') === NULL){
	            redirect(site_url('dashboard/login'));
	        }

		
		$this->data['title'] = "Master Data Gallery";
		$this->data['header'] = "Data Gallery";

        $this->data['general'] = $this->GalleryModel->findAll();   //isi konten

		$this->data['body'] = $this->load->view('gallery/_tablegallery', $this->data, true);
		$this->load->view('templates/backend/header');
		$this->load->view('templates/backend/body', $this->data);
		$this->load->view('templates/backend/footer');
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	function inputgallery($id = false)
	{
		if($this->session->userdata('user') === NULL){
	            redirect(site_url('dashboard/login'));
	        }

		$general = new GalleryModel;

		if($id){
			$general = $general->findOne(array('id_gallery'=>$id));
		}

		// echo "<pre>";
		// var_dump($users);
		// echo "</pre>";
		// die();

		$this->data['general'] = $general;
		$this->data['title'] = 'Input Data Gallery';
		$this->data['header'] = "Data Gallery";
		
    
		$this->data['body'] = $this->load->view('gallery/_form', $this->data, true);
		$this->load->view('templates/backend/header');
		$this->load->view('templates/backend/body', $this->data);
		$this->load->view('templates/backend/footer');
	}

		function savegallery()
	{
		$foto= $this->input->post('foto');
		$description = $this->input->post('description');
		$id_gallery = $this->input->post('id_gallery');


		$this->GalleryModel->validate();

		if ($_FILES['foto']['error'] <> 4) {

		if ($this->form_validation->run() == FALSE){
			$msg = validation_errors();
			$this->session->set_flashdata('msg', $msg);
			redirect(site_url('dashboard/inputgallery'));
		}
		else 
		    
		    $config['upload_path'] = './upload/general/';
		    $config['allowed_types']        = 'gif|jpg|jpeg|png';
			$config['max_size']             = 100000;
			$config['encrypt_name'] = TRUE;
			$config['remove_spaces'] = TRUE;
			
			$this->upload->initialize($config);
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload('foto')){
				//$this->session->set_flashdata('msg',  $this->upload->display_errors());
				$this->session->set_flashdata('error',  $this->upload->display_errors());
				redirect(site_url('dashboard/inputgallery'.$id));
			}

			else{
				$file_data = $this->upload->data();
		        $foto= 'upload/general/'.$file_data['file_name'];
				
			}

		} else {
		        // jika file kosong lakukan sesuatu disini
		        // bisa mengupdate database tanpa mengupdate gambar
		        // atau melakukan sesuatu yang lain
		        echo '<h4>Jika tidak ada gambar tampilkan judul saja</h4>';
		        echo $this->input->post('description');
		    }
		    
			$general = new GalleryModel;
			$general->id_gallery = $id_gallery;
			$general->foto = $foto;
			$general->description = $description;
			$general->save($general);

			$this->session->set_flashdata('msg', $this->errMsg());
			redirect(site_url('dashboard/gallery'));
		}

		 /*echo "<pre>";
		 var_dump($testimonial);
		 echo "<pre>";
		 die();*/

		 public function deletegallery($id_gallery){
			$this->GalleryModel->delete($id_gallery);
			redirect(site_url('dashboard/gallery')); 
		} 
		 //==================================================================================================================================================//

        function changeprofile(){	
        if($this->session->userdata('user') === NULL){
	            redirect(site_url('dashboard/login'));
	        }

		$this->data['title'] = "Change Profile";
		$this->data['header'] = "Change Profile";

	
		$this->data['body'] = $this->load->view('home/profile', $this->data, true);
		$this->load->view('templates/backend/header');
		$this->load->view('templates/backend/body', $this->data);
		$this->load->view('templates/backend/footer'); 
		
	}
    
    function updateprofile()
	{	
		$this->LoginModel->validate();

    	
    	$username = $this->input->post('username');
    	$password = $this->input->post('password');
    
	  	 if ($this->form_validation->run() == FALSE){
			$msg = validation_errors();
			$this->session->set_flashdata('msg', $msg);
			redirect(site_url('dashboard/changeprofile'));	    
	     }else{
				
				$data = array(
						'username' => $username,
						'password' => md5($password)
				);
   
    	$this->LoginModel->update($data,'ac_admin');
    	$this->session->set_userdata($data);

		$this->session->set_flashdata('msg', $this->errMsg());
		redirect('dashboard/changeprofile');
		}
    }


}