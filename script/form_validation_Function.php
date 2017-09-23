<?php
/* Form Validation Script */


function is_empty($value){
	if (!isset($value) || $value === "")
		return true;
	else
		return false;
}

function has_max_length($value, $max) {
	/*Using trim() doesn't remove extra space count */
	if ( strlen($value) <= $max )
		echo "Done. " . strlen($value) ;
	else
		echo "Failed. " . strlen($value) ;
}

function contains_numbers($String){
    if( preg_match('/\\d/', $String) > 0 )
    	return true;
    else
    	return false;
}

function contains_punctuations($String){
	/*If Contain Other Characters Except This a-z|A-Z|Space Then Not Acceptable*/
    if( preg_match('/[^a-zA-Z ]/', $String) > 0 )
    	return true ;
    else
    	return false;
}

function contains_characters($String){
	/*If Contain Other Characters Except 0-9 and space Then Not Acceptable*/
    if( preg_match('/[^0-9]/', $String) > 0 )
    	return true;
    else
    	return false;
}

function its_none($String){
    if( strtolower($String) == "none" )
    	return true ;
    else
    	return false;
}





?>