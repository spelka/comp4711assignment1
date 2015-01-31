<?php

class Adimages extends CI_Model {

    var $data = array(
        array(
            'ID'        => 1,
            'imageID'   => 1,
            'adID'      => 1),
        array(
            'ID'        => 1,
            'imageID'   => 2,
            'adID'      => 1),
        array(
            'ID'        => 1,
            'imageID'   => 3,
            'adID'      => 1),
        array(
            'ID'        => 1,
            'imageID'   => 4,
            'adID'      => 1),
        array(
            'ID'        => 2,
            'imageID'   => 2,
            'adID'      => 2),
        array(
            'ID'        => 3,
            'imageID'   => 3,
            'adID'      => 3),
        array(
            'ID'        => 4,
            'imageID'   => 4,
            'adID'      => 4),
        array(
            'ID'        => 5,
            'imageID'   => 5,
            'adID'      => 5),
        array(
            'ID'        => 6,
            'imageID'   => 6,
            'adID'      => 6)
    );

    // Constructor
    public function __construct() {
        parent::__construct();
    }

    // retrieve a single row
    public function getAdImageIDs($adID) {
        // iterate over the data until we find the one we want
        $imageIDs = array();
        foreach ($this->data as $record)
        {
            if ($record['adID'] == $adID)
            {
                $imageIDs[] = $record['imageID'];
            }
        }
        return $imageIDs;
    }

    // retrieve a single row
    public function getAdImageID($adID) {
        // iterate over the data until we find the one we want
        foreach ($this->data as $record)
        {
            if ($record['adID'] == $adID)
            {
                return $record['imageID'];
            }
        }
        return null;
    }

    // retrieve all rows
    public function all() {
        return $this->data;
    }

}
