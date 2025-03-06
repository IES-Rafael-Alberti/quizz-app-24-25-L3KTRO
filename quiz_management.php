<?php
require_once 'db.php';

function crearCuestionario($title, $description)
{
    $conn = conectarDB();
    $stmt = $conn->prepare("INSERT INTO Cuestionarios (title, description) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $description);
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $result;
}

function anadirPregunta($quizId, $questionText, $optionA, $optionB, $optionC, $optionD, $correctOption)
{
    $conn = conectarDB();
    $stmt = $conn->prepare("INSERT INTO Preguntas (quiz_id, question_text, option_a, option_b, option_c, option_d, correct_option) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssss", $quizId, $questionText, $optionA, $optionB, $optionC, $optionD, $correctOption);
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $result;
}
