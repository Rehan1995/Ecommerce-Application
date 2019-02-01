<?php
/**
 * Created by IntelliJ IDEA.
 * User: Rehan Samarasekera
 * Date: 11/8/2018
 * Time: 6:16 PM
 */

class Display_Controller extends  CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ProductsDisplay_Model');
		$this->load->model('UserBehaviour');
		$this->load->model('AdminBook_Model');
	}

	public function index($id)
	{
		if (!empty($id) && !empty($this->session->id)) {
			$books = $this->session->books;

			if (!in_array($id, $books)) {
				$this->AdminBook_Model->updateCount($id);
				array_push($books, $id);
				$date = new DateTime('now');
				$user = array(
					"user_id" => $this->session->id,
					"book_id" => $id,
					"date" => $date->format('Y-m-d H:i:s')
				);
				$this->session->set_userdata("books", $books);
				$this->UserBehaviour->insertUser($user);
			}
			$data['book'] = $this->AdminBook_Model->getBookById($id);
			$data['viewedBooks'] = $this->getViewedBooksByUser();
			$data['mostViewedByBook'] = $this->getMostViewedByBook($id);


			$this->load->view('Product_Details', $data);

		} else {
			$this->load->view('template/header');
		}
	}



	public function displayCategories()
	{
		$this->load->model('AdminCategory_Model');
		$data['displayCategories'] = $this->AdminCategory_Model->getAllCategories();

		$this->load->view('template/header',$data);

	}

	private function getViewedBooksByUser()
	{
		$userId = $this->session->id;
		$results = $this->UserBehaviour->getViewedBooksByUser($userId);
		$books = array();
		foreach ($results as $result){
			array_push($books,$this->AdminBook_Model->getBookById($result['book_id']));
		}
		return $books;
	}

	private function getMostViewedByBook($id)
	{
		$results = $this->UserBehaviour->getMostViewedByBook($id);
		$books = array();
		//var_dump($results);
		foreach ($results as $result){

			array_push($books,$this->AdminBook_Model->getBookById($result->book_id));
		}
		return $books;
	}
}
