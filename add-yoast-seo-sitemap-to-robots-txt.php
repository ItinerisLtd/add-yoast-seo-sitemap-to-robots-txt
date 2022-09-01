<?php
/**
 * Plugin Name:     Add Yoast SEO Sitemap to robots.txt
 * Plugin URI:      https://itinerisltd.github.io/add-yoast-seo-sitemap-to-robots-txt/
 * Description:     Add Yoast SEO Sitemap to robots.txt
 * Version:         0.1.1
 * Author:          Itineris Limited
 * Author URI:      https://www.itineris.co.uk/
 * Text Domain:     add-yoast-seo-sitemap-to-robots-txt
 */

declare(strict_types=1);

namespace Itineris\AddYoastSEOSitemapToRobotsTxt;

use WPSEO_Sitemaps_Router;

// If this file is called directly, abort.
if (! defined('WPINC')) {
    die;
}

add_filter('robots_txt', function ($output): string {
    // TODO: Give warnings if yoast seo not found!
    if (class_exists('WPSEO_Sitemaps_Router')) {
        $output .= "\n";
        $output .= "\nSitemap: " . esc_url(WPSEO_Sitemaps_Router::get_base_url('sitemap_index.xml')) . "\n";
    }

    return $output;
}, 999);
