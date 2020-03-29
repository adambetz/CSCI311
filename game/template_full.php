
<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
<title>VIU SIMS</title>
<link rel="stylesheet" href="../css/templateCSS.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../js/prototypeJavaScript.js"></script>
<script src="../js/maps.js"></script>
</head>
<body onload="Initialize()">
<div id="app">
<v-app>
		 <div class="rooms_topbar">
		 <h1>VIU SIMS</h1>
             <div id="btnblk1" style=" vertical-align: top;float:right; margin-botton:15px; position:">
		 <v-btn class="mx-2" fab dark small color="lime" dark icon href="../login.php" target="_self">
        <v-icon dark>mdi-account-circle</v-icon>
      </v-btn>

      <v-btn class="mx-2" fab dark small color="lime" dark icon href="../admin/settings.html" target="_self">
        <v-icon dark>mdi-wrench</v-icon>
      </v-btn>
         </div>
</div>

<!------- --------->

<div class="rooms_leftsidebarTop">
<h2 class="heading">WHO'S ONLINE</h2>
<!-- JS function grabs list and display's who is logged on-->
<p id="onlineList">
  bill <br>
jill <br>
arnold
</p>
</div>

<div class="rooms_leftsidebarBottom">
<!--referenced by js. Hardcoad for prototype-->
        <h2 id="roomName">TEMPLATE</h2>
        <p id="roomDesc">This is the template room</p>
</div>

<div class="rooms_rightsidebar">
        <h2 class="heading"> STATS</h2>
        <table id="statsTable">
                <tr>
                        <td>Mood:</td>
                        <td id="stat_mood">100</td>
                </tr>
                <tr>
                        <td>Energy:</td>
                        <td id="stat_energy">100</td>
                </tr>
                <tr>
                        <td>Grade:</td>
                        <td id="stat_grade">F</td>
                </tr>
                <tr>
                        <td>Suspicion:</td>
                        <td id="stat_suspect">high</td>
                </tr>
                <tr>
                        <td>Hunger:</td>
                        <td id="stat_hunger">Starving</td>
                </tr>
                <tr>
                        <td>Caffeine:</td>
                        <td id="stat_caffeine">caffeinated</td>
                </tr>
                <tr>
                        <td>Nerd Status:</td>
                        <td id="stat_nerd">noob</td>
                </tr>

        </table>
</div>

<!------------   ---------------->

<div class="text_center">
<div class="rooms_actionsbar">
    <h3 class="heading">CHOOSE AN ACTION...</h3>
      <v-btn class="mx-2" fab dark small color="lime" id ="SLEEP" onclick="SelectAction(id)">
        <v-icon dark>mdi-sleep</v-icon>
      </v-btn>

      <v-btn class="mx-2" fab dark small color="lime" id= "STUDY" onclick="SelectAction(id)">
        <v-icon dark>mdi-book</v-icon>
      </v-btn>

      <v-btn class="mx-2" fab dark small color="lime" id= "EAT" onclick="SelectAction(id)">
        <v-icon dark>mdi-food</v-icon>
      </v-btn>

     <v-btn class="mx-2" fab dark small color="lime" id= "CHAT" onclick="SelectAction(id)">
        <v-icon dark>mdi-chat</v-icon>
      </v-btn>

      <v-btn class="mx-2" fab dark small color="lime" id= "GYM" onclick="SelectAction(id)">
        <v-icon dark>mdi-domain</v-icon>
      </v-btn>

      <v-btn class="mx-2" fab dark small color="lime" id= "COFFEE" onclick="SelectAction(id)">
        <v-icon dark>mdi-coffee</v-icon>
      </v-btn>

      <v-btn class="mx-2" fab dark small color="lime" id= "HOMEWORK" onclick="SelectAction(id)">
        <v-icon dark>mdi-pencil</v-icon>
      </v-btn>

      <v-btn class="mx-2" fab dark small color="lime" id= "HACK" onclick="SelectAction(id)">
        <v-icon dark>mdi-laptop</v-icon>
      </v-btn>

      <v-btn class="mx-2" fab dark small color="lime" id= "FLIRT" onclick="SelectAction(id)">
        <v-icon dark>mdi-account</v-icon>
      </v-btn>

    </div>
</div>

<!-------------   ------------>

<div class="rooms_chatbar">

</div>

</v-app>
</div>
<div id="map" class="rooms_mapbar">

   <!-- <img class="map" src="../media/Map.jpg" alt="VIU Campus Map">
   <a href="gym.html"><div class="gym" title="Go to the Gym"></div></a>
   <a href="residency.html"><div class="residency" title="Go to the Residence"></div></a>
   <a href="labs.html"><div class="labs" title="Go to the Lab"></div></a>
   <a href="pub.html"><div class="bar" title="Go to the Pub"></div></a>
   <a href="classroom.html"><div class="classrooms" title="Go to the Classroom"></div></a> -->
</div>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8PsWNo41OsmqfWqkfpRck43DWoB8_lVA&callback=initMap"
    async defer></script>
  <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
  <script>
    new Vue({
  el: '#app',
  vuetify: new Vuetify(),
  })

  </script>

</body>
</html>
