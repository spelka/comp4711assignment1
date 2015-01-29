<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

    public function cardtest()
    {
        // render page
        $this->data['activelink']    = base_url('/Welcome/cardtest');
        $this->data['pagetitle']     = 'Starter Template for Bootstrap';
        $this->data['pagebody']      = 'cards';

        $this->render();
    }

    public function index()
    {
        $this->data['activelink']    = base_url('/');
        $this->data['pagetitle']     = 'Starter Template for Bootstrap';
        $this->data['pagebody']      = 'welcome';

        $this->render();
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */
