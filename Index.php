<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>KON BANEGA IT INTELLIGENT</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <div class="screen active" id="intro">
    <div class="shining-text">KON BANEGA IT INTELLIGENT</div>
    <div class="intro-sub">Click to Start</div>
  </div>

  <div class="screen" id="form">
    <div class="form-box">
      <h2>Student Details</h2>

      <div class="form-group">
        <label>Name</label>
        <input id="name" name="name">
      </div>

      <div class="form-group">
        <label>Class</label>
        <select id="class" name="class">
          <option value="">Select Class</option>
          <option>BSC 1st</option>
          <option>BSC 2nd</option>
          <option>BSC 3rd</option>
        </select>
      </div>

      <div class="form-group">
        <label>Roll Number</label>
        <input id="roll" name="roll">
      </div>

      <div class="form-group">
        <label>Gender</label>
        <select id="gender" name="gender">
          <option value="">Select Gender</option>
          <option>Male</option>
          <option>Female</option>
          <option>Other</option>
        </select>
      </div>

      <button class="start-btn" type="button" onclick="startQuiz()">START QUIZ</button>
      <div class="error" id="error"></div>
    </div>
  </div>

  <div class="screen" id="game">
    <div class="title">KON BANEGA IT INTELLIGENT</div>
    <div class="timer" id="timer">30</div>
    <div class="question" id="question"></div>
    <div class="options" id="options"></div>
  </div>

  <div class="screen" id="scoreboard">
    <div class="scorebox">
      <h2 style="color:gold;text-align:center">🏆 THANK YOU 🏆</h2>
      <div id="finalScore" style="text-align:center;margin:15px"></div>
      <button class="restart" onclick="restart()">PLAY AGAIN</button>
    </div>
  </div>

  <script src="script.js"></script>
</body>

</html>