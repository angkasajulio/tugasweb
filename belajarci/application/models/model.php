<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;

class Model extends CI_Model {
    public function GetBerita(){
        $data = $this->db->query('select * from tb_berita');
        return $data->result_array();
    }

    public function getAdmin(){
        $client = new Client();

        $response = $client->request('GET','http://localhost/restapi/api/admin',[
            'auth'=>['angkasa','1234'],
            'query'=>[
                'X-API-KEY'=>'wpu123']
        ]);
        $result = json_decode($response->getBody()->getContents(), true);

         return $result['data'];
    }

    public function getAdminById($id){
        $client = new Client();

        $response = $client->request('GET','http://localhost/restapi/api/admin',[
            'auth'=>['angkasa','1234'],
            'query'=>[
                'X-API-KEY'=>'wpu123',
                'id' => $id]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);

         return $result['data'][0];
    }
    public function deleteAdmin($id){
        $client = new Client();

        $response = $client->request('DELETE','http://localhost/restapi/api/admin',[
            'auth'=>['angkasa','1234'],
            'form_params'=>[
                'X-API-KEY'=>'wpu123',
                'id' => $id]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);

         return $result;
    } 
    public function tambahAdmin($data){
        $client = new Client();

        $response = $client->request('POST','http://localhost/restapi/api/admin',[
            'auth'=>['angkasa','1234'],
            'form_params'=>$data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);

         return $result;
    }
    public function editAdmin($data){
        $client = new Client();

        $response = $client->request('PUT','http://localhost/restapi/api/admin',[
            'auth'=>['angkasa','1234'],
            'form_params'=>$data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);

         return $result;
    }

    public function InsertData($tabelName,$data){
        $res = $this->db->insert($tabelName,$data);
        return $res;
    }

    public function UpdateData($tabelName,$data,$where){
        $res = $this->db->update($tabelName,$data,$where);
        return $res;
    }

    public function DeleteData($tabelName,$where){
        $res = $this->db->delete($tabelName,$where);
        return $res;
    }

}
