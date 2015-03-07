<?php

class Reply extends Application {

    function __construct() {
        parent::__construct();
    }

    function index() {
        //get the post being replied to
        //
        //
        //
        //get the view for the Gaming forum
        //this view is planned to be settable by a drop-down menu, but as of now, this is just the view used for the Gaming forum
        $this->data['pagebody'] = 'forum_2';
        
        //get the title and posts from the Posts_Gaming model
        $title = $this->posts_gaming->get_title();
        $posts = $this->posts_gaming->get_posts();
        
        //set alternating colors for the posts
        $altcolor = 0;
        $numcolors = 3;
        foreach ($posts as &$post) {
            switch($altcolor) {
                case 0: $post['alternatingcolor'] = 'beige'; break;
                case 1: $post['alternatingcolor'] = '#EEEEEE'; break;
                case 2: $post['alternatingcolor'] = 'white'; break;
                default: break;
            }
            $altcolor = ($altcolor+1)%$numcolors;
        }      
        
        //set the $title and $posts data (an array) for use in the view
        $this->data['title'] = $title;
        $this->data['posts'] = $posts;
        $this->render();
    }

}