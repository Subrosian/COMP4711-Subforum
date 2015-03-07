<?php

/**
 * Our homepage. Show a table of all the author pictures. Clicking on one should show their quote.
 * Our quotes model has been autoloaded, because we use it everywhere.
 * 
 * controllers/Welcome.php
 *
 * ------------------------------------------------------------------------
 */
class About extends Application {

    function __construct() {
        parent::__construct();
    }

    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------

    function index() {
        //get the view for the About page
        $this->data['pagebody'] = 'about';
        
        //get the data from the about model
        $content = $this->aboutmodel->get_data();
        
        //set the data (an array) for use in the view - retrieving content
        $this->data = array_merge($this->data, $content);
        $this->render();
    }

}

/* End of file Welcome.php */
/* Location: application/controllers/Welcome.php */