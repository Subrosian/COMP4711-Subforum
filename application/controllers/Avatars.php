<?php

/**
 * Our homepage. Show a table of all the author pictures. Clicking on one should show their quote.
 * Our quotes model has been autoloaded, because we use it everywhere.
 * 
 * controllers/Welcome.php
 *
 * ------------------------------------------------------------------------
 */
class Avatars extends Application {

    function __construct() {
        parent::__construct();
    }

    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------

    function index() {
        //get the view for the About page
        $this->data['pagebody'] = 'setavatars';
       
        $avatars = $this->user_data->data_avatars;
        //make avatars for use in the view
        //$this->data = array_merge($this->data);
        foreach($avatars as &$data_avatar) {
            $data_avatar['uploadform'] = form_open_multipart('upload/do_upload');
        }
        $this->data['data_avatars'] = $avatars;
        $this->data['toggle_admin'] = "";
        
       $this->render();
    }

}

/* End of file Welcome.php */
/* Location: application/controllers/Welcome.php */