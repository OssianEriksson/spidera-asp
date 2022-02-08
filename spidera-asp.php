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

if ( ! is_admin() ) {
	require_once __DIR__ . '/vendor/autoload.php';

	define( __NAMESPACE__ . '\PLUGIN_FILE', __FILE__ );
	define( __NAMESPACE__ . '\PLUGIN_ROOT', dirname( PLUGIN_FILE ) );

	add_action(
		'init',
		function() {
			$plugin_rel_path = plugin_basename( PLUGIN_ROOT ) . '/languages';
			load_plugin_textdomain( 'spidera-asp', false, $plugin_rel_path );
		}
	);

	add_action(
		'wp_enqueue_scripts',
		function() {
			$asset = require PLUGIN_ROOT . '/build/popup.tsx.asset.php';
			wp_enqueue_style(
				'spidera-asp-popup',
				plugins_url( '/build/popup.tsx.css', PLUGIN_FILE ),
				array( 'wp-components' ),
				$asset['version']
			);
			wp_enqueue_script(
				'spidera-asp-popup',
				plugins_url( '/build/popup.tsx.js', PLUGIN_FILE ),
				$asset['dependencies'],
				$asset['version'],
				true
			);
			wp_set_script_translations(
				'spidera-asp-popup',
				'spidera-asp',
				PLUGIN_ROOT . '/languages'
			);
			wp_localize_script(
				'spidera-asp-popup',
				'php',
				array(
					'imgUrl' => plugins_url( '/img/affisch.png', PLUGIN_FILE ),
				)
			);
		}
	);
}
