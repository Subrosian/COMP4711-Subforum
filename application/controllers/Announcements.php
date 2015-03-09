<?php

//The Announcements controller - found at "/announcements"
class Announcements extends Forum {

    var $forum_view = 'forum_1';
    var $forum_url = "announcements";
    var $forum_model = posts_announcements;
    function __construct() {
        parent::__construct();
    }
}