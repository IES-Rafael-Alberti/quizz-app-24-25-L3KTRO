<?php
session_start();
require_once 'db.php';

function registrarUsuario($username, $password)
{
    $conn = conectarDB();
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO Usuarios (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashedPassword);
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $result;
}

function iniciarSesion($username, $password)
{
    $conn = conectarDB();
    $stmt = $conn->prepare("SELECT user_id, password FROM Usuarios WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $username;
            $stmt->close();
            $conn->close();
            return true;
        }
    }
    $stmt->close();
    $conn->close();
    return false;
}

function cerrarSesion()
{
    session_unset();
    session_destroy();
}
