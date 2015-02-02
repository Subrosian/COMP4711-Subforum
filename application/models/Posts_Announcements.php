<?php

/**
 * This is a "CMS" model for quotes, but with bogus hard-coded data.
 * This would be considered a "mock database" model.
 *
 * @author jim
 */
class Posts_Announcements extends CI_Model {

    // Note that avatars are not saved here; they are to be retrieved according to the username in the database.
    var $data = array( //
        array('username' => 'Subrosian', 'subject' => 'Welcome to the forum!', 'date'=>'Jan. 31/15, 12:50PM', 'message' => 'Welcome to Subrosian\'s home-made forum. Hope I get some activity around here :D'),
        array('username' => 'Jacob', 'subject' => 'Re: Welcome to the forum!', 'date'=>'Jan. 31/15, 12:54PM', 'message' => 'Really, please post!'),
    );

    // Constructor
    public function __construct() {
        parent::__construct();
    }

    // retrieve all of the announcement posts
    public function get_posts() {
        //get avatar for the user, and append it to each of the post data elements, where:
        //if data_avatars contains an element with the username of the post, then append the corresponding avatar to the post
        //else, append a default avatar
        foreach ($this->data as &$post) {
            if (isset($this->user_data->data_avatars[$post['username']])) {
                $post['avatar'] = $this->user_data->data_avatars[$post['username']];
            } else {
                $post['avatar'] = 'default_avatar.png';
            }
        }        
        return $this->data;
    }
    
}
