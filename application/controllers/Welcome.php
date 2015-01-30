<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

    public function index()
    {
        // generate cards
        $this->load->model('ads');
        $cards = $this->ads->all();

        foreach($cards as $card)
        {
            $cells[] = $this->parser->parse('_card',(array)$card,true);
        }

        $this->data['cards'] = $cells;

        // generate categories
        $this->load->helper('html');

        $list = array(
                    anchor('', 'Cars', 'title="Cars"'),
                    anchor('', 'Cats', 'title="Cats"'),
                    anchor('', 'Dogs', 'title="Dogs")')
            );

        $attributes = array(
                            'class' => 'nav nav-pills nav-stacked list-group',
                            'id'    => 'mylist'
                            );

        $this->data['menu_item'] = ul($list, $attributes);

        // fill in controller parameters
        $this->data['activelink']    = base_url('/');
        $this->data['pagetitle']     = 'Welcome';
        $this->data['pagebody']      = 'welcome';

        $this->render();
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */
