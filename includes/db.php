<?php

require_once("constants.php");
# Function to establish database connection
function db_connect()
    {
        
        # using pg_connect to insert details regarding connection verification
        $db_connection = pg_connect("host=localhost port=5432 dbname=mohantak_db user=mohantak password=100656950");

        # Checking if DB Connection is succesful
        if (!$db_connection)
            {
                # If connection has an error then display error and kill connection
                die("Connection to Database failed: ".pg_last_error());
            }

        # Return sucessfull connection
        return $db_connection;
    }



function user_select($email)
{
    function user_authenticate ($email, $plain_password)
    {
         // Define the SQL query to fetch the user's record based on email
        $query = "SELECT * FROM users WHERE EmailAddress = $1";
        
        // Prepare and execute the query
        $result = pg_query_params($db_connection, $query, array($email));
        
        if (!$result) 
            {
                // Query execution failed
                return false;
            }
        
        $row = pg_fetch_assoc($result);
        
        if (!$row) 
            {
                // User with the provided email does not exist
                return false;
            }
        
        // Compare the plain text password with the hashed password from the database
        // Replace 'Password' with the actual column name
        $hashed_password_from_db = $row['Password']; 
        
        if (password_verify($plain_password, $hashed_password_from_db)) 
            {
                // Passwords match, authentication successful
                return true;
            }
        
        // Passwords do not match
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    // Check if the form has been submitted via POST
    
    $email = $_POST['email']; // Replace with your form field names
    $password = $_POST['password']; // Replace with your form field names



    // Validating sign in details with information registered to the database
    if (user_authenticate($db_connection, $email, $password)) 
        {
            // Authentication successful
            echo "Sign-In Success!";

            // Deploy page redirection after succesful verification to sales dashboard
            header("Location: ../dashboard.php");
        } 
    
    else 
        {
            // Authentication failed
            echo "User credentials are not recognized. Invalid email or password.";
        }
    
    }

# Create a global variable to hold the database connection
$db_connection = db_connect();

$query = "SELECT * FROM users WHERE EmailAddress = $1";

$user_select = pg_prepare($db_connection, "user_select",$query);

// $user_insert = pg_prepare($conn, "user_insert", "INSERT INTO users() VALUES ()" );
