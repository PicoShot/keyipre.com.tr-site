<?php
  define('MYSQL_SERVER', 'localhost');
  define('MYSQL_PORT', '3306');
  define('MYSQL_USERNAME', 'keyiprec_admin');
  define('MYSQL_PASSWORD', 'Excode.241?');
  define('MYSQL_DATABASE', 'keyiprec_shopier');

  define('API_KEY', 'c6bcadff7fb76fcd35f512789ec6c253'); // Shopier API Key
  define('API_SECRET', '3440081e7c5af47a720b76db38ca03d1');
  define('CALLBACK_URL', 'diamond.keyipre.com.tr/shopier/callback.php');
  define('COMMISSION', 5); 
  try {
    $db = new PDO('mysql:host='.MYSQL_SERVER.'; port='.MYSQL_PORT.'; dbname='.MYSQL_DATABASE.'; charset=utf8', MYSQL_USERNAME, MYSQL_PASSWORD);
  }
  catch (PDOException $e) {
    print '<strong>MySQL bağlantı hatası:</strong> '.$e->getMessage();
  }
?>