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
 
 require_once('access.php');

if (isset($_GET['key']) && $_GET['key'] == $secret_key) {
    die('Access granted');
} else {
    header('Location: 404');
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


$sql = "SELECT steamkey FROM premiumkey ORDER BY RAND() LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();
    $key = $row["steamkey"];
    echo "key : " . $key;
    echo "Keyiniz silindi ";

    $delete_sql = "DELETE FROM premiumkey WHERE steamkey = '$key'";
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
