<!doctype html>
<html class="no-js" lang="en">

    <head>
        <?= $this->element('Layout/head_tag') ?>
      <script>
            var siteUrl = '<?= SITE_URL ?>';
        </script>
    </head>

    <body>
        <?= $this->element('Layout/main_header') ?>
        <?= $this->element('Layout/slider') ?>

        <div class="home_section_bg">
            <?= $this->fetch('content') ?>
        </div>

        <?= $this->element('Layout/footer') ?>
    </body>

    <!-- Plugins JS -->
    <?= $this->Html->script("/css/assets/js/plugins.js") ?>

    <!-- Main JS -->
    <?= $this->Html->script("/css/assets/js/main.js") ?>
    <?= $this->Html->script("session.js") ?>
</html>
