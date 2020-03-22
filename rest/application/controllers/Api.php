<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use chriskacerguis\RestServer\RestController;
class Api extends RestController {

	function __construct()
    {
        // Construct the parent class
        parent:: __construct();
	}
	public function index_get(){
		// testing response
		$nim = $this->get('nim');
        if ($nim == '') {
            $kontak = $this->db->get('mahasiswa')->result();
        } else {
            $this->db->where('nim', $nim);
            $kontak = $this->db->get('mahasiswa')->result();
        }
        $this->response($kontak, 200);
    }
    
    public function index_post()
    {
        $data = array(
            'nim'  => $this->post('nim'),
            'nama'  => $this->post('nama'),
            'prodi' => $this->post('prodi')
        );
        $insert = $this->db->insert('mahasiswa', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    public function index_put() {
        $nim = $this->put('nim');
        $data = array(
            'nim'  => $this->put('nim'),
            'nama'  => $this->put('nama'),
            'prodi' => $this->put('prodi')
        );
        $this->db->where('nim', $nim);
        $update = $this->db->update('mahasiswa', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    public function index_delete() {
        $id = $this->delete('nim');
        
        $this->db->where('nim', $id);
        $delete = $this->db->delete('mahasiswa');
        if ($delete) {
            $this->response(array('status' => 'success'.$id), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
