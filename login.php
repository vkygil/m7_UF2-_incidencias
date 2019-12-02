<?php
session_start();

$servername = "localhost";
$userAndPass = "y2530037m";
try {
    $conn = new PDO("mysql:host=$servername;dbname=y2530037m_gestion_incidencias", $userAndPass, $userAndPass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
// print_r($_POST);

// if (isset($_POST["login"])) {

    if (!empty($_POST["email"]) && !empty($_POST["password"])) {
        $user = $_POST["email"];
        $pass = $_POST["password"];

        foreach ($conn->query("SELECT * FROM usuario where mail = '" . $user . "' ") as $row) {
            if ($pass ==  $row['password']) {
                
                $response_array['success'] = 'true';
                $_SESSION["u_role"] = $row['role'];
                $_SESSION["u_nombre"] = $row['nombre'];
                $_SESSION["u_id"] = $row['id'];
            }
        }
    }
// } 

header('Content-type: application/json');
echo json_encode($response_array);
$conn = null;
