<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ProductController extends Controller {

    public function __construct() {
        parent::__construct();
        
        $this->call->library('session');
        $this->call->helper('url');
        
        if (!$this->session->has_userdata('logged_in')) {
            redirect('auth/login');
        }

        $this->call->model('Product_model');
    }

    public function index($id = null) {
        $data['products'] = $this->Product_model->get_all();
        
        if ($id !== null) {
            $data['product'] = $this->Product_model->get_by_id($id);
        }

        $this->call->view('products/index', $data);
    }

    public function store() {
        $data = [
            'product_name' => $this->io->post('product_name'),
            'description'  => $this->io->post('description'),
            'price'        => $this->io->post('price'),
            'quantity'     => $this->io->post('quantity') // o 'stock' depende sa tawag sa DB mo
        ];
        
        $this->Product_model->insert($data);
        redirect('products');
    }

    public function edit($id) {
        $this->index($id);
    }

    public function update($id) {
        $data = [
            'product_name' => $this->io->post('product_name'),
            'description'  => $this->io->post('description'),
            'price'        => $this->io->post('price'),
            'quantity'     => $this->io->post('quantity') // o 'stock' depende sa tawag sa DB mo
        ];

        $this->Product_model->update($id, $data);
        redirect('products');
    }

    public function delete($id) {
        $this->Product_model->delete($id);
        redirect('products');
    }
}