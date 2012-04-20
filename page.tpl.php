<?php
/**
 * @file
 *
 * Theme implementation to display a single Drupal page.
 * 
 * @copyright Copyright (c) 2012 UC Regents
 */ 

require_once UCSF_LIBRARY_MOBILE_MWF_APP_DIR . '/root/assets/lib/decorator.class.php';
require_once UCSF_LIBRARY_MOBILE_MWF_APP_DIR . '/root/assets/config.php';

echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title($head_title)->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header('<a href="/library">Library</a>')->render(true);
echo $content;
echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();