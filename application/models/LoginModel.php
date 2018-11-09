<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model 
{
  private $table_name = 'ac_admin';
  private $pkey = 'id_admin';
  public $id_admin, $username, $password,$idrole;

  function __construct()
  {
    parent::__construct();

  }

  public function validate()
  {
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
  }

  function findAll($where = array())
  {
    $model = $this->_queryAll($where);
    return $model->result('LoginModel');
  }
  
  private function _queryAll($where)
  {
    $fields = 'ac_admin.id_admin as id_admin,,ac_admin.username as username,ac_admin.idrole as idrole, ac_admin.password as password,ac_role.idrole as idrole, ac_role.namerole as namerole';

    $this->db->select($fields);
    $this->db->join('ac_role', 'ac_admin.idrole = ac_role.idrole');
    
    if(sizeof($where)>0) $this->db->where($where);
    return $this->db->get($this->table_name);

  }

  function update($data) {
     extract($data);
     $this->db->where('id_admin', $this->session->userdata('id_admin'));
       $this->db->update($this->table_name, array('username' => $username,'password' => $password));

     return true;
  }

  function findAllRole() {
    return $this->db->get('ac_role')->result();
  }

}
