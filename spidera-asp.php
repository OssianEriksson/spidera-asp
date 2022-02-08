<?php
/**
 * Main plugin file
 *
 * Spidera-asp
 * Copyright (C) 2022  Ossian Eriksson
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 *
 * Plugin Name: Spidera-asp
 * Description: WordPress plugin advertising Spidera.
 * Version: 1.0.0
 * Text Domain: spidera-asp
 * Domain Path: /languages
 * Author: Ossian Eriksson
 * Author URI: https://github.com/OssianEriksson
 * Licence: GLP-3.0
 *
 * @package ftek/spidera-asp
 */

namespace Ftek\SpideraAsp;

if ( ! defined( 'WPINC' ) ) {
	exit;
}

require_once __DIR__ . '/vendor/autoload.php';

define( __NAMESPACE__ . '\PLUGIN_FILE', __FILE__ );
define( __NAMESPACE__ . '\PLUGIN_ROOT', dirname( PLUGIN_FILE ) );

/**
 * Loads the plugin's translated strings
 */
function load_translations() {
	$plugin_rel_path = plugin_basename( PLUGIN_ROOT ) . '/languages';
	load_plugin_textdomain( 'spidera-asp', false, $plugin_rel_path );
}

add_action( 'init', __NAMESPACE__ . '\load_translations' );
