<?php

class View {
	
	function render( $template, $params )
	{
		extract( $params );
		
		require("templates/".$template.".html" );
	}
}


?>