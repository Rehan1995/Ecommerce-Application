<?php
/**
 * Created by IntelliJ IDEA.
 * User: Rehan Samarasekera
 * Date: 11/9/2018
 * Time: 5:08 PM
 */

class AdminCategory_Model extends CI_Model
{
	public function getAllCategories()
	{

		$query = $this->db->get('categories');
		$categories = $query->result_array();
		return $categories;

	}


	public function saveCategory($category)
	{

		$query = $this->db->insert('categories', $category);


	}



}
