<?php 
//session_start();
	$error = "";
	$msg = "";
	$fileElementName = 'file';

			$msg .= " نام فایل: " . $_FILES['file']['name'] . ", ";
			$msg .= " حجم فایل: " . @filesize($_FILES['file']['tmp_name']);
			
			$file_name = time().$_FILES['file']['name'];
			$file_name = str_replace('/','',$file_name);
			$upfile = "./file/".$file_name;
			move_uploaded_file($_FILES['file']['tmp_name'], $upfile);
		//	$_SESSION['file_name2'] = $file_name;
			//for security reason, we force to remove all uploaded file
			@unlink($_FILES['file']);	
			$size =  @filesize($_FILES['file']['tmp_name']);
			if ( $size > 100000000){
					$err = '1';
			}
			else {
					$err = 'فایل با موفقیت ارسال شد<br />'.$msg;
			}	
		
	
	echo json_encode (array( 'err'=>$err , 'fileName'=> $file_name));


?>