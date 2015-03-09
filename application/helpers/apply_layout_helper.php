<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!function_exists('apply_layout')) {
    function apply_layout(&$posts, $forum_view) {
        if($forum_view == 'forum_2') {
            //set alternating colors for the posts
            $altcolor = 0;
            $numcolors = 3;
            foreach ($posts as &$post) {
                switch($altcolor) {
                    case 0: $post['alternatingcolor'] = 'beige'; break;
                    case 1: $post['alternatingcolor'] = '#EEEEEE'; break;
                    case 2: $post['alternatingcolor'] = 'white'; break;
                    default: break;
                }
                $altcolor = ($altcolor+1)%$numcolors;
            }        
        }
        else if($forum_view == 'forum_3') {
            //set alternating colors for the posts
            $altcolor = 0;
            $numcolors = 2;
            foreach ($posts as &$post) {
                if($altcolor == 0) {
                    $post['alternatingcolor'] = 'beige';
                    $altcolor = ($altcolor+1)%$numcolors;
                }
                else if($altcolor == 1) {
                    $post['alternatingcolor'] = '#EEEEAA';
                    $altcolor = ($altcolor+1)%$numcolors;
                }
            }        
        }
    }
}