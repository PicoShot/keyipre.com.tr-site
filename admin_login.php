<?php
session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    echo file_get_contents("admin_page.php")
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin = json_decode(file_get_contents("admin.json"), true);

    if ($_POST["username"] == $admin["username"] && $_POST["password"] == $admin["password"]) {
        $_SESSION["loggedin"] = true;
        echo file_get_contents("admin_page.php");
    } else {
        echo "<script>alert('Kullanıcı Veya Şifre Hatalı')</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
</head>
<body>
    <center>
        <div class = "adminpanel">
                <div class  ="panelkontrol">
                    <h1>Admin Giriş</h1>
                    <?php if (isset($login_err)) { ?>
                        <p><?php echo $login_err; ?></p>
                    <?php } ?>
                <form method="post">
                    <div class  ="control2">
                        <label id = "ltext">Kullanici Adı:</label>
                        <input style = "margin-right:55px;"type="text" class = "control"name="username" required>
                    </div>
                    <div class = "control2">
                        <label id = "ltext">Şifre:</label>
                        <input type="password" class = "control"name="password" required>
                    </div>
                    <div>
                        <input type="submit" class = "btn"value="Giriş Yap">
                    </div>
                </form>
             </div>
        </div>
    </center>
    <style>
        .adminpanel
        {
            width: 100%;
            max-width: 500px;
            height: 500px;
        }
        .panelkontrol
        {
            border-radius: 25px;
            background-color: aqua;
            width: 100%;
            float:left;
            margin-top: 50px;
            text-align: center;
            height: 300px;
        }
        .control
        {
           width: 246px;
           height: 25px;
           margin: 10px 0px 10px;
        }
        .control2
        {
            margin-right: 35px;
        }
        .btn
        {
            border:none;
            margin-top: 25px;
            width: 150px;
            height: 50px;
            background-color: greenyellow;
        }
        .btn:hover
        {
            background-color: aquamarine;
            box-shadow: 5px 5px 10px black;
        }
        #ltext
        {
            font-family: tahoma;
        }
        @media screen and (max-width: 500px)
        {
            .control2
            {
                margin-left: 25px;
            }
            .control
            {
                width: 200px;
            }
            #ltext
            {
               margin-left: 0px;
            }
            .btn
            {
             margin-left: 25px;
            }
        }
        @media screen and (max-width: 400px)
        {
            .control2
            {
                margin-left: 55px;
            }
            .control
            {
                width: 200px;
            }
        }
        @media screen and (max-width: 300px)
        {
            .control2
            {
                margin-left: 25px;
            }
            .control
            {
                width: 200px;
            }
            #ltext
            {
               margin-left: 25px;
            }
            .btn
            {
             margin-left: 0px;
            }
        }

    </style>
</body>
</html>
