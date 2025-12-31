<?php
include 'dp.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $name   = $_POST['name'];
  $class  = $_POST['class'];
  $roll   = $_POST['roll'];
  $gender = $_POST['gender'];

  $totalQuestions = (int)$_POST['totalQuestions'];
  $correctAnswers = (int)$_POST['correctAnswers'];
  $wrongAnswers   = (int)$_POST['wrongAnswers'];
  $score          = (int)$_POST['score'];
  $timeTaken      = (int)$_POST['timeTaken'];
  $dateTime       = $_POST['total'];

  $sql = "INSERT INTO quiz_result
  (name, class, roll, gender, total_questions, correct_answers, wrong_answers, score, time_taken, date_time)
  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param(
    "ssssiiiiis",
    $name,
    $class,
    $roll,
    $gender,
    $totalQuestions,
    $correctAnswers,
    $wrongAnswers,
    $score,
    $timeTaken,
    $dateTime
  );

  if ($stmt->execute()) {
    echo "Saved";
  } else {
    echo "Error";
  }

  $stmt->close();
}
$conn->close();
