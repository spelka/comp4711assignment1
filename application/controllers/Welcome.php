<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

    // public function test()
    // {
    //     // render page
    //     $this->data['activelink']    = '../Welcome/test';
    //     $this->data['pagetitle']     = 'Starter Template for Bootstrap';
    //     $this->data['pagebody']      = 'welcome';
    //     $this->data['grid']          = $this->parser->parse('_grid',(array)$cards,true);

    //     $this->render();
    // }

    public function index()
    {
        $this->data['activelink']    = '../';
        $this->data['pagetitle']     = 'Starter Template for Bootstrap';
        $this->data['pagebody']      = 'welcome';

        $this->render();
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */
