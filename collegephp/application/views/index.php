<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/theme.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/index.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/common.css'); ?>">

    <link rel="stylesheet" href="<?= base_url('assets/css/app.css'); ?>">
</head>
<body>
<div class="header flex-row">
 <div class="logo">Deshi Bhojnalay</div>
 <div>
 <a href="<?=base_url('colleges'); ?>"> Colleges </a>
     <a href="<?=base_url('students'); ?>">Students</a>
     <a href=""> Help </a>
     <a href="">log in</a>
     <span> or </span>
     <a href="">sign up</a>

 </div>

</div>

<div id="activeContent">

</div>
<script src="<?= base_url('assets/js/templates.js'); ?>"></script>
<script src="<?= base_url('assets/js/routes.js'); ?>"></script>
<script src="<?= base_url('assets/js/app.js'); ?>"></script>
</body>

</html>