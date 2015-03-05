<?php

//The Announcements controller - found at "/announcements"
class Announcements extends Application {

    var $forum_view = 'forum_1';
    function __construct() {
        parent::__construct();
    }
    
    function index() {
        //get the view for the Announcements forum
        //this view is planned to be settable by a drop-down menu, but as of now, this is just the view used for the Announcements forum
        $this->data['pagebody'] = $this->forum_view;
        
        //get the title and posts from the Posts_Announcements model
        $title = $this->posts_announcements->get_title();
        $posts = $this->posts_announcements->get_posts();
        
        //'actions' consists of a link to reply, quote ... according to each post.
        //append each of these to each of $posts.
        foreach($posts as &$post) {
            $post['actions'] = "<a href=\"/announcements/reply/".$post['postnum']."\">Reply</a> | "
                             . "<a href=\"/announcements/quote/".$post['postnum']."\">Quote</a>";
        }
        
        //set the $title, $posts, and $actions data (an array) for use in the view
        $this->data['title'] = $title;
        $this->data['posts'] = $posts;
        $this->render();
    }
    
    //create a reply page
    function reply($postnum = 0) {
        if($postnum == 0) //not a specified postnum
            redirect('/announcements');
        
        $this->data['pagebody'] = 'reply';
        
        //get original post
        $title = "Make a Reply";
        $origpost = $this->posts_announcements->get_post($postnum);
        
        //'actions' consists of a link to reply, quote ... according to each post.
        //append each of these to each of $posts.
        $origpost['actions'] = "<a href=\"/announcements/reply/".$origpost['postnum']."\">Reply</a> | "
                         . "<a href=\"/announcements/quote/".$origpost['postnum']."\">Quote</a>";
        
        //set the title, and original post data
        $this->data['title'] = $title;
        $this->data['submiturl'] = "announcements/submitreply/".$postnum;
        $this->data = array_merge($this->data, $origpost);
        $this->render();
    }
    
    //submit reply
    function submitreply($postnum = 0) {
        //through post method
        //include username, password, post content ..., put it into database, redirect back to original post
        
        //cancel if the reply data was not set
        //if(!(isset($this->input->post('subject')) && isset($this->input->post('message'))))
        //    redirect('/announcements');
        
        //$this->posts_announcements->
    }

}