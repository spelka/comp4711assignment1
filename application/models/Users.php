<?php

class Users extends CI_Model {

    // The data comes from http://www.quotery.com/top-100-funny-quotes-of-all-time/?PageSpeed=noscript
    var $data = array(
        array(
            'id'            => '1',
            'username'      => 'Bob Monkhouse',
            'password'      => 'p@$sw0rD',
            'email'         => 'noreply@nowhere.com',
            'displayname'   => 'Bob Monkhouse',
        array(
            'id'            => '2',
            'username'      => 'Elayne Boosler',
            'password'      => 'p@$sw0rD',
            'email'         => 'noreply@nowhere.com',
            'displayname'   => 'Elayne Boosler',
        array(
            'id'            => '3',
            'username'      => 'Mark Russell',
            'password'      => 'p@$sw0rD',
            'email'         => 'noreply@nowhere.com',
            'displayname'   => 'Mark Russell',
        array(
            'id'            => '4',
            'username'      => 'Anonymous',
            'password'      => 'p@$sw0rD',
            'email'         => 'noreply@nowhere.com',
            'displayname'   => 'Anonymous',
        array(
            'id'            => '5',
            'username'      => 'Socrates',
            'password'      => 'p@$sw0rD',
            'email'         => 'noreply@nowhere.com',
            'displayname'   => 'Socrates',
        array(
            'id'            => '6',
            'username'      => 'Isaac Asimov',
            'password'      => 'p@$sw0rD',
            'email'         => 'noreply@nowhere.com',
            'displayname'   => 'Isaac Asimov')
    );

    // Constructor
    public function __construct() {
        parent::__construct();
    }

    // retrieve a single quote
    public function get($which) {
        // iterate over the data until we find the one we want
        foreach ($this->data as $record)
            if ($record['id'] == $which)
                return $record;
        return null;
    }

    // retrieve all of the quotes
    public function all() {
        return $this->data;
    }

    // retrieve the first quote
    public function first() {
        return $this->data[0];
    }

    // retrieve the last quote
    public function last() {
        $index = count($this->data) - 1;
        return $this->data[$index];
    }

}
