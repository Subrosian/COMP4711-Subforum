<?php

/**
 * This is a "CMS" model for quotes, but with bogus hard-coded data.
 * This would be considered a "mock database" model.
 *
 * @author jim
 */
class AboutModel extends CI_Model {

    // Note that avatars are not saved here; they are to be retrieved according to the username in the database.
    var $data = array(
        'heading' => 'About this message board',
        'content' => '...' //actually, not going to write the content here; will put into view instead
    );

    // Constructor
    public function __construct() {
        parent::__construct();
    }

    // retrieve the data of the about page model
    public function get_data() {
        return $this->data;
    }
    
}
