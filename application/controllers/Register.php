<?php

//The Announcements controller - found at "/announcements"
class Register extends Application {

    function __construct() {
        parent::__construct();
    }
    
    function index() {
        $this->data['pagebody'] = 'register';
        $this->data['message'] = "";
        
        //set the $title, $posts, and $actions data (an array) for use in the view
        $this->data['title'] = "Register an Account";
        $this->data['submiturl'] = "/register/submit";
        $this->render();
    }
    
    //Submit registration
    function submit() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        //validation, and error handling, to be done here
        //Could dis-allow special characters in usernames, or at least angled brackets in such
        $invalid = array(
            array(!($username != "" && $password != ""), "A username or password is not set."),
            array((strpos($username,'<') !== false || strpos($username,'>') !== false), "No angled brackets allowed."),
            array($this->user_data->exists($username), "A username by that name already exists.")
        );
        foreach($invalid as $cond) {
            if($cond[0])
                $this->errors[] = $cond[1];
        }
        
        $this->data['pagebody'] = 'register';
        
        //display errors if there exist any - otherwise, go on with registration.
        $num_errors = count($this->errors);
        if($num_errors > 0) {
            $this->data['messageclass'] = "errors";
            $this->data['message'] = "Error".($num_errors>1?"s":"").":<br>";
            foreach($this->errors as $error)
                $this->data['message'] .= "-".$error."<br>";
            $this->data['message'] .= "<br>";
        }
        else //no errors - so, go on with registration
        {
            //add username to db
            $record = $this->user_data->create();
            $record->username = $username;
            $record->password = $password;
            $this->user_data->add($record);
            
            //Update last registered user in db
            if(!$this->user_data_lastreg->exists('1')) { //if db record for this is not initialized
                $record_lastreg = $this->user_data_lastreg->create();
                $record_lastreg->id = '1';
            }
            else
                $record_lastreg = $this->user_data_lastreg->get('1');
            $record_lastreg->username = $username;
            $this->user_data_lastreg->update($record_lastreg);
            
            $this->data['messageclass'] = "success";
            $this->data['message'] = "User <strong>".$username."</strong> has been created!";
        }
        
        //set the $title, $posts, and $actions data (an array) for use in the view
        $this->data['title'] = "Register an Account";
        $this->data['submiturl'] = "/register/submit";
        $this->render();
        
    }
}