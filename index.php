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
        add_action('init', array($this, 'adminAssets'));
    }

    function adminAssets(){
        wp_register_script('ournewblocktype', plugin_dir_url(__FILE__) . 'build/index.js', array('wp-blocks', 'wp-element'));
        register_block_type('ourplugin/are-you-paying-attention', array(
            'editor_script' => 'ournewblocktype',
            'render_callback' => array($this, 'theHTML')
        ));
    }

    function theHTML($attributes) {
        ob_start(); ?>
        <h1> Today the sky is <?php echo esc_html($attributes['skyColor']) ?> and the grass is <?php  echo esc_html($attributes['grassColor']) ?> !!!.</h1>
        <?php return ob_get_clean();
    }
 }

 $areYouPayingAttention = new AreYouPayingAttention();