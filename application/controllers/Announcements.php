<?php

//The Announcements controller - found at "/announcements"
class Announcements extends Application {

    function __construct() {
        parent::__construct();
    }
    
    function index() {
        //get the view for the Announcements forum
        //this view is planned to be settable by a drop-down menu, but as of now, this is just the view used for the Announcements forum
        $this->data['pagebody'] = 'forum_1';
        
        //get the posts from the Post_Announcements model
        $posts = $this->posts_announcements->get_posts();
        
        //set the $posts data (an array) for use in the view
        $this->data['posts'] = $posts;
        $this->render();
    }

}