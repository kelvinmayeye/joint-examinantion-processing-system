<?php
error_reporting(0);
include('includes/config.php'); 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Joint Examination Processing Result System</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
<a class="navbar-brand" href="index.php">Joint Examination Processing Result System-Jeprs</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                        <!-- <li class="nav-item"><a class="nav-link active" href="find-result.php">Students</a></li> -->
                        <li class="nav-item"><a class="nav-link active" href="login.php">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header - set the background image for the header in the line below-->
        <header class="py-3 bg-image-full" style="background-image: url('images/background-image.jpg')">

            <!-- Content section-->
        <section class="py-2">
            <div class="container my-3">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h2>JEPRS</h2>
                        <p></p>
                    </div>
                    <div class="col-lg-4">
                        <h4>Available links</h4>
                        <hr color="#000" />
                        <marquee direction="up" onmouseover="this.stop();" onmouseout="this.start();">
                   <ul> 
                    <li><a href="public-view.php" target="_blank">Public View</li>
                   </ul>
               </marquee>

                    </div>
                </div>
            </div>
        </section>

    
        </header>
       
        <!-- Footer-->
        <footer class="py-4 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Joint Examination Processing Result System <?php echo date('Y');?></p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>