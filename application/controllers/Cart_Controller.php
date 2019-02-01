<?php
/**
 * Created by IntelliJ IDEA.
 * User: Rehan Samarasekera
 * Date: 11/9/2018
 * Time: 4:52 AM
 */

class Cart_Controller extends CI_Controller
{


	public function index()
	{

		$this->load->view('Cart');

	}
	public function update()
	{
		$data = $this->input->post();
		$this->cart->update($data);
		redirect(site_url() . 'Cart_Controller/', 'refresh');
	}
	public function delete($id)
	{
		$this->cart->remove($id);
		redirect(site_url() . 'Cart_Controller/', 'refresh');
	}

	public function endSession()
	{
		$this->cart->destroy();
		redirect(site_url() . 'Home_Controller/', 'refresh');
	}

}
