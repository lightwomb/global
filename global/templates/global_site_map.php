<nav>
	<button id="sitemap">
	</button>
	<?php
		$target = SITE_ROOT.DS; 
		$weeds = array('.', '..'); 
		$directories = array_diff(scandir($target), $weeds); 

		foreach($directories as $value) 
		{ 
		   if(is_dir($target.$value)) 
		   {  
		      echo makeLink($target,$value,'in_root_dir'); // last value sets css class of list item link
		   } 
		   fn_auto_load_dirTree($target.$value.DS);		
		}
	?>
</nav>