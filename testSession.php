<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        
        echo $_SESSION["u_nombre"] ."<br>";
        $servername = "localhost";
        $userAndPass = "y2530037m";
        try {
            $conn = new PDO("mysql:host=$servername;dbname=y2530037m_gestion_incidencias", $userAndPass, $userAndPass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        foreach ($conn->query("SELECT * FROM usuario") as $row) {
            echo $row['role']."; ".$row['mail']."; ". $row['password']. "<br>";
            
        }

        $conn = null;
    ?>
</body>
</html>