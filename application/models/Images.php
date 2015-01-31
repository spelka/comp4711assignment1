<?php

class Images extends CI_Model {

    var $data = array(
        array(
            'ID'    => 1,
            'alt'   => 'alternate text for image 1',
            'src'   => 'assets/img/portfolio/cabin.png'),
        array(
            'ID'    => 2,
            'alt'   => 'alternate text for image 2',
            'src'   => 'assets/img/portfolio/cake.png'),
        array(
            'ID'    => 3,
            'alt'   => 'alternate text for image 3',
            'src'   => 'assets/img/portfolio/circus.png'),
        array(
            'ID'    => 4,
            'alt'   => 'alternate text for image 4',
            'src'   => 'assets/img/portfolio/game.png'),
        array(
            'ID'    => 5,
            'alt'   => 'alternate text for image 5',
            'src'   => 'assets/img/portfolio/safe.png'),
        array(
            'ID'    => 6,
            'alt'   => 'alternate text for image 6',
            'src'   => 'assets/img/portfolio/submarine.png')
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

    public function some($which) {
        $images = array();

        // iterate over the data until we find the one we want
        foreach ($this->data as $record)
        {
            if (in_array($record['ID'], $which))
            {
                $images[] = $record;
            }
        }

        return $images;
    }

    // retrieve all rows
    public function all() {
        return $this->data;
    }

}
