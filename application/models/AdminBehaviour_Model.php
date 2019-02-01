<?php
/**
 * Created by IntelliJ IDEA.
 * User: Rehan Samarasekera
 * Date: 11/9/2018
 * Time: 5:18 PM
 */

class AdminBehaviour_Model extends CI_Model
{


	public function getUser()
	{
		$username = $this->input->post('username');
		$password = sha1($this->input->post('password'));


		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$this->db->from('users');
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->num_rows() == 1 ? true : false;

	}

	public function getAllBooks()
	{
		$query = $this->db->get('books');
		$books = $query->result_array();

		return $books;


	}

}
