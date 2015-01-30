<?php

class Application extends CI_Controller {

    protected $data = array();      // parameters for view components
    protected $id;                  // identifier for our content
    protected $choices = array();   // our menu navbar

    public function __construct() {
        parent::__construct();

        $this->choices['Home']                = base_url('/');
        $this->choices['Ad Detail']           = base_url('/Ad_Detail');
        $this->choices['Profile Management']  = base_url('/Profile_Management');
        $this->choices['Register']            = base_url('/Register');

        $this->data['baseurl'] = base_url('/'); // base url of the site
        $this->data['pagetitle'] = 'Welcome';   // our default page
        $this->data['title'] = 'TobyCatApps';   // our default title

        $this->errors = array();
    }

    /**
     * Render the page...parameters needed:
     * @param pagetitle
     * @param pagebody
     * @param title
     */
    protected function render() {
        $this->data['navbar'] = build_menu_bar($this->choices, $this->data['activelink']);
        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);

        $this->data['user'] = $this->parser->parse('loginbar',$this->data,true);
        
        // build the browser page
        $this->data['data'] = $this->data;
        $this->parser->parse('_template', $this->data);
    }

}

/* End of file MY_Controller.php */
/* Location: application/core/MY_Controller.php */
