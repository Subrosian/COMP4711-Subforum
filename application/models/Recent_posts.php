<?php

/**
 * This is a "CMS" model for quotes, but with bogus hard-coded data.
 * This would be considered a "mock database" model.
 *
 * @author jim
 */
class Recent_Posts extends MY_Model {
    
    //This encapsulates the DB table that just stores the last registered user.

    // Constructor
    public function __construct() {
        parent::__construct('recent_posts', 'recency');
    }
    //add post to recency
    //TBD: delete the post from the database, as well
    public function mostrecent() {
        $record = $post_record->postnum;
    }
    
}
