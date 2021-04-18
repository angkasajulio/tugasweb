<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Admin extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model','admin');
	}

	public function index_get(){
		$id = $this->get('id');
		if($id === null){
			$admin = $this->admin->getAdmin();	
		} else{
			$admin = $this->admin->getAdmin($id);
		}
 		
		if($admin){
			$this->response([
                    'status' => true,
                    'data' => $admin
                ], REST_Controller::HTTP_OK);
		}else{
			$this->response([
                    'status' => false,
                    'message' => 'id not found'
                ], REST_Controller::HTTP_NOT_FOUND);
		}

	}

	public function index_delete(){
		$id = $this->delete('id');

		if($id===null){ 
			$this->response([
                    'status' => false,
                    'message' => 'provide id'
                ], REST_Controller::HTTP_BAD_REQUEST);
		} else{
			if($this->admin->deleteAdmin($id)>0){
				$this->response([
                    'status' => true,
                    'id' => $id,
                    'message'=>'deleted'
                ], REST_Controller::HTTP_NO_CONTENT);

			}else{
				$this->response([
                    'status' => false,
                    'message' => 'provide id'
                ], REST_Controller::HTTP_BAD_REQUEST);
			}
		}
	}

	public function index_post(){
		$data = [
			'username'=> $this->post('username'),
			'password'=> $this->post('password'),
			'level'=> $this->post('level')
		];

		if($this->admin->createAdmin($data)>0){
			$this->response([
                    'status' => true,
                    'message'=>'Tambah data berhasil'
                ], REST_Controller::HTTP_CREATED);

		}else
		{
			$this->response([
                    'status' => false,
                    'message'=>'Gagal menambahkan data'
                ], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	public function index_put(){
		$id = $this->put('id');
		$data = [
			'username'=> $this->put('username'),
			'password'=> $this->put('password'),
			'level'=> $this->put('level')
		];

		if($this->admin->updateAdmin($data,$id)>0){
			$this->response([
                    'status' => true,
                    'message'=>'Update data berhasil'
                ], REST_Controller::HTTP_NO_CONTENT);

		}else
		{
			$this->response([
                    'status' => false,
                    'message'=>'Gagal update data'
                ], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

}