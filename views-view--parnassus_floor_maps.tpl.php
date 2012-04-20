<?php
/**
 * @file views-view--parnassus-floor-maps.tpl.php
 * View template for the "Parnassus Floor Plans" view.
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 * - $admin_links: A rendered list of administrative links
 * - $admin_links_raw: A list of administrative links suitable for theme('links')
 *
 * @ingroup views_templates
 * 
 * @copyright Copyright (c) 2012 UC Regents
 */
require_once UCSF_LIBRARY_MOBILE_MWF_APP_DIR . '/root/assets/lib/decorator.class.php';
require_once UCSF_LIBRARY_MOBILE_MWF_APP_DIR . '/root/assets/config.php';

$menu =  Site_Decorator::menu(
  // get title from view display
  empty($view->display[$view->display_id]->display_options['title']) ? 
    $view->display['default']->display_options['title'] : 
	$view->display[$view->display_id]->display_options['title']);
$menu->set_detailed(true);
$menu->set_padded(true);
foreach ($view->result as $node) {
	// HACKETY HACK!
	// trim off any text on all lines after the last colon
	$link_description = preg_replace('/^(.*):([^:]+)$/s','$1', explode("\r\n", $node->node_revisions_body));
	$link_title = $node->node_title . "<br />" 
	            . HTML_Decorator::tag(
	                'span', nl2br(implode("\n", $link_description), true), 
	                array('class' => 'smallprint')
	            )->render(true);
	$menu->add_item($link_title,  base_path() . drupal_get_path_alias('node/' . $node->nid));
}
echo $menu->render(true);