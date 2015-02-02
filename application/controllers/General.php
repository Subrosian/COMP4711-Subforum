<?php

class General extends Application {

    function __construct() {
        parent::__construct();
    }

    function index() {
        //get the view for the General forum
        //this view is planned to be settable by a drop-down menu, but as of now, this is just the view used for the General forum
        $this->data['pagebody'] = 'forum_3';
        
        //get the title and posts from the Posts_General model
        $title = $this->posts_general->get_title();
        $posts = $this->posts_general->get_posts();
        
        //set the $title and $posts data (an array) for use in the view
        $this->data['title'] = $title;
        $this->data['posts'] = $posts;
        $this->render();
    }

}