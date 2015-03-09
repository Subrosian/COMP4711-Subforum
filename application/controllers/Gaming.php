<?php

class Gaming extends Application {

    var $forum_view = 'forum_2';
    var $forum_url = "gaming";
    var $forum_model;
    function __construct() {
        parent::__construct();
        $this->forum_model = $this->posts_gaming;
    }

    function index() {
        //get the view for the Gaming forum
        //this view is planned to be settable by a drop-down menu, but as of now, this is just the view used for the Gaming forum
        $this->data['pagebody'] = $this->forum_view;
        
        //get the title and posts from the Posts_Gaming model
        $title = $this->forum_model->get_title();
        $posts = $this->forum_model->get_posts();
        
        foreach($posts as &$post) {
            $post['actions'] = "<a href=\"/".$this->forum_url."/reply/".$post['postnum']."\">Reply</a> | "
                             . "<a href=\"/".$this->forum_url."/quote/".$post['postnum']."\">Quote</a>";
        }
        
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
    
       
    //create a reply page
    function reply($postnum = 0) {
        if($postnum == 0) //not a specified postnum
            redirect('/'.$this->forum_url);
        
        $this->data['pagebody'] = 'reply';
        
        //get original post
        $title = "Make a Reply";
        $origpost = $this->forum_model->get_post($postnum);
        
        //'actions' consists of a link to reply, quote ... according to each post.
        //append each of these to each of $posts.
        $origpost['actions'] = "<a href=\"/".$this->forum_url."/reply/".$origpost['postnum']."\">Reply</a> | "
                         . "<a href=\"/".$this->forum_url."/quote/".$origpost['postnum']."\">Quote</a>";
        
        //set the title, username, message, and original post data
        $this->data['title'] = $title;
        $this->data['given_username'] = "Anonymous"; //was lost from prior commit as well
        $this->data['messagebox'] = "";
        $this->data['submiturl'] = "/".$this->forum_url."/submitreply/".$postnum; //was missing the initial backslash, which led to an error.
        $this->data = array_merge($this->data, $origpost);
        $this->render();
    }
    
    //submit reply
    function submitreply($postnum = 0) {
        //through post method
        //include username, password, post content ..., put it into database, redirect back to original post
        
        //Create a record that is to be added to the database, as a new reply.
        $record = $this->forum_model->create();
        $record->postnum = $this->forum_model->highest()+1;
        $record->username = $this->input->post('username');
        $record->subject = $this->input->post('subject');
        $record->message = $this->input->post('message');
        
        //Set the date that the reply was submitted at.
        date_default_timezone_set("America/Vancouver");
        $record->date = date("M. j/y, g:iA");

        //Save the record created for the reply.
        $this->forum_model->add($record);
        redirect('/'.$this->forum_url);
        
        //Validation for the reply
        

        //cancel if the reply data was not set
        //if(!(isset($this->input->post('subject')) && isset($this->input->post('message'))))
        //    redirect('/announcements');
        
        //$this->posts_announcements->
    }
    
    //quote a reply; reply with info from the quoted post, in the message area.
    function quote($postnum = 0) {
        if($postnum == 0) //not a specified postnum
            redirect('/'.$this->forum_url);
        
        $this->data['pagebody'] = 'reply';
        
        //get original post
        $title = "Quote";
        $origpost = $this->forum_model->get_post($postnum);
        
        //'actions' consists of a link to reply, quote ... according to each post.
        //append each of these to each of $posts.
        $origpost['actions'] = "<a href=\"/".$this->forum_url."/reply/".$origpost['postnum']."\">Reply</a> | "
                         . "<a href=\"/".$this->forum_url."/quote/".$origpost['postnum']."\">Quote</a>";
        
        //set the title, username, message, and original post data
        $this->data['title'] = $title;
        $this->data['given_username'] = $this->forum_model->highest()+1; //was lost from prior commit as well
        $this->data['messagebox'] = "<p>\r\n".$origpost['username']." wrote:<br>\r\n". $origpost['message']."\r\n</p>\r\n\r\n";
        $this->data['submiturl'] = "/".$this->forum_url."/submitreply/".$postnum; //was missing the initial backslash, which led to an error.
        
        $this->data = array_merge($this->data, $origpost);
        $this->render();        
    }

}