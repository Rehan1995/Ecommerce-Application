<?php
/**
 * Created by IntelliJ IDEA.
 * User: Rehan Samarasekera
 * Date: 11/12/2018
 * Time: 12:00 AM
 */

class UserBehaviour extends CI_Model
{
	public function insertUser($user)
	{
		$this->db->insert('usertrack',$user);
	}

	public function getViewedBooksByUser($userId)
	{
		$this->db->select('*');
		$this->db->from('books As b');
		$this->db->join('usertrack As g', 'g.book_id=b.id');
		$this->db->where('g.user_id', $userId);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getMostPopularBooks(){
		$this->db->select('*');
		$this->db->from('books');
		$this->db->order_by('count', 'desc');
		$this->db->limit(5);

		$query = $this->db->get();
		return $query->result();
	}

	public function CreateView($bookId)
	{
		$sqlCreateView = "Create OR Replace VIEW bookview AS SELECT user_id,book_id from usertrack where book_id=?";
		$query=$this->db->query($sqlCreateView,array($bookId));

		return $query->result();
	}

	public function getMostViewedByBook($bookId)
	{
		$sqlJoin = "select count(g.book_id) as count,g.book_id from bookview as v right join usertrack as g on g.user_id=v.user_id where not g.book_id=? group by g.book_id order by count desc limit 5";
		$query=$this->db->query($sqlJoin,array($bookId));

		return $query->result();
	}

}
