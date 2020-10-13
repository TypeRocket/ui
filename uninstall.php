<?php
if(!defined('WP_UNINSTALL_PLUGIN')) {
	echo "Hi there! Nice try. Come again.";
	exit;
}

delete_option('tr_registered');
delete_option('_tr_site_state_changed');