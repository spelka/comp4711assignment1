<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
Admin controller
Provides functionality of ediing posts and deleteing posts
When a user is deleted, all their posts are deleted with the user
When a post is deleted, the post is deleted

When edit is pressed, the site calls the edit ad page with the id of the ad
*/

class Manage_ads extends Application
{
    public function __construct()
    {
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');

            $this->load->model('users');
            $this->load->model('ads');
    }

    public function index()
    {
        $this->data['page_title'] = '';
        $this->data['page_body'] = 'Manage_ads.php';

        //Create Ad list
        $ads = $this->ads->some('userID',$this->users->get_current_user_id());

        $adDataArray = array();

        foreach($ads as $ad)
        {
                $adData = array();

                $adData['delete']      = anchor(base_url('/Manage_ads/deletead/'.$ad->ID), "Delete", 'title="'.$ad->ID.'"');
                $adData['edit']        = anchor(base_url('/editAd/'.$ad->ID), "Edit", 'title="'.$ad->ID.'"');
                $adData['ID']          = $ad->ID;
                $adData['userID']      = $ad->userID;
                $adData['uploaded']    = $ad->uploaded;
                $adData['price']       = $ad->price;
                $adData['flags']       = $ad->flags;
                $adData['description'] = $ad->description;
                $adData['categoryID']  = $ad->categoryID;
                $adData['title']       = $ad->title;

                array_push($adDataArray, $adData);
        }

        $this->data['adlist'] = $adDataArray;

        $this->render();
    }

    public function deletead($adID)
    //Delete an ad and refresh the page to update the view
    {
            $this->ads->delete($adID);
            redirect('/Manage_ads');
    }

    //Delete an user and any post associated with the user and refresh the page to update the view
    public function deleteuser($userID)
    {
            $adArray = $this->ads->some('userID',$userID);
            foreach($adArray as $ad)
            {
                 $this->ads->delete($ad->ID);
            }

            $this->users->delete($userID);
            redirect('/Manage_ads');
    }
}
