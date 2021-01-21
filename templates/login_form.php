

<div id="loginform">
    <span class="green left margin_left_5">Hello</span>
    <form action="index.php" method="post" id="username">
        <!-- I changed (value="Enter Username") to (value="") -->
        <!-- this was causing the input to never be empty -->
        <input type="text" name="name"  value="" onclick="this.value='';"  onfocus="this.select();" onblur="this.value=!this.value?'Enter Username':this.value;" required/>
        <a><button type="submit" name="enter" class="right" value="Enter" >Start Chat</button></a>
    </form>
</div>






