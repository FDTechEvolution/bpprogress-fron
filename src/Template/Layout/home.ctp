<!doctype html>
<html class="no-js" lang="en">

<head>
    <?= $this->element('Layout/head_tag') ?>
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
