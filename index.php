<?php 
$dir = 'корневой каталог/';
 $wey = iconv('utf-8', 'utf-8//IGNORE', $dir);
 echo $wey;

if (is_dir($dir)) {
	 // echo 'hellow';
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
        	// $convertedText = iconv('windows-1251', 'utf-8', $file);
        	
        	 
        		if(preg_match('/[А-Я,а-я,0-9]/', $file)){

        		$type = filetype($dir . $file);
        		$size = filesize($dir . $file);
        			if($type == 'dir'){
        				$img = 'images/folder.png';
        			}
        			else{
        				$img = 'images/text.png';
        			}
        		 $convertedText = iconv('utf-8', 'utf-8//IGNORE', $file);
        		$dir1 = $dir.$file.'/';
        			if(preg_match('/[0-9]/', $file)){
        				$sub = "";
        			}
        			else{
        				$sub = "<input type='submit' value='открыть'>";
        				
        			}

        		echo 	"<form method='post' action='dir.php'>
						<img src=$img style='margin:5px;height:40px;weight:50px;'>
        				$sub
        				<p><input type='radio' name='radiobutton' value='$dir1'><b>файл:$convertedText: тип: $type размер:  $size байт</b></p><br/>
  						
  						</form>";
        		
        		}
        	
            
        }
        closedir($dh);
    }
}


 ?>