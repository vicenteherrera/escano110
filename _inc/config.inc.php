<?php

    //Set timezone and locale
    require_once(dirname(__FILE__)."/locale.inc.php");
    
	//Check for maintenance mode
	require_once(dirname(__FILE__)."/config_wip.inc.php");
    
	//phpFastWeb
	require_once(dirname(__FILE__)."/../_fastweb/phpfastweb.inc.php");
    
	//Add bussines logic directory to class autoload
    //Path must be relative so cache can be shared with different hostings
    cache::add_dir_to_autoload('../../_logic/');

	//Website configuration
	website::$default_web_page_title = 'Escaño 110';
    website::set_wip_dates($wip_start, $wip_end);
	website::set_developer_mode( false || in_array(strtolower($_SERVER['SERVER_NAME']), array('localhost','127.0.0.1','192.168.1.100') ) );
	//url::set_url_separator('&amp;');
	url::set_url_separator('&');
	  
	//Database configuration   
	//Deployed
	$db_cfg['remote']     			    = new database_config();
	$db_cfg['remote']->caller_host 	    = 'remote';
	$db_cfg['remote']->ip 			    = 'localhost';
	$db_cfg['remote']->db_name  		= 'escano110';    
	$db_cfg['remote']->user 		    = 'escano110';
	$db_cfg['remote']->password 	    = '3pDep89pT6';

	//Development
	$db_cfg['127.0.0.1']     			=  new database_config();
	$db_cfg['127.0.0.1']->caller_host 	= 'localhost';
	$db_cfg['127.0.0.1']->ip 			= 'localhost';
	$db_cfg['127.0.0.1']->db_name 		= 'escano110';    
	$db_cfg['127.0.0.1']->user 			= 'root';
	$db_cfg['127.0.0.1']->password 		= '';
    
    $db_cfg['192.168.1.100'] = $db_cfg['terminal40']  = $db_cfg['127.0.0.1']; 
	
	if ( isset( $db_cfg[ strtolower( $_SERVER['SERVER_NAME']) ] ) ) {
        website::$database = new database($db_cfg[ strtolower( $_SERVER['SERVER_NAME'])]);	
	} else {
		website::$database = new database($db_cfg['remote']);
	}	
	website::$database->db_config->type = database_config::TYPE_MYSQL;
	website::$database->use_persistent_conection = false;
	website::$database->init_config();

	//Website configuration initialisation
	website::init_config();
	website::$theme = new theme_config('modern');
	//User configuration
	website::$user = new user(website::$database);
    website::$user->user_table_columns['id_empresa']='id_empresa';
    website::$user->user_table_columns['date_of_birth']='date_of_birth';
    website::$user->group_names = array(
        'administrador'=>'Administrador/a',
        'usuario'=>'Usuario/a'
    );
	website::$user->load();
	
	if ( website::in_developer_mode() ) {
	   
	   website::$base_url = 'http://127.0.0.1/escano110';
    }

