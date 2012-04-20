<?php
/**
 * @file
 * 
 * Theme implementation to display a single "Library location" node.
 *
 * @copyright Copyright (c) 2012 UC Regents
 */
require_once UCSF_LIBRARY_MOBILE_MWF_APP_DIR . '/root/assets/lib/decorator.class.php';
require_once UCSF_LIBRARY_MOBILE_MWF_APP_DIR . '/root/assets/config.php';

// populate menu decorator with data from the location node
$decorator =  Site_Decorator::ucsf_library_location_menu($node->title,
  array(),
  $field_map_link[0]['display_url'],
  $node->content['body']['#value'],
  $field_phone[0]['value'],
  $field_hours[0]['value'],
  'http://library.ucsf.edu/locations/hours?ovrrdr=1' // @todo make this configurable
);

echo $decorator->render(true);