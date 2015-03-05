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
		$this->load->model('Ads');
		$this->load->model('Users');
    }
	
	public function index($id)
	{
		//get the record from the RDB
		$record = get($id);
		
		//populate the form elements from the RDB data
		$this->data['navbar_activelink']    = base_url('/Create_ad');
        $this->data['page_title'] = 'Starter Template for Bootstrap'; //Change to whatever the ad is later
        $this->data['ad_category'] = MakeComboField('category', 'ad_category', $record->category, $categories);
		$this->data['ad_title'] = MakeTextField('title', 'ad_title', $record->title);
		$this->data['ad_price'] = MakeTextField('price', 'ad_price', $record->price);
		$this->data['ad_description'] = MakeTextArea('description', 'ad_description', $record->description);

        $this->data['page_body'] = 'edit_ad'; //the view that is to be rendered
		
		$this->data['ad_submit'] = makeSubmitButton('Process Ad', "Update", 'btn-success');
		
		//render the form
		$this->render();
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */