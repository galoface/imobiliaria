<?php
	
	spl_autoload_register(function($nameClass) {
		$path = '';		
		$caminho  = str_replace('\\', DIRECTORY_SEPARATOR, $nameClass . ".php");
		$fileName = $path . $caminho;
		if ($nameClass == "Connection") {			
			require_once("..\..\Infra\Connection\Connection.php");
		}
		else {
			if(!file_exists($fileName)) {

				for ($i=0; $i < 10; $i++) { 
					$path .= '..\\';
					$fileName = $path . $caminho;
					if(file_exists($fileName)) {					
						require_once($fileName);
						break;
					}
				}
			}else{
				require_once($fileName);
			}
		}
	});
?> 