<?php
/**
 * Created by PhpStorm.
 * User: mad1
 * Date: 5/4/14
 * Time: 8:11 AM
 */
function login()
{
    //troubleshoot if file is being opened
    /*
    $file = fopen("log.html", 'a');

    if (file_exists($file)){
        echo "file exists <br>";
    }
    else{
        echo "file does not exists <br>";
    }
    if ($file == FALSE) {
        echo "error fopen <br>";
    }
    else{
        echo "file is open <br>";
    }
    if(fwrite($file, "teste") == FALSE)
    {
        echo "error fwrite";
    }
    else{
        echo "file is written <br>";
    }
    */
    // end troubleshoot

    //this opens the file
    $fp = fopen("log.html", 'a');
    //this reads the opened file and write appends 'a' html to the file
    fwrite($fp, "<div class='msgln'><i><span class='green'> ". $_SESSION['name'] ." </span>has entered the chat room.</i><br></div>");
    //this closes the file
    fclose($fp);
}

function logout()
{
    $fp = fopen("log.html", 'a');
    fwrite($fp, "<div class='msgln'><i><span class='red'> ". $_SESSION['name'] ."</span> has left the chat room.</i><br></div>");
    fclose($fp);


    // unset any session variables
    $_SESSION = [];

    // destroy session
    session_destroy();

    //$fh = fopen( "log.html", 'w' );
    //fclose($fh);

    //header("Location: webchat/index.php"); //Redirect the user
    //render("login_form.php", ["name"=>""]); //Redirect the userc

}

// expects a template argument and some arrays, its set to empty array for now
function render($template, $values = [])
{
    // extract variables into local scope
    extract($values);

    // if template exists, render it
    if (file_exists("templates/$template"))
    {
        // render header
        require("templates/header.php");

        // render template
        require("templates/$template");

        // render footer
        require("templates/footer.php");
    }

    // if template does not exist
    else
    {
        echo 'invalid template';
    }
}
