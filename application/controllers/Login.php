<?php

class Login extends Application {

    function __construct() {
        parent::__construct();
    }
    
    function index() {
        $this->data['pagebody'] = 'login';
        $this->data['message'] = "";
        
        //set the $title, $posts, and $actions data (an array) for use in the view
        $this->data['title'] = "Login";
        $this->data['submiturl'] = "/login/submit";
        $this->render();
    }
    
    //Submit registration
    function submit() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        //check if password is correct
        //$user_exists = $this->user_data->exists($username);
        //$valid_user = $this->user_data->get($username)->password == $password;
        
        
        //errors that could not be all necessarily evaluated, or would be redundant, are separate from the array
        if(!($username != null && $password != null))
            $this->errors[] = "You did not enter either a username or password.";
        else if(!($this->user_data->exists($username)))
            $this->errors[] = "That user does not appear to exist on this site.";
        else if($this->user_data->get($username)->password != $password)
            $this->errors[] = "Invalid username/password combination.";
          
        //validation, and error handling for any other errors, is done here 
        $invalid = array( 
        );
        
        foreach($invalid as $cond) {
            if($cond[0])
                $this->errors[] = $cond[1];
        }
        
        $this->data['pagebody'] = 'login';
        
        //display errors if there exist any - otherwise, go on with registration.
        $num_errors = count($this->errors);
        if($num_errors > 0) {
            $this->data['messageclass'] = "errors";
            $this->data['message'] = "Error".($num_errors>1?"s":"").":<br>";
            foreach($this->errors as $error)
                $this->data['message'] .= "-".$error."<br>";
            $this->data['message'] .= "<br>";
        }
        else //no errors - so, go on with login
        {
            //add session
            //CODE IS TBD HERE for session
            
            $this->data['messageclass'] = "success";
            $this->data['message'] = "You have successfully logged in.";
        }
        
        //set the $title, $posts, and $actions data (an array) for use in the view
        $this->data['title'] = "Login";
        $this->data['submiturl'] = "/login/submit";
        $this->render();
        
    }
}