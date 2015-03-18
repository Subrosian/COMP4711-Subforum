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
        //Date recognition - can use strtotime, and order results based on what strtotime returns.
        
    }
}