<?php 
$m_strHost = "localhost";
$m_strDbName = "ultra_tools";
$m_strLogin = "root";
$m_strPwd = "";

$m_Mysql = null;
  
$m_Mysql = mysqli_connect($m_strHost, $m_strLogin, $m_strPwd, $m_strDbName);
$m_Mysql->set_charset("utf8mb4");


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

    $strJsonFileContents = file_get_contents("unzip/$_POST[Id]/manifest.json");
    $json = json_decode($strJsonFileContents,true);
    $collectionName = $json['subName'];
    $description = $json['description'];
    $id=$_POST['Id'];
    echo $strQuery = "INSERT INTO `tokenfactory`(`Id`, `CollectionName`, `Description`) VALUES ($id,`$collectionName`,`$description`)";
        //echo $strQuery;
    mysqli_query($m_Mysql, $strQuery);

?>