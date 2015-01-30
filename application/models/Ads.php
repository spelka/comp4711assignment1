<?php

class Ads extends CI_Model {

    var $data = array(
        array(
            'ID'            => '1',
            'userID'        => '1',
            'uploaded'      => 'January 05, 2014',
            'price'         => '$32.00',
            'flags'         => '0',
            'description'   => 'description description description',
            'categoryID'    => '1',
            'title'         => 'title0'),
        array(
            'ID'            => '2',
            'userID'        => '2',
            'uploaded'      => 'January 05, 2014',
            'price'         => '$32.00',
            'flags'         => '0',
            'description'   => 'description description description',
            'categoryID'    => '1',
            'title'         => 'title1'),
        array(
            'ID'            => '3',
            'userID'        => '3',
            'uploaded'      => 'January 05, 2014',
            'price'         => '$32.00',
            'flags'         => '0',
            'description'   => 'description description description',
            'categoryID'    => '1',
            'title'         => 'title2'),
        array(
            'ID'            => '4',
            'userID'        => '4',
            'uploaded'      => 'January 05, 2014',
            'price'         => '$32.00',
            'flags'         => '0',
            'description'   => 'description description description',
            'categoryID'    => '1',
            'title'         => 'title3'),
        array(
            'ID'            => '5',
            'userID'        => '5',
            'uploaded'      => 'January 05, 2014',
            'price'         => '$32.00',
            'flags'         => '0',
            'description'   => 'description description description',
            'categoryID'    => '1',
            'title'         => 'title4'),
        array(
            'ID'            => '6',
            'userID'        => '6',
            'uploaded'      => 'January 05, 2014',
            'price'         => '$32.00',
            'flags'         => '0',
            'description'   => 'description description description',
            'categoryID'    => '1',
            'title'         => 'title5')
    );

    // Constructor
    public function __construct() {
        parent::__construct();
    }

    // retrieve a single row
    public function get($which) {
        // iterate over the data until we find the one we want
        foreach ($this->data as $record)
            if ($record['id'] == $which)
                return $record;
        return null;
    }

    // retrieve all rows
    public function all() {
        return $this->data;
    }

}
