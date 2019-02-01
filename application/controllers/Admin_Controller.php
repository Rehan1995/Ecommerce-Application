<?php
/**
 * Created by IntelliJ IDEA.
 * User: Rehan Samarasekera
 * Date: 11/9/2018
 * Time: 5:56 PM
 */

class Admin_Controller extends CI_Controller
{


	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');

		if ($this->form_validation->run() == FALSE) {

			$this->load->view('adminViews/AdminLogin');

		} else {

			$this->load->model('AdminBehaviour_Model');
			$response = $this->AdminBehaviour_Model->getUser();

			if($response == true){



				$this->display_All_Books();
			}
			else{
				$this->session->set_flashdata('errmsg', 'Username or password might wrong');
				redirect('Admin_Controller/index');
			}

		}
	}

	public function addBookData()
	{
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('author', 'Author', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('price', 'Price', 'required');
		$this->form_validation->set_rules('category', 'Category', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->model('AdminCategory_Model');
			$data['displayCategories'] = $this->AdminCategory_Model->getAllCategories();
			$this->load->view('adminViews/AdminNewBook',$data);

		} else {
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 4096;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('image')) {
				$error = array('error' => $this->upload->display_errors());
				var_dump($error);
				$this->load->view('Book', $error);
			} else {
				$data = $this->upload->data();
				$data = array(
					'title' => $this->input->post('title', TRUE),
					'author' => $this->input->post('author', TRUE),
					'description' => $this->input->post('description', TRUE),
					'price' => $this->input->post('price', TRUE),
					'count' => 0,
					'image_url' => $data['file_name'],
					'category' => $this->input->post('category', TRUE)
				);

				$this->load->model('AdminBook_Model');
				$response = $this->AdminBook_Model->addBook($data);
				if ($response) {
					$this->session->set_flashdata('msg', "Book added successfully");
					redirect('Admin_Controller/display_All_Books');
				}
			}

		}
	}


	public function addCategory()
	{
		$category = array("name" => $this->input->post('category'));
		$this->load->model('AdminCategory_Model');
		$this->AdminCategory_Model->saveCategory($category);
		redirect('/Admin_Controller/showCategory');
	}

	public function showCategory()
	{
		$data = array();
		$this->load->model('AdminCategory_Model');
		$data["categories"] = $this->AdminCategory_Model->getAllCategories();
		$this->load->view('adminViews/AdminNewCategory', $data);
	}

	public function logout()
	{
		$session_items = array('username', 'password', 'is_logged');
		$this->session->unset_userdata($session_items);
		redirect('/Admin_Controller');
	}

	public function display_All_Books()
	{
		$this->load->model('AdminBehaviour_Model');
		$data['allBooks']=$this->AdminBehaviour_Model->getAllBooks();

		$this->load->view('adminViews/AdminHome',$data);

	}

	public function searchBook()
	{
		$this->load->model('AdminBook_Model');
		$data['searchResults'] = $this->AdminBook_Model->searchBook($this->input->post('search_name'));
		$this->load->view('adminViews/AdminSearchResults',$data );

	}

/*	public function books()
	{
		$this->load->model('AdminBook_Model');
		$this->data["books"] = $this->AdminBook_Model->getBookCategoryOne();
		$this->data["sumView"] = $this->AdminBook_Model->getAllViewsSumOne();
		echo $this->data["sumView"];
		$this->data['mostViewedBook'] = $this->AdminBook_Model->getTopSingleBookOne();
		$this->load->view('AdminViews/AdminHome', $this->data);
	}*/




}
