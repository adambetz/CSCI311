<?php 
        //require("dbinfo.inc");
        require("game_front_topbar.php");
        require("game_left_sidebars.php");
        require("game_right_sidebar.php");
        require("game_center_map.php");
 ?>

<div class="rooms_actionsbar">
    <h3 class="heading">CHOOSE AN ACTION...</h3>
    <div class="action_buttons">
        <button id="SLEEP" onclick="SelectAction(id)">Sleep</button>
        <button id="STUDY" onclick="SelectAction(id)">Study</button>
        <button id="GYM" onclick="SelectAction(id)">Go to gym</button>
        <button id="CHAT" onclick="SelectAction(id)">Socialize</button>
        <button id="COFFEE" onclick="SelectAction(id)">grab a coffee</button>
        <button id="FLIRT" onclick="SelectAction(id)">Get your flirt on</button>
        <button id="EAT" onclick="SelectAction(id)">Grab a bite</button>
        <button id="HOMEWORK" onclick="SelectAction(id)">Do homework</button>
        <button id="HACK" onclick="SelectAction(id)">Hack a computer</button>
    </div>
</div>
<div class="rooms_chatbar">

</div>
</body>
</html>