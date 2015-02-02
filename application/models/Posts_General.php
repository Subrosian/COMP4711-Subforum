<?php

/**
 * This is a "CMS" model for quotes, but with bogus hard-coded data.
 * This would be considered a "mock database" model.
 *
 * @author jim
 */
class Posts_General extends CI_Model {

    // Note that avatars are not saved here; they are to be retrieved according to the username in the database.
    var $data = array( //
        array('username' => 'Subrosian', 'subject' => 'Introduce yourself here!', 'date'=>'Jan. 31/15, 1:20PM', 'message' => 'So, my name is Subrosian Laguardia. I\'m just some guy who enjoys dwelling basements.'),
        array('username' => 'Jacob', 'subject' => 'Re: Introduce yourself here!', 'date'=>'Jan. 31/15, 1:25PM', 'message' => 'So, I\'m Jacob Bell. I\'m just an 18 year old freelancer from the Yukon who makes a living off of sculpting snow goons, and in his spare time likes to chill in the basement of his 150 sq. meter igloo.'),
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
