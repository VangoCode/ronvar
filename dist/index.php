<?php

$server     = "shareddb-q.hosting.stackcp.net";
$username   = "ronvar-313137acdd";
$password   = "inxqvj9qsd";
$db         = "ronvar-313137acdd";


# Create connection
$conn = mysqli_connect($server, $username, $password, $db);

# Check connection
if (!$conn) {
    die("Connection failed to database.");
}

// Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

$ip = get_client_ip();
$long_ip = sprintf("%u", ip2long($ip));





    $error = ""; $successMessage = "";
    $error2 = ""; $successMessage2 = "";

    if ($_POST) {
        
        if (!$_POST["email"]) {
            
            $error .= "An email address is required.<br>";
            
        }
        
        if (!$_POST["content"]) {
            
            $error .= "The content field is required.<br>";
            
        }
        
        if (!$_POST["name"]) {
            
            $error .= "The name is required.<br>";
            
        }
        
        if ($_POST['email'] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
            
            $error .= "The email address is invalid.<br>";
            
        }
        
        if ($error != "") {
            
            $error = '<div class="alert alert-danger" role="alert"><p>There were error(s) in your form:</p>' . $error . '</div>';
            
        } else {
            
            $name = $_POST['name'];
            
            $content = $_POST['content'];
            
            $companyName = $_POST['cname'];
            
            $headers = $_POST['email'];
            
            $query = "INSERT INTO `clients_list` (`id`, `email`, `full_name`, `company_name`, `description`, `signup_date`, `ip`) VALUES (NULL, '$headers', '$name', '$companyName', '$content', CURRENT_TIMESTAMP, '$long_ip')";
            
            
            if(mysqli_query($conn, $query)) {
                $successMessage = '<div class="alert alert-success" role="alert">I\'ll email you back shortly with a quota!</div>';
            } else {
                $error = '<div class="alert alert-danger" role="alert"><p>There was an error adding you into the database.
                <br>'. mysqli_error($conn) .'
                </p></div>';
            }
            
            
        }
        
        
        
    }

    if($_GET) {
        if (!$_GET["emailList"]) {
            
            $error2 .= "An email address is required.<br>";
            
        }
        
        if ($error2 != "") {
            
            $error2 = '<div class="alert alert-danger" role="alert"><p>There were error(s) in your form:</p>' . $error2 . '</div>';
            
        } else {
            
            $emailForList = $_GET["emailList"];
            
            $query = "INSERT INTO `email_list` (`id`, `email`, `signup_date`, `ip`) VALUES (NULL, '$emailForList', CURRENT_TIMESTAMP, '$long_ip')";
            
            
            if(mysqli_query($conn, $query)) {
                $successMessage2 = '<div class="alert alert-success" role="alert">You\'ve been added to the list!</div>';
            } else {
                $error = '<div class="alert alert-danger" role="alert"><p>There was an error adding you into the database.</p></div>';
            }
            
            
        }
    }




?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Rakkas" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Exo+2" rel="stylesheet">

        <title>Ron Varshavsky - Freelancer</title>
        <meta name="description" content="The official website for Ron Varshavsky. Freelancer, and Web Developer">
        <meta name="author" content="Ron Varshavsky">
        <meta name="keywords" content="Ron Varshavsky, freelance, website, web design, web development">

        <link rel="stylesheet" href="assets/styles/styles-29c6bc7dae.css"/>
        
        <script src="assets/scripts/Vendor-859bac3ce5.js"></script>

    </head>

    <body id="top">
        
        <header class="site-header">
            <div class="wrapper">
                <div class="site-header__logo">
                    <div><img src="assets/images/icons/logo.svg" width="142px"></div>
                </div>
                
                <div class="site-header__menu-icon">
                    <div class="site-header__menu-icon__middle"></div>
                </div>
                
                <div class="site-header__menu-content">
                    <div class="site-header__btn-container">
                        <a href="#" class="btn open-modal">Get in Touch</a>
                    </div>

                    <nav class="primary-nav primary-nav--pull-right">
                        <ul>
                            <li><a href="#about" id="about-link">About Ron</a></li>
                            <li><a href="#performance" id="performance-link">Why Me?</a></li>
                            <li><a href="#signup" id="signup-link">Quote</a></li>
                            <li><a href="#email-list" id="email-link">Sign Up</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        
        <!-- Introduction -->
        <div class="introduction">
        
            
            
            <div class="introduction__text-content">
                <div class="wrapper">
                    <h1 class="introduction__title">Web Development</h1>
                    <h2 class="introduction__subtitle">Affordable. Beautiful. Sustainable.</h2>
                    <span class="separator"></span>
                    <p class="introduction__description">Get an expert quality website  from a young inspired developer.</p>
                    <p><a href="#" class="btn btn--green btn--large btn--insert-border btn--circlify btn--introduction open-modal">Get in contact</a></p>
                </div>
            </div>
        
        </div> <!-- .introduction -->
        
        
        <div id="about" class="page-section" data-matching-link="#about-link">
            <div class="wrapper wrapper-headline">
                    
                    <h2 class="headline headline--centered headline--light headline--b-margin-small headline--header">Ron Varshavsky - <strong>Freelancer, Student, Entrepreneur</strong></h2>
                    <h3 class="headline headline--red headline--centered headline--small headline--b-margin-large">"I've had a passion for <strong>as long as I could remember"</strong></h3>
                
                    <p><a href="#" class="btn btn--green btn--large btn--insert-border btn--circlify btn--about open-modal">Get in contact</a></p>
                

                <div class="row row--gutters">
                
                    <div class="row__medium-4 row__b-margin-until-medium">
                        <img class="headline--image lazyload" data-srcset="assets/images/ron.jpg" class="rotate" alt="Ron Varshavsky">
                    </div>
                    
                    <div class="row__medium-8">
                        <div class="generic-content-container">
                            <h2 class="headline headline--no-t-margin">Here&rsquo;s how I got started&hellip;</h2>
                            <p class="headline--body"> I began coding websites at the age of 9 and instantly fell in love. Ever since then, I have been expanding my knowledge by taking many online courses, as well as programming classes throughout highschool. Through my learning, I gained an understanding of numerous programming languages key to developing beautiful functional websites.  I am proficient in HTML, CSS, JavaScript and jQuery. I have an advanced knowledge in PHP, as well as MySQL. I also have some basic knowledge of other languages, such as C# and Java.</p>
                            <p class="headline--body">Aside from being able to just code, I am also well-versed in other skills needed by developers. I have a broad understanding of Git and am able to use it, even whilst working as a team. I have an understanding of Gulp as well as Node.JS which are both crucial for having an understandable developer interface. As such, I write well-organized readable code that anyone with a basic understanding of JavaScript should be able to read and actually be able to comprehend what is written.</p>
                            <p class="headline--body">Although I have a passion for coding, one of my main other hobbies is dance. More info on that can be found <a href="#danceinfo">here</a></p>
                        </div>
                    </div>
                </div> <!-- .row -->
            </div> <!-- .wrapper -->
        </div> <!-- .about -->
        
        <div id="performance" class="page-section page-section--blue" data-matching-link="#performance-link">
            <div class="wrapper">
                <h2 class="section-title section-title--white performance--header"><img class="section-title__icon" src="assets/images/icons/star.svg">Why <strong>Me?</strong></h2>

                <div class="row row--gutters row--gutters-large generic-content-container">
                
                    <div class="row__medium-6">
                    
                        <div class="performance-item">
                            <img class="performance-item__icon lazyload" data-srcset="assets/images/icons/diamond.svg" width="64px">
                            <h3 class="performance-item__title">Professional Quality</h3>
                            <p>Ron Varshavsky pays extreme attention to detail when styling his websites, and while programming both the front-end and back-end. Clients can rest assured their website will be of professional quality.</p>
                        </div>

                        <div class="performance-item">
                            <img class="performance-item__icon" src="assets/images/icons/piggy-bank.svg" width="64px">
                            <h3 class="performance-item__title">Bang for your Buck</h3>
                            <p>The quality of the product clients get is unrealistically good, especially for the price they pay.</p>
                        </div>
                        
                    </div>
                    
                    <div class="row__medium-6">
                    
                        <div class="performance-item">
                            <img class="performance-item__icon" src="assets/images/icons/computer.svg" width="64px">
                            <h3 class="performance-item__title">Fully Customizable</h3>
                            <p>Every aspect of the website is customizable. All elements will be changeable based on the client's requests, and payment will not be required until the client is fully satisfied.</p>
                        </div>
                            
                        <div class="performance-item">
                            <img class="performance-item__icon" src="assets/images/icons/coding.svg" width="64px">
                            <h3 class="performance-item__title">Front End and Back End Included</h3>
                            <p>The front end and the back end are both included. With a  beautiful website plus amazing back-end programming, Ron Varshavsky is an amazing one-stop-shop for your website.</p>
                        </div>
                            
                    </div>
                
                </div>
                
            </div> <!-- .wrapper -->
        </div> <!-- .performance -->
        
        
        <div id="signup" class="page-section signup" data-matching-link="#signup-link">
            <div class="wrapper">
                <h2 class="section-title signup--header"><img class="section-title__icon" src="assets/images/icons/envelope.svg" width="64px">Get a <strong>Quote</strong></h2>
                
                <form id="order-form" class="signup--form" method="post">
                
                    <h2>Want to order a site from me? Get a quote!</h2>
                    <div id="error"><? echo $error.$successMessage; ?></div>
                    <input type="email" id="email" name="email" class="signup--form-input" placeholder="Email">
                    <input type="text" id="name" name="name" class="signup--form-input" placeholder="Full Name">
                    <input type="text" id="cname" name="cname" class="signup--form-input" placeholder="Company Name (Optional)">
                    <textarea class="signup--form-input signup--form-input-textarea" id="content" name="content" rows="3" placeholder="Describe your website, and any additional features"></textarea>
                    
                    <br>
                    <button type="submit" id="submit" class="btn btn--submit">Submit</button>
                    
                
                </form>
                
                
                
            </div>
        </div>
        
        <div id="email-list" class="page-section page-section--blue signup" data-matching-link="#email-list">
            <div class="wrapper">
                <h2 class="section-title signup--header section-title--white">Join the <strong>List</strong></h2>
                
                <form id="email-list-form" class="signup--form" method="get">
                
                    <h2>Join my email list to get updates on the progress of the ordering system!</h2>
                    <div id="error2"><? echo $error2.$successMessage2; ?></div>
                    <input type="email" id="emailList" name="emailList" class="signup--form-input" placeholder="Email (ex: myemail@email.com)">
                    <br>
                    <button type="submit" id="submit" class="btn btn--submit btn--submit-red">Submit</button>
                    
                
                </form>
                
                
                
            </div>
        </div>
        
        
        <footer class="site-footer">
            <div class="wrapper">
                <p><span class="site-footer__text">Copyright &copy; 2019 Ron Varshavsky. All rights reserved.</span> <a href="#" class="btn btn--green open-modal">Get in Touch</a></p>
                <div>Icons made by <a href="https://www.freepik.com/" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" 		    title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" 		    title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
            </div>
        </footer>
        
        
        <div class="modal">
        
            <div class="modal__inner">
                <h2 class="section-title section-title--blue section-title--less-margin">Get In <strong>Touch</strong></h2>
                <div class="wrapper wrapper--narrow">
                    <p class="modal__description">I will have an online order system in place soon. Until then, you can enter your email to receive updates on my projects!</p>
                </div>
            </div>
                
            <div class="modal__close">X</div>
            
        </div>
        
        
        <script src="assets/scripts/App-ff9a2c17e4.js"></script>
        
    </body>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript">
        
          $("#order-form").submit(function(e) {
              
              var error = "";
              
              if ($("#email").val() == "") {
                  
                  error += "The email field is required.<br>"
                  
              }
              
              if ($("#name").val() == "") {
                  
                  error += "Please enter your name.<br>"
                  
              }
              
              if ($("#content").val() == "") {
                  
                  error += "The content field is required.<br>"
                  
              }
              
              if (error != "") {
                  
                 $("#error").html('<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' + error + '</div>');
                  
                  e.preventDefault();
                  return false;
                  
              } else {
                  
                  return true;
                  
              }
          });
        
        $("#email-list-form").submit(function(e) {
            var error2 = "";
              
            if ($("#emailList").val() == "") {
                  
                error2 += "The email field is required.<br>"
                  
            } 
            
            if (error2 != "") {
                  
                 $("#error2").html('<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' + error2 + '</div>');
                  
                console.log(error2);
                
                e.preventDefault();
                return false;
                  
            }    else {
                return true;
            }
        })
          
    </script>
</html>