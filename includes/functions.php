<?php
# functions.php
/* Bruce Turner, IT 328, Spring 2019 -->
   https://bturner.greenriverdev.com/328/CupCakes0408/includes/functions.php -->
   04-08-19 Rev.3
*/
// credit for this function is guidance from Ken Hang & the current text book
// at that time, PHP and MySQL for Dynamic Websites, 4th.edition
//------------------------------------------------------------------------------
//                          my_error_handler()
// Create the error handler:
function my_error_handler($e_number, $e_message, $e_file, $e_line, $e_vars) {
    // Build the error message:
    $message = "An error occurred in script '$e_file' on line $e_line: $e_message\n";
    // Append $e_vars to  $message:
    $message .= print_r ($e_vars, 1);
    if (!LIVE) { // Development (print the error).
        echo '<pre>' . $message . "\n";
        debug_print_backtrace();
        echo '</pre><br>';
    } else { // Don't show the error.
        echo '<div class="error">A system error occurred. We apologize for the inconvenience.</div><br>';
    }
}// End of my_error_handler() definition.
//------------------------------------------------------------------------------