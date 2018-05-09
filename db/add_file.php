<?php 
    $errMsg="업로드 실패!";
    
    if($_FILES["upload"]["error"] == UPLOAD_ERR_OK){
        $tname = $_FILES["upload"]["tmp_name"];
        $fname = $_FILES["upload"]["name"];
        $fsize = $_FILES["upload"]["size"];
        
        $save_name = iconv("utf-8", "cp949", $fname);
        
        if(file_exists("file/$save_name"))
            $errMsg = "이미 업로드한 파일입니다.";
        else if(move_uploaded_file($tname, "file/$save_name")){
            require("attachedDao.php");
            $dao = new attachedDao();
            $dao->addFileInfo($fname, date("Y-m-d H:i:s"), $fsize);
            
            header("Location: webhard.php?sort=$_REQUEST[sort]". "$dir=$_REQUEST[dir]");
            
            exit();
        }
            
    }
?>

<!doctype html>

<html>
	<head>
		<body>
			
			<script>
				alert('<?=$errMsg?>');
				history.back();
			</script>
		</body>
	</head>
</html>