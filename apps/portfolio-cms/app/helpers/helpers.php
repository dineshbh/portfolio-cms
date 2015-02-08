<?php

// takes html text input and returns the 1st paragraph
function first_paragraph($html) 
{
	$start = strpos($html, '<p>');
	$end = strpos($html, '</p>', $start);
	$paragraph = substr($html, $start, $end-$start+4);

	return $paragraph;
}