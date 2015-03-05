<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ads');
        $this->load->model('categories');

        $this->load->helper('card');
        $this->load->helper('grid');
        $this->load->helper('array');
        $this->load->helper('html');

    }

    public function index()
    {
        // fill in controller parameters
        $this->data['navbar_activelink']    = base_url('/');
        $this->data['page_title']           = 'Welcome';
        $this->data['page_body']            = 'welcome';
        $this->data['search'] = $this->parser->parse('_search',$this->data,true);


        $ads = $this->ads->all();

        // generate the grid
        $grid = generateCards($this, $ads);
        $this->data['cards'] = $this->parser->parse('_grid', $grid, true);

      // generate the grid

      return $this->parser->parse('_grid', $grid, true);

    }

    public function generateCategories()
    {
      /////////////////////////
      // generate categories //
      /////////////////////////

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

    public function Category($categoryid)
    {
        // fill in controller parameters
        $this->data['navbar_activelink']    = base_url('/');
        $this->data['page_title']           = 'Welcome';
        $this->data['page_body']            = 'welcome';
        $this->data['search'] = $this->parser->parse('_search',$this->data,true);

        $ads = $this->ads->some('categoryID',$categoryid);

        $this->data['cards'] = $this->generateCards($ads);
        $this->data['categories'] = $this->generateCategories();

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

        $this->data['cards'] = $this->generateCards($ads);
        $this->data['categories'] = $this->generateCategories();

        $this->render();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */
