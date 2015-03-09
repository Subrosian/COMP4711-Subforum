<?php

/**
 * core/MY_Controller.php
 *
 * Default application controller
 *
 * @author		JLP
 * @copyright           2010-2013, James L. Parry
 * ------------------------------------------------------------------------
 */
class Application extends CI_Controller {

    protected $data = array();      // parameters for view components
    protected $id;                  // identifier for our content
    /**
     * Constructor.
     * Establish view parameters & load common helpers
     */

    function __construct() {
        parent::__construct();
        $this->data = array();
        $this->data['title'] = 'Subforum';    // our default title
        $this->errors = array();
        $this->data['pageTitle'] = 'welcome';   // our default page
        $this->data['toggle_admin'] = "";

        //Set layout options here, with preserving which layout is currently selected
        $layout_options = array(
            array('layout_name' => 'Standard', 'layout_view' => 'forum_1', 'is_selected' => ''),
            array('layout_name' => 'Distinct', 'layout_view' => 'forum_3', 'is_selected' => ''),
            array('layout_name' => 'Elaborate', 'layout_view' => 'forum_2', 'is_selected' => ''),
            array('layout_name' => 'Something', 'layout_view' => 'forum_4', 'is_selected' => '')
        );
        $this->data['layouts'] = $layout_options;
    }

    /**
     * Render this page
     */
    function render() {
        //if not logged in, display login menu item as well
        //TBD: Make this occur depending on whether session values are set.
        $menu_choices = $this->config->item('menu_choices');
        array_push($menu_choices['menudata'], array('name' => 'Login', 'link' => '/login'));
        //and if login session value would be set, then instead: array_push($this->config->item('menu_choices'), array('name' => 'Logout', 'link' => '/logout')); is
        
        $this->data['menubar'] = $this->parser->parse('_menubar', $menu_choices, true);
        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
        
        //set which layout is currently selected, if possible.
        //This is done here because it is an element of every page with a $forum_view
        //element that is set, and depends on what that element is set to.
        if(isset($this->forum_view)) {
            $curr_layout = $this->forum_view;
            if($curr_layout != null) {
                foreach($this->data['layouts'] as &$layout_option) {
                    if($layout_option['layout_view'] == $curr_layout)
                        $layout_option['is_selected'] = " selected";
                }
            }        
        }

        // finally, build the browser page!
        $this->data['data'] = &$this->data;
        $this->parser->parse('_template', $this->data);
    }

}

/* End of file MY_Controller.php */
/* Location: application/core/MY_Controller.php */