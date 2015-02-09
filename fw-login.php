<?php
require_once('config.inc.php');
website::$current_page->menu = new menu_simple();
website::load_layout('layout.inc.php');

//===============================================================

website::$user->print_login_logut_page();