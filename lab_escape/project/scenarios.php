<?php 
include 'config.php'; 
$scenarios = $pdo->query("SELECT * FROM scenarios ORDER BY stage_level ASC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>السيناريوهات - Lab Escape</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

    <nav class="navbar navbar-expand navbar-dark bg-info">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="navbar-nav d-flex flex-row gap-3">
                <a class="nav-link text-white small" href="home.html">الرئيسية</a>
                <a class="nav-link text-white small fw-bold" href="scenarios.php">السيناريوهات</a>
                <a class="nav-link text-white small" href="questions.php">اللعب</a>
                <a class="nav-link text-white small" href="result.html">النتائج</a>
                <a class="nav-link text-white small fw-bold" href="index.html">خروج</a>
            </div>
            <a class="navbar-brand fw-bold m-0" href="home.html">Lab Escape</a>
        </div>
    </nav>

    <div class="container my-5 flex-grow-1 text-center">
        <h2 class="mb-5 text-info fw-bold">اختر السيناريو المناسب للبدء</h2>

        <div class="row justify-content-center g-4">
            <?php foreach ($scenarios as $s): ?>
                <div class="col-md-5 col-lg-4">
                    <div class="card h-100 border-info text-center p-3 bg-white">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex justify-content-between small mb-3">
                                    <span class="badge bg-secondary">المرحلة: <?=$s['stage_level']?></span>
                                    <span class="badge bg-info text-white">المستوى: <?=$s['difficulty_level']?></span>
                                </div>
                                <h3 class="card-title fw-bold text-dark text-center mb-2" style="font-size: 1.5rem;"><?=$s['scenario_title']?></h3>
                                <p class="card-text text-muted small text-center mb-4"><?=$s['scenario_desc']?></p>
                            </div>
                            
                            <div class="mt-auto">
                                <a href="questions.php?id=<?=$s['scenario_id']?>" class="btn btn-info text-white w-100 fw-bold py-2">ابدأ الاختبار الآن ←</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <a href="home.html" class="btn btn-secondary mt-5">← الرجوع للصفحة الرئيسية</a>
    </div>

    <footer class="bg-info text-white text-center py-2 fixed-bottom">
        <div class="container">
            <p class="mb-0 small">&copy; 2026 Lab Escape - جميع الحقوق محفوظة لمختبر هايدرا</p>
        </div>
    </footer>

</body>
</html>