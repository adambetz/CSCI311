<?php 
		// ---------------------------------------------------------
		// Room specific funtionality will go in this file.
		// Update current actions to represent current room
		//----------------------------------------------------------


        //require("dbinfo.inc");//require_once("dbinfo.inc");
        require_once("game_top.php");
        require_once("game_mid.php");
?>


    

	<div class="rooms_actionsbar">
	<h2>CHOOSE YOUR ACTION </h2>
		<div class="text_center">
	      <v-btn class="mx-2" fab dark small color="lime" id ="SLEEP" onclick="SelectAction(id)">
	        <v-icon dark>mdi-sleep</v-icon>
	      </v-btn>

	     <v-btn class="mx-2" fab dark small color="lime" id= "CHAT" onclick="SelectAction(id)">
	        <v-icon dark>mdi-chat</v-icon>
	      </v-btn>

	      <v-btn class="mx-2" fab dark small color="lime" id= "HOMEWORK" onclick="SelectAction(id)">
	        <v-icon dark>mdi-pencil</v-icon>
	      </v-btn>
	    </div>
	</div>

<?php  
        require_once("game_bottom.php");
 ?>

