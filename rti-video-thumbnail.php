<?php

/*
Plugin Name: RTI Video Thumbnail
Plugin URI:
Description: Extract thumbnail from Video URL
Version: 0.0.1
Author: Results Theory
Author URI:
License: GPLv2
*/

namespace RTI\VideoThumbnail;
define('RTI_VIDEO_THUMBNAIL_PLUGIN', __FILE__);
define('RTI_VIDEO_THUMBNAIL_PATH', dirname(__FILE__));

// Leverage the code from the Video Thumbnails plugin
require_once("providers/providers.php");

function get_video_thumbnail($url) {
    $providers = apply_filters('video_thumbnail_providers', []);
    foreach($providers as $provider) {
        $thumb = $provider->scan_for_thumbnail($url);
        if($thumb) {
            return $thumb;
        }
    }
}
