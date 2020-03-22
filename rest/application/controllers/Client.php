<?php
Class Client extends CI_Controller{
    
    private $_client;
    function __construct() {
        parent::__construct();
    }
    
    // menampilkan data mahasiswa
    function index(){
        // Create a client with a base URI
        $client = new GuzzleHttp\Client();
        // Send a request to https://foo.com/api/test
        $response = $client->request('GET', 'https://kahf13.000webhostapp.com/rest-api');
        $data['data'] = json_decode($response->getBody()->getContents());
        $this->load->view('crud/list',$data);
    }
    public function add()
    {
        $this->load->view('crud/add');
    }
    // insert data mahasiswa
    function create(){
        // Create a client with a base URI
        $client = new GuzzleHttp\Client();
        // Send a request to https://foo.com/api/test
        $response = $client->request('POST', 'https://kahf13.000webhostapp.com/rest-api',[
            'form_params' => [
                'nim'=>$this->input->post('nim'),
                'nama'=>$this->input->post('nama'),
                'prodi'=>$this->input->post('prodi')
            ]
        ]);
        // echo $response->getBody()->getContents();
        return redirect(base_url('client'),'refresh');
    }
    
    // edit data mahasiswa
    function edit($id){
        // Create a client with a base URI
        $client = new GuzzleHttp\Client();
        // Send a request to https://foo.com/api/test
        $response = $client->request('GET', 'https://kahf13.000webhostapp.com/rest-api',[
            'query' => [
                'nim'=>$id
            ]
        ]);
        $data['data'] = json_decode($response->getBody()->getContents())[0];

        $this->load->view('crud/edit',$data);
    }
    
    public function update()
    {
        // Create a client with a base URI
        $client = new GuzzleHttp\Client();
        // Send a request to https://foo.com/api/test
        $response = $client->request('PUT', 'https://kahf13.000webhostapp.com/rest-api',[
            'json' => [
                'nim'=>$this->input->post('nim'),
                'nama'=>$this->input->post('nama'),
                'prodi'=>$this->input->post('prodi'),
            ]
        ]);
        // echo $response->getBody()->getContents();
        return redirect(base_url('client'),'refresh');
    }
    
    // delete data mahasiswa
    function delete($id){
        // Create a client with a base URI
        $client = new GuzzleHttp\Client();
        // Send a request to https://foo.com/api/test
        $response = $client->request('DELETE', 'https://kahf13.000webhostapp.com/rest-api',[
            'form_params' => [
                'nim'=>$id,
            ]
        ]);
        // echo $response->getBody()->getContents();
        return redirect(base_url('client'),'refresh');
    }
}