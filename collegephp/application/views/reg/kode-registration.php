<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration

    </title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/common.css'); ?>">
    <!-- <link rel="stylesheet" href="./assets/bootstrap-4.0.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/style/index.css"> -->
    <script defer src="<?= base_url('assets/js/app.js'); ?>"></script>
    <script defer src="<?= base_url('assets/js/registration.js'); ?>"></script>
</head>

<body>
    <ul class="nav justify-content-end">
        <li class="nav-item">
            <a class="nav-link active" href="#">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Registration</a>
        </li>
    </ul>


    <form action="<?=base_url('kodecamp/login'); ?>" method = "post" enctype="multipart/form-data">

        <div class="form-group">
             
            <!-- <img class="block-ele-center" src="http://lorempixel.com/100/100/" alt=""> -->
            <label for="exampleFormControlFile1">Choose Profile Photo</label>
            <input type="file" class="form-control-file" id="" name="profile_pic">
            
            <label for="Name">Name</label>
            <input type="text" class="form-control" id="Name" placeholder="Name" name="name">
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->

            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">

            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password" name="password">


            <label for="course">Course</label>
            <input type="text" class="form-control" id="course" placeholder="course" name="course">

            <label for="exampleFormControlFile1">Example file input</label>

           <input type="file" class="form-control-file" id="file" name="file_bws">
        </div>
        
        <button type="submit" class="btn btn-primary"  rel="ajaxControl" onclick="submitForm()">Submit</button>
        <a href="<?=base_url('kodecamp/login'); ?>" rel="ajaxControl">Click</a> 
        <button type="button" rel="ajaxControl">Button</button>   
    </form>
    <ul id="content">
    </ul>
</body>

</html>