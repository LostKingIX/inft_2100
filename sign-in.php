<?php
    include "../includes/header.php";
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

//$dbconn = pg_connect("dbname=test");


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
include "../includes/footer.php";
?>    