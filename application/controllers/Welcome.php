<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

    public function __construct()
    {
        parent::__construct();

        // loading models
        $this->load->model('ads');
        $this->load->model('categories');

        // loading helpers
        $this->load->helper('card');
        $this->load->helper('grid');
        $this->load->helper('array');
        $this->load->helper('html');
    }

    public function index()
    {
        // fill in controller parameters
        $this->data['navbar_activelink'] = base_url('/');
        $this->data['page_title']        = 'Welcome';
        $this->data['page_body']         = 'welcome';
        $this->data['search']            = $this->parser->parse('_search',$this->data,true);

        // show all ads in the database
        $ads = $this->ads->all();
        $grid = generateCards($this, $ads);
        $this->data['cards'] = $this->parser->parse('_grid', $grid, true);

        // ads
        $this->data['categories'] = $this->_generate_categories();

        $this->render();
    }

    public function Category($categoryid)
    {
        // fill in controller parameters
        $this->data['navbar_activelink']    = base_url('/');
        $this->data['page_title']           = 'Welcome';
        $this->data['page_body']            = 'welcome';
        $this->data['search'] = $this->parser->parse('_search',$this->data,true);

        $ads = $this->ads->some('categoryID',$categoryid);

        $this->data['cards'] = generateCards($ads);
        $this->data['categories'] = $this->_generate_categories();

        $this->render();
    }

    public function search()
    {
        $adname    = $_POST['adname'];

        // fill in controller parameters
        $this->data['navbar_activelink']    = base_url('/');
        $this->data['page_title']           = 'Welcome';
        $this->data['page_body']            = 'welcome';
        $this->data['search'] = $this->parser->parse('_search',$this->data,true);

        $ads = $this->ads->some('title',$adname);

        $this->data['cards'] = generateCards($ads);
        $this->data['categories'] = $this->_generate_categories();

        $this->render();
    }

    private function _generate_categories()
    {
      $categories = $this->categories->all();

      $list = array();
      foreach ($categories as $category)
      {
          $list[] = anchor(base_url('/Welcome/Category/'.$category->ID), $category->name, 'title="'.$category->name.'"');
      }

      $attributes = array();
      $attributes['class'] = 'nav menu-item nav-stacked list-group';
      $attributes['id']    = 'mylist';

      return ul($list, $attributes);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */
