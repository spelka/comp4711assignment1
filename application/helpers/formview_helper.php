<?php

if (!defined('APPPATH'))
    exit('No direct script access allowed');
	
	
	
/**
* formview_helper.php
* 
* This file provides functions that create HTML elements for displaying advertisements
*/

/* 
* Creates a h1 element to house the title of the advertisement 
*
* @param containerID: The ID of the div element that wraps the title
* @param elementID: the ID of the h1 element that houses the title of the advertisements
* @param content: the title of the advertisement
*/

if (!function_exists('makeTitleField')) {

    function makeTitleField($containerID, $elementID, $content)
	{
        $CI = &get_instance();
        $parms = array(
            'containerID' => $containerID,
            'elementID' => $elementID,
            'content' => $content)
        );
        return $CI->parser->parse('_fields/view_title', $parms, true);
    }

}

/* 
* Creates a h6 element to house the category of the advertisement 
*
* @param containerID: The ID of the div element that wraps the title
* @param elementID: the ID of the h1 element that houses the title of the advertisements
* @param content: the title of the advertisement
*/

if (!function_exists('makeCategoryField')) {

    function makeCategoryField($containerID, $elementID, $content)
	{
        $CI = &get_instance();
        $parms = array(
            'containerID' => $containerID,
            'elementID' => $elementID,
            'content' => $content)
        );
        return $CI->parser->parse('_fields/view_category', $parms, true);
    }

}

?>