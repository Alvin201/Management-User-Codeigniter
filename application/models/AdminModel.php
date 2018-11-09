<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * undocumented class
 *
 * @package default
 * @author 
 **/
class AdminModel extends CI_Model
{
	private $table_name = 'ac_admin';
	private $pkey = 'id_admin';
	public $id_admin, $username, $password,$email, $created_at, $updated_at,$idrole;

	function __construct()
	{
		parent::__construct();

	}

	function validate()
	{
		$this->form_validation->set_rules('username', 'Userame', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
	}


	private function _queryAll($where)
	{
		$this->db->select('*');
		if(sizeof($where)>0) $this->db->where($where);
		return $this->db->get($this->table_name);
	}

	function findAll($where = array())
	{
		$model = $this->_queryAll($where);
		return $model->result('AdminModel');
	}


	function findOne($where = array())
	{
		if(!empty($this->id_admin)) $where['id_admin'] = $this->id_admin;
		
		$model = $this->_queryAll($where);

		return $model->row(0, 'AdminModel');
	}

	function save()
	{
		if(empty($this->id_admin)){
			$this->db->insert($this->table_name, $this);
			$this->id_admin = $this->db->insert_id();
		}else{
			$this->db
				 ->set('username', $this->username)
				 ->set('password', $this->password)
				 ->set('email', $this->email)
				 ->set('updated_at', $this->updated_at)
				  ->set('idrole', $this->idrole)
				 ->where(array($this->pkey=>$this->id_admin))
				 ->update($this->table_name);
		}

		return $this->{$this->pkey};
	}
} // END class 