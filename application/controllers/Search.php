<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Search extends Application {
    function index() {
            $this->data['pagebody'] = 'search';
            $this->data['message'] = "";

            //set the $title, $posts, and $actions data (an array) for use in the view
            $this->data['title'] = "Search";
            $this->data['submiturl'] = "/search/results";
            
            $this->data['forums'] = array(
                array('forum' => 'announcements', 'forumlabel' => 'Announcements'),
                array('forum' => 'general', 'forumlabel' => 'General'),
                array('forum' => 'gaming', 'forumlabel' => 'Gaming')
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
        }
        
        $posts = array();
        //Merge all posts within the forums listed within $tosearch[] within $posts
        if($tosearch['Announcements']) {
            $posts = array_merge($posts, $posts_announcements->get_posts());
        }
        if($tosearch['General']) {
            $posts = array_merge($posts, $posts_general->get_posts());
        }
        if($tosearch['Gaming']) {
            $posts = array_merge($posts, $posts_gaming->get_posts());
        }
        
        //filter the posts by search query and author
        
        //order the posts
        array_sort($posts, strtotime($posts['date']), SORT_DESC); 
    }
    
    //Credit goes to http://php.net/manual/en/function.sort.php - by a comment by "phpdotnet at m4tt dot co dot uk ¶" for this code:
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