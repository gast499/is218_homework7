<html>
<head>
<title>PHP Tips and Tricks</title>
</head>
<body>
<?php
//using $GLOBALS
echo '<h3>1:  $GLOBALS:</h3>Both of these variables have the same name and are printed in the same function but exist in different scopes.';
echo '  You can use $GLOBALS to acces the global variable with the same name.<br>';
function test() {
    $foo = "This is the local variable.";

    echo '$foo in global scope: ' . $GLOBALS["foo"] . "<br>";
    echo '$foo in current scope: ' . $foo . "<br>";
}

$foo = "This is the global variable.";
test();

//using $_SERVER
echo '<h3>$_SERVER:</h3>The $_SERVER superglobal is an array that contains multiple elements.  You can access these elements by entering the keyword into the array call: $_SERVER[KEYWORD]';
echo '<br><br>$_SERVER[SERVER_NAME]: The server name of this web page is: ' . $_SERVER['SERVER_NAME'];
echo '<br>$_SERVER[PHP_SELF]: The filename of this program (including its path on the server) is: ' . $_SERVER['PHP_SELF'];
echo '<br>$_SERVER[GATEWAY_INTERFACE]: The gateway interface of this program is: ' . $_SERVER['GATEWAY_INTERFACE'];
echo '<br>$_SERVER[SERVER_ADDR]: The IP address the server runs on is: ' . $_SERVER['SERVER_ADDR'];
echo '<br>$_SERVER[SERVER_SOFTWARE]: The software the server is running on is: ' . $_SERVER['SERVER_SOFTWARE'];
echo '<br>$_SERVER[SERVER_PROTOCOL]: The name and version of the information protocol the server runs on is: ' . $_SERVER['SERVER_PROTOCOL'];
echo '<br>$_SERVER[REQUEST_METHOD]: The method used to access the page is: ' . $_SERVER['REQUEST_METHOD'];
echo '<br>$_SERVER[REQUEST_TIME]: The timestamp of the start of the request is: ' . $_SERVER['REQUEST_TIME'];
echo '<br>$_SERVER[REQUEST_TIME_FLOAT]: The timestamp of the start of the request, to the nearest microsecond, is: ' . $_SERVER['REQUEST_TIME_FLOAT'];
echo '<br>$_SERVER[QUERY_STRING]: The query string via which the page was accessed, if any, is: ' . $_SERVER['QUERY_STRING'];
echo '<br>$_SERVER[DOCUMENT_ROOT]: The document root directory under which the script is executing is: ' . $_SERVER['DOCUMENT_ROOT'];
echo '<br>$_SERVER[REMOTE_ADDR]: The IP address of the user viewing the webpage is: ' . $_SERVER['REMOTE_ADDR'];
echo '<br>$_SERVER[REMOTE_PORT]: The port that the user uses to view the webpage is: ' . $_SERVER['REMOTE_PORT'];
echo '<br>$_SERVER[SCRIPT_FILENAME]:  The absolute path of the script is: ' . $_SERVER['SCRIPT_FILENAME'];
echo '<br>$_SERVER[SERVER_PORT]: The port on the server machine being used is: ' . $_SERVER['SERVER_PORT'];
//echo '<br>$_SERVER[SERVER_SIGNATURE]: The server version and virtual host name, if any, the script runs on is: ' . $_SERVER['SERVER_SIGNATURE'];
echo '<br>$_SERVER[SCRIPT_NAME]: The current path of the script is: ' . $_SERVER['SCRIPT_NAME'];
echo '<br>$_SERVER[REQUEST_URI]: The URI which was given in order to access this page is: ' . $_SERVER['REQUEST_URI'];

?>
</body>
</html>