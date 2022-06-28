<?php 
//echo $_POST['Link'];
print_r($_POST);
$url = $_POST['Link'];
      
    $file_name = basename($url);

    if (file_put_contents('zip/'.$file_name, file_get_contents($url))){
        echo "File downloaded successfully ";
    }
    else{
        echo "File downloading failed.";
    }
    //echo '-'.$rest = substr($file_name, 8);
    $zipArchive = new ZipArchive;
    echo '-'.$_POST['Id'].'-';
    $result = $zipArchive->open('zip/'.$_POST['Hash'].'.zip',5);
    if ($result === TRUE) {
        $zipArchive ->extractTo("unzip/".$_POST['Id']);
        $zipArchive ->close();
        echo "unziped ";
    }
    else{
    	echo "wola ça a raté ";
    }
?>