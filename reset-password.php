<?php

$token = $_GET["token"];

$token_hash = hash("sha256", $token);

$mysqli = require __DIR__ . "/database.php";

$sql = "SELECT * FROM user
        WHERE reset_token_hash = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

if ($user === null) {
    die("token not found");
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    die("token has expired");
}
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>The Avatar Restaurant</title>
        <link rel="stylesheet" href="regstyle.css">
    </head>
    <body>
        <header>
            <img src="Logo.png" width="80px" height="80px">
            <h2 class="logo">The Avatar Restaurant</h2>
        </header>

        <div class="wrapper">
            <div class="form-box login">
                <h2>Reset Password</h2>   
                <form action="process-reset-password.php" method="post">

                <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

                    <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                        <input type="password" name="password" value="" id="password">
                        <label>Password</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                        <input type="password" name="password_confirmation" value="" id="password_confirmation">
                        <label>Repeat Password</label>
                    </div>
                    
        
                    <button type="submit" name="Send" class="btn">Send</button>
                </form>
            </div>

            <script src="regscript.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
    </html>

