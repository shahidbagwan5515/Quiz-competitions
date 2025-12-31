<?php
include 'dp.php';

$filename = "quiz_records_" . date("Y-m-d") . ".csv";

// Force download
header("Content-Type: text/csv; charset=UTF-8");
header("Content-Disposition: attachment; filename=\"$filename\"");

$output = fopen("php://output", "w");

// Headings
fputcsv($output, [
  'ID',
  'Name',
  'Class',
  'Roll',
  'Gender',
  'Total Questions',
  'Correct',
  'Wrong',
  'Score',
  'Time Taken',
  'Date Time'
]);

$sql = "SELECT * FROM quiz_result ORDER BY id DESC";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
  fputcsv($output, [
    $row['id'],
    $row['name'],
    $row['class'],
    $row['roll'],
    $row['gender'],
    $row['total_questions'],
    $row['correct_answers'],
    $row['wrong_answers'],
    $row['score'],
    $row['time_taken'],
    $row['date_time']
  ]);
}

fclose($output);
exit;
