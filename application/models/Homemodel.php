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
        'num_users' => '2',
        'last_registered' => 'Jacob',
        'online' => 'Jacob'
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
        return $this->data;
    }
    
}
