<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_detail extends Application {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('parser');
        $this->load->helper('formfields');
        $this->load->model('users');
        $this->load->model('ads');
        $this->load->model('categories');
        $this->load->model('reviews');

        $this->load->helper('card');
        $this->load->helper('grid');
        $this->load->helper('array');
    }

    private function getUserDetails($username)
    {
        $record = $this->users->some('username', $username);

        // use the first record (username should be unique)
        $this->data['username'] = $record[0]->username;
        $this->data['displayname'] = $record[0]->displayname;
        $this->data['email'] = $record[0]->email;

        return $record[0]->ID;
    }

    private function generateStars($setStars, $numStars)
    {
        $stars = array();
        for ($i = 1; $i <= $numStars; $i++)
        {
            $star = array( 'rate' => 'rated',
                           'status' => ($i <= $setStars ? 'class=set' : 'class=not-set'));
            $stars[] = $star;
        }

        return $stars;
    }

    // create the stars
    private function getReviewStars($username)
    {
        // get total number of stars
        $records = $this->reviews->some('to', $username);
        $total = 0;

        // get the average and round up to nearest whole number
        foreach($records as $record)
        {
            $total += $record->rating;
        }

        $ratingCount = sizeof($records);
        $rating = ceil($total/($ratingCount == 0 ? 1 : $ratingCount));


        $reviewStars = array();
        $reviewStars['stars'] = $this->generateStars($rating, NUMRATING);

        return $this->parser->parse('_stars', $reviewStars, true);
    }

    // get reviews
    private function getReviews($username)
    {
        // get reviews
        $records = $this->reviews->some('to', $username);

        // generate reviews
        $reviews = array();
        foreach($records as $record)
        {
            $review = array();
            $review['from'] = $record->from;

            // get user rating and display stars
            $userrating = array();
            $userrating['stars'] = $this->generateStars($record->rating, NUMRATING);
            $review['stars'] = $this->parser->parse('_stars', $userrating, true);

            $review['review'] = $record->review;
            $reviews[] = $review;
        }

        $allReviews['rows'] = $reviews;
        return $this->parser->parse('_reviews', $allReviews, true);
    }

    public function confirm()
    {
        // create a record to add to the database
        $addRecord = $this->reviews->create();

        $addRecord->from = 'from user'; // need to update this once log-in is implemented
        $addRecord->to = 'to user'; // need to update this once log-in is implemented
        $addRecord->review = $this->input->post('review');
        $addRecord->rating = $this->input->post('rating');

        // Add validation here once log in is implemented
        // there shouldn't be an anonymous review

        $this->reviews->add($addRecord);

        redirect('/user_detail');
    }

    public function present($username)
    {
        $id = $this->getUserDetails($username);

        // Get user ads
        $ads = $this->ads->some('userID', $id);
        $this->data['cards'] = generateCards($this, $ads);

        $this->data['reputation'] = $this->getReviewStars($username);
        $this->data['reviews'] = $this->getReviews($username);

        $this->data['page_title'] = 'User Detail';
        $this->data['page_body'] = 'user_detail';

        $this->data['navbar_activelink'] = base_url('/User_detail');

        $this->render();
    }

    public function index($username)
	{
        $this->present($username);
	}
}

/* End of file User_detail.php */
/* Location: ./application/controllers/User_detail.php */
