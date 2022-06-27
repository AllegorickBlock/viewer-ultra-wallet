

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
	//echo $json['media']['images']['product'];

	$url = 'https://api.ultra.eossweden.org/v1/chain/get_table_rows';

	$data = [
		"code"=> "eosio.nft.ft",
    	"table"=> "factory.a",
    	"scope"=> "eosio.nft.ft",
    	"json"=> true,
    	"limit"=> 1
	];

	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));
	curl_setopt($curl, CURLOPT_HTTPHEADER, [
  'Content-Type: application/json'
]);
	$response = curl_exec($curl);
	curl_close($curl);
	echo $response;
?>	
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Futur Elon musk</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  </head>
  <body>
    <img src="<?php echo 'unzip/'.$json['media']['images']['product'];?>" width="200" height="200">
  </body>
</html>
<script>
	$.ajax({
		type: 'POST',
		url:  'https://ultra.eosrio.io/v1/chain/get_table_rows',
		dataType: 'json',
		data: JSON.stringify({
			    "code": "eosio.nft.ft",
			    "table": "factory.a",
			    "scope": "eosio.nft.ft",
			    "json": true,
			    "limit": 1
			}),
		}).done(function(data){

			var url=data['rows'][0]['meta_uris'][0];     
     		window.open(url, 'Download');
			// console.log(data['rows'][0]['meta_uris'][0]);
			// $.ajax({
			// 	type: 'POST',
			// 	url:  data['rows'][0]['meta_uris'][0],
				
				
			// 	}).done(function(data){
			// 		console.log(data);
			// 		window.location = data;
			// 	});
		});



</script>