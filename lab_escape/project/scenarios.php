<?php 
include 'config.php'; 
// جلب جميع المواد لعرضها كـ كاردات للمستخدم مرتبة بحسب المرحلة
$scenarios = $pdo->query("SELECT * FROM scenarios ORDER BY stage_level ASC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Escape - السيناريوهات</title>
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
        /* كلاس الكارد الموحد بنفس خصائص وحركات بقية الصفحات */
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
        .task-card-btn {
            background-color: var(--cyan-color);
            color: white;
            border: none;
            padding: 0.5rem 2rem;
            border-radius: 5px;
            width: 100%;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
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
        .custom-footer {
            background-color: var(--cyan-color);
            color: white;
            text-align: center;
            padding: 1rem 0;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

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
                    <div class="task-card d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex justify-content-between small mb-3" dir="rtl">
                                <span class="badge bg-secondary">المرحلة: <?=$s['stage_level']?></span>
                                <span class="badge bg-info text-white">المستوى: <?=$s['difficulty_level']?></span>
                            </div>
                            <h3 class="task-card-title fw-bold text-dark text-center mb-2"><?=$s['scenario_title']?></h3>
                            <p class="task-card-text text-muted small text-center mb-4"><?=$s['scenario_desc']?></p>
                        </div>
                        
                        <div class="mt-auto">
                            <a href="questions.php?id=<?=$s['scenario_id']?>" class="btn task-card-btn">ابدأ الاختبار الآن ←</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <a href="home.html" class="back-btn text-decoration-none">← الرجوع للصفحة الرئيسية</a>
    </div>

    <footer class="bg-info text-white text-center py-2 fixed-bottom">
    <div class="container">
        <p class="mb-0 small">© 2026 Lab Escape - جميع الحقوق محفوظة لمختبر هايدرا</p>
    </div>
</footer>

</body>
</html>