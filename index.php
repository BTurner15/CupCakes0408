<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

//initialize variables
$fname = "";
$lname = "";


//If form is submitted, process the data
if(!empty($_GET))
{
    //boolean to track errors
    $isValid = true;

    //Check first name
    $fname = $_GET['fname'];
    if(empty($fname))
    {
        echo "<p>Please provide a first name</p>";
        $isValid = false;
    }

    //Check last name
    $lname = $_GET['lname'];
    if(empty($_GET['lname']))
    {
        echo "<p>Please provide a last name</p>";
        $isValid = false;
    }

    //check for at least one flavor
    if (!isset($_GET['flavors']))
    {
        echo "Please choose at least one flavor";
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
        $costPerCake = 3.50;
        $numCakes = sizeof($flavors);
        $total = $numCakes * $costPerCake;
        echo "Thank you for your order ".$fname."!";
        echo "<p>Order Summary</p>";
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


<h1 class="">Delicious Cupcakes with <span class="font-weight-bold">100%</span> Natural Ingredients!</h1>
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


            foreach($flavors as $flavor) //thanks Keith Carlson for the foreach approach
            {

                //make checkboxes sticky
                if((!empty($_GET['flavors']) && in_array($flavor, $_GET['flavors'])))
                {
                    $checked = "checked = 'checked'";
                }
                //but not crazy sticky!:-)
                else
                {
                    $checked = "";
                }
                //check for valid choice of flavor

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