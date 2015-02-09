<?php

    //LOCALE
    setlocale(LC_ALL, 'SPANISH');
        
    //TIMEZONE defined in various ways:
	if ( ! defined ('MY_TIMEZONE') ) { define('MY_TIMEZONE','Europe/Madrid'); }
	if( ! ini_get('safe_mode') ) { @putenv("TZ=".constant('MY_TIMEZONE')); }
	ini_set('date.timezone',constant('MY_TIMEZONE'));
	date_default_timezone_set(constant('MY_TIMEZONE'));
    
