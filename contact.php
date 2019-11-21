<?php
session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

if(!isset($_SESSION['uname']))
{
    header('location: index.php');
}
else
{
 $uname = $_SESSION['uname'];
}
?>
<!DOCTYPE HTML>
<!--
    Sukhveer Jawandha
    file - contact.php
    url - http://sjawandha.greenrivertech.net/contact.php
    -->
    
<html>
<head>
    <title>Sukhveer's Portfolio</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="assets/css/main.css"/>
    <link rel="stylesheet" href="assets/css/styles.css"/>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

</head>
<body id="body">
<section id="indexNav">
    <div class="actions">
        <a href="index.php" class="button large"><span class="label">Intro</span></a>
        <a href="index.php#skills" class="button large"><span class="label">Skills</span></a>
        <a href="index.php#project" class="button large"><span class="label">Projects</span></a>
        <a href="index.php#resume" class="button large"><span class="label">Resume</span></a>
        <a href="index.php#contact" class="button large"><span class="label">Contact</span></a>
        <a href="admin.php" class="button large icon fa-user">Admin<span class="label">Admin</span></a>
    </div>
</section>
<!-- Intro -->
<section class="intro">
    <header>
        <img id="me" src="images/profile.jpg" alt="Sukhveer Jawandha"/>
        <h1>Sukhveer Jawandha</h1>
         <!-- button for contact data table -->
        <input type="submit" value="Contact Data Table" id="dataBtn" class="primary"/>
    </header>
    <div class="popup-overlay">
       
        <h2>Contact Form</h2>
        <form method="post" action="">
            <!--            Php to validate the data -->
            <?php
            //Turn on error reporting
            //            ini_set('display_errors', 1);
            //            error_reporting(E_ALL);
            $nameErr = $emailErr = $messageErr = $name = $met = $metErr = $email = $subject = $message = "";
            if (!empty($_POST)) {
                require('contactdata.php');
            }
            ?>
            <div class="fields"> <!-- full fields for contact from -->
                <div class="field half">
                    <h3>Name</h3>
                    <input type="text" name="name" value="<?php echo $name; ?>" placeholder=""/>
                    <span class="error"><?php echo $nameErr; ?></span>
                </div>
                <div class="field half">
                    <h3>Email</h3>
                    <input type="email" name="email" value="<?php echo $email; ?>" placeholder=""/>
                    <span class="error"><?php echo $emailErr; ?></span>
                </div>
                <div class="field">
                    <h3>Company (Optional)</h3>
                    <input type="text" name="subject" value="<?php echo $subject; ?>" placeholder="facebook"/>
                </div>
                <div class="field">
                    <h3>How we met ?</h3>
                    <select name="met">
                        <option value="">-</option>
                        <option <?php if ($met == 'meetup') echo 'selected="selected"'; ?> value="meetup">
                            Meetup
                        </option>
                        <option <?php if ($met == 'jobfair') echo 'selected="selected"'; ?>value="jobfair">Job
                            Fair
                        </option>
                        <option <?php if ($met == 'guest') echo 'selected="selected"'; ?>value="guest">guest at
                            GRC
                        </option>
                        <option <?php if ($met == 'other') echo 'selected="selected"'; ?> value="other">
                            Other(Write
                            in Comment Box)
                        </option>
                    </select>
                    <span class="error"><?php echo $metErr; ?></span>
                </div>
                <div class="field">
                    <h3>Comment (Optional)</h3>
                    <span><?php echo $messageErr; ?></span>
                    <textarea name="message" placeholder="Enter your message"
                              rows="6"><?php echo $message; ?></textarea>
                </div>
            </div> <!--contact from -->
            <input type="submit" value="Submit" class="primary"/>
        </form>
    </div>
</section> <!-- intro -->
<div id="data">
    <!--        Close-->
    <div class="close">Close</div>
    <h1>Contact Data</h1>
    <table class="display " id="order-data"> <!-- table -->
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Company</th>
            <th>How we met?</th>
            <th>Comment</th>
            <th>Date</th>
        </tr>
        </thead>
        <?php
        //Turn on error reporting
        //        ini_set('display_errors', 1);
        //        error_reporting(E_ALL);

        //DB file
        require "/home/sjawandha/db.php";
        //
        //define query
        $sql = "SELECT * FROM contact";

        //execute query
        $result = @mysqli_query($cnxn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            // print_r($row);
            $name = $row['Name'];
            $email = $row['Email'];
            $subject = $row['Company'];
            $met = $row['Met'];
            $message = $row['Comment'];
            $date = $row['Date'];
            echo "<tr><td>$name</td><td> $email</td><td> $subject</td><td> $met</td><td> $message</td><td> $date</td></tr>";
        }
        ?>
    </table>
</div> <!-- data -->

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.scrolly.min.js"></script>
<script src="assets/js/browser.min.js"></script>
<script src="assets/js/breakpoints.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>

<script src="//code.jquery.com/jquery-3.3.1.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<!-- sort query for table-->
<script>
    $("#order-data").DataTable();
</script>

<!-- show the table when click on contact data button-->
<script>
    // Get the modal
    var modal = document.getElementById('data');

    // Get the button that opens the modal
    var btn = document.getElementById("dataBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function () {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

</body>
</html>