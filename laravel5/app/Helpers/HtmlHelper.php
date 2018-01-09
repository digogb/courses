<?php

if ( ! function_exists('explodeDivColumns')) 
{
	function explodeDivColumns($cols)
	{

		$colsSplitted = explode(" ", $cols);


		$xs = array_key_exists(0, $colsSplitted) ? "col-xs-" . $colsSplitted[0] : "12";
		$sm = array_key_exists(1, $colsSplitted) ? "col-sm-" . $colsSplitted[1] : "";
		$md = array_key_exists(2, $colsSplitted) ? "col-mtd-" . $colsSplitted[2] : "";
		$lg = array_key_exists(3, $colsSplitted) ? "col-lg-" . $colsSplitted[3] : "";

		return rtrim($xs .' '. $sm .' '. $md .' '. $lg);

	}
}

