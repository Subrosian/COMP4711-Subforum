<?php

/**
 * This is a "CMS" model for quotes, but with bogus hard-coded data.
 * This would be considered a "mock database" model.
 *
 * @author jim
 */
class User_Data extends MY_Model {

    var $data_avatars = array( );
    //TBD: include data_usernames, data_passwords, ...
    //Basically, plan this out.

    // Constructor
    public function __construct() {
        parent::__construct('userdata', 'username');
        $this->data_avatars = $this->all();
        foreach($this->data_avatars as &$post)
            $post = (array)$post; //convert stdClass, which is the original type of the array element, to array    
    }
    
}
