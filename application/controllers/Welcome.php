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
        //though, limit the length of the message to 200 characters.
        $announcement_1 = $this->posts_announcements->get($this->posts_announcements->highest());
        $announcement_2 = $this->posts_announcements->get($this->posts_announcements->highest()-1);
        $ann1_msg = $announcement_1->message;
        $ann2_msg = $announcement_2->message;

        //add trailing "..."s if the length is > 200 chars
        if(strlen($ann1_msg) > 200)
            $ann1_msg = substr($ann1_msg, 0, 200)."...";
        if(strlen($ann2_msg) > 200)
            $ann2_msg = substr($ann2_msg, 0, 200)."...";
        
        $this->data['ann1'] = $announcement_1->subject." - Posted by ".$announcement_1->username." at ".$announcement_1->date.": <br>"
                            . $ann1_msg;
        $this->data['ann2'] = $announcement_2->subject." - Posted by ".$announcement_2->username." at ".$announcement_2->date.": <br>"
                            . $ann2_msg;

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