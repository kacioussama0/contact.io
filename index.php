<?php





    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);


    $nameError = $messageError = $emailError = $phoneError = '';  
    $name = $email = $phone = $message = '';
    $is_valid = false;  
    // Check IF Request Is POST
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
        $phone = filter_var($_POST['phone'],FILTER_SANITIZE_NUMBER_INT);
        $message = filter_var($_POST['message'],FILTER_SANITIZE_STRING);



        if(strlen($name) <= 3 && strlen($name) > 0) {
            $nameError = "Name Must Be Larger Than 3 Characters";
        }

        if(empty($name)) {
            $nameError = "Name Field Is Required";
        }

        if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $emailError = "Invalid Email";
        }


        if(empty($email)) {
            $emailError = "Email field Is Required";
        }


        if(empty($phone)) {
            $phoneError = "Phone Field Is Required";
        }

        if(strlen($message) < 10 && strlen($message) > 0) {
            $messageError = "Message Can't be Less Than 10 Characters";  
        }
    
        if(strlen($message) == 0){
            $messageError = "Message Field Is Required";   
            $success = "<p class = 'alert alert-success'>Message send Successfully</p>";
            $name = $email = $phone = $message = '';

        }

     
    }

    $headers = 'From: ' . $email . '\r\n';

    if(empty($nameError) && empty($messageError) && empty($emailError) && empty($phoneError)){
        mail('kacioussama0@gmail.com','Contact Form',$message , $headers);


        
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"> <!--Font Awesome-->
    <link rel="stylesheet" href="css/contact.css">
    <title>Contact Us</title>
</head>
<body>


    <!--Start Contact Form-->

    <div class="container">

        <h1 class = "display-1 text-center pt-4" >Contact Form</h1>
        
        <?php 
            if(isset($success))
                echo $success;
        
        ?>
    

    <form action="<?php $_SERVER['PHP_SELF']?>" method = "POST">


    <div class="form-floating my-2">
        <input type="text" name="name" id="name" class = "form-control" placeholder = "full-name" value = "<?php echo $name ?>"/>
        <label for="name">Name</label>
    </div>

    <p class = "text-danger" ><?php echo $nameError ?></p>

    <div class="form-floating my-2">
        <input type="email" name="email" id="email" class = "form-control" placeholder="name@example.com" value = "<?php echo $email ?>"/>
        <label for="email" class = "form-label">Email Address</label>        
    </div>

    <p class = "text-danger" ><?php echo $emailError ?></p>

    <div class="form-floating my-2">
      <input type="tel" name="phone" id="phone" class = "form-control" placeholder = "Phone Number" value = "<?php echo $phone ?>"/>
      <label for="phone" class = "form-label">Phone: </label>
    </div>

    <p class = "text-danger" ><?php echo $phoneError ?></p>

    <textarea name="message" id="message" cols="30" rows="5" placeholder = "Your Message" class = "form-control"><?php echo $message ?></textarea>
    <p class = "text-danger" ><?php echo $messageError ?></p>    <div class = "send-icon">
        <button type="submit" class = "btn btn-success d-block mt-3" >Send</button>
    </div>

    </form>





    </div>
    <!--End Contact Form-->
    <script src = "js/validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>