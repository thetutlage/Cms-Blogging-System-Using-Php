<?php

	class Controller{
		public $load;
		public $model;
		
		function __construct(){
			$this->load = new Load();
			$this->model = new Model();
			$this->init();
		}
		function init(){
			if(isset($_SERVER['QUERY_STRING']) && ($_SERVER['QUERY_STRING'] != ''))
			{
				$filename = explode('=',$_SERVER['QUERY_STRING']);
				$incl_file = $this->renderFiles($filename[0]);
			}
			else
			{
				$incl_file = $this->renderFiles();
			}
			$this->load->getFiles('themes/portfolio/'.$incl_file);
		}
		
		function renderFiles($url_reference = null)
		{
			if(isset($url_reference))
			{
				if($url_reference == 'post')
				{
					$filename = 'single.php';
				}
				elseif($url_reference == 'category')
				{
					$filename = 'category.php';
				}
				elseif($url_reference == 'search')
				{
					$filename = 'search.php';
				}
				// adding a new url refrence on comment submission
				elseif($url_reference == 'comments')
				{
					$filename = 'manage_comments.php';
				}
			}
			else
			{
				$filename = 'index.php';
			}
			return $filename;
		}
	}

?>