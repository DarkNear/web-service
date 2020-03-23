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
		$id = $this->get('id');
        if ($id == '') {
            $kontak = $this->db->get('panti')->result();
        } else {
            $this->db->where('id', $id);
            $kontak = $this->db->get('panti')->result();
        }
        $this->response($kontak, 200);
    }
    
    public function index_post()
    {
        $data = array(
            'id'  => $this->post('id'),
            'nama'  => $this->post('nama'),
            'alamat' => $this->post('alamat'),
            'telp' => $this->post('telp')
        );
        $insert = $this->db->insert('panti', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    public function index_put() {
        $nim = $this->put('id');
        $data = array(
            'id'  => $this->put('id'),
            'nama'  => $this->put('nama'),
            'alamat' => $this->put('alamat'),
            'telp' => $this->put('telp')
        );
        $this->db->where('id', $id);
        $update = $this->db->update('panti', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    public function index_delete() {
        $id = $this->delete('id');
        
        $this->db->where('id', $id);
        $delete = $this->db->delete('panti');
        if ($delete) {
            $this->response(array('status' => 'success'.$id), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
