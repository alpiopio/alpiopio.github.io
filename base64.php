<?php
class Base_Enam_Empat {
	function base64($file, $limit_size, $limit_width){
		define('SCALE', '1024');
		;
		$allowed_ext = array('jpg', 'jpeg', 'png', 'gif');
		
		if(isset($_FILES[$file])){
			$file = $_FILES[$file];
			$file_tmp = $file['tmp_name'];
			$file_name = $file['name'];
			$file_ext = strtolower(end(explode('.', $file_name)));
			
			$size = filesize($file_tmp);
			$allowed_size = SCALE * $limit_size;
			
			if($size < $allowed_size){
				if(in_array($file_ext, $allowed_ext) === true){
					if($file_ext == 'jpg' || $file_ext == 'jpeg'){
						$src = imagecreatefromjpeg($file_tmp);
					}elseif($file_ext == 'png'){
						$src = imagecreatefrompng($file_tmp);
					}elseif($file_ext == 'gif'){
						$src = imagecreatefromgif($file_tmp);
					}
					
					list($width,$height)=getimagesize($file_tmp);
					$new_width = $limit_width;
					$new_height=($height/$width) * $new_width;
					$tmp = imagecreatetruecolor($new_width, $new_height);
					imagecopyresampled($tmp, $src, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
					imagejpeg($tmp, $file_tmp, 100);
					imagedestroy($src);
					imagedestroy($tmp);
					
					$type = pathinfo($file_tmp, PATHINFO_EXTENSION);
					$data = file_get_contents($file_tmp);
					$base64 = 'data:image/'.$type.';base64,'.base64_encode($data);
					
					return $base64;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
}
?>
