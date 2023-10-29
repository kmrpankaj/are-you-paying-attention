<?php

/*
     Plugin Name:       Are you paying attention quiz
     Description:       Give your readers a multiple choice question.
     Version:           1.0.0
     Author:            Pankaj Kumar
     Author URI:        http://example.com/
     License:           GPL-2.0+
     License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
     Text Domain:       aypaq
     Domain Path:       /languages
 */

 if(!defined('ABSPATH')) exit; //Exit if accessed directly

 class AreYouPayingAttention {
    function __construct(){
        add_action('enqueue_block_editor_assets', array($this, 'adminAssets'));
    }

    function adminAssets(){
        wp_enqueue_script('ournewblocktype', plugin_dir_url(__FILE__) . 'build/index.js', array('wp-blocks', 'wp-element'));
    }
 }

 $areYouPayingAttention = new AreYouPayingAttention();