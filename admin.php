<?php
session_start();

// ini_set('display_errors', 1);
// error_reporting(E_ALL);
  $_SESSION['uname'] = $uname;
?><!DOCTYPE HTML>
<!--
    Sukhveer Jawandha
    file - admin.php
    url - http://sjawandha.greenrivertech.net/admin.php
     This is  the admin login page
    -->
<html>
<head>
    <title>Sukhveer's Portfolio</title>
    <meta charset="utf-8"/>
    <!-- Stylesheet-->
    <link rel="stylesheet" href="assets/css/main.css"/>
    <link rel="stylesheet" href="assets/css/styles.css"/>
</head>

<body class="is-preload">
<!-- Navs -->
<section id="indexNav">
    <div class="actions">
        <a href="index.php" class="button large"><span class="label">Intro</span></a>
        <a href="index.php#skills" class="button large"><span class="label">Skills</span></a>
        <a href="index.php#project" class="button large"><span class="label">Projects</span></a>
        <a href="index.php#resume" class="button large"><span class="label">Resume</span></a>
        <a href="index.php#contact" class="button large"><span class="label">Contact</span></a>
        <a href="admin.php" class="button large icon fa-user"><span class="label">Admin</span></a>
    </div>
</section>
<div id="wrapper"> <!-- Wrapper -->
    <!-- Intro -->
    <section class="intro">
        <header>
            <h1>Sukhveer Singh Jawandha</h1>
            <span data-position="center"><img id="me" src="images/profile.jpg" alt="Sukhveer Jawandha"/></span>
        </header>
        <div class="content">
            <form method="post" action="">
                <!-- Php for validate login page -->
                <?php
                //Turn on error reporting
                // ini_set('display_errors', 1);
                // error_reporting(E_ALL);
                $passwordsErr = $unameErr = $uname = $passwords = "";
                if (!empty($_POST)) {
                    require('login.php');
                }
                ?>
                <div id="admin" class="fields">
                    <div class="field">
                        <div>
                            <h1 class="icon fa-user"> Admin</h1>
                        </div>
                        <h3>Username</h3>

                        <input type="text" name="uname" value="<?php echo "$uname"; ?>" placeholder=""/>
                        <span class="error"><?php echo "$unameErr"; ?></span>
                    </div>

                    <div class="field">
                        <h3>Password</h3>
                        <input type="password" name="passwords" value="<?php echo "$passwords"; ?>" placeholder=""/>
                        <span class="error"><?php echo $passwordsErr; ?></span>
                    </div>
                </div>
                <input type="submit" value="Login" class="primary"/>
            </form>
        </div>
    </section>
</div><!-- wrapper -->

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.scrolly.min.js"></script>
<script src="assets/js/browser.min.js"></script>
<script src="assets/js/breakpoints.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>