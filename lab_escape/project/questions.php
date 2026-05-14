<?php 
include 'config.php';   
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Escape - اختبار المواد</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        :root {
            --cyan-color: #17e1fe;

            --dark-gray: #777;

        }

        body {
            background-color: #f8f9fa;
            color: #333;
            font-family: sans-serif;
        }


        .custom-navbar {
            background-color: var(--cyan-color);
        }

        .custom-navbar .navbar-brand,
        .custom-navbar .nav-link {
            color: white !important;
            font-weight: bold;
        }

        .custom-navbar .nav-link:hover {
            color: #e0faff !important;
        }


        .task-card {
            border: 2px solid var(--cyan-color);
            border-radius: 10px;
            text-align: center;
            padding: 2rem;
            height: 100%;
            background-color: white;
            transition: transform 0.2s;
        }

        .task-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .task-card-title {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .task-card-text {
            color: var(--dark-gray);
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
        }

        .task-card-btn {
            background-color: var(--cyan-color);
            color: white;
            border: none;
            padding: 0.5rem 2rem;
            border-radius: 5px;
            width: 100%;
            font-weight: bold;
        }

        .task-card-btn:hover {
            background-color: #15ccda;
            color: white;
        }


        .back-btn {
            background-color: var(--dark-gray);
            color: white;
            border: none;
            border-radius: 5px;
            padding: 0.5rem 1rem;
            display: inline-block;
            margin-top: 2rem;
        }

        .back-btn:hover {
            background-color: #555;
            color: white;
        }


        .questions-section {
            display: none;
            margin-top: 3rem;
            padding: 2rem;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .question-block {
            margin-bottom: 1.5rem;
            border-bottom: 1px solid #eee;
            padding-bottom: 1rem;
        }

        .question-text {
            font-weight: bold;
            margin-bottom: 0.5rem;
        }


        .custom-footer {
            background-color: var(--cyan-color);
            color: white;
            text-align: center;
            padding: 1rem 0;
        }

        .result-display {
            font-weight: bold;
            font-size: 1.2rem;
            margin-top: 1rem;
        }
    </style>

    <script>

        function showQuestions(type) {

            document.getElementById("programming-section").style.display = "none";
            document.getElementById("web-section").style.display = "none";

            document.getElementById("task-selection-section").style.display = "none";


            document.getElementById("result").innerHTML = "";


            if (type === 'programming') {
                document.getElementById("programming-section").style.display = "block";
            } else if (type === 'web') {
                document.getElementById("web-section").style.display = "block";
            }
        }


        function showTasks() {
            document.getElementById("programming-section").style.display = "none";
            document.getElementById("web-section").style.display = "none";
            document.getElementById("task-selection-section").style.display = "block";
        }


        function checkAnswers(type) {
            let score = 0;
            const total = 5;

            if (type === "programming") {

                const correctAnswers = { q1: "a", q2: "b", q3: "a", q4: "c", q5: "b" };
                for (let q in correctAnswers) {
                    if (document.querySelector(`input[name="${q}"]:checked`)?.value === correctAnswers[q]) {
                        score++;
                    }
                }
                document.getElementById("result").innerHTML = `<div class="alert alert-info mt-3">درجتك في البرمجة: ${score} / ${total}</div>`;
            }

            if (type === "web") {

                const correctAnswers = { w1: "a", w2: "b", w3: "c", w4: "a", w5: "b" };
                for (let q in correctAnswers) {
                    if (document.querySelector(`input[name="${q}"]:checked`)?.value === correctAnswers[q]) {
                        score++;
                    }
                }
                document.getElementById("result").innerHTML = `<div class="alert alert-info mt-3">درجتك في الويب: ${score} / ${total}</div>`;
            }
        }
    </script>
</head>

<body class="d-flex flex-column min-vh-100">


    <nav class="navbar navbar-expand navbar-dark bg-info">
        <div class="container">

            <a class="navbar-brand fw-bold" href="home.html">Lab Escape</a>

            <div class="navbar-nav ms-auto">
                <a class="nav-link text-white small" href="home.html">الرئيسية</a>
                <a class="nav-link text-white small" href="scenarios.html">السيناريوهات</a>
                <a class="nav-link text-white small" href="questions.html">اللعب</a>
                <a class="nav-link text-white small" href="result.html">النتائج</a>
                <a class="nav-link text-white small fw-bold" href="index.html">خروج</a>
            </div>
        </div>
    </nav>


    <div class="container my-5 flex-grow-1">


        <div id="task-selection-section" class="text-center">
            <h2 class="mb-5 text-info fw-bold">اخترالاختبار المناسب</h2>

            <div class="row justify-content-center g-4">

                <div class="col-md-5 col-lg-4">
                    <div class="task-card">
                        <h3 class="task-card-title fw-bold">مبادئ صفحات الانترنت</h3>
                        <p class="task-card-text">اختر نفسك في CSS و HTML و JS</p>
                        <button class="btn task-card-btn" onclick="showQuestions('web')">اختيار</button>
                    </div>
                </div>


                <div class="col-md-5 col-lg-4">
                    <div class="task-card">
                        <h3 class="task-card-title fw-bold">اساسيات برمجة الحاسب</h3>
                        <p class="task-card-text">اختر نفسك في JAVA</p>
                        <button class="btn task-card-btn" onclick="showQuestions('programming')">اختيار</button>
                    </div>
                </div>
            </div>


            <a href="home.html" class="back-btn text-decoration-none">← الرجوع للصفحه الرئيسية </a>
        </div>


        <div id="programming-section" class="questions-section">
            <h3 class="text-center text-info fw-bold mb-4">اختبار البرمجة (Java)</h3>


            <div class="question-block">
                <p class="question-text">1. ما هي البرمجة؟</p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q1" id="q1a" value="a">
                    <label class="form-check-label" for="q1a">أ) كتابة أوامر للحاسوب</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q1" id="q1b" value="b">
                    <label class="form-check-label" for="q1b">ب) تصفح الإنترنت</label>
                </div>
            </div>


            <div class="question-block">
                <p class="question-text">2. المتغير هو:</p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q2" id="q2a" value="a">
                    <label class="form-check-label" for="q2a">أ) قيمة ثابتة</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q2" id="q2b" value="b">
                    <label class="form-check-label" for="q2b">ب) قيمة تتغير</label>
                </div>
            </div>


            <div class="question-block">
                <p class="question-text">3. جملة if تستخدم:</p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q3" id="q3a" value="a">
                    <label class="form-check-label" for="q3a">أ) لاتخاذ قرار</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q3" id="q3b" value="b">
                    <label class="form-check-label" for="q3b">ب) للتكرار</label>
                </div>
            </div>


            <div class="question-block">
                <p class="question-text">4. أي مما يلي نوع بيانات أساسي في Java؟</p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q4" id="q4a" value="a">
                    <label class="form-check-label" for="q4a">أ) loop</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q4" id="q4b" value="b">
                    <label class="form-check-label" for="q4b">ب) if</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q4" id="q4c" value="c">
                    <label class="form-check-label" for="q4c">ج) int</label>
                </div>
            </div>


            <div class="question-block border-0">
                <p class="question-text">5. الحلقة التكرارية تستخدم:</p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q5" id="q5a" value="a">
                    <label class="form-check-label" for="q5a">أ) مرة واحدة فقط</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q5" id="q5b" value="b">
                    <label class="form-check-label" for="q5b">ب) لتكرار الأوامر</label>
                </div>
            </div>

            <div class="text-center mt-4">
                <button class="btn task-card-btn mx-2" style="width: auto;"
                    onclick="checkAnswers('programming')">تصحيح</button>
                <button class="btn back-btn mx-2 mt-0" style="width: auto;" onclick="showTasks()">رجوع لاختيار
                    المواد</button>
            </div>
        </div>


        <div id="web-section" class="questions-section">
            <h3 class="text-center text-info fw-bold mb-4">اختبار الويب (HTML, CSS, JS)</h3>


            <div class="question-block">
                <p class="question-text">1. HTML تستخدم أساساً:</p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="w1" id="w1a" value="a">
                    <label class="form-check-label" for="w1a">أ) لبناء هيكل الصفحة</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="w1" id="w1b" value="b">
                    <label class="form-check-label" for="w1b">ب) للتصميم والتلوين فقط</label>
                </div>
            </div>


            <div class="question-block">
                <p class="question-text">2. CSS تستخدم:</p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="w2" id="w2a" value="a">
                    <label class="form-check-label" for="w2a">أ) للبرمجة المنطقية</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="w2" id="w2b" value="b">
                    <label class="form-check-label" for="w2b">ب) لتنسيق وتصميم المظهر</label>
                </div>
            </div>


            <div class="question-block">
                <p class="question-text">3. JavaScript تستخدم:</p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="w3" id="w3a" value="a">
                    <label class="form-check-label" for="w3a">أ) لتخزين البيانات فقط</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="w3" id="w3b" value="b">
                    <label class="form-check-label" for="w3b">ب) لعرض الصور</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="w3" id="w3c" value="c">
                    <label class="form-check-label" for="w3c">ج) لإضافة التفاعل والمنطق</label>
                </div>
            </div>


            <div class="question-block">
                <p class="question-text">4. وسم &lt;div&gt; في HTML هو:</p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="w4" id="w4a" value="a">
                    <label class="form-check-label" for="w4a">أ) عنصر تقسيم حاوي (block-level)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="w4" id="w4b" value="b">
                    <label class="form-check-label" for="w4b">ب) عنصر لإدراج صورة</label>
                </div>
            </div>


            <div class="question-block border-0">
                <p class="question-text">5. خاصية 'id' في HTML تستخدم:</p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="w5" id="w5a" value="a">
                    <label class="form-check-label" for="w5a">أ) لتكرار نفس الاسم لعناصر متعددة</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="w5" id="w5b" value="b">
                    <label class="form-check-label" for="w5b">ب) لتعريف عنصر فريد واحد في الصفحة</label>
                </div>
            </div>

            <div class="text-center mt-4">
                <button class="btn task-card-btn mx-2" style="width: auto;" onclick="checkAnswers('web')">تصحيح</button>
                <button class="btn back-btn mx-2 mt-0" style="width: auto;" onclick="showTasks()">رجوع لاختيار
                    المواد</button>
            </div>
        </div>


        <div id="result" class="text-center mt-3"></div>

    </div>


    <footer class="custom-footer shadow-lg mt-auto">
        <div class="container">
            <p class="mb-0 small">&copy; 2026 Lab Escape - جميع الحقوق محفوظة لمختبر هايدرا</p>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6Rz8q6953IdO9d28Vnu9vJ0jA232W15dOnf0U7WqlHw3xY/Ld0xS7X86I74b6fM"
        crossorigin="anonymous"></script>

</body>

</html>