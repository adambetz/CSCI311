<?php 
        //require("dbinfo.inc");
        require_once("game_front_topbar.php");
        require_once("game_left_sidebars.php");
        require_once("game_right_sidebar.php");
        require_once("game_center_map.php");
 ?>

<div class="rooms_actionsbar">
    <script type="text/javascript">
     
    $.ajax("game_actionbar_templateRoom.php").done(function(data){
        $(".rooms_actionsbar").html(data);
        //alert("success");
    }).fail(function(){
        //didn't load;
        //alert("fail");
    });
 </script>
</div>

