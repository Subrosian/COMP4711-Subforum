<?php

/**
 * This is a "CMS" model for quotes, but with bogus hard-coded data.
 * This would be considered a "mock database" model.
 *
 * @author jim
 */
class Recent_Posts2 extends MY_Model2 {
    
    //This encapsulates the DB table that just stores the last registered user.
    //This uses 'forum' and 'postnum' as the primary keys, instead of 'recent_posts,' extending off of MY_Model2.
    //(This is used when a record needs to be accessed via data in those columns, rather than in 'recent_posts'.)
    //Not sure if this is the best way to retrieve the data, or if there is some other way to access the records
    //(an alternative being eg. iterating through the result of retrieving one column to pick out those matching the 2nd column.)

    // Constructor
    public function __construct() {
        parent::__construct('recent_posts', 'forum', 'postnum');
    }
    
}
