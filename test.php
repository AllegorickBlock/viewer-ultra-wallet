

<?php

	$zipArchive = new ZipArchive;
    $result = $zipArchive->open("db17256e8e5a715342e99e3c820e3798df4b77dd80d526742c2babffac582175.zip",5);
    if ($result === TRUE) {
        $zipArchive ->extractTo("unzip/");
        $zipArchive ->close();
        //echo "unziped";
    }
    else{
    	echo "wola ça a raté";
    }

    $strJsonFileContents = file_get_contents("unzip/manifest.json");
    //echo $strJsonFileContents;
	$json = json_decode($strJsonFileContents,true);
	echo $json['media']['images']['product'];


?>
<img src="<?php echo 'unzip/'.$json['media']['images']['product'];?>" width="200" height="200">