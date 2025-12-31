// ================= QUESTIONS =================
const questions = [
  {
    q: "CPU stands for?",
    o: [
      "Central Processing Unit",
      "Computer Power Unit",
      "Control Program Unit",
      "Central Performance Unit",
    ],
    a: 0,
  },
  {
    q: "RAM stands for?",
    o: ["Read Access", "Random Access", "Run Access", "Real Access"],
    a: 1,
  },
  { q: "HTML is?", o: ["Programming", "Markup", "Database", "OS"], a: 1 },
  {
    q: "CSS used for?",
    o: ["Logic", "Programming", "Database", "Design"],
    a: 3,
  },
  { q: "JS is?", o: ["Language", "OS", "Browser", "Compiler"], a: 0 },
  { q: "React is?", o: ["Framework", "Library", "OS", "DB"], a: 1 },
  { q: "HTTP means?", o: ["Language", "Tool", "Protocol", "Server"], a: 2 },
  {
    q: "IP stands for?",
    o: ["Internal Program", "Input Port", "None", "Internet Protocol"],
    a: 3,
  },
  { q: "SQL used for?", o: ["Design", "Database", "Styling", "Logic"], a: 1 },
  { q: "RAM is?", o: ["Permanent", "ROM", "Temporary", "Disk"], a: 2 },
];

// ================= VARIABLES =================
let idx = 0;
let score = 0;
let time = 30;
let timer = null;
let quizStartTime = 0;
let isSubmitted = false; // 🔒 MAIN FIX

// ================= ELEMENTS =================
const intro = document.getElementById("intro");
const form = document.getElementById("form");
const game = document.getElementById("game");
const board = document.getElementById("scoreboard");

const nameEl = document.getElementById("name");
const rollEl = document.getElementById("roll");
const classEl = document.getElementById("class");
const genderEl = document.getElementById("gender");

const error = document.getElementById("error");
const question = document.getElementById("question");
const options = document.getElementById("options");
const timerEl = document.getElementById("timer");

// ================= EVENTS =================
intro.onclick = () => {
  intro.classList.remove("active");
  form.classList.add("active");
};

// ================= FUNCTIONS =================
function startQuiz() {
  if (!nameEl.value || !rollEl.value || !classEl.value || !genderEl.value) {
    error.innerText = "⚠ Please fill all fields";
    return;
  }

  quizStartTime = Date.now();
  error.innerText = "";
  form.classList.remove("active");
  game.classList.add("active");
  loadQ();
  startTimer();
}

function loadQ() {
  const q = questions[idx];
  question.innerText = q.q;
  options.innerHTML = "";

  q.o.forEach((opt, i) => {
    options.innerHTML += `
      <div class="option" onclick="selectOption(${i})">
        ${opt}
      </div>`;
  });
}

function selectOption(i) {
  if (timer === null) return; // ⛔ double click block
  clearInterval(timer);
  timer = null;

  if (i === questions[idx].a) score++;
  setTimeout(next, 300);
}

function next() {
  idx++;
  if (idx < questions.length) {
    time = 30;
    loadQ();
    startTimer();
  } else {
    endGame();
  }
}

function startTimer() {
  timerEl.innerText = time;
  timer = setInterval(() => {
    time--;
    timerEl.innerText = time;
    if (time <= 0) {
      clearInterval(timer);
      timer = null;
      setTimeout(next, 300);
    }
  }, 1000);
}

function endGame() {
  if (isSubmitted) return; // 🔒 MAIN LOCK
  isSubmitted = true;

  clearInterval(timer);
  game.classList.remove("active");
  board.classList.add("active");

  const totalQuestions = questions.length;
  const correctAnswers = score;
  const wrongAnswers = totalQuestions - score;
  const timeTaken = Math.floor((Date.now() - quizStartTime) / 1000);
  const dateTime = new Date().toISOString().slice(0, 19).replace("T", " ");

  const formData = new URLSearchParams();
  formData.append("name", nameEl.value);
  formData.append("class", classEl.value);
  formData.append("roll", rollEl.value);
  formData.append("gender", genderEl.value);
  formData.append("totalQuestions", totalQuestions);
  formData.append("correctAnswers", correctAnswers);
  formData.append("wrongAnswers", wrongAnswers);
  formData.append("score", correctAnswers);
  formData.append("timeTaken", timeTaken);
  formData.append("total", dateTime);

  fetch("save.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: formData.toString(),
  });
}

function restart() {
  idx = 0;
  score = 0;
  time = 30;
  isSubmitted = false; // 🔁 reset
  timer = null;

  nameEl.value = rollEl.value = "";
  classEl.value = genderEl.value = "";
  error.innerText = "";

  board.classList.remove("active");
  intro.classList.add("active");
}
