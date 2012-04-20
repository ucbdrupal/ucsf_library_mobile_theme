<?php
/**
 * @file
 * 
 * Theme implementation to display a single "mobile page" node.
 *
 * @copyright Copyright (c) 2012 UC Regents
 */

// only show content if node's "show content" flag is set
if ('yes' == $field_show_content[0]['value']) {
  
  require_once UCSF_LIBRARY_MOBILE_MWF_APP_DIR . '/root/assets/lib/decorator.class.php';
  require_once UCSF_LIBRARY_MOBILE_MWF_APP_DIR . '/root/assets/config.php';
  
  $decorator = Site_Decorator::content();
  $decorator->set_padded();
  $decorator->add_header($title);

  // HACK!
  // split content by "<h4>" tag
  // and add each text chunk as section
  $content = explode("<h4>", $content);
  $section = array_shift($content);
  if (! empty($section)) {
  	$decorator->add_section($section);
  }
  foreach ($content as $section) {
    $decorator->add_section('<h4>' . $section);
  }
  echo $decorator->render(true);
}

// display the page menu below the page content, if present
if (!empty($mobile_page_menu)) {
  echo $mobile_page_menu;
}
