<?php

class Images extends MY_Model
{

    var $imagesRoot = 'uploads/posts/';

    // Constructor
    public function __construct()
    {
        parent::__construct('Images','ID');
    }

    // retrieve a single row
    public function get($pkeyval1,$pkeyval2 = null)
    {
        $record = parent::get($pkeyval1,$pkeyval2);
        if($record)
        {
            $record->src = $this->imagesRoot.$record->ID.'/'.$record->src;
        }
        return $record;
    }

    public function getImagesForAd($adID)
    {

        // get IDs of images for the passed ad
        $imageIDs = $this->adimages->getAdImageIDs($adID);

        // get the actual image records to be returned while modifying their src
        // path
        $imageRecords = array();
        foreach($imageIDs as $imageID)
        {
            $imageRecord = parent::get($imageID);
            $imageRecord->src = $this->imagesRoot.$adID.$imageRecord->src;
            $imageRecords[] = $imageRecord;
        }

        // return them
        return $imageRecords;
    }

    public function some($column,$value = null)
    {
        $records = parent::some($column,$value);
        foreach($records as $record)
        {
            $record->src = $this->imagesRoot.$record->ID.'/'.$record->src;
        }
        return $records;
    }

    // retrieve all rows
    public function all()
    {
        $records = parent::all();
        foreach($records as $record)
        {
            $record->src = $imagesRoot.$record->ID.'/'.$record->src;
        }
        return $records;
    }

}
