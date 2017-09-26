<?php
/**
 * @version		2.2
 * @package		Example K2 Plugin (K2 plugin)
 * @author		JoomlaWorks - http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2014 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die ;

/**
 * K2 Lity Plugin. Lity is a ultra-lightweight, accessible and responsive lightbox plugin which supports images, iframes and inline content out of the box. Copyright (c) 2015-2017 Jan Sorgalla. Released under the MIT license. More on Lity: https://sorgalla.com/lity/
 */

// Load the K2 Plugin API
JLoader::register('K2Plugin', JPATH_ADMINISTRATOR.'/components/com_k2/lib/k2plugin.php');
$document = JFactory::getDocument();
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/lity/2.3.0/lity.min.js');
$document->addStyleSheet('https://cdnjs.cloudflare.com/ajax/libs/lity/2.3.0/lity.min.css');

// Initiate class to hold plugin events
class plgK2Lity extends K2Plugin
{

	// Some params
	var $pluginName = 'lity';
	var $pluginNameHumanReadable = 'K2 Lity Plugin';

	function __construct(&$subject, $params)
	{
		parent::__construct($subject, $params);

	}

	/**
	 * Below we list all available FRONTEND events, to trigger K2 plugins.
	 * Watch the different prefix "onK2" instead of just "on" as used in Joomla! already.
	 * Most functions are empty to showcase what is available to trigger and output. A few are used to actually output some code for example reasons.
	 */

	function onK2PrepareContent(&$item, &$params, $limitstart)
	{
		$mainframe = JFactory::getApplication();
		//$item->text = 'It works! '.$item->text;
	}

	function onK2AfterDisplay(&$item, &$params, $limitstart)
	{
		$mainframe = JFactory::getApplication();
		return '';
	}

	function onK2BeforeDisplay(&$item, &$params, $limitstart)
	{
		$mainframe = JFactory::getApplication();
		return '';
	}

	function onK2AfterDisplayTitle(&$item, &$params, $limitstart)
	{
		$mainframe = JFactory::getApplication();
		return '';
	}

	function onK2BeforeDisplayContent(&$item, &$params, $limitstart)
	{
		$mainframe = JFactory::getApplication();
		return '';
	}

	// Event to display (in the frontend) the YouTube URL as entered in the item form
	function onK2AfterDisplayContent(&$item, &$params, $limitstart)
	{
		$mainframe = JFactory::getApplication();

		// Get the output of the K2 plugin fields (the data entered by your site maintainers)
		$plugins = new K2Parameter($item->plugins, '', $this->pluginName);

		$youtubeID = $plugins->get('youtubeID');
		$vimeoID = $plugins->get('vimeoID');
		$mapsURL = $plugins->get('mapsURL');
		
		$youtubeBUTTON = $plugins->get('youtubeBUTTON');
		$vimeoBUTTON = $plugins->get('vimeoBUTTON');
		$mapsBUTTON = $plugins->get('mapsBUTTON');

		// Check if we have a value entered for the Youtube video ID
		if (!empty($youtubeID)) {

		// Output
		$youtubeoutput = '
		<div class="lity-item"><a class="'.$this->params->get('btnCLASS').'" href="//www.youtube.com/watch?v='.$youtubeID.'" data-lity>'.$youtubeBUTTON.'</a></div>
		';
		}
		
		// Check if we have a value entered for the Vimeo video ID
		if (!empty($vimeoID)){

		// Output
		$vimeooutput = '
		<div class="lity-item"><a class="'.$this->params->get('btnCLASS').'" href="//vimeo.com/'.$vimeoID.'" data-lity>'.$vimeoBUTTON.'</a></div>
		';
		}
		
		// Check if we have a value entered for Google Maps
		if (!empty($mapsURL)){

		// Output
		$mapsoutput = '
		<div class="lity-item"><a class="'.$this->params->get('btnCLASS').'" href="//maps.google.com/maps?q='.$mapsURL.'" data-lity>'.$mapsBUTTON.'</a></div>
		';
		}
		
		$output = $youtubeoutput . $vimeooutput . $mapsoutput ;
		return $output;
	}



} // END CLASS
