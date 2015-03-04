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
	 
	 /**
	 * Constructor, creates the Create_ad class object, and loads the methods found in the formfields_helper
	 *
	 */
	function __construct()
    {
		parent::__construct();
		$this->load->helper('formfields_helper');
    }
	
	/**
	 * Responsible for creating the form elements programatically by filling in templates
	 *
	 */
	 public function index()
	 {
	    $this->data['navbar_activelink']    = base_url('/Create_ad');
        $this->data['page_title'] = 'Starter Template for Bootstrap'; //Change to whatever the ad is later
        $this->data['ad_category'] = MakeComboField();
		$this->data['ad_title'] = MakeTextField();
		$this->data['ad_price'] = MakeTextField();
		$this->data['ad_description'] = MakeTextArea();

        $this->render();
	 }

	 /**
	 * Takes the user back to the main page, and discards all changes to fields
	 */
	 public function cancel()
	 {
		//$this->load->view("/");
		$this->data['navbar_activelink']    = base_url('/Create_ad');
        $this->data['page_title'] = 'Starter Template for Bootstrap'; //Change to whatever the ad is later
        $this->data['page_body'] = '/'; //Change to whatever the ad is later

        $this->render();
	 }

	 /**
	 *	Get variables from the form, validate them, and submit them to the RDB
	 */
	 public function submit()
	 {
		//get variables from the input
		$record = $this->Ads->create();
		
		$record->category = $this->input->post('ad_category');
		$record->title = $this->input->post('ad_title');
		$record->price = $this->input->post('ad_price');
		$record->description = $this->input->post('ad_description');
		
		// validate user input
		if (empty($record->title))
		{
			$this->errors[] = 'You must enter a title for your advertisement';
		}
		
		if ($record->price < 0)
		{
			$this->errors[] = 'You cannot enter a negative amount of money';
		}
		
		// redisplay if any errors
		if (count($this->errors) > 0)
		{
			$this->present($record);
			return; // make sure we don't try to save anything
		}
		
		
		//Create a new entry in the RDB
	    if (empty($record->id))
		{
			$this->quotes->add($record);
	    }
		else 
		{
			$this->quotes->update($record);
	    }
		redirect('/');
	 }
	 
	/**
	*	Rerenders the form to the screen, including any error messages
	*
	*/
	public function present()
	{
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */
