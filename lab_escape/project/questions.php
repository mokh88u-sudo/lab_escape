<?php 
include 'config.php'; 

$scenario_id = isset($_GET['id']) ? intval($_GET['id']) : 1; 

$stmt = $pdo->prepare("SELECT * FROM questions WHERE scenario_id = ?");
$stmt->execute([$scenario_id]);
$questions = $stmt->fetchAll();

$stmt_title = $pdo->prepare("SELECT scenario_title FROM scenarios WHERE scenario_id = ?");
$stmt_title->execute([$scenario_id]);
$scenario_title = $stmt_title->fetchColumn();
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
            background-color: var(--cyan-color) !important;
        }

        .custom-navbar .navbar-brand,
        .custom-navbar .nav-link {
            color: white !important;
            font-weight: bold;
        }

        .questions-container {
            background-color: white;
            border: 2px solid var(--cyan-color);
            border-radius: 12px;
            padding: 2.5rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .question-block {
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid #eee;
        }

        .question-text {
            font-size: 1.15rem;
            font-weight: bold;
            color: #222;
            margin-bottom: 1rem;
            text-align: right;
        }

        .form-check {
            display: flex;
            align-items: center;
            text-align: right;
            direction: rtl;
            padding-right: 0 !important; 
            margin-top: 0.75rem;
            margin-bottom: 0.75rem;
        }

        .form-check-input {
            margin-right: 0 !important;
            margin-left: 10px !important; 
            float: none !important; 
            border-color: var(--cyan-color);
            width: 1.2em;
            height: 1.2em;
            cursor: pointer;
        }

        .form-check-input:checked {
            background-color: var(--cyan-color);
            border-color: var(--cyan-color);
        }

        .form-check-label {
            font-size: 1rem;
            cursor: pointer;
            color: #444;
            user-select: none;
        }

        /* الأزرار */
        .task-card-btn {
            background-color: var(--cyan-color);
            color: white;
            border: none;
            padding: 0.6rem 2.5rem;
            border-radius: 5px;
            font-weight: bold;
            font-size: 1.05rem;
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
            padding: 0.6rem 2rem;
            font-weight: bold;
            display: inline-block;
        }

        .custom-footer {
            background-color: var(--cyan-color);
            color: white;
            text-align: center;
            padding: 1rem 0;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand navbar-dark custom-navbar shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="home.html">Lab Escape</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link text-white small" href="home.html">الرئيسية</a>
                <a class="nav-link text-white small" href="scenarios.php">السيناريوهات</a>
                <a class="nav-link text-white small" href="result.html">النتائج</a>
                <a class="nav-link text-white small fw-bold" href="index.html">خروج</a>
            </div>
        </div>
    </nav>

    <div class="container my-5 flex-grow-1">
        
        <div class="questions-container">
            
            <h2 class="text-center text-info fw-bold mb-5">
                الاختبار: <?php echo htmlspecialchars($scenario_title ? $scenario_title : 'المادة المطلوبة'); ?>
            </h2>

            <form action="result.php" method="POST">
                
                <?php
                if (!empty($questions) && count($questions) > 0) {
                    $counter = 1;
                    
                    foreach ($questions as $row) {
                        echo "<div class='question-block'>";
                        
                        // طباعة عنوان السؤال
                        echo "<p class='question-text'>" . $counter . ") " . htmlspecialchars($row['question_text']) . "</p>";
                        
                        for ($i = 1; $i <= 4; $i++) {
                            echo "<div class='form-check'>";
                            
                            echo "<input class='form-check-input' type='radio' name='answer[" . $row['id'] . "]' value='" . $i . "' id='q_" . $row['id'] . "_" . $i . "' required>";
                            
                            echo "<label class='form-check-label' for='q_" . $row['id'] . "_" . $i . "'>" . htmlspecialchars($row['ans' . $i]) . "</label>";
                            
                            echo "</div>";
                        }
                        
                        echo "</div>";
                        $counter++;
                    }

                    echo "<div class='text-center mt-4'>";
                    echo "<button type='submit' class='btn task-card-btn mx-2 shadow-sm'>إرسال الأجوبة وإنهاء التحدي</button>";
                    echo "<a href='scenarios.php' class='btn back-btn mx-2 text-decoration-none shadow-sm'>رجوع للسيناريوهات</a>";
                    echo "</div>";

                } else {
                    echo "<div class='text-center py-4'>";
                    echo "<p class='text-danger fw-bold fs-5'>لا توجد أسئلة مضافة لهذه المادة حالياً في قاعدة البيانات.</p>";
                    echo "<a href='scenarios.php' class='btn back-btn mt-3 text-decoration-none'>العودة للخلف</a>";
                    echo "</div>";
                }
                ?>

            </form>
        </div>

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