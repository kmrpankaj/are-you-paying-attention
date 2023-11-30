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
        register_block_type(__DIR__, array(
            'render_callback' => array($this, 'theHTML')
        ));
    }

    function theHTML($attributes) {
       if(!is_admin()){
        wp_enqueue_script('attentionFrontend', plugin_dir_url(__FILE__) . 'build/frontend.js', array('wp-element'), '1.0', true);
       }
        ob_start(); ?>
        <div class="paying-attention-update-me"><pre style="display:none;"><?php echo wp_json_encode($attributes) ?></pre></div>
        <?php return ob_get_clean();
    }
 }

$areYouPayingAttention = new AreYouPayingAttention();