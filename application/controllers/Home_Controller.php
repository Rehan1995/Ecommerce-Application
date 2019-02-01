<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('AdminCategory_Model');
		$this->load->model('AdminBook_Model');
		$this->load->model('ProductsDisplay_Model');
	}


	public function index()
	{
		if (!$this->session->has_userdata('id')) {
			$this->generateVisitor();
		}


		$data = array();
		$data['categories'] = $this->AdminCategory_Model->getAllCategories();
		$config['base_url'] = base_url('/Home_Controller/index');
		$config['total_rows'] = $this->AdminBook_Model->getBooksCount();
		$config['per_page'] = 8;
		$config['uri_segment'] = 3;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['attributes'] = array('class' => 'page-link');
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->pagination->initialize($config);

		$data['links'] = $this->pagination->create_links();
		$data['books'] = $this->AdminBook_Model->getBooksPagination($config["per_page"], $page);
		if (!$this->session->has_userdata('id')) {
			$this->generateVisitor();
		}
		$this->load->view('Product_Home', $data);

	}

	public function displayData()
	{
		$this->load->model('ProductsDisplay_Model');
		$data_Array["display_data"] = $this->ProductsDisplay_Model->getProducts();
		$this->load->view('Product_Home', $data_Array);
	}

	public function category()
	{
		$id = $this->uri->segment(3);

		$config['base_url'] = base_url('/Home_Controller/category/' . $id);
		$config['total_rows'] = $this->AdminBook_Model->getBooksCountByCat($id);
		$config['per_page'] = 4;
		$config['uri_segment'] = 4;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['attributes'] = array('class' => 'page-link');
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();
		$data['books'] = $this->ProductsDisplay_Model->getBooksByCategories($config["per_page"], $page, $id);
		$data['categories'] = $this->AdminCategory_Model->getAllCategories();
		//$this->load->view('parts/header');
		$this->load->view('Product_Home', $data);
	}

	private function generateVisitor()
	{
		$user = array(
			"id" => uniqid(),
			"type" => "visitor",
			"books" => array()
		);
		$this->session->set_userdata($user);
	}

	public function addCart()
	{
		$data = array(
			"id" => $this->input->post('id'),
			"qty" => $this->input->post('qty'),
			"price" => $this->input->post('price'),
			"name" => $this->input->post('title'),
			"image" => $this->input->post('image'),
		);

		$this->cart->insert($data);
		$this->session->set_flashdata('cartMsg', 'Added to the cart ');
		redirect('/Home_Controller', 'refresh');
	}

	public function sessionDestroy()
	{
		$this->session->sess_destroy();
	}
	private function getViewedBooksByUser()
	{
		$userId = $this->session->id;
		$results = $this->TrackingModel->getViewedBooksByUser($userId);
		$books = array();
		foreach ($results as $result){
			array_push($books,$this->bookModel->getBookById($result['book_id']));
		}
		return $books;
	}

	private function getMostViewedByBook($id)
	{
		$results = $this->TrackingModel->getMostViewedByBook($id);
		$books = array();
		//var_dump($results);
		foreach ($results as $result){

			array_push($books,$this->bookModel->getBookById($result->book_id));
		}
		return $books;
	}
}


