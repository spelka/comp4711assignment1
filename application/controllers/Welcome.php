<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

    public function index()
    {
        // generate cards
        $this->load->model('ads');
        $ads = $this->ads->all();

        $cards = array();

        foreach($ads as $ad)
        {
            $card = array();
            $card['cardimgsrc']     = base_url('assets/img/portfolio/cabin.png');
            $card['cardimagealt']   = $ad['title'];
            $card['cardtitle']      = $ad['title'];
            $card['cardcaption']    = $ad['description'];
            $cards[] = $this->parser->parse('_card',$card,true);
        }

        // generate rows, with the cards inside them ... 3 cards per row
        $columns = array();
        while(count($cards) > 0)
        {
            $column = array();
            $column['columnclass']  = 'col-sm-4';
            $column['content']      = array_pop($cards);
            $columns[] = $this->parser->parse('_grid',$column,true);
        }

        // generate the grid
        $this->data['cards'] = $cards[0];

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
