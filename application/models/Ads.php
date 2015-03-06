<?php

class Ads extends MY_Model
{
    public function __construct()
    {
        parent::__construct('Ads','ID');
    }

    public function search($str)
    {
        $sql = "SELECT * FROM ".$this->_tableName.
            " WHERE title LIKE '%".$str."%' OR description LIKE '%".$str."%'";
        $query = $this->db->query($sql);
        return $query->result();
    }
}
