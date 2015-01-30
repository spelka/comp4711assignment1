<?php

class Users extends CI_Model {

    var $data = array(
        array(
            'ID'            => '1',
            'username'      => 'Bob Monkhouse',
            'password'      => 'p@$sw0rD',
            'email'         => 'noreply@nowhere.com',
            'displayname'   => 'Bob Monkhouse'),
        array(
            'ID'            => '2',
            'username'      => 'Elayne Boosler',
            'password'      => 'p@$sw0rD',
            'email'         => 'noreply@nowhere.com',
            'displayname'   => 'Elayne Boosler'),
        array(
            'ID'            => '3',
            'username'      => 'Mark Russell',
            'password'      => 'p@$sw0rD',
            'email'         => 'noreply@nowhere.com',
            'displayname'   => 'Mark Russell'),
        array(
            'ID'            => '4',
            'username'      => 'Anonymous',
            'password'      => 'p@$sw0rD',
            'email'         => 'noreply@nowhere.com',
            'displayname'   => 'Anonymous'),
        array(
            'ID'            => '5',
            'username'      => 'Socrates',
            'password'      => 'p@$sw0rD',
            'email'         => 'noreply@nowhere.com',
            'displayname'   => 'Socrates'),
        array(
            'ID'            => '6',
            'username'      => 'Isaac Asimov',
            'password'      => 'p@$sw0rD',
            'email'         => 'noreply@nowhere.com',
            'displayname'   => 'Isaac Asimov')
    );

    // Constructor
    public function __construct() {
        parent::__construct();
    }

    // retrieve a single row
    public function get($which) {
        // iterate over the data until we find the one we want
        foreach ($this->data as $record)
            if ($record['ID'] == $which)
                return $record;
        return null;
    }

    // retrieve all rows
    public function all() {
        return $this->data;
    }

}
