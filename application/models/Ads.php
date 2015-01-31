<?php

class Ads extends CI_Model {

    var $data = array(
        array(
            'ID'            => 1,
            'userID'        => 1,
            'uploaded'      => 'January 05, 2014',
            'price'         => '$32.00',
            'flags'         => '0',
            'description'   => 'Can fit up to 4 human-sized dogs.',
            'categoryID'    => 1,
            'title'         => 'Dog House'),
        array(
            'ID'            => 2,
            'userID'        => 2,
            'uploaded'      => 'January 05, 2014',
            'price'         => '$32.00',
            'flags'         => '0',
            'description'   => 'The cake from portal.',
            'categoryID'    => 2,
            'title'         => 'Portal Cake'),
        array(
            'ID'            => 3,
            'userID'        => 3,
            'uploaded'      => 'January 05, 2014',
            'price'         => '$32.00',
            'flags'         => '0',
            'description'   => 'Great item to have for camping.',
            'categoryID'    => 3,
            'title'         => 'Tent'),
        array(
            'ID'            => 4,
            'userID'        => 4,
            'uploaded'      => 'January 05, 2014',
            'price'         => '$32.00',
            'flags'         => '0',
            'description'   => 'I am not liable for anything you do with this.',
            'categoryID'    => 4,
            'title'         => 'Blunt Weapon'),
        array(
            'ID'            => 5,
            'userID'        => 5,
            'uploaded'      => 'January 05, 2014',
            'price'         => '$32.00',
            'flags'         => '0',
            'description'   => 'Can travel through time.',
            'categoryID'    => 5,
            'title'         => 'Time Machine'),
        array(
            'ID'            => 6,
            'userID'        => 6,
            'uploaded'      => 'January 05, 2014',
            'price'         => '$32.00',
            'flags'         => '0',
            'description'   => 'Lets you see far things like they\'re close by',
            'categoryID'    => 6,
            'title'         => 'Trinoculars')
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
