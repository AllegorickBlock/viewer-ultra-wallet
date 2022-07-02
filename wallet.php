<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Futur Elon musk</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  </head>
  <body>
    <div id='wallet'></div>
    <div id='uniq'></div>
  </body>
</html>
<script>
  $(document).ready(
      function(){
        var wallet = "gg1sj2uj3cd4";
        $("#wallet").text("Wallet of "+wallet);
        $.ajax({
                type: 'POST',
                url:  'https://api.ultra.eossweden.org/v1/chain/get_table_rows',
                dataType: 'json',
                data: JSON.stringify({
                      "code": "eosio.nft.ft",
                      "table": "token.a",
                      "scope": wallet,
                      "json": true,
                      "limit":50
                  }),
                success: function (data) {
                  console.log(data);
                    $('wallet').text('test');
                    $.ajax({
                      type: 'POST',
                      url:  'script/walletViewer.php',
                      dataType: 'json',
                      data: {
                        data:data
                      },
                      success: function (data) {
                        var tab ='';
                        data.forEach(data=>{
                          tab +='<img src="unzip/'+data.token_factory_id+'/'+data.Product+'" width="150" height="150"/>';

                        })
                        $("#uniq").html(tab);
                      }
                    })

                }
      })


})


</script>