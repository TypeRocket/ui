<?php
if(!defined('WP_UNINSTALL_PLUGIN')) {
	echo "Hi there! Nice try. Come again.";
	exit;
}

delete_option('typerocket_registered');
delete_option('_typerocket_site_state_changed');