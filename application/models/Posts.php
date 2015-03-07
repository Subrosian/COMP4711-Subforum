<?php

/**
 * This is a "CMS" model for quotes, but with bogus hard-coded data.
 * This would be considered a "mock database" model.
 *
 * @author jim
 */
class Posts extends CI_Model {

    // Note that avatars are not saved here; they are to be retrieved according to the username in the database.
    var $data = array( );
    var $title = 'Posts';

    // Constructor
    public function __construct() {
        parent::__construct();
    }
    
    public function get_title() {
        return $this->title;
    }

    // retrieve all of the announcement posts
    public function get_posts() {
        $postnum = 0;
        foreach ($this->data as &$post) {
            //get avatar for the user, and append it to each of the post data elements, where:
            //if data_avatars contains an element with the username of the post, then append the corresponding avatar to the post
            //else, append a default avatar
            if (isset($this->user_data->data_avatars[$post['username']])) {
                $post['avatar'] = $this->user_data->data_avatars[$post['username']];
            } else {
                $post['avatar'] = 'default_avatar.png';
            }
            
            //append the post number to the post
            $postnum++;
            $post['postnum'] = $postnum; //postnum equals index+1
        }        
        return $this->data;
    }
    public function get_post($postnum) {
        $post = &$this->data[$postnum-1];
        //do procedure as with get_posts
            if (isset($this->user_data->data_avatars[$post['username']])) {
                $post['avatar'] = $this->user_data->data_avatars[$post['username']];
            } else {
                $post['avatar'] = 'default_avatar.png';
            }
            $post['postnum'] = $postnum;
        return $post;
    }
    
}
