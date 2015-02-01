<?php

/**
 * Our homepage. Show a table of all the author pictures. Clicking on one should show their quote.
 * Our quotes model has been autoloaded, because we use it everywhere.
 * 
 * controllers/last/Welcome.php
 *
 * ------------------------------------------------------------------------
 */
class Welcome extends Application {

    function __construct() {
        parent::__construct();
    }

    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------

    function index() {
        $this->data['pagebody'] = 'justone';    // the view we want shown
        
        //get the author and corresponding quote from the Quotes model, to pass on to our view
        $record = $this->quotes->last();
        $this->data = array_merge($this->data, $record);
        
        $this->render();
    }

}

/* End of file Welcome.php */
/* Location: application/controllers/Welcome.php */