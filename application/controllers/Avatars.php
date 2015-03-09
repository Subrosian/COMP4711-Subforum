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
        $this->load->helper(array('form', 'url')); //use helper for upload in this controller
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
            $data_avatar['uploadform'] = form_open_multipart('/avatars/set_avatar');
        }
        $this->data['data_avatars'] = $avatars;
        
       $this->render();
    }
    
    function set_avatar() {
        $username = $this->input->post('username');
        //$avatarpath = $this->input->post('userfile');
        //get the view for the About page
        $this->data['pagebody'] = 'setavatars';
        if(!isset($username))
            redirect("/avatars");
        //$avatarfile = substr(strrchr($avatarpath, '/')+1); //get the filename, ie. everything after the last slash
        
        //Upload image for user
        //Specify upload settings
        $config['upload_path'] = '/data/images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '100'; //KB?
        $config['max_width']  = '400';
        $config['max_height']  = '300';
        $this->load->library('upload', $config);
        
        //execute upload, with error handling
        if ($this->upload->do_upload()) //do_upload gets form element "userfile"
        {
       //Update avatar URL for user
       $uploaddata = $this->upload->data();
       $avatarfile = $uploaddata['filename'];
       if(!$this->user_data->exists($username)) { //create avatar record if not already existing in db
           $record = $this->user_data->create();
           $record->username = $username;
           $record->avatar = $avatarfile;
           $this->user_data->add($record);
       }
       else { //update avatar url if already existing
           $record = $this->user_data->get($username);
           $record->avatar = $avatarfile;
           $this->user_data->update($record);
       }    
        }
            else
        {
                if(is_writable($config['upload_path']))
                    $this->data['message'] = "truewritable";
                else {
                    $this->data['message'] = "is_writable: ".((is_writable($config['upload_path']))?'true':'false')."; ".$this->upload->display_errors();
                }
        }
		/*else
		{
                    $data = array('upload_data' => $this->upload->data());
                    $this->load->view('upload_success', $data);
		}*/
                
      //$this->data['message'] = "username: ".$username."; avatarpath: ".$avatarpath;
       
       
       //index data
        $avatars = $this->user_data->data_avatars;
        foreach($avatars as &$data_avatar) {
            $data_avatar['uploadform'] = form_open_multipart('/avatars/set_avatar');
        }
        $this->data['data_avatars'] = $avatars;
        
      $this->render();
       //redirect('/avatars');
    }

}

/* End of file Welcome.php */
/* Location: application/controllers/Welcome.php */