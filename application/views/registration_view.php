<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <!-- load bootstrap css file -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
  </head>
  <body>
    <style type="text/css">
        @media screen and (max-width:680px){

          #maincontent{
            width: auto;
            float: none;
          }
          #sidebar{
            width: auto;
            float: none;
          }
        }
    </style>
    <div class="container">
      <h1><center>Registration Form</center></h1><br>
          <form action="<?php echo site_url('login/register');?>" method="post">
          <input class="form-control" type="text" placeholder="input username..." aria-label="username" name="password"><br>
          <input class="form-control" type="password" placeholder="input password..." aria-label="password" name="username"><br>
          <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
  </body>
</html>