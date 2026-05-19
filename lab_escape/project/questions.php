
<?php
if (!empty($questions) && count($questions) > 0) {
    foreach ($questions as $row) {
        echo "<div class='question-item' style='text-align: right; direction: rtl;'>";
       
        echo "<p class='question-text'><strong>" . $row['question_text'] . "</strong></p>";
        

        for ($i = 1; $i <= 4; $i++) {
            echo "<div class='form-check'>";
            echo "<input type='radio' name='answer[" . $row['id'] . "]' value='" . $i . "' id='q_" . $row['id'] . "_" . $i . "' required>";
            echo "<label for='q_" . $row['id'] . "_" . $i . "' style='margin-right: 10px;'>" . $row['ans' . $i] . "</label>";
            echo "</div>";
        }
        echo "</div><hr>";
    }
} else {
    echo "<p>لا توجد أسئلة لهذا القسم.</p>";
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Escape - اختبار المواد</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    
   
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