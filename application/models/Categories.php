<?php

class Categories extends CI_Model {

    var $data = array(
        array(
            'ID'                => 1,
            'parentCategoryID'  => 0,
            'name'              => 'Pets'),
        array(
            'ID'                => 2,
            'parentCategoryID'  => 0,
            'name'              => 'Electronics'),
        array(
            'ID'                => 3,
            'parentCategoryID'  => 0,
            'name'              => 'Kitchen'),
        array(
            'ID'                => 4,
            'parentCategoryID'  => 0,
            'name'              => 'Stationary'),
        array(
            'ID'                => 5,
            'parentCategoryID'  => 0,
            'name'              => 'Toiletries'),
        array(
            'ID'                => 6,
            'parentCategoryID'  => 0,
            'name'              => 'Other')
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
