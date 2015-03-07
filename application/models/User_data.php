<?php

/**
 * This is a "CMS" model for quotes, but with bogus hard-coded data.
 * This would be considered a "mock database" model.
 *
 * @author jim
 */
class User_Data extends CI_Model {

    var $data_avatars = array(
        'Subrosian' => 'asubrosian.png'
    );
    //TBD: include data_usernames, data_passwords, ...
    //Basically, plan this out.

    // Constructor
    public function __construct() {
        parent::__construct();
    }
    
}
