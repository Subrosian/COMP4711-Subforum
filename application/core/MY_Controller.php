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

        //Set layout options here, with preserving which layout is currently selected
        $layout_options = array(
            array('layout_name' => 'Standard', 'layout_view' => 'forum_1', 'is_selected' => ''),
            array('layout_name' => 'Distinct', 'layout_view' => 'forum_3', 'is_selected' => ''),
            array('layout_name' => 'Elaborate', 'layout_view' => 'forum_2', 'is_selected' => ''),
            array('layout_name' => 'Something', 'layout_view' => 'forum_4', 'is_selected' => '')
        );
        $curr_layout = $this->input->post('layout');
        if($curr_layout != null) {
            foreach($layout_options as &$layout_option) {
                if($layout_option['layout_view'] == $curr_layout)
                    $layout_option['is_selected'] = " selected";
            }
        }        
        $this->data['layouts'] = $layout_options;
    }

    /**
     * Render this page
     */
    function render() {
        $this->data['menubar'] = $this->parser->parse('_menubar', $this->config->item('menu_choices'),true);
        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);

        // finally, build the browser page!
        $this->data['data'] = &$this->data;
        $this->parser->parse('_template', $this->data);
    }

}

/* End of file MY_Controller.php */
/* Location: application/core/MY_Controller.php */