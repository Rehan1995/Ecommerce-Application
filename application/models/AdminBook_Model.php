<?php
/**
 * Created by IntelliJ IDEA.
 * User: Rehan Samarasekera
 * Date: 11/9/2018
 * Time: 5:04 PM
 */

class AdminBook_Model extends CI_Model
{
	public function getAllBooks()
	{

		$query = $this->db->get('books');
		$books = $query->result_array();
		return $books;
	}

	public function addBook($data)
	{
		return $this->db->insert('books', $data);
	}

	public function editBook($book)
	{
		//$query = $this->db->update($book);
	}

	public function searchBook($search_query)
	{
		$this->db->select('*');
		$this->db->from('books');
		$this->db->like('title',$search_query);
		$this->db->or_like('author',$search_query);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getBooksByCategory($category_id){
		$this->db->where('category',$category_id);
		$this->db->from('books');
		$query = $this->db->get();
		return $query->result_array();
	}

	//newly added

	public function getBooksPageByCategory($category_id, $limit, $start)
	{
		$this->db->select('*');
		$this->db->where('category', $category_id);
		$this->db->from('books');
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getBooksCountByCat($category_id)
	{
		$this->db->select('*');
		$this->db->where('category', $category_id);
		$this->db->from('books');
		return $this->db->count_all_results();
	}
	public function getBookById($id)
	{
		$this->db->where('id', $id);
		$this->db->from('books');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$row = $query->row_array();
			return $row;
		}
	}
	public function getBooksPagination($limit, $start)
	{
		$this->db->select('*');
		$this->db->from('books');
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		return $result = $query->result_array();
	}
	public function getBooksCount()
	{
		return $this->db->count_all_results('books');
	}
	public function getTopBooksByUser($book_id)
	{
		$this->db->select('*')->from('guest_user')->where('book_id', $book_id);
		$sub_query = $this->db->get_compiled_select();
		$this->db->select('count(book_id)');
		$this->db->from('usertrack');
	}
	public function updateCount($id)
	{
		$this->db->set('count', 'count+1', FALSE);
		$this->db->where('id', $id);
		$this->db->update('books');
	}


	public function getBookCategoryOne()
	{
		$this->db->select('*');
		$this->db->from('books');
		$this->db->join('categories', 'books.category = categories.id');
		$query = $this->db->get();

		return $query->result();
	}

	public function getAllViewsSumOne()
	{
		$this->db->select_sum('count');
		$this->db->from('books');
		$query = $this->db->get();
		return $query->result();

	}

	public function getTopSingleBookOne(){
		$this->db->select('*');
		$this->db->from('books');
		$this->db->order_by('count', 'desc');
		$this->db->limit(5);

		$query = $this->db->get();
		return $query->result();
	}
}
