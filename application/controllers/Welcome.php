<?php

/**
 * Our homepage. Show a table of all the author pictures. Clicking on one should show their quote.
 * Our quotes model has been autoloaded, because we use it everywhere.
 * 
 * controllers/Welcome.php
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
        $this->data['pagebody'] = 'homepage';
        
        //merge the data of the home view with that of the homemodel
        $this->data = array_merge($this->data,$this->homemodel->all());
        
        //retrieve the announcements' data
        $announcement_1 = $this->posts_announcements->get($this->posts_announcements->highest());
        $announcement_2 = $this->posts_announcements->get($this->posts_announcements->highest()-1);
        $this->data['ann1'] = "Posted by ".$announcement_1->username." at ".$announcement_1->date.": <br>"
                            . $announcement_1->message;
        $this->data['ann2'] = "Posted by ".$announcement_2->username." at ".$announcement_2->date.": <br>"
                            . $announcement_2->message;

        $this->render();
    }

    function shucks() {
        $this->data['pagebody'] = 'justone';    // the view we want shown
        
        //get the author and corresponding quote from the Quotes model, to pass on to our view
        $record = $this->quotes->get(2);
        $this->data = array_merge($this->data, $record);

        $this->render();
    }
}

/* End of file Welcome.php */
/* Location: application/controllers/Welcome.php */