<div id="chat">
    <div id="menu">
        <span class="green left margin_left_5">Hello</span>

        <span class="right" id="right_menu">
            <!--Name is rendered here-->
            <span class="left"><?= $name; ?></span>


            <a href="#" ><button id="exit" class="right"> Close Chat</button></a>

        </span>

    </div>
    <!--Chat is rendered here-->
    <div id="chatbox"></div>

    <form name="message" action="">
        <input name="usermsg" type="text" id="usermsg" size="333" required/>
        <input name="submitmsg" type="submit"  id="submitmsg" value="Send"/>
    </form>
</div>