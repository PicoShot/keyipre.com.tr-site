<?php
$servername = "localhost";
$username = "keyiprec_admin";
$password = "Excode.241?";
$dbname = "keyiprec_contact";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Veritabanı bağlantısı başarısız: " . mysqli_connect_error());
}

$adsoyad = $_POST["name"];
$konu = $_POST["konu"];
$email = $_POST["email"];
$mesaj = $_POST["mesaj"];

$sql = "INSERT INTO contact  VALUES (id,'$adsoyad', '$konu', '$email', '$mesaj')";
$destek = "destek";
if (mysqli_query($conn, $sql)) {
    Header("Location: success");
} else {
    Header("Location: error");
}

mysqli_close($conn);
?>