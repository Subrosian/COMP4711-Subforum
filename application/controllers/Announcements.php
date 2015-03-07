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
        
        //set the title, username, message, and original post data
        $this->data['title'] = $title;
        $this->data['given_username'] = $this->posts_announcements->highest()+1; //was lost from prior commit as well
        $this->data['messagetxt'] = "";
        $this->data['submiturl'] = "/announcements/submitreply/".$postnum; //was missing the initial backslash, which led to an error.
        $this->data = array_merge($this->data, $origpost);
        $this->render();
    }
    
    //submit reply
    function submitreply($postnum = 0) {
        //through post method
        //include username, password, post content ..., put it into database, redirect back to original post
        
        //Create a record that is to be added to the database, as a new reply.
        $record = $this->posts_announcements->create();
        $record->postnum = $this->posts_announcements->highest()+1;
        $record->username = $this->input->post('username');
        $record->subject = $this->input->post('subject');
        $record->message = $this->input->post('message');
        
        //Set the date that the reply was submitted at.
        date_default_timezone_set("America/Vancouver");
        $record->date = date("M. j/y, g:iA");

        //Save the record created for the reply.
        $this->posts_announcements->add($record);
        redirect('/announcements');
        
        //Validation for the reply
        

        //cancel if the reply data was not set
        //if(!(isset($this->input->post('subject')) && isset($this->input->post('message'))))
        //    redirect('/announcements');
        
        //$this->posts_announcements->
    }
    
    //quote a reply; reply with info from the quoted post, in the message area.
    function quote($postnum = 0) {
        if($postnum == 0) //not a specified postnum
            redirect('/announcements');
        
        $this->data['pagebody'] = 'reply';
        
        //get original post
        $title = "Quote";
        $origpost = $this->posts_announcements->get_post($postnum);
        
        //'actions' consists of a link to reply, quote ... according to each post.
        //append each of these to each of $posts.
        $origpost['actions'] = "<a href=\"/announcements/reply/".$origpost['postnum']."\">Reply</a> | "
                         . "<a href=\"/announcements/quote/".$origpost['postnum']."\">Quote</a>";
        
        //set the title, username, message, and original post data
        $this->data['title'] = $title;
        $this->data['given_username'] = $this->posts_announcements->highest()+1; //was lost from prior commit as well
        $this->data['messagetxt'] = "<p>\r\n".$origpost['username']." wrote:<br>\r\n". $origpost['message']."\r\n</p>\r\n\r\n";
        $this->data['submiturl'] = "/announcements/submitreply/".$postnum; //was missing the initial backslash, which led to an error.
        
        $this->data = array_merge($this->data, $origpost);
        $this->render();        
    }

}