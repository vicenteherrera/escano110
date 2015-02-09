<?php

	$wip_start = '';$wip_end='';
	if (is_file(dirname(__FILE__).'/wip_dates.inc.php') ) { //}&& ! $developer ) {
		@include(dirname(__FILE__).'/wip_dates.inc.php');
		if ( ! defined('MY_TIMEZONE') ) @define('MY_TIMEZONE','Europe/Madrid');
		if ( ! ini_get('safe_mode') ) { @putenv("TZ=".constant('MY_TIMEZONE')); }
		ini_set('date.timezone',constant('MY_TIMEZONE'));
		date_default_timezone_set(constant('MY_TIMEZONE'));
		$start = strtotime($wip_start);	$end = strtotime($wip_end); $now = time();
		$wip = false;
		if ($start < $now && $now < $end ) {
			require(dirname(__FILE__).'/wip.php'); 
            die;
		}
	}