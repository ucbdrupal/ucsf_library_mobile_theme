<?php
/**
 * @file
 * 
 * Theme implementation to display a single "Library floorplan" node.
 *
 * @copyright Copyright (c) 2012 UC Regents
 */
require_once UCSF_LIBRARY_MOBILE_MWF_APP_DIR . '/root/assets/lib/decorator.class.php';
require_once UCSF_LIBRARY_MOBILE_MWF_APP_DIR . '/root/assets/config.php';

// aggregate legend items
$legend = array();

$legend_cck_fields = array('field_legend_computers', 'field_legend_elevators',
		'field_legend_photocopiers', 'field_legend_reshelving',
		'field_legend_restrooms', 'field_legend_stairs'); 
$legend_icons_styles = Config::get('ucsf_library', 'parnassus_floorplan_legend_styles');
$legend_icons_titles = Config::get('ucsf_library', 'parnassus_floorplan_legend_labels');

for ($i =0, $n = count($legend_cck_fields); $i < $n; $i++) {
	$field_name = $legend_cck_fields[$i];
	$field = $$field_name;
	if (isset($field) && ! empty($field[0]['value'])) {
		$legend[] = array('title' => $legend_icons_titles[$i], 'params' => array('class' => $legend_icons_styles[$i]));
	}
}

// populate decorator
$decorator =  Site_Decorator::ucsf_library_floorplan($field_library_location[0]['safe']['title'] . ' ' . $title, 
		array(), base_path() . $field_map[0]['filepath'], $legend, $node->content['body']['#value']);
		
echo $decorator->render(true);