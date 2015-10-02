<?php
//$carpetaAdjunta = "upload/";
//
//$imagenes = count($_FILES['upload']['name']);
//
//for($i = 0; $i<$imagenes ; $i++){
//    $nombreArchivo=$_FILES['upload']['name'];
//    $nombreTemporal=$_FILES['upload']['tmp_name'][$i];
//    
//    $rutaArchivo=$carpetaAdjunta.$nombreArchivo;
//    
//    move_uploaded_file($nombreTemporal, $rutaArchivo);
//    
//    $infoImagenesSubidas[$i]=array("caption"=>"$nombreArchivo","height"=>"120px", "url"=>"borrar.php","key"=>$nombreArchivo);
//    $ImagenesSubidas[$i]="<img height='120px' src='$rutaArchivo' class='file-preview-image'>";
//}
//
//
//    $arr = array("file_id"=>0,"overwriteInitial"=>true,"initialPreviewConfig"=>$infoImagenesSubidas,
//        "initialPreview"=>$ImagenesSubidas);
//    
//    echo json_encode($arr);
//
// upload.php
// 'images' refers to your file input name attribute
if (empty($_FILES['imagenes'])) {
    echo json_encode(['error'=>'No files found for upload.']); 
    // or you can throw an exception 
    return; // terminate
}

// get the files posted
$images = $_FILES['imagenes'];

// a flag to see if everything is ok
$success = null;

// file paths to store
$paths= [];

// get file names
$filenames = $images['name'];

// loop and process files
for($i=0; $i < count($filenames); $i++){
    $ext = explode('.', basename($filenames[$i]));
    $target = "uploads" . DIRECTORY_SEPARATOR . md5(uniqid()) . "." . array_pop($ext);
    if(move_uploaded_file($images['tmp_name'][$i], $target)) {
        $success = true;
        $paths[] = $target;
    } else {
        $success = false;
        break;
    }
}

// return a json encoded response for plugin to process successfully
echo json_encode($output);