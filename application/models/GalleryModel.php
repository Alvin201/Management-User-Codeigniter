<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * undocumented class
 *
 * @package default
 * @author 
 **/
class GalleryModel extends CI_Model
{
	private $table_name = 'ac_gallery';
	private $pkey = 'id_gallery';
	public $id_gallery, $foto, $description;

	function __construct()
	{
		parent::__construct();

	}

	function validate()
	{
		$this->form_validation->set_rules('description', 'Description', 'required');
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
		return $model->result('GalleryModel');
	}


	function findOne($where = array())
	{
		if(!empty($this->id_gallery)) $where['id_gallery'] = $this->id_gallery;
		
		$model = $this->_queryAll($where);

		return $model->row(0, 'GalleryModel');
	}

	function save()
	{
		if(empty($this->id_gallery)){
			$this->db->insert($this->table_name, $this);
			$this->id_gallery = $this->db->insert_id();
		}else{
			$this->db
				 ->set('foto', $this->foto)
				 ->set('description', $this->description)
				 ->where(array($this->pkey=>$this->id_gallery))
				 ->update($this->table_name);
		}

		return $this->{$this->pkey};
	}

	function delete($id_gallery){ //fungsi delete berdasarkan id
    $this->db->where('id_gallery',$id_gallery); //pencocokan id, dimana id_transaksi == inputan $id_transaksi
    $this->db->delete($this->table_name); //eksekusi
    return;
    }

    

} // END class 