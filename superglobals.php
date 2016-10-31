<?php
$cookie_name = "class";
$cookie_value = "is218";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>
<html>
<head>
<title>Superglobals</title>
</head>
<body>
<form method = "post">
Today is:   <input type="text" name="day"><br>
<input type="submit" value="Submit"><br>
</form>

<form enctype="multipart/form-data" method="POST">
    <!-- MAX_FILE_SIZE must precede the file input field -->
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    <!-- Name of input element determines name in $_FILES array -->
    Send this file: <input name="userfile" type="file" />
    <input type="submit" value="Send File" />
</form>
<?php
//using $GLOBALS
echo '<h3>$GLOBALS:</h3>Both of these variables have the same name and are printed in the same function but exist in different scopes.';
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

//using $_GET
echo '<h3>$_GET:</h3>The $_GET superglobal is an associative array of variables passed to the current script by using URL parameters.';
echo '<br>The $_GET function is used to access the data entered in a form.  For example, the day entered in the form above is: ' . htmlspecialchars($_GET["day"]);

//using $_POST
echo '<h3>$_POST:</h3>The $_POST superglobal is an associative array of variables passed to the current script using the HTTP POST method when using forms.';
echo '<br>The $_POST function is used to access the data posted from a form.  For example, the day entered in the form above is: ' . htmlspecialchars($_POST["day"]);

//using $_FILES
echo '<h3>$_FILES:</h3>The $_FILES superglobal is an associative array of items uploaded to the current script.';
echo '<br>$_FILES[userfile][name]: The name of the uploaded file is: ' . $_FILES['userfile']['name'];
echo '<br>$_FILES[userfile][type]: The type of the uploaded file is: ' . $_FILES['userfile']['type'];
echo '<br>$_FILES[userfile][size]: The size of the uploaded file is: ' . $_FILES['userfile']['size'];

//using $_COOKIE
echo '<h3>$_COOKIE:</h3>The $_COOKIE contains an associative array of cookies passed to the script using HTTP Cookies.  These Cookies are stored locally on the user\'s browser.<br>';
if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
}

//using $_SESSION
echo '<h3>$_SESSION:</h3>';
echo 'Click the links below to check the session results.<br>';
session_start(); 

$sessPath   = ini_get('session.save_path'); 
$sessCookie = ini_get('session.cookie_path'); 
$sessName   = ini_get('session.name'); 
$sessVar    = 'foo'; 

echo '<br>sessPath: ' . $sessPath; 
echo '<br>sessCookie: ' . $sessCookie; 

echo '<hr>'; 

if( !isset( $_GET['p'] ) ){ 
    // instantiate new session var 
    $_SESSION[$sessVar] = 'hello world'; 
}else{ 
    if( $_GET['p'] == 1 ){ 

        // printing session value and global cookie PHPSESSID 
        echo $sessVar . ': '; 
        if( isset( $_SESSION[$sessVar] ) ){ 
            echo $_SESSION[$sessVar]; 
        }else{ 
            echo '[not exists]'; 
        } 

        echo '<br>' . $sessName . ': '; 

        if( isset( $_COOKIE[$sessName] ) ){ 
        echo $_COOKIE[$sessName]; 
        }else{ 
            if( isset( $_REQUEST[$sessName] ) ){ 
            echo $_REQUEST[$sessName]; 
            }else{ 
                if( isset( $_SERVER['HTTP_COOKIE'] ) ){ 
                echo $_SERVER['HTTP_COOKIE']; 
                }else{ 
                echo 'problem, check your PHP settings'; 
                } 
            } 
        } 

    }else{ 

        // destroy session by unset() function 
        unset( $_SESSION[$sessVar] ); 

        // check if was destroyed 
        if( !isset( $_SESSION[$sessVar] ) ){ 
            echo '<br>'; 
            echo $sessName . ' was "unseted"'; 
        }else{ 
            echo '<br>'; 
            echo $sessName . ' was not "unseted"'; 
        } 

    } 
} 

//using $_REQUEST
echo '<h3>$_REQUEST:</h3>The $_REQUEST superglobal is an associative array that contains the contents of $_GET, $_POST, and $_COOKIE.<br>';
echo 'The $_REQUEST superglobal contains the info entered in the form above: ' . $_REQUEST['day'];
?> 
<hr> 
<a href=superglobals.php?p=1>test 1 (printing session value)</a> 
<br> 
<a href=superglobals.php?p=2>test 2 (kill session)</a>
</body>
</html>