<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Futur Elon musk</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  </head>
  <body>
    Wallet
  </body>
</html>
<script>
  $.ajax({
    type: 'POST',
    url:  'https://api.ultra.eossweden.org/v1/chain/get_table_rows',
    dataType: 'json',
    data: JSON.stringify({
          "code": "eosio.nft.ft",
          "table": "token.a",
          "scope": "gg1sj2uj3cd4",
          "json": true,
          "limit":50
      }),
    success: function (data) {
      console.log(data);
      
        $.ajax({
          type: 'POST',
          url:  'script/walletViewer.php',
          dataType: 'json',
          data: {
            data:data
          },
          success: function (data) {

          }
        })  
      
      //console.log(data['rows'][0]['meta_uris'][0]);
      
  
    }
  })



</script>