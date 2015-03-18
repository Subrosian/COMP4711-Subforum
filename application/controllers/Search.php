<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Search extends Application {
    function index() {
        $this->data['pagebody'] = 'search';
        if(!isset($this->data['message']))
            $this->data['message'] = "";

        //set the $title, $posts, and $actions data (an array) for use in the view
        $this->data['title'] = "Search";
        $this->data['submiturl'] = "/search/results";

        $this->data['forums'] = array(
            array('forum' => 'Announcements'),
            array('forum' => 'General'),
            array('forum' => 'Gaming')
        );
        $this->render();
    }
    
    /*
     * "These are the intended usecases for this forum:
    1. Search for forum post (by user, or post content)
            -Sort forum posts by date, ascending or descending, and alphabetically"
     * Note: scrapping sorting "alphabetically" since there isn't really a reason to have an alphabetical sort.
     * It's not really a feature that would have much meaning.
     */
    function results() {        

        //Date recognition - can use strtotime for each post date, and order results based on what strtotime returns.
        //array_sort array_sort($posts, strtotime($posts->date), SORT_DESC); 
        $keywords = $this->input->post('keywords');
        $author = $this->input->post('author');
        
        //Search within forums listed within $forums.
        //If I were to have a flexible number of forums, this array could be handled by a database table, as opposed to hardcoded here.
        //However, as of this point, hard-coding is an issue due to the refactoring that would be involved in updating even the forum name,
        //at this point.
        $forums = array('Announcements', 'General', 'Gaming');
        $tosearch = array();
        foreach($forums as $forum) {
            if($this->input->post($forum) == 'on')
                $tosearch[$forum] = true;
            else
                $tosearch[$forum] = false;
        }
        
        //Validation:
        //- either keyword or author need to have a value
        //- at least 1 forum needs to be checked
        //If not, then display the index page with errors.
        
        //validation, and error handling, to be done here
        $invalid = array(
            !($keywords != "" || $author != "") => "Either 'keyword' or 'author' needs to be filled in.",
            empty($tosearch) => "At least 1 forum needs to be checked.",
        );
        foreach($invalid as $item => $value) {
            if($item)
                $this->errors[] = $value;
        }
        
        //display errors if there exist any, and stop search here, displaying index instead.
        $num_errors = count($this->errors);
        if($num_errors > 0) {
            $this->data['messageclass'] = "errors";
            $this->data['message'] = "Error".($num_errors>1?"s":"").":<br>";
            foreach($this->errors as $error)
                $this->data['message'] .= "-".$error."<br>";
            $this->data['message'] .= "<br>";
            $this->index();
            return;
        }
        
        
        $posts = array();
        //Merge all posts within the forums listed within $tosearch[] within $posts (each post being an associative array)
        if($tosearch['Announcements']) {
            $posts = array_merge($posts, $this->posts_announcements->get_posts());
        }
        if($tosearch['General']) {
            $posts = array_merge($posts, $this->posts_general->get_posts());
        }
        if($tosearch['Gaming']) {
            $posts = array_merge($posts, $this->posts_gaming->get_posts());
        }
        
        //filter the posts by search keywords and author
        $newposts = array();
        foreach($posts as $post) { //add each post if made by $author and containing $keywords
            if(($author == "" || $post['username'] == $author) && ($keywords == "" || strpos($post['message'], $keywords)))
            $newposts[] = $post;
        }
        $posts = $newposts;
        
        foreach($posts as &$post) {
            //create a sortable date value for each post
            $post['sdv'] = date_create_from_format("M. j/y, g:iA", $post['date'])->getTimestamp();
        }
        
        //order the posts
        $order = $this->input->post('order');
        if($order == "desc")
            $posts = $this->array_sort($posts, 'sdv', SORT_DESC);
        else {
            $posts = $this->array_sort($posts, 'sdv', SORT_ASC); //default
        }
        
        //Display the page
        //Construct squery
        $squery = "";
        if($keywords != "")
            $squery .= "keywords = '".$keywords."'";
        if($author != "") {
            if($squery != "")
                $squery .= " and ";
            $squery .= "author = '".$author."'";
        }
        
        //If there are no posts, display the message of there being no posts
        if(count($posts) == 0)
            $this->data['message'] = "There were no results returned from this.";
        else
            $this->data['message'] = "The search with ".$squery." yielded ".count($posts)." results:";

        $this->data['pagebody'] = 'search_results';

        //set the $title, $posts, and $actions data (an array) for use in the view
        $this->data['title'] = "Search Results";
        $this->data['submiturl'] = "/search/results";

        $this->data['posts'] = $posts;
        
        $this->render();
    }
    
    //Credit goes to http://php.net/manual/en/function.sort.php - by a comment by "phpdotnet at m4tt dot co dot uk ¶" for this code:
    //Sorts arrays of associative arrays
        function array_sort($array, $on, $order=SORT_ASC)
        {
        $new_array = array();
        $sortable_array = array();

        if (count($array) > 0) {
            foreach ($array as $k => $v) {
                if (is_array($v)) {
                    foreach ($v as $k2 => $v2) {
                        if ($k2 == $on) {
                            $sortable_array[$k] = $v2;
                        }
                    }
                } else {
                    $sortable_array[$k] = $v;
                }
            }

            switch ($order) {
                case SORT_ASC:
                    asort($sortable_array);
                break;
                case SORT_DESC:
                    arsort($sortable_array);
                break;
            }

            foreach ($sortable_array as $k => $v) {
                $new_array[$k] = $array[$k];
            }
        }

        return $new_array;
    }

}