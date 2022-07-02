<?php 
$m_strHost = "localhost";
$m_strDbName = "ultra_tools";
$m_strLogin = "root";
$m_strPwd = "";

$m_Mysql = null;
  
$m_Mysql = mysqli_connect($m_strHost, $m_strLogin, $m_strPwd, $m_strDbName);
$m_Mysql->set_charset("utf8mb4");


$data = $_POST['data'];

$i=0;
foreach ($data['rows'] as $uniq) {
    $strQuery = "SELECT * FROM `tokenfactory` WHERE Id = $uniq[token_factory_id]";
        //echo $strQuery;
    $result = mysqli_query($m_Mysql, $strQuery);
    while ($row = mysqli_fetch_row($result)) {
        $data['rows'][$i]['CollectionName']=$row[1];
        $data['rows'][$i]['Name']=$row[2];
        $data['rows'][$i]['Description']=$row[3];
        $data['rows'][$i]['Product']=$row[4];
        $data['rows'][$i]['Square']=$row[5];
        $data['rows'][$i]['Hero']=$row[6];
        $data['rows'][$i]['Type']=$row[7];

    }



    $i++;
}

    echo json_encode($data['rows']);
   

?>