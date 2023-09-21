<?php
    // Author: Kuldeep Mohanta
    // Date: September 12, 2023
    // Description: File handling example containing two parts: practice 1 using PHP to read and write data + practice 2 using other writing modes
?>

<?php
    // Practice 1 - read and write PHP data
    /*
    Create a new file
    Write some data into it
    Read data from the file
    Display/echo data
    */

    // Create a file and append information to it
    $bmw_information = fopen('./car_models.txt', 'a');

    // Writing into the new file
    fwrite($bmw_information, "BMW Models\n\n3 series are as follows:\n323i\n330i\n340i\nM340i");

    // Reading and displaying information from the file
    $bmw_information = fopen('car_models.txt', 'r'); // Open the file for reading
    echo fread($bmw_information, filesize('car_models.txt')); // Read and echo the file contents
    fclose($bmw_information); // Close the file stream
?>