<?php
$title = "INFT 2100 - Salesperson Dashboard";

    include "./includes/header.php";


    // Check if user is already logged in
    if (isset($_SESSION['user'])) 
        {
            header("Location: dashboard.php");
            exit();
        }
?>   

<form class="form-signin">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
</form>


<?php

// Creating an empty error message variable to store errors
$error_msg = "";

//$dbconn = pg_connect("dbname=test");

# Sign in Function - connect to database to verify user sign in details
function user_authentication ($emailaddress, $password)
        {
            # Establish Database connection
            $db_connection = db_connect();

            # Gather information from Database that is necessary for user verification
            $query = "SELECT id, email, Password FROM users WHERE email = $1";  // $1 is a placeholder
            
            # Ensuring that data was succesfully found and the queury is not empty
            $result = pg_query_params($db_connection, $query, array($email));  // Replace $1 with $email
        
            # Checking if the query failed and if there are any rows with the provided email address
            if ($result && pg_num_rows($result) > 0) 
                {
                    # Fetch the user's data as a single row that matches (ideally)
                    $user = pg_fetch_assoc($result);
                    
                    # Check the provided password against the hash stored in the database
                    if (password_verify($password, $user['password_hash'])) 
                        {
                            # Successful login; return user data
                            return $user;
                            redirect("Location: dashboard.php");  
                        }
                }

// connect to a database named "mary" on "localhost" at port "5432"
//$dbconn2 = pg_connect("host=localhost port=5432 dbname=test");


//connect to a database named "mary" on the host "sheep" with a username and password
$db_connect = pg_connect("host=opentech.durhamcollege.org port=22 dbname=mohantak_db user=mohantak password=100656950");
var_dump($db_connect);


//connect to a database named "test" on the host "sheep" with a username and password
$user_connection = "host=localhost port=5432 dbname=mohantak_db user=mohantak password=100656950";
$db_connect = pg_connect($conn_string);
var_dump($db_connect);
print_r($db_connect);


//connect to a database on "localhost" and set the command line parameter which tells the encoding is in UTF-8
//$dbconn5 = pg_connect("host=localhost options='--client_encoding=UTF8'");


?>



<?php
include "./includes/footer.php";
?>    