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

        $ads = $this->ads->all();

        $this->data['cards'] = $this->generateCards($ads);
        $this->data['categories'] = $this->generateCategories();

        $this->render();
    }

    public function generateCards($ads)
    {
      ////////////////////
      // generate cards //
      ////////////////////

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

        $ads = $this->ads->some('categoryID',$categoryid);

        $this->data['cards'] = $this->generateCards($ads);
        $this->data['categories'] = $this->generateCategories();

        $this->render();
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */
