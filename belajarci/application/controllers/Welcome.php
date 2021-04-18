<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $this->load->view('login'); 
        $this->session->unset_userdata('level');
	}
    public function cek_login(){
    	$data = $this->model->getAdmin();

    	$user = $_POST['username'];
    	$pass = $_POST['password'];
    	$temp = 0;
        $level = 0;
    	
    	foreach ($data as $d) {
            if($d['username']==$user && $d['password']==$pass)
    		{
    			$temp = 1;
                $level = $d['level'];
    		}
    	}
    	if($temp==1){
            $this->session->set_userdata('level',$level);
            echo $this->session->userdata('level');
            $this->load->view('admin');
            $this->load->view('dashboard');
        }            
    	else{
    		 echo "<SCRIPT>alert('Usename atau Password Salah');window.location='../belajarci'</SCRIPT>";
    	}
    }
    public function dashboard(){
        $this->load->view('admin');
        $this->load->view('dashboard');
    }
    public function data_admin(){
        if ($this->session->userdata('level')==NULL){
             echo "<SCRIPT>alert('Kamu Harus Login');window.location='../belajarci'</SCRIPT>";
        }else
        {
            $data = $this->model->getAdmin();
        	$this->load->view('admin');
        	$this->load->view('data_admin',array('data'=>$data));
        }
    }

    public function admin_edit($id){
        if ($this->session->userdata('level')==NULL){
            echo "<SCRIPT>alert('Kamu Harus Login');window.location='../belajarci'</SCRIPT>";
        }else
        {
            $data = $this->model->getAdminById($id);
            if($this->session->userdata('level')<=$data['level'])
            {
                $this->load->view('admin');
                $this->load->view('user_edit',array('data'=>$data));
            }else
            {
                echo "<SCRIPT>alert('Level Kurang');window.location='../data_admin'</SCRIPT>";
            }
        }
    }
    public function admin_delete($id){
        $delete = $this->model->deleteAdmin($id);
        redirect(base_url('data_admin'));
    }
    public function admin_tambah(){
         if ($this->session->userdata('level')==NULL){
            echo "<SCRIPT>alert('Kamu Harus Login');window.location='../belajarci'</SCRIPT>";
        }else
        {
            $this->load->view('admin');
            $this->load->view('tambah_admin');
        }
    }
    public function act_admin_tambah(){
        $this->model->tambahAdmin(array(
            "username" => $_POST[username],
            "password" => $_POST[password],
            "level" => $_POST[level],
            'X-API-KEY' =>'wpu123'
        ));
        redirect(base_url('data_admin'));
    }
    public function act_admin_edit(){
        $this->model->editAdmin(array(
            "id" => $_POST[id],
            "username" => $_POST[username],
            "password" => $_POST[password],
            "level" => $_POST[level],
            'X-API-KEY' =>'wpu123'
        ));
        redirect(base_url('data_admin'));
    }
	
}
