<html>
<head>
<title>BookNBook.com Private Chat</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Yusei+Magic&display=swap" rel="stylesheet">
<style>
.content {
  position: fixed;
  top: 0;
  background: rgba(0, 0, 0, 0.5);
  color: #f1f1f1;
  width: 100%;
  padding: 20px;
  text-align:center;
  font-family: 'Yusei Magic', sans-serif;
  font-size:2vw;
  text-decoration:underline;
}
</style>
</head>
<body>
<div class="content">
  <h1>BookNBook.com (Only StartUp Chat)</h1>

</div>
<embed src="sudhanshu.mp3" type="audio/mpeg" autostart="true" loop="true"
width="2" height="0">
</embed>
<?php
/*require("templates/index.html");*/
require("functions/config.php");//new


// this POST is called when 'start chat' button is clicked
if ($_SERVER["REQUEST_METHOD"]=="POST")
{
        // $defaultname="Enter Username";

        // checks if a name was entered
        // We still need additional checks if name has spaces but not empty
        if (isset($_POST["name"]))
        {
            // removes //#$%^^& or any hacky characters
            $_SESSION["name"] = stripslashes(htmlspecialchars($_POST["name"]));

            // then calls the chat form along with the persons name
            render("chat_form.php", ["name"=>$_SESSION["name"]]);
            //Then do login logic
            login();
        }
        else
        // if name field is blank
        {
            echo '<span class="error">Please type in a name</span>';
        }
}
else
    //if no POST is made stay on login form
    {
        render("login_form.php", ["name"=>""]); //Redirect the user
    }
?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>

<script type="text/javascript">
    //clear chat
//    $( "#clear" ).click(function() {
//
//
//        $('#chatbox div').empty();
//
//
//    });
    // turn off auto fill for input box
    $("#usermsg").attr("autocomplete", "off");

    //If user wants to end session
    $("#exit").click(function(){
        // similar to an alert box that asks for confirmation
        var exit = confirm("Are you sure you want to end the session?");

        // if confirmation is true
        if(exit==true)
        {
            // redirect to logout.php
            window.location.href = 'logout.php';
            // ajax post call
            $.ajax({
                type: "POST",
                // call logout.php with the variable log_out, then all session variables will be removed
                url: 'logout.php?log_out=true'
            });
        }

    });

    //If user submits a chat message
    $("#submitmsg").click(function(){
        // grab value from input box
        var clientmsg = $("#usermsg").val();
        //TODO encryption here, my private goal
        // shorthand post request to post.php with the chat message
        $.post("post.php", {text: clientmsg});
        // then we reset the chat message
        $("#usermsg").attr("value", "");
        //close click function or it will cause a conflict
        return false;
    });

    //Load the file containing the chat log
    function loadLog(){
        //Scroll height before the request
        var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
        // ajax call to log.html
        $.ajax({
            url: "log.html",
            cache: false,
            // The values inside log.html are returned as html
            success: function(html){
                // if the url call was successfull, the returned values from log.html is placed inside chatbox
                $("#chatbox").html(html); //Insert chat log into the #chatbox div

                // Auto-scroll
                // Scroll height after the request,
                // the height of new message is around 20px
                var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
                // animate scroll bar up if there are new messages
                if(newscrollHeight > oldscrollHeight){
                    $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
                }
            }
        });
    }
    // Run the file every second, any new messages will automatically be added.
    setInterval (loadLog, 1000);//Reload file every second

</script>
</body>
</html>