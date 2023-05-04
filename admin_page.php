<?php
$file = 'data.json';
if (file_exists($file)) {
    $jsonString = file_get_contents($file);
    $dataArray = json_decode($jsonString, true);
} else {
    $dataArray = array();
}

?>
<center>
    <div class = "bb">
        <a class = "basbtn"href="admin_logout.php"><br>Çıkış Yap</a>
        <div class = "bas"><br>Mesajlar</div>
        <div class = "searchtext">
            <input class = "searcharama"type = "text" name="q" id  ="search" placeholder="Arama..."/>
            <button type = "button" class = "searchbutton">Ara</button>
        </div>
    </div>
<?php if (!empty($dataArray)): ?>
    <div class ="panel">
        <div class  = "panelbilgi">
            <table border = 1 bgcolor = "#363636">
                <tr class = "bfont">
                    <td>ID</td>
                    <td>İsim Soyisim</td>
                    <td>E-posta</td>
                    <td>Konu</td>
                    <td>Mesaj</td>
                </tr>
                <tr>
                    <?php foreach ($dataArray as $data): ?>
                    <td class = "tfont"><strong>ID:</strong> <?php echo $data['id']; ?><br></td>
                    <td class = "tfont"><strong>Name:</strong> <?php echo $data['name']; ?><br></td>
                    <td class = "tfont"><strong>Email:</strong> <?php echo $data['email']; ?><br></td>
                    <td class = "tfont"><strong>Konu:</strong> <?php echo $data['konu']; ?><br></td>
                    <td class = "tfont"><strong>Mesaj:</strong> <?php echo $data['mesaj']; ?><br</td>
                    
                </tr>
            <ul>
            <?php endforeach; ?> 
            </ul>
            </table>
        </div>
    </div>
<?php else: ?>
  <p>No messages</p>
<?php endif; ?>


</center>
<style>
        .bfont
        {
            font-size:30px;
            font-family:tahoma;
            font-weight: 500;
            background-color: brown;
            color:floralwhite;
        }
        .tfont
        {
            font-size:17px;
            font-family:tahoma;
            background-color: brown;
        }
        .panelbilgi
        {
            width: 100%;
            max-width: 990px;
        }
        .panel
        {
            background-color: #363636;
            width: 1200px;
            height:auto;
            padding: 20px 0px 40px 0px;
            border-radius:25px;
            margin-top: 15px;
        }
        body{
            margin: 0;
            padding:0;
            background-color: rgb(49, 121, 121);
        }
        .bas
        {
            position: relative;
            background-color: #363636;
            width: 100%;
            max-width: 150px;
            height: 100px;
            margin-top: 45px;
            margin-right: 1050px;
            border-top-right-radius: 15px;
            border-top-left-radius: 15px;
            font-family: tahoma;
            font-size: 25px;
            color:whitesmoke;
        }
        .basbtn
        {
            position: absolute;
            background-color: #363636;
            margin-top: -1px;
            margin-left: 450px;
            width: 100%;
            max-width: 150px;
            height: 100px;
            border-top-right-radius: 15px;
            border-top-left-radius: 15px;
            font-size: 25px;
            font-family: tahoma;
            color:whitesmoke;
        }
        .basbtn:hover
        {
            color:brown;
        }
        .bb
        {
            width: 1200px;
            height: 50px;
            margin-top: 10px;
        }
        .searchtext
        {
            position: relative;
            background-color: #363636;
            width: 100%;
            max-width: 500px;
            height: 100px;
            margin-top: -100px;
            margin-left: 0px;
            border-top-right-radius: 15px;
            border-top-left-radius: 15px;
            font-family: tahoma;
            font-size: 25px;
            color:whitesmoke;
        }
        .searcharama
        {
            margin-top: 20px;
            width: 300px;
            margin-right: 150px;
            height: 40px;
            border-radius: 10px;
            border:2px solid white;
        }
        .searchbutton
        {
            width: 125px;
            height: 50px;
            border-radius: 10px;
            float:right;
            margin-top: -45px;
            margin-right: 25px;
            border:none;
            font-size: 20px;
            background-color: brown;
        }
        .searchbutton:hover
        {
            color: brown;
            background-color: hotpink;
        }
        *
        {
            text-decoration: none;

        }
</style>
