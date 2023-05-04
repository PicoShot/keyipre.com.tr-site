<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Başarılı!</title>
</head>
<body>
    <h1>Ödeme Başarılı!</h1>
 <?php
 
$json_file = '../dynamic_key.json';


if (isset($_GET['key'])) {
    $key = $_GET['key'];
} else {
    file_put_contents($json_file, "[]");
    header('Location: get.html');
    exit;
}


if (file_exists($json_file)) {
    $keys = json_decode(file_get_contents($json_file), true);
} else {
   file_put_contents($json_file, "[]");
    header('Location: jsonnot.html');
    exit;
}


if (in_array($key, $keys)) {
   
   
} else {
      file_put_contents($json_file, "[]");
    header('Location: check.html');
    exit;
}

$servername = "localhost";
$username = "keyiprec_admin";
$password = "Excode.241?";
$dbname = "keyiprec_keys";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT steamkey FROM diamondkey ORDER BY RAND() LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();
    $key = $row["steamkey"];
    echo "key : " . $key;
    echo "Keyiniz silindi ";

    $delete_sql = "DELETE FROM diamondkey WHERE steamkey = '$key'";
    if ($conn->query($delete_sql) === TRUE) {
        
    } else {
        echo "Error deleting key: " . $conn->error;
    }
} else {
    echo "key bulunamadı lütfen yetkililerle iletişime geçiniz";
}


$conn->close();

?>

</body>
</html>
