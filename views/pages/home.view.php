<?php
use App\Application\Views\View;
use App\Application\Config\Config;
?>
<!doctype html>
<html lang="<?= Config::get('app.lang') ?>">
<head>
    <?php View::component('head'); ?>
    <title><?= $title ?> </title>
</head>
<body>
<div class="container">
    <div class="row mt-5">
        <h2>Welcome to<span class="badge bg-secondary"><?= $title ?> </span></h2>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>