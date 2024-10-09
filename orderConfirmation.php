<!-- EECS1012: orderConfirmation.php (Lab #9)-->
<!-- (CC) Michael S. Brown -->


<!DOCTYPE html>
<html>
<head>
<style>
  #previousorders {
    width: 70%;
    border: dashed 2px black;
    background-color: silver;
    padding: 10px;
  }
  #previousorders p {
      padding: 0px;
      margin-top: 0px;
      margin-bottom: 0px;
      font-family: monospace;
    }
  #container {
    width: 80%;
    padding: 10px;
    background-color: LightSkyBlue;
    margins: auto;
    border: solid 5px black;
    font-size: 1.25em;
  }
  .orderitem {
    color: blue;
    font-family: monospace;
    font-size: 1.5em;
  }
  #message  {
    background-color: silver;
    border: 2px black solid;
    font-family: monospace;
    font-size: 1.24em;
    height: 100px;
    width: 50%;
  }
</style>
</head>


<body>
  <?php
  /* turn on error message for debugging */
  ini_set('display_errors', 1); # only need to call these functions
  error_reporting(E_ALL);       # one time

  /* REMOVE comments to see all data passed to this PHP program, this is useful for debugging.
    print_r($_POST);
     */
     print_r($_POST);print_r($_POST);

  /* Recall all data is passed from the form to this PHP file as an associative array */
  /* that is defined in variable $_GET.  This is a simple example to help you get
     started. */







    /* Since "gift" is a checkbox, it ,ight not be set by the user.  in this case the variable will not be defined .  You can use PHP "isset()" function to test if it was set or not in the $_GET. */
    if ( isset($_POST["gift"]) )
    {
      $gift = $_POST["gift"];
      $message = $_POST["message"];
    }
    else {
      $gift = false;
      $giftmessage = "";
    }

    /*  You should assign the rest of the variables here, in particular there are several other parmemeters passed from the Forms: color, size and price, credit card type, card number, date.  Look at the form names carefully. */

  ?>


   <div id="container">

<?php



  $name = $_POST["name"];
  $sizeandprice=$_POST["sizeandprice"];
  $color=$_POST["color"];
   $creditcard=$_POST["cardtype"];
   $cardnumber =$_POST["cardnumber"];
   $expirationdate= $_POST["carddate"];




     /* put your code here.  */
     /* You can access any variables defined in the previous <?php ... ?> code */
     /* You print, recall that the variables from the Forms need to be printed using */
     /* the style class orderitem defined above.  */
    print "<h2> Confirmation of your &quotCat Fails Video&quot T-shirt order! </h2> \n";

    print("<p>name :<span class=\"orderitem\">$name</span></p>");
    print("<p>item :<span class=\"orderitem\">$sizeandprice ($color) </span></p>");
    print("<p>credit card :<span class=\"orderitem\">$creditcard</span></p>");
    print("<p>card number :<span class=\"orderitem\">$cardnumber</span></p>");
    print("<p>expiration date: <span class=\"orderitem\">$expirationdate</span></p>");


    /* you also need to write to the file "orders.txt" the string containing the
       following info:  name, size and price, color, cardnumber */

    /* if you print out the gift message, use class "message" defined above - see Lab document */

    if ($gift != false)
    {
      print "<p>Gift Message</p>";
      print "<p id=\"message\">$message</p>";
    }

    ?>

  <div id="previousorders">
    <h2> Previous Orders </h2>
    <?php
      $ordersFile = file("orders.txt");
      /* This is an alternative loop syntax when you need a loop to access
         items in an array */
      /* This creates loop for the array $ordersFile, where each time the loop
         runs the current value in $ordersFile is copied to the variable $line.
        This prints out each line of the file */

      foreach ($ordersFile as $line)
      {
        print "<p> $line </p>";
      }

      file_put_contents("orders.txt", "\n $name, $sizeandprice, $color, $cardnumber", FILE_APPEND);
    ?>
  </div>
</div> <!-- end container -->

</body>
</html>
