<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Antomi - Electronics eCommerce HTML Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS 
    ========================= -->

    <!-- Plugins CSS -->
    <?= $this->Html->css("/assets/css/plugins.css") ?>

    <!-- Main Style CSS -->
    <?= $this->Html->css("/assets/css/style.css") ?>

    <!-- Vue.js & Axios -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <!-------------------->

</head>

<body>
    <?= $this->element('Layout/offcanvas') ?>
    <?= $this->element('Layout/header_home') ?>
    <?= $this->element('Layout/slider') ?>

    <div class="home_section_bg">
        <?= $this->fetch('content') ?>
    </div>

    <?= $this->element('Layout/footer') ?>
</body>

    <!-- Plugins JS -->
    <?= $this->Html->script("/assets/js/plugins.js") ?>

    <!-- Main JS -->
    <?= $this->Html->script("/assets/js/main.js") ?>
</html>
