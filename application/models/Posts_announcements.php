<?php

/**
 * This is a "CMS" model for quotes, but with bogus hard-coded data.
 * This would be considered a "mock database" model.
 *
 * @author jim
 */
class Posts_Announcements extends Posts {

    var $title = 'Announcements';

    // Constructor
    public function __construct() {
        //store database table 'announcements' info into the associative array, data
        parent::__construct('announcements', 'postnum');
        $this->data = $this->all();
        foreach($this->data as &$post)
            $post = (array)$post; //convert stdClass, which is the original type of the array element, to array    
    }
    
}
