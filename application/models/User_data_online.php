<?php

/**
 * This is a "CMS" model for quotes, but with bogus hard-coded data.
 * This would be considered a "mock database" model.
 *
 * @author jim
 */
class User_Data_Online extends MY_Model {

    //This encapsulates the DB table that just stores online users.

    // Constructor
    public function __construct() {
        parent::__construct('userdata_online', 'username');
    }
    
}
