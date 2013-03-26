<?php
	class Load{
		function getFiles($filename)
		{
			if(file_exists($filename))
			{
				include_once($filename);
			}
		}
	}
?>