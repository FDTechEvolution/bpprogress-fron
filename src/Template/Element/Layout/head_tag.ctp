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
<script src="https://unpkg.com/vuex@2.0.0"></script>
<script src="https://unpkg.com/vee-validate@<3.0.0"></script>
<script>Vue.use(VeeValidate);</script>
<!-------------------->

<script>var siteurl = '<?= SITE_URL ?>'; var apiurl = '<?= SITE_API ?>';</script>