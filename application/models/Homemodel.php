<?php

/**
 * This is a "CMS" model for quotes, but with bogus hard-coded data.
 * This would be considered a "mock database" model.
 *
 * @author jim
 */
class HomeModel extends CI_Model {

    var $data = array(
        'title' => 'Subforum',
        //'content' => '...', //actually, not going to write the content here; will put into view instead
        'last_registered' => 'n/a',
        'online' => 'n/a' //TBD: Implement this; will do when implementing sessions.
    );
    
    /*To be done: Logic for the sitemap, including:
     * -getting the latest posts within the forums
     * -getting the first ~200 characters of the Announcements posts, with a link to the announcement in question, and anchor tags
     * -retrieving stats of users
    */

    // Constructor
    public function __construct() {
        parent::__construct();
    }

    // retrieve the data of the home model
    public function all() {
        $CI = &get_instance();
        $this->data['num_users'] = $this->user_data->size();
        if($this->user_data_lastreg->exists($this->user_data_lastreg->get('1')))
            $this->data['last_registered'] = $this->user_data_lastreg->get('1')->username;
        
        //get most recent posts
        $most_recent = array ( );
        $recentposts = $this->recent_posts->all();
        for($i=0; $i<5; $i++) { //get the 5 last recent posts, retrieve the post, put into most_recent
            //retrieve the post from the forum at the postnum
            $recentpost = array_pop($recentposts);
            if($recentpost == null) {
                $recentpost = $this->posts_announcements->create();
                $recentpost->forum = '';
                $recentpost->postnum = 1;
            }
                
            //forum is currently hardcoded in order to retrieve the corresponding model. TBD: Avoid hardcoding this, make a generalization
            //get actual post from forum
            $rforum = $recentpost->forum;
            $rnum = $recentpost->postnum;
            
            if($rforum == 'announcements')
                $actualpost = $this->posts_announcements->get_post($rnum);
            else if($rforum == 'general')
                $actualpost = $this->posts_general->get_post($rnum);
            else if($rforum == 'gaming')
                $actualpost = $this->posts_gaming->get_post($rnum);             
            else
                $actualpost =  array('postnum' => 'null', 'username' => 'null', 'subject' => 'Recent post '.($i+1), 'date'=>'null', 'message' => 'null');
            $actualpost['forum'] = $rforum;
            
            array_push($most_recent, $actualpost);
        }
        $this->data['recentposts'] = $most_recent;
        return $this->data;
    }
    
}
