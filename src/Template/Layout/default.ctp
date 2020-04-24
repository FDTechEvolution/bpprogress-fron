<!doctype html>
<html class="no-js" lang="en">
    <head>
        <?= $this->element('Layout/head_tag') ?>
    </head>
    <body>
        <?= $this->element('Layout/main_header') ?>
        <?= $this->fetch('content') ?>
        <?= $this->element('Layout/footer') ?>
    </body>
    <!-- Plugins JS -->
    <?= $this->Html->script("/css/assets/js/plugins.js") ?>

    <!-- Main JS -->
    <?= $this->Html->script("/css/assets/js/main.js") ?>
</html>