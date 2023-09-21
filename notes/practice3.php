<?php

    // Practice 3 - echo/var_dump/print_r the file-handle variable

    // Create a file and read information from it
    $bmw_information = fopen('./car_models.txt', 'r');

    /* 
        # print_r - php function that is used for displaying information.
        in this case it is being used to display the contents of the variable
        "$bmw_information"

        true - indicates that print_r should return the output as a string

        this function finally returns a string containing information about the file handle
        in this case $bmw_information

        # var_dump () - PHP function used for displaying detailed information (data type, values, etc.)
        in this case it is being used to display the result of print_r

        # echo - used to display the result of var_dump(print_r($bmw_information))

        > Therefore, this line is being used to print details regarding the file_handle

        */
        
        echo var_dump(print_r($bmw_information, true));



    
?>