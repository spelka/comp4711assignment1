<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

    public function index()
    {
        $this->load->model('ads');
        $this->load->helper('card');
        $this->load->helper('grid');
        $this->load->helper('array');

        ////////////////////
        // generate cards //
        ////////////////////
        $ads = $this->ads->all();

        // putting ads onto the card views
        $cards = array();
        foreach($ads as $ad)
        {
            $card = adToCard($this, $ad);   // convert ad into a card object
            $cards[] = $this->parser->parse('_card', $card, true);
        }

        // put cards into columns
        $columns = makeColumns('col-sm-4', $cards);

        // generate rows with the columns inside them (3 columns per row)
        $grid = array();
        $grid['rows'] = makeGroups(3, 'columns', $columns);

        // generate the grid
        $this->data['cards'] = $this->parser->parse('_grid', $grid, true);

        /////////////////////////
        // generate categories //
        /////////////////////////
        $this->load->helper('html');

        $list = array(
                    anchor('', 'Cars', 'title="Cars"'),
                    anchor('', 'Cats', 'title="Cats"'),
                    anchor('', 'Dogs', 'title="Dogs"')
            );

        $attributes = array(
                            'class' => 'nav menu-item nav-stacked list-group',
                            'id'    => 'mylist'
                            );

        $this->data['categories'] = ul($list, $attributes);

        // fill in controller parameters
        $this->data['navbar_activelink']    = base_url('/');
        $this->data['page_title']           = 'Welcome';
        $this->data['page_body']            = 'welcome';

        $this->render();
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */
