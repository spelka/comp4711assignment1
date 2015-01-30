<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
*	Based on instructions found on the CodeIgniter website:
*	https://ellislab.com/codeigniter/user-guide/libraries/form_validation.html#theform
*/
class Create_ad extends Application {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *         http://example.com/index.php/welcome
     *    - or -
     *         http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
	 
	 public function index()
	 {
		$this->load->view("create_ad");
	 }
	 
	 public function cancel()
	 {
		$this->load->view("welcome");
	 }
	 
	 public function submit()
	 {
		$this->load->view("preview_ad");
	 }
	 
	/**
	 * ASSIGNMENT 2 CODE DONE AHEAD OF TIME, DO NOT REMOVE ON PAIN OF TORTURE
	public function submit()
	{
		echo var_dump($_POST);
	}
	*/
}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */
