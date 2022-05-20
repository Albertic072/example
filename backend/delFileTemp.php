<?php
$fileTemp = (int)$_POST['fileTemp'];
if($fileTemp == 1)
{
   $files = glob($_SERVER['DOCUMENT_ROOT'].'/downloads/temp/*'); // get all file names
   foreach($files as $file){ // iterate files
   if(is_file($file))
      unlink($file); // delete file
   }
}
else
{
   unlink($_SERVER['DOCUMENT_ROOT'].'/downloads/temp/'.$_POST['fileTemp'].'');
}
?>