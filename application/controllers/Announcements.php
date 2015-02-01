<?php

/**
 * Our homepage. Show a table of all the author pictures. Clicking on one should show their quote.
 * Our quotes model has been autoloaded, because we use it everywhere.
 * 
 * controllers/Announcements.php
 *
 * ------------------------------------------------------------------------
 */
class Announcements extends Application {

    function __construct() {
        parent::__construct();
    }

    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------

    function index() {
        $this->data['pagebody'] = 'forum';    // the view we want shown
        
        //get the posts from the Announcements (currently called Posts) model, to pass on to our view
        $posts = $this->posts->get_announcements();
        
        $this->data['posts'] = $posts;

        $this->render();
    }

}

/* End of file Welcome.php */
/* Location: application/controllers/Welcome.php */