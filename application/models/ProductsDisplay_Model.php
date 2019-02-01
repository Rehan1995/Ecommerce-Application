<?php
/**
 * Created by IntelliJ IDEA.
 * User: Rehan Samarasekera
 * Date: 11/8/2018
 * Time: 10:53 AM
 */

class ProductsDisplay_Model extends CI_Model
{

	public function getProducts()
	{

		$query = $this->db->get('books');
		$Book = $query->result_array();

		return $Book;

	}

	public function getBooksByCategories($lmt, $start, $id)
	{
		$this->db->select("*");
		$this->db->from('books');
		$this->db->where('category', $id);
		$this->db->limit($lmt, $start);
		$query = $this->db->get();
		$fetchedBooks = $query->result_array();
		return $fetchedBooks;
	}

	public function getSingleBookId($id)
	{
		$this->db->where('id', $id);
		$this->db->from('books');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$row = $query->row_array();
			return $row;
		}
	}

}
