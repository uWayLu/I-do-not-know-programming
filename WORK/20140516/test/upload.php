<?php
$uploaddir = 'receivefiles/';
$uploadfile = $uploaddir.basename($_FILES['myfile']['name']);

echo "<pre>";
if (move_uploaded_file($_FILES['myfile']['tmp_name'], $uploadfile)) {
    echo "Upload OK \n";
} else {
    echo "Upload failed \n";
}
print_r($_FILES);

switch ( $_FILES ['myfile'][ 'error' ]){  
     case 1:  
         // 檔案大小超出了伺服器上傳限制 UPLOAD_ERR_INI_SIZE  
         die( "檔案大小超出了伺服器上傳限制 </br> The file is too large (server)." );  
    
     case 2:  
         // 要上傳的檔案大小超出瀏覽器限制 UPLOAD_ERR_FORM_SIZE  
         die( "要上傳的檔案大小超出瀏覽器限制 </br> The file is too large (form)." );  
	 case 3: 
         //檔案僅部分被上傳 UPLOAD_ERR_PARTIAL  
         die( "檔案僅部分被上傳 </br> The file was only partially uploaded." );  
 
     case 4:  
         //沒有找到要上傳的檔案 UPLOAD_ERR_NO_FILE  
         die( "沒有找到要上傳的檔案 </br> No file was uploaded." );  

  	 case 5:  
         //伺服器臨時檔案遺失    
         die( "伺服器臨時檔案遺失 </br> The servers temporary folder is missing." );  

     case 6:  
         //檔案寫入到站存資料夾錯誤 UPLOAD_ERR_NO_TMP_DIR  
         die( "檔案寫入到站存資料夾錯誤 </br> Failed to write to the temporary folder." );  
     
     case 7:  
         //無法寫入硬碟 UPLOAD_ERR_CANT_WRITE  
         die( "無法寫入硬碟 </br> Failed to write file to disk." );  
     
     case 8:  
         //UPLOAD_ERR_EXTENSION  
         die( "File upload stopped by extension." );  
}

echo "</pre>";
?>