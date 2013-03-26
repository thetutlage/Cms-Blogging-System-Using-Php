<?php include_once( 'includes/header.php' ); 
	include_once( 'scripts/manage_themes.php' );
?>
<?php
	$dir = '../themes/';
	$folder = scandir($dir);
	$current_theme = array($theme_name);
	$available_themes = array_diff($folder,$current_theme);
	$outputtheme = '';
	
	foreach($available_themes as $key => $value)
	{
		if($value !== '.' && $value !== '..')
		{
			$outputtheme .= '<div class="themes">
				<h2> Theme Name :- '.$value.'</h2>';
		
			$filename = $dir.$value.'/style.css';
			$handle = fopen($filename,"r");
			
			if($handle)
			{
				$string = array("*/", "/*");
				$replace = '';
				
				$outputtheme .= '<ul>';
				
				while(($buffer = fgets($handle,4096)) !== false)
				{
					if(trim($buffer) == '*/')
					{
						break;
					}
					$outputtheme .= '<li>'.str_replace($string,$replace,$buffer).'</li>';
				}
				$outputtheme .= '
					<li><a href="themes.php?theme='.$value.'" id="activate_theme"> Activate </a> | <a href="themes.php?delete='.$value.'" id="delete_theme"> Delete </a>
						<input type="hidden" id="theme_name" value="'.$value.'" />
						</li>
				
				</ul></div>';
			}
			
		
		}
	}
?>


		<div id="subheader">
			<div class="col-full">
				<ul id="submenu">
				</ul>
			</div>
		</div>

		<div id="themes_pane" class="col-full">
			<h2> Current Theme </h2>
			<?php if(isset($output)) { echo $output; } ?> 
			<div class="clear"></div>
			
			<h2> Available Themes </h2>
			<?php echo $outputtheme; ?>
			
		</div><!-- end themes_pane -->


	</div><!--end mainWrapper-->
</body>
</html>