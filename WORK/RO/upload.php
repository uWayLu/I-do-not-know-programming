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
         // �ɮפj�p�W�X�F���A���W�ǭ��� UPLOAD_ERR_INI_SIZE  
         die( "�ɮפj�p�W�X�F���A���W�ǭ��� </br> The file is too large (server)." );  
    
     case 2:  
         // �n�W�Ǫ��ɮפj�p�W�X�s�������� UPLOAD_ERR_FORM_SIZE  
         die( "�n�W�Ǫ��ɮפj�p�W�X�s�������� </br> The file is too large (form)." );  
	 case 3: 
         //�ɮ׶ȳ����Q�W�� UPLOAD_ERR_PARTIAL  
         die( "�ɮ׶ȳ����Q�W�� </br> The file was only partially uploaded." );  
 
     case 4:  
         //�S�����n�W�Ǫ��ɮ� UPLOAD_ERR_NO_FILE  
         die( "�S�����n�W�Ǫ��ɮ� </br> No file was uploaded." );  

  	 case 5:  
         //���A���{���ɮ׿�    
         die( "���A���{���ɮ׿� </br> The servers temporary folder is missing." );  

     case 6:  
         //�ɮ׼g�J�쯸�s��Ƨ����~ UPLOAD_ERR_NO_TMP_DIR  
         die( "�ɮ׼g�J�쯸�s��Ƨ����~ </br> Failed to write to the temporary folder." );  
     
     case 7:  
         //�L�k�g�J�w�� UPLOAD_ERR_CANT_WRITE  
         die( "�L�k�g�J�w�� </br> Failed to write file to disk." );  
     
     case 8:  
         //UPLOAD_ERR_EXTENSION  
         die( "File upload stopped by extension." );  
}

echo "</pre>";
?>