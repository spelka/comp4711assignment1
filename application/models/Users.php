<?php

class Users extends MY_Model
{
    public function __construct()
    {
        parent::__construct('Users','ID');
    }

    /**
     * returns id of user that has matching correct user id and password.
     *
     * @param  $username username of the user to validate.
     * @param  $password password of the user to validate.
     *
     * @return id of the user, or null if no user was found.
     */
    public function get_id_by_credentials($username,$password)
    {
        $users = $this->some('username',$username);
        if((count($users) > 0) && ($users[0]->password == $password))
        {
            return $users[0]->ID;
        }
        else
        {
            return null;
        }
    }

    public function get_current_user_id()
    {
        return $this->session->userdata(SESSION_UID);
    }
}
