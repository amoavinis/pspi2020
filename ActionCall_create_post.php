<!doctype html>
<?php
require("config.php");
require("gen_elements.php");
session_start();
if (isset($_COOKIE["ActionCallUser"]) && isset($_COOKIE["ActionCallUserEmail"]) && isset($_COOKIE["ActionCallUserState"]))
{
    $_SESSION["loggedin"] = true;
    $_SESSION["email"] = $_COOKIE["ActionCallUserEmail"];
    $_SESSION["username"] = $_COOKIE["ActionCallUser"];
}
if (!isset($_SESSION["username"]))
{
    header("Location: index.php");
}
?>
<html>
  <head>
    <link rel="stylesheet" href="css/forum_post.css"> 
    
    <script src="js/editor.js"></script>
    <script src="js/gen_elements.js"></script>
    <script src="js/autocomplete.js"></script>
    <script src="js/togglevisibility.js"></script>
   
    <?php header_gen();?>
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    <title>ActionCall - Create Post</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/19.0.0/classic/ckeditor.js"></script>
  </head>

    <body>
    <?php navbar_gen();?>
        <div class="container content">
            <div class="container">
                <h1>Κάντε μία ανάρτηση</h1>
            </div>
            <div class="container" >
                <form method="POST" action="insert_new_post_to_db.php" autocomplete ="off" class="needs-validation">
                    <div class="form-group">
                        <label for="title">Τίτλος δράσης</label>
                        <input type="text" class="form-control" id="postTitle" name="title" placeholder="e.g. Καθαρισμός της Πλατείας Αριστοτέλους" required>
                    </div>
                    <div class="autocomplete">
                        <label for="city">Πόλη/Μέρος</label>
                        <select name="cityNames" id="cities">
                        <option value="">-Select a city-</option>
                        <option value="Agios Nikolaos">Agios Nikolaos</option>
                        <option value="Agrinio">Agrinio</option>
                        <option value="Aigio">Aigio</option>
                        <option value="Alexandreia">Alexandreia</option>
                        <option value="Alexandroupoli">Alexandroupoli</option>
                        <option value="Amaliada">Amaliada</option>
                        <option value="Argos">Argos</option>
                        <option value="Arta">Arta</option>
                        <option value="Artemida">Artemida</option>
                        <option value="Acharnes">Attica, Acharnes</option>
                        <option value="Agia Paraskevi">Attica, Agia Paraskevi</option>
                        <option value="Attica, Agia Varvara">Attica, Agia Varvara</option>
                        <option value="Attica, Agios Dimitrios">Attica, Agios Dimitrios</option>
                        <option value="Agios Ioannis Rentis">Attica, Agios Ioannis Rentis</option>
                        <option value="Alimos">Attica, Alimos</option>
                        <option value="Ano Losia">Attica, Ano Losia</option>
                        <option value="Argyroupoli">Attica, Argyroupoli</option>
                        <option value="Aspropyrgos">Attica, Aspropyrgos</option>
                        <option value="Athens">Attica, Athens</option>
                        <option value="Chalandri">Attica, Chalandri</option>
                        <option value="Attica, Cholargos">Attica, Cholargos</option>
                        <option value="Dafni">Attica, Dafni</option>
                        <option value="Egaleo">Attica, Egaleo</option>
                        <option value="Eleusis">Attica, Eleusis</option>
                        <option value="Elliniko">Attica, Elliniko</option>
                        <option value="Galatsi">Attica, Galatsi</option>
                        <option value="Gerakas">Attica, Gerakas</option>
                        <option value="Glyfada"> Attica, Glyfada</option>
                        <option value="Glyka Nera">Attica, Glyka Nera</option>
                        <option value="Kaisariani">Attica, Kaisariani</option>
                        <option value="Kalithea">Attica, Kalithea</option>
                        <option value="Kalyvia Thorikou">Attica, Kalyvia Thorikou</option>
                        <option value="Kamatero">Attica, Kamatero</option>
                        <option value="Koropi">Attica, Koropi</option>
                        <option value="Korydallos">Attica, Korydallos</option>
                        <option value="Loutraki">Attica, Loutraki</option>
                        <option value="Mandra">Attica, Mandra</option>
                        <option value="Marousi">Attica, Marousi</option>
                        <option value="Melissia">Attica, Melissia</option>
                        <option value="Attica, Metamorfosi">Attica, Metamorfosi</option>
                        <option value="Moschato">Attica, Moschato</option>
                        <option value="Attica, Nea Erythrea">Attica, Nea Erythrea</option>
                        <option value="Attica, Nea Filadelfeia">Attica, Nea Filadelfeia</option>
                        <option value="Nea Ionia">Attica,Nea Ionia</option>
                        <option value="Nea Makri">Attica, Nea Makri</option>
                        <option value="Nea Smyrni">Attica, Nea Smyrni</option>
                        <option value="Neo Psychiko">Attica, Neo Psychiko</option>
                        <option value="Nikaia">Attica, Nikaia</option>
                        <option value="Palaio Faliro">Attica, Palaio Faliro</option>
                        <option value="Pallini">Attica, Pallini</option>
                        <option value="Papagou">Attica, Papagou</option>
                        <option value="Attica, Pefki">Attica, Pefki</option>
                        <option value="Attica, Perama">Attica, Perama</option>
                        <option value="Peristeri">Attica, Peristeri</option>
                        <option value="Petroupoli">Attica, Petroupoli</option>
                        <option value="Rafina">Attica, Rafina</option>
                        <option value="Tavros">Attica, Tavros</option>
                        <option value="Vari">Attica, Vari</option>
                        <option value="Voula">Attica, Voula</option>
                        <option value="Attica, Vrilissia">Attica, Vrilissia</option>
                        <option value="Vyronas">Attica, Vyronas</option>
                        <option value="Ymittos">Attica, Ymittos</option>
                        <option value="Zografou">Attica, Zografou</option>
                        <option value="Chalkis">Chalkis</option>
                        <option value="Chania">Chania</option>
                        <option value="Chios">Chios</option>
                        <option value="Corfu">Corfu</option>
                        <option value="Corinth">Corinth</option>
                        <option value="Drama">Drama</option>
                        <option value="Edessa">Edessa</option>
                        <option value="Ermoupoli">Ermoupoli</option>
                        <option value="Florina">Florina</option>
                        <option value="Giannitsa">Giannitsa</option>
                        <option value="Heraklion">Heraklion</option>
                        <option value="Ialysos">Ialysos</option>
                        <option value="Ierapetra">Ierapetra</option>
                        <option value="Ioannina">Ioannina</option>
                        <option value="Kalamata">Kalamata</option>
                        <option value="Kalymnos">Kalymnos</option>
                        <option value="Karditsa">Karditsa</option>
                        <option value="Katerini">Katerini</option>
                        <option value="Kilkis">Kilkis</option>
                        <option value="Kos">Kos</option>
                        <option value="Kozani">Kozani</option>
                        <option value="Lamia">Lamia</option>
                        <option value="Larissa">Larissa</option>
                        <option value="Livadeia">Livadeia</option>
                        <option value="Megara">Megara</option>
                        <option value="Missolonghi">Missolonghi</option>
                        <option value="Mytilene">Mytilene</option>
                        <option value="Naousa">Naousa</option>
                        <option value="Nea Alikarnassos">Nea Alikarnassos</option>
                        <option value="Orestiada">Orestiada</option>
                        <option value="Patras">Patras</option>
                        <option value="Preveza">Preveza</option>
                        <option value="Ptolemaida">Ptolemaida</option>
                        <option value="Pyrgos">Pyrgos</option>
                        <option value="Rethymno">Rethymno</option>
                        <option value="Salamina">Salamina</option>
                        <option value="Serres">Serres</option>
                        <option value="Sparta">Sparta</option>
                        <option value="Thebes">Thebes</option>
                        <option value="Thessaloniki">Thessaloniki</option>
                        <option value="Thessaloniki, Ampelokipoi">Thessaloniki, Ampelokipoi</option>
                        <option value="Thessaloniki, Eleftherio-Kordelio">Thessaloniki, Eleftherio-Kordelio</option>
                        <option value="Thessaloniki,Evosmos">Thessaloniki,Evosmos</option>
                        <option value="Thessaloniki,Kalamaria">Thessaloniki, Kalamaria</option>
                        <option value="Thessaloniki, Neapoli">Thessaloniki, Neapoli</option>
                        <option value="Thessaloniki, Oraiokastro">Thessaloniki, Oraiokastro</option>
                        <option value="Thessaloniki, Pefka">Thessaloniki, Pefka</option>
                        <option value="Thessaloniki, Peraia">Thessaloniki, Peraia</option>
                        <option value="Thessaloniki, Polichni">Thessaloniki, Polichni</option>
                        <option value="Thessaloniki,Pylea">Thessaloniki, Pylaia</option>
                        <option value="Thessaloniki, Sykies">Thessaloniki, Sykies</option>
                        <option value="Thessaloniki, Thermi">Thessaloniki, Thermi</option>
                        <option value="Tripoli">Tripoli</option>
                        <option value="Tyrnavos">Tyrnavos</option>
                        <option value="Veroia">Veroia</option>
                        <option value="Trikala">Trikala</option>
                        <option value="Xanthi">Xanthi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="place">Διεύθυνση</label>
                        <input type="text" class="form-control" id="addressName" placeholder="e.g. Πλατεία Αριστοτέλους" required>
                    </div>
                    <div class= "form-group">
                    <iframe id="map" width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=6.240234375%2C32.0639555946604%2C35.90332031250001%2C44.15068115978094&amp;layer=mapnik" style="border: 1px solid black"></iframe><br/><small><a target="_blank" href="https://www.openstreetmap.org/#map=6/38.359/21.072">Προβολή Μεγαλύτερου Χάρτη</a></small>
                    </div>
                    <div class="form-group">
                        <!--
                        <input type="date" class="form-control" id="eventDate" name="evDate" required>
                        <label for="hour">Ώρα</label>
                        <input type="time" class="form-control" id="eventTime" name="evTime" min="0:00" max ="24:00" required> -->
                        <label for="date">Ημερομηνία</label>
                        <input type="text" class="form-control" name="evDate" id="date" required>
                        <label for="">Ώρα</label><br>
                        <select id="time_hour" name="time_hour">
                        <?php 
                        for($hours=0; $hours<24; $hours++) // the interval for hours is '1'
                            echo '<option>'.str_pad($hours,2,'0',STR_PAD_LEFT).'</option>';?>
                        </select>:
                        <select id="time_min" name="time_min">
                        <?php 
                        for($minutes=0; $minutes<60; $minutes++) // the interval for minutes is '1'
                            echo '<option>'.str_pad($minutes,2,'0',STR_PAD_LEFT).'</option>';?>
                        </select>
                    </div>
                    <script>
                        $( function() {
                            $( "#date" ).datepicker({
                                dateFormat: "dd-mm-yy",
                                minDate: new Date()
                            });
                        } );
                    </script>
                    <div class="form-group">
                        <textarea name="content" id="editor"></textarea>
                    </div>
                    <button style="margin:10px;" type="submit" class="btn btn-primary center-block">Αποστολή</button>
                </form>
            </div>
        </div>
        <script>
        var city=null;
        var place=null;
        var lat=0;
        var long=0;
        var bbox0=0;
        var bbox1=0;
        var bbox2=0;
        var bbox3=0;
         function getSelectedCity(){
        var val=document.getElementById("cities").value;
        return val;
    }
    $('#cities').on('change', () => {
        city=getSelectedCity();
        checkNames(city,place);
    });
    $('#addressName').on('change', () => {
        place=document.getElementById("addressName").value;
        checkNames(city,place);
    });
    
    function checkNames(city,place){
    if(city!=null && place!=null){
        getCoordinates(city,place);
    }
    }
    function getCoordinates(city,place)
    {
        console.log(city);
        console.log(place);
        $.ajax({
			url:'https://nominatim.openstreetmap.org/search?q='.concat(place,'+',city,'&format=geojson'),
			dataType:'json',
			success:function(data){
                console.log(data);
                lat=data.features[0].geometry.coordinates[1];
                long=data.features[0].geometry.coordinates[0];
                bbox0=data.features[0].bbox[0];
                bbox1=data.features[0].bbox[1];
                bbox2=data.features[0].bbox[2];
                bbox3=data.features[0].bbox[3];
                getMap(bbox0,bbox1,bbox2,bbox3);
			},
            error:function(text){
                console.log("There was an error");
            }
		});
    }
    function getMap(bbox0,bbox1,bbox2,bbox3){
        var map=document.getElementById("map");
        map.src="https://www.openstreetmap.org/export/embed.html?bbox=".concat(bbox0,"%2C",bbox1,"%2C",bbox2,"%2C",bbox3,"&amp;layer=mapnik");

    }
    createEditor();
        </script>

        <!-- Footer -->
        <script>footer_gen();</script>
        <!-- ./Footer -->
    </body>
</html>