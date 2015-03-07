<?php

/**
 * This is a "CMS" model for quotes, but with bogus hard-coded data.
 * This would be considered a "mock database" model.
 *
 * @author jim
 */
class Posts_Gaming extends Posts {

    // Note that avatars are not saved here; they are to be retrieved according to the username in the database.
    var $data = array( //
        array('username' => 'Subrosian', 'subject' => 'So, about Super Smash Bros for Wii U', 'date'=>'Jan. 31/15, 2:34PM', 'message' => 'I haven\'t gotten around to play that game very much. What\'s your Wii U Friend code? Maybe anyone here can come around to play.'),
        array('username' => 'Jacob', 'subject' => 'Re: So, about Super Smash Bros for Wii U', 'date'=>'Jan. 31/15, 2:38PM', 'message' => 'My friend code is 2391-594444-1192. What\'s yours?'),
    );
    var $title = 'Gaming';
    
    // Constructor
    public function __construct() {
        parent::__construct();
    }
    
}
