<?php

class Application extends CI_Controller {

    protected $data = array();      // parameters for view components
    protected $id;                  // identifier for our content
    protected $choices = array(     // our menu navbar
        'Home'      => '../'
        'Ad Detail'   => '../Ad_Detail',
        'Profile Management'     => '../Profile_Management',
        'Register'   => '../Register',
        );

    function __construct() {
        parent::__construct();

        $this->data = array();
        $this->data['title'] = 'TobyCatApps';    // our default title
        $this->data['pagetitle'] = 'Welcome';   // our default page

        $this->errors = array();
    }

    /**
     * Render the page...parameters needed:
     * @param pagetitle
     * @param pagebody
     * @param title
     */
    function render() {
        $this->data['navbar'] = build_menu_bar($this->choices, $this->data['activelink']);
        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);

        // build the browser page
        $this->data['data'] = &$this->data;
        $this->parser->parse('_template', $this->data);
    }

}

/* End of file MY_Controller.php */
/* Location: application/core/MY_Controller.php */
