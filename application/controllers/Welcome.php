<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

    public function index()
    {
        $this->load->model('ads');
        $this->load->model('categories');

        $this->load->helper('card');
        $this->load->helper('grid');
        $this->load->helper('array');

        ////////////////////
        // generate cards //
        ////////////////////
        $ads = $this->ads->all();

        // generate the grid
        $grid = generateCards($this, $ads);
        $this->data['cards'] = $this->parser->parse('_grid', $grid, true);

        /////////////////////////
        // generate categories //
        /////////////////////////
        $this->load->helper('html');

        $categories = $this->categories->all();

        $list = array();
        foreach ($categories as $category)
        {
            $list[] = anchor(
                '', $category->name, 'title="'.$category->name.'"');
        }

        $attributes = array();
        $attributes['class'] = 'nav menu-item nav-stacked list-group';
        $attributes['id']    = 'mylist';

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
