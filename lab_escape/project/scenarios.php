<?php 
include 'config.php'; 
$s_id = $_GET['id'] ?? false;

if ($s_id) {
    $stmt = $pdo->prepare("SELECT * FROM scenarios WHERE scenario_id = ?");
    $stmt->execute([$s_id]);
    $scenario = $stmt->fetch();

    $stmt = $pdo->prepare("SELECT * FROM questions WHERE scenario_id = ?");
    $stmt->execute([$s_id]);
    $questions = $stmt->fetchAll();
} else {
    $scenarios = $pdo->query("SELECT * FROM scenarios ORDER BY stage_level ASC")->fetchAll();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        .question-box { background: white; padding: 20px; border-radius: 8px; margin-bottom: 15px; border-right: 5px solid #17e1fe; text-align: right; }
    </style>
</head>
<body>
   
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

<div class="container text-center mt-5">
    <?php if (!$s_id): ?>
        <h2 class="mb-4"> ! اختر السيناريو المناسب للبدء</h2>
        <h5 class="mb-5">مختبر التخصصات التقنية ينتظر تحديك</h5>
        
        <div class="row justify-content-center g-3">
            <?php foreach ($scenarios as $s): ?>
                <div class="col-md-5">
                    <div class="card h-100 border-info">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex justify-content-between small mb-2">
                                    <span class="badge bg-secondary">المرحلة: <?=$s['stage_level']?></span>
                                    <span class="badge bg-info text-white">المستوى: <?=$s['difficulty_level']?></span>
                                </div>
                                <h5 class="card-title fw-bold text-dark text-end" dir="rtl"><?=$s['scenario_title']?></h5>
                                <p class="card-text text-muted small text-end" dir="rtl"><?=$s['scenario_desc']?></p>
                            </div>
                            <div class="mt-3">
                                <a href="scenarios.php?id=<?=$s['scenario_id']?>" class="btn btn-info text-white w-100 fw-bold">ابدأ الاختبار الآن ←</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    <?php else: ?>
        <h2 class="mb-4 fw-bold" dir="rtl">اختبار مادة: <?=$scenario['scenario_title'] ?? 'المادة'?></h2>
        
        <?php if (count($questions) > 0): ?>
            <form action="result.php" method="POST" class="mb-5 pb-5">
                <?php foreach ($questions as $index => $q): ?>
                    <div class="question-box shadow-sm border-info">
                        <p class="fw-bold text-dark" dir="rtl">السؤال <?=($index + 1)?>: <?=$q['question_text']?></p>
                        <?php for($i=1; $i<=4; $i++): ?>
                            <div class="form-check my-2" dir="rtl">
                                <input class="form-check-input float-end ms-2" type="radio" name="ans[<?=$q['id']?>]" value="<?=$i?>" required>
                                <label class="form-check-label d-block text-end me-4"><?=$q['ans'.$i]?></label>
                            </div>
                        <?php endfor; ?>
                    </div>
                <?php endforeach; ?>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-info text-white px-5 fw-bold">إرسال الإجابات</button>
                </div>
            </form>
        <?php else: ?>
            <div class="alert alert-warning text-center border-info">لا توجد أسئلة لهذه المادة حالياً.</div>
        <?php endif; ?>
        
        <div class="text-center mt-4 mb-5 pb-5">
            <a href="scenarios.php" class="btn btn-outline-info btn-sm">العودة للسيناريوهات</a>
        </div>
    <?php endif; ?>
</div>

<footer class="bg-info text-white text-center py-2 fixed-bottom">
    <div class="container">
        <p class="mb-0 small">© 2026 Lab Escape - جميع الحقوق محفوظة لمختبر هايدرا</p>
    </div>
</footer>

</body>
</html>