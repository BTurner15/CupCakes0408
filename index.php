<!-- Bruce Turner, IT 328, Spring 2019 -->
<!-- CupCakes Assignment -->
<!-- https://bturner.greenriverdev.com/328/CupCakes0408/index.php -->
<!-- 04-08-19 Rev6.0 -->
<!-- PHP Refresher Assignment -->
<!-- Many thanks to a number of people for the substance of this code! -->
<!-- I would not have much anything without a lot of help! -->
<!-- Prime contributor Phil Bowden, then indirectly Keith Carlson, the bootstrap help -->
<!-- is from our facilitator Jake Suhoversnik -->
<!-- Phil was kind enough to share his GitHub repo from Winter 2019. Apparently Keith Carlson -->
<!-- helped him, and then the afternoon with our new facilitator paid dividends with bootstrap -->
-->
<!-- -->
<?php
// 1st things first. Let's set up error reporting !
// Flag variable for site status:
define('LIVE', FALSE);
include("includes/functions.php");
// Use my error handler:
set_error_handler('my_error_handler');
// start of the specific code

//the sole input from user is a first & last name, and 1 (or more) selected cupcakes
$fname = ""; //this how we check for input
$lname = ""; //require both for valid input

//If form is submitted, process the data
if(!empty($_GET))
{
    //we will require a complete name (first & last), and 1 (or more) cupcakes
    $isValid = true;

    //Check first name
    $fname = $_GET['fname'];
    if(empty($fname))
    {
        echo "<p>Please input a first name</p>";
        $isValid = false;
    }

    //Check last name
    $lname = $_GET['lname'];
    if(empty($_GET['lname']))
    {
        echo "<p>Please input a last name</p>";
        $isValid = false;
    }

    //check for at least one flavor
    if (!isset($_GET['flavors']))
    {
        echo "No Cupcakes selected. Please do so";
        $isValid = false;
    }
    else
    {
        //check for valid flavor choice
        $chosenFlavs = $_GET['flavors'];
        foreach($chosenFlavs as $chosenFlav => $flavValue)
        {
            if(!in_array($flavValue, $chosenFlavs))
            {
                echo "<p>Please chose valid flavor</p>";
                $isValid = false;
            }
            else
            {
                $flavors = $_GET['flavors'];
            }
        }

    }
    //figure out the cost and print out the summary
    if($isValid)
    {
        $costPerCake = 4.29;
        $numCakes = sizeof($flavors);
        $total = $numCakes * $costPerCake;
        echo "Thank you for your order ".$fname."!";
        echo "<p>Thank you for your order!</p>";
        echo "<ul>";
        echo '<li>'.implode('</li><li>', $flavors).'</li>';
        echo '</ul>';
        echo "Order Total: ".money_format('$%i',$total); //stack overflow
        {

        }
    }

}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>PHP Review: Cupcakes</title>


</head>
<body>


<h1 class="font-weight-bold">Delicious Cupcakes with <span class="font-weight-bold">100%</span> Natural Ingredients!</h1>
<h2 class="font-weight-bold">Congratulations, as customer No. 1000 You Get A Discount! </h2>

<form class="alert-danger">
    <fieldset>
        <legend>
            Lucky Customer
        </legend>
        <div class="font-weight-bold">
            First Name:
            <input type="text" name="fname" id="fname" value= '<?php echo $fname; ?>'>
        </div>
        <br>
        <div>
            Last Name:
            <input type="text" name="lname" id="lname" value='<?php echo $lname; ?>'>
        </div>
        <br><br>
    </fieldset>
    <fieldset>

        <legend>
            Flavor Choices
        </legend>
        <div class="font-weight-bold">
            <?php
            $flavors = array("grasshopper"=>"The Grasshopper",
                "maple"=>"Whiskey Maple Bacon","carrot"=>"Carrot Walnut",
                "caramel"=>"Salted Caramel Cupcake","velvet"=>"Red Velvet",
                "lemon"=>"Lemon Drop", "tiramisu"=>"Tiramisu (coffee-flavoured)");

            foreach($flavors as $flavor)
                //first thank you to Phil Bowden, who included in his code a
                //thanks Keith Carlson for the foreach approach. My thanks to both!
            {

                //make checkboxes sticky. Bruce Turner is still confused on this
                if((!empty($_GET['flavors']) && in_array($flavor, $_GET['flavors'])))
                {
                    $checked = "checked = 'checked'";
                }
                //"...but not crazy sticky!:-)" I have to review this !!BT
                else
                {
                    $checked = "";
                }
                //flavor selected legitimate ?

                echo "<input type = 'checkbox' name = 'flavors[]'
                    value = '$flavor' $checked/>$flavor<br>";

            }
            ?>
        </div>
    </fieldset>
    <input type="submit" value="Order">
</form>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>
</html>