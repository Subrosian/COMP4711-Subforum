<?php

class Gaming extends Application {

    function __construct() {
        parent::__construct();
    }

    function index() {
        //get the view for the Gaming forum
        //this view is planned to be settable by a drop-down menu, but as of now, this is just the view used for the Gaming forum
        $this->data['pagebody'] = 'forum_2';
        
        //get the posts from the Post_Gaming model
        $posts = $this->posts_gaming->get_posts();
        
        //set the $posts data (an array) for use in the view
        $this->data['posts'] = $posts;
        $this->render();
    }

}