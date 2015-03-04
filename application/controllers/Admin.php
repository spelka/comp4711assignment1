<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Application {

	 public function index()
	 {
				$this->load->helper('url');

				$this->load->model('users');
				$this->load->model('ads');
				$this->load->model('categories');

        $this->data['page_title'] = '';
        $this->data['page_body'] = 'admin.php';

				//Create Ad list
				$ads = $this->ads->all();

				$adDataArray = array();

				foreach($ads as $ad)
				{
						$adData = array();

						$adData['edit']				= anchor(base_url('/editAd/'.$ad->ID), "Edit", 'title="'.$ad->ID.'"');
						$adData['ID'] 				= $ad->ID;
						$adData['userID']     = $ad->userID;
						$adData['uploaded']   = $ad->uploaded;
						$adData['price']      = $ad->price;
						$adData['flags']    	= $ad->flags;
						$adData['description']= $ad->description;
						$adData['categoryID'] = $ad->categoryID;
						$adData['title']			= $ad->title;

						array_push($adDataArray, $adData);
				}

				$this->data['adlist'] = $adDataArray;

				//Create User List
				$users = $this->users->all();

				$userDataArray = array();

				foreach($users as $user)
				{
						$userData = array();

						$userData['edit']					= anchor(base_url('/editPost/'.$ad->ID), "Edit", 'title="'.$ad->ID.'"');
						$userData['ID'] 					= $user->ID;
						$userData['type']     		= $user->type;
						$userData['username']   	= $user->username;
						$userData['email']      	= $user->email;
						$userData['displayname']  = $user->displayname;
						array_push($userDataArray, $userData);
				}

				$this->data['userlist'] = $userDataArray;

        $this->render();
	 }
}
