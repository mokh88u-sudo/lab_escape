<?php
include 'config.php';

$total_questions = 0;
$correct_count = 0;
$wrong_count = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['answer'])) {
    $user_answers = $_POST['answer'];

    foreach ($user_answers as $question_id => $chosen_value) {
        $total_questions++;

        $stmt = $pdo->prepare("SELECT correct_ans FROM questions WHERE id = ?");
        $stmt->execute([$question_id]);
        $real_answer = $stmt->fetchColumn();

        if ($chosen_value == $real_answer) {
            $correct_count++;
        } else {
            $wrong_count++;
        }
    }
} else {
    header("Location: scenarios.php");
    exit();
}

$score_percentage = ($total_questions > 0) ? round(($correct_count / $total_questions) * 100) : 0; 
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Escape - النتيجة</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100 bg-light text-dark">

    <nav class="navbar navbar-expand navbar-dark bg-info py-2 shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4 text-white" href="home.html">Lab Escape</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link text-white fw-bold mx-2" href="home.html">الرئيسية</a>
                <a class="nav-link text-white fw-bold mx-2" href="scenarios.php">السيناريوهات</a>
                <a class="nav-link text-white fw-bold mx-2" href="result.php">النتائج</a>
                <a class="nav-link text-white fw-bold ms-3" href="index.html">خروج</a>
            </div>
        </div>
    </nav>

    <div class="container my-5 flex-grow-1 d-flex align-items-center justify-content-center">
        <div class="card p-5 shadow-sm border border-2 border-info text-center" style="max-width: 550px; width: 100%; border-radius: 12px;">
            
            <h2 class="fw-bold text-dark mb-4">تم إنهاء الاختبار بنجاح!</h2>
            
            <div class="d-flex align-items-center justify-content-center bg-info bg-opacity-10 border border-3 border-info rounded-circle mx-auto mb-4 fw-bold text-dark fs-2" style="width: 120px; height: 120px;">
                <?php echo $score_percentage; ?>%
            </div>

            <div class="mb-4 text-start">
                <div class="d-flex justify-content-between align-items-center bg-light p-3 rounded mb-2 border-start border-3 border-secondary">
                    <span class="fs-6 text-muted fw-bold">إجمالي الأسئلة:</span>
                    <span class="fw-bold fs-5 text-dark"><?php echo $total_questions; ?></span>
                </div>
                <div class="d-flex justify-content-between align-items-center bg-light p-3 rounded mb-2 border-start border-3 border-success">
                    <span class="fs-6 text-muted fw-bold">الإجابات الصحيحة ✅:</span>
                    <span class="fw-bold fs-5 text-success"><?php echo $correct_count; ?></span>
                </div>
                <div class="d-flex justify-content-between align-items-center bg-light p-3 rounded mb-2 border-start border-3 border-danger">
                    <span class="fs-6 text-muted fw-bold">الإجابات الخاطئة ❌:</span>
                    <span class="fw-bold fs-5 text-danger"><?php echo $wrong_count; ?></span>
                </div>
            </div>

            <div class="mt-4">
                <a href="scenarios.php" class="btn btn-info btn-lg text-white fw-bold px-4 shadow-sm fs-6">العودة للسيناريوهات</a>
            </div>
        </div>
    </div>

    <footer class="bg-info text-white text-center py-3 mt-auto shadow-lg">
        <div class="container">
            <p class="mb-0 small fw-bold">&copy; 2026 Lab Escape - جميع الحقوق محفوظة لمختبر هايدرا</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>