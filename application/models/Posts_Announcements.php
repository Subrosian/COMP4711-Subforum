<?php

/**
 * This is a "CMS" model for quotes, but with bogus hard-coded data.
 * This would be considered a "mock database" model.
 *
 * @author jim
 */
class Posts_Announcements extends Posts {

    // Note that avatars are not saved here; they are to be retrieved according to the username in the database.
    var $data = array( //
        array('username' => 'Subrosian', 'subject' => 'Welcome to the forum!', 'date'=>'Jan. 31/15, 12:50PM', 'message' => 'Welcome to Subrosian\'s home-made forum. Hope I get some activity around here :D'),
        array('username' => 'Jacob', 'subject' => 'Re: Welcome to the forum!', 'date'=>'Jan. 31/15, 12:54PM', 'message' => 'Really, please post!'),
    );
    var $title = 'Announcements';

    // Constructor
    public function __construct() {
        parent::__construct();
    }
    
}
