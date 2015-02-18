<?php

class Application extends CI_Controller {

    protected $data = array();      // parameters for view components
    protected $id;                  // identifier for our content
    protected $choices = array();   // our menu navbar

    public function __construct() {
        parent::__construct();

        $this->choices['Home']               = base_url('/');
        $this->choices['Register']           = base_url('/Register');
        $this->choices['Profile Management'] = base_url('/Profile_management');
        $this->choices['User Details']       = base_url('/User_detail');
        $this->choices['Create Ad']          = base_url('/Create_ad');

        $this->data['baseurl']           = base_url('/');  // base url of the site
        $this->data['page_title']        = 'Welcome';      // our default page
        $this->data['navbar_title']      = 'TobyCatApps';  // our default title
        $this->data['navbar_activelink'] = '';

        $this->errors = array();
    }

    protected function render() {
        $this->data['navbar_buttons'] = build_menu_bar($this->choices, $this->data['navbar_activelink']);
        $this->data['page_body'] = $this->parser->parse($this->data['page_body'], $this->data, true);

        if(true)
        {
            $this->data['navbar_user'] = $this->parser->parse('_login',$this->data,true);
        }
        else
        {
            $this->data['navbar_user'] = $this->parser->parse('_logged_in',$this->data,true);
        }

        // build the browser page
        $this->data['data'] = $this->data;
        $this->parser->parse('_template', $this->data);
    }

}

/* End of file MY_Controller.php */
/* Location: application/core/MY_Controller.php */
