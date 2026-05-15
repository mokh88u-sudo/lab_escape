<?php 
include 'config.php'; 

$s_id = isset($_GET['id']) ? $_GET['id'] : 0;

$stmt = $pdo->prepare("SELECT * FROM questions WHERE Scenario_id = ?");
$stmt->execute([$s_id]);
$questions = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>صفحة الأسئلة - Lab Escape</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f7f6; }
        .question-box { background: white; padding: 20px; border-radius: 8px; margin-bottom: 15px; border-right: 5px solid #17e1fe; }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-info mb-4">
    <div class="container">
        <a class="navbar-brand" href="home.php">Lab Escape</a>
    </div>
</nav>

<div class="container">
    <h2 class="text-center mb-4">اختبار المادة</h2>

    <?php if (count($questions) > 0): ?>
        <form action="result.php" method="POST">
            <?php foreach ($questions as $q): ?>
                <div class="question-box shadow-sm">
                    <p class="fw-bold"><?php echo $q['Question_text']; ?></p>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="ans[<?php echo $q['id']; ?>]" value="1">
                        <label class="form-check-label">الخيار الأول</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="ans[<?php echo $q['id']; ?>]" value="2">
                        <label class="form-check-label">الخيار الثاني</label>
                    </div>
                </div>
            <?php endforeach; ?>
            
            <div class="text-center">
                <button type="submit" class="btn btn-info text-white px-5">إرسال الإجابات</button>
            </div>
        </form>
    <?php else: ?>
        <div class="alert alert-warning text-center">نعتذر، لا توجد أسئلة لهذه المادة حالياً.</div>
    <?php endif; ?>

    <div class="text-center mt-4">
        <a href="scenarios.php" class="btn btn-secondary btn-sm">العودة للسيناريوهات</a>
    </div>
</div>

</body>
</html>