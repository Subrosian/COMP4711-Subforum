<?php

/**
 * This is a "CMS" model for quotes, but with bogus hard-coded data.
 * This would be considered a "mock database" model.
 *
 * @author jim
 */
class Posts_General extends Posts {

    // Note that avatars are not saved here; they are to be retrieved according to the username in the database.
    var $data = array( //
        array('username' => 'Subrosian', 'subject' => 'Introduce yourself here!', 'date'=>'Jan. 31/15, 1:20PM', 'message' => 'So, my name is Subrosian Laguardia. I\'m just some guy who enjoys dwelling basements.'),
        array('username' => 'Jacob', 'subject' => 'Re: Introduce yourself here!', 'date'=>'Jan. 31/15, 1:25PM', 'message' => 'So, I\'m Jacob Bell. I\'m just an 18 year old freelancer from the Yukon who makes a living off of sculpting snow goons, and in his spare time likes to chill in the basement of his 150 sq. meter igloo.'),
    );
    var $title = 'General';

    // Constructor
    public function __construct() {
        parent::__construct();
    }
    
}
