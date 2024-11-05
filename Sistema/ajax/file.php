<?php 
if(isset($_FILES)){
  var_dump($_FILES);
}
$phpFileUploadErrors = array(
    0 => 'There is no error, the file uploaded with success',
    1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
    2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
    3 => 'The uploaded file was only partially uploaded',
    4 => 'No file was uploaded',
    6 => 'Missing a temporary folder',
    7 => 'Failed to write file to disk.',
    8 => 'A PHP extension stopped the file upload.',
);
var_dump($phpFileUploadErrors)
?>
<a href="https://oregoom.com/php/files/">Lectura de apoyo</a>
<form id="form-file" enctype="multipart/form-data">
    <label for="file">Archivo</label>
    <input type="file" id="file" accept="" name="archivo">

    <button type="button" onclick="enviar_file()">enviare</button>
</form>