// Sample data for quizzes and exams
const quizQuestions = {
  Math: [
    { question: "What is 2+2?", options: [2, 3, 4, 5], correct: 4 },
    { question: "What is 5+5?", options: [8, 9, 10, 11], correct: 10 },
    { question: "What is 3+7?", options: [9, 10, 11, 12], correct: 10 },
    { question: "What is 8+12?", options: [18, 19, 20, 21], correct: 20 },
    { question: "What is 6+6?", options: [10, 11, 12, 13], correct: 12 }
  ],
  Science: [
    { question: "What is the chemical symbol for water?", options: ["H2O", "O2", "CO2", "H2"], correct: "H2O" },
    { question: "What planet is closest to the Sun?", options: ["Earth", "Venus", "Mercury", "Mars"], correct: "Mercury" },
    { question: "What is the process of plants making food?", options: ["Respiration", "Photosynthesis", "Digestion", "Reproduction"], correct: "Photosynthesis" },
    { question: "What gas do plants absorb?", options: ["Oxygen", "Carbon Dioxide", "Nitrogen", "Hydrogen"], correct: "Carbon Dioxide" },
    { question: "How many bones are in the adult human body?", options: [206, 208, 210, 212], correct: 206 }
  ],
  English: [
    { question: "What is the synonym of 'happy'?", options: ["sad", "joyful", "angry", "tired"], correct: "joyful" },
    { question: "Which word is a noun?", options: ["run", "quickly", "dog", "loudly"], correct: "dog" },
    { question: "What is the antonym of 'fast'?", options: ["quick", "slow", "speedy", "steady"], correct: "slow" },
    { question: "Which is a correct sentence?", options: ["He go to school.", "He goes to school.", "He going to school.", "He gone to school."], correct: "He goes to school." },
    { question: "What is the plural form of 'child'?", options: ["childes", "childs", "children", "childrens"], correct: "children" }
  ],
  History: [
    { question: "Who was the first President of the USA?", options: ["George Washington", "Abraham Lincoln", "Thomas Jefferson", "Franklin Roosevelt"], correct: "George Washington" },
    { question: "In which year did World War II end?", options: [1942, 1945, 1950, 1960], correct: 1945 },
    { question: "Who discovered America?", options: ["Christopher Columbus", "Leif Erikson", "Marco Polo", "Vasco da Gama"], correct: "Christopher Columbus" },
    { question: "What was the name of the ship that brought the Pilgrims to America?", options: ["Titanic", "Mayflower", "Santa Maria", "Nina"], correct: "Mayflower" },
    { question: "What was the name of the first civilization in Egypt?", options: ["Ancient Egypt", "Nile Kingdom", "Pharaoh Dynasty", "Old Kingdom"], correct: "Old Kingdom" }
  ],
  Geography: [
    { question: "What is the capital of France?", options: ["Berlin", "Madrid", "Rome", "Paris"], correct: "Paris" },
    { question: "Which ocean is the largest?", options: ["Atlantic", "Indian", "Pacific", "Arctic"], correct: "Pacific" },
    { question: "What is the longest river in the world?", options: ["Amazon", "Nile", "Yangtze", "Mississippi"], correct: "Nile" },
    { question: "Which country is known as the Land of the Rising Sun?", options: ["China", "Japan", "Korea", "Vietnam"], correct: "Japan" },
    { question: "What is the tallest mountain in the world?", options: ["K2", "Mount Everest", "Kangchenjunga", "Makalu"], correct: "Mount Everest" }
  ]
};

let quizGrade = {};
let examGrade = {};

function chooseQuiz() {
  // Hide the other sections and show the quiz section
  document.getElementById("choose-section").style.display = "none";
  document.getElementById("exam-section").style.display = "none";
  document.getElementById("quiz-section").style.display = "block";
}

function chooseExam() {
  // Hide the other sections and show the exam section
  document.getElementById("choose-section").style.display = "none";
  document.getElementById("quiz-section").style.display = "none";
  document.getElementById("exam-section").style.display = "block";
}

function startQuiz() {
  const subject = document.getElementById("quiz-subject-select").value;
  const quiz = quizQuestions[subject];
  const quizContainer = document.getElementById("quiz-container");
  quizContainer.innerHTML = "";
  
  quiz.forEach((q, index) => {
    const questionHTML = `
      <div>
        <p>${q.question}</p>
        ${q.options.map((opt, i) => `
          <input type="radio" name="question${index}" value="${opt}" id="question${index}_option${i}">
          <label for="question${index}_option${i}">${opt}</label><br>
        `).join('')}
      </div>
    `;
    quizContainer.innerHTML += questionHTML;
  });

  quizContainer.innerHTML += '<button onclick="submitQuiz()">Submit Quiz</button>';
}

function submitQuiz() {
  const subject = document.getElementById("quiz-subject-select").value;
  const quiz = quizQuestions[subject];
  let score = 0;

  quiz.forEach((q, index) => {
    const selected = document.querySelector(`input[name="question${index}"]:checked`);
    if (selected && selected.value == q.correct) {
      score++;
    }
  });

  quizGrade[subject] = score;
  alert(`You scored ${score} out of ${quiz.length}`);
  updateGradeSheet();
}

function startExam() {
  alert("Exam functionality is under development.");
}

function updateGradeSheet() {
  const quizTableBody = document.getElementById("quiz-grade-table-body");
  quizTableBody.innerHTML = '';
  Object.keys(quizGrade).forEach(subject => {
    const row = `
      <tr>
        <td>${subject}</td>
        <td>Quiz</td>
        <td>${quizGrade[subject]}</td>
      </tr>
    `;
    quizTableBody.innerHTML += row;
  });
  
  const examTableBody = document.getElementById("exam-grade-table-body");
  examTableBody.innerHTML = '';
  Object.keys(examGrade).forEach(subject => {
    const row = `
      <tr>
        <td>${subject}</td>
        <td>Exam</td>
        <td>${examGrade[subject]}</td>
      </tr>
    `;
    examTableBody.innerHTML += row;
  });
}
