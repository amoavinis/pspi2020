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
/*if (!isset($_SESSION["username"]))
{
    header("Location: index.php");
}*/
?>
<html>
  <head>
    <link rel="stylesheet" href="css/forum_post.css"> 
    <script src="js/editor.js"></script>
    <script src="js/gen_elements.js"></script>
    <script src="js/autocomplete.js"></script>
    <script src="js/togglevisibility.js"></script>

    <?php header_gen();?>
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
                        <option value="Attica, Acharnes">Attica, Acharnes</option>
                        <option value="Attica, Agia Paraskevi">Attica, Agia Paraskevi</option>
                        <option value="Attica, Agia Varvara">Attica, Agia Varvara</option>
                        <option value="Attica, Agioi Anargyroi">Attica, Agioi Anargyroi</option>
                        <option value="Attica, Agios Dimitrios">Attica, Agios Dimitrios</option>
                        <option value="Attica, Agios Ioannis Rentis">Attica, Agios Ioannis Rentis</option>
                        <option value="Attica, Alimos">Attica, Alimos</option>
                        <option value="Attica, Ano Losia">Attica, Ano Losia</option>
                        <option value="Attica, Argyroupoli">Attica, Argyroupoli</option>
                        <option value="Attica, Aspropyrgos">Attica, Aspropyrgos</option>
                        <option value="Attica, Athens">Attica, Athens</option>
                        <option value="Attica, Chalandri">Attica, Chalandri</option>
                        <option value="Attica, Cholargos">Attica, Cholargos</option>
                        <option value="Attica, Dafni">Attica, Dafni</option>
                        <option value="Attica, Egaleo">Attica, Egaleo</option>
                        <option value="Attica, Eleusis">Attica, Eleusis</option>
                        <option value="Attica, Elliniko">Attica, Elliniko</option>
                        <option value="Attica, Galatsi">Attica, Galatsi</option>
                        <option value="Attica, Gazi">Attica, Gazi</option>
                        <option value="Attica, Gerakas">Attica, Gerakas</option>
                        <option value="Attica, Glyfada"> Attica, Glyfada</option>
                        <option value="Attica, Glyka Nera">Attica, Glyka Nera</option>
                        <option value="Attica, Kaisariani">Attica, Kaisariani</option>
                        <option value="Attica, Kalithea">Attica, Kalithea</option>
                        <option value="Attica, Kalyvia Thorikou">Attica, Kalyvia Thorikou</option>
                        <option value="Attica, Kamatero">Attica, Kamatero</option>
                        <option value="Attica, Koropi">Attica, Koropi</option>
                        <option value="Attica, Korydallos">Attica, Korydallos</option>
                        <option value="Attica, Loutraki">Attica, Loutraki</option>
                        <option value="Attica, Mandra">Attica, Mandra</option>
                        <option value="Attica,Marousi">Attica, Marousi</option>
                        <option value="Attica, Melissia">Attica, Melissia</option>
                        <option value="Attica, Metamorfosi">Attica, Metamorfosi</option>
                        <option value="Attica, Moschato">Attica, Moschato</option>
                        <option value="Attica, Nea Erythraia">Attica, Nea Erythraia</option>
                        <option value="Attica, Nea Filadelfeia">Attica, Nea Filadelfeia</option>
                        <option value="Attica, Nea Ionia">Attica,Nea Ionia</option>
                        <option value="Attica, Nea Makri">Attica, Nea Makri</option>
                        <option value="Attica, Nea Smyrni">Attica, Nea Smyrni</option>
                        <option value="Attica, Neo Psychiko">Attica, Neo Psychiko</option>
                        <option value="Attica, Nikaia">Attica, Nikaia</option>
                        <option value="Attica, Palaio Faliro">Attica, Palaio Faliro</option>
                        <option value="Attica, Pallini">Attica, Pallini</option>
                        <option value="Attica, Papagou">Attica, Papagou</option>
                        <option value="Attica, Pefki">Attica, Pefki</option>
                        <option value="Attica, Perama">Attica, Perama</option>
                        <option value="Attica, Peristeri">Attica, Peristeri</option>
                        <option value="Attica, Petroupoli">Attica, Petroupoli</option>
                        <option value="Attica, Rafina">Attica, Rafina</option>
                        <option value="Attica, Tavros">Attica, Tavros</option>
                        <option value="Attica, Vari">Attica, Vari</option>
                        <option value="Attica, Voula">Attica, Voula</option>
                        <option value="Attica, Vrilissia">Attica, Vrilissia</option>
                        <option value="Attica, Vyronas">Attica, Vyronas</option>
                        <option value="Attica, Ymittos">Attica, Ymittos</option>
                        <option value="Attica, Zografou">Attica, Zografou</option>
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
                        <option value="Thessaloniki,Pylaia">Thessaloniki, Pylaia</option>
                        <option value="Thessaloniki, Sykies">Thessaloniki, Sykies</option>
                        <option value="Thessaloniki, Thermi">Thessaloniki, Thermi</option>
                        <option value="Tripoli">Tripoli</option>
                        <option value="Tyrnavos">Tyrnavos</option>
                        <option value="Veria">Veria</option>
                        <option value="Trikala">Trikala</option>
                        <option value="Xanthi">Xanthi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="place">Διεύθυνση</label>
                        <input type="text" class="form-control" id="addressName" placeholder="e.g. Πλατεία Αριστοτέλους" required>
                    </div>
                    <div class="form-group">
                        <!--
                        <input type="date" class="form-control" id="eventDate" name="evDate" required>
                        <label for="hour">Ώρα</label>
                        <input type="time" class="form-control" id="eventTime" name="evTime" min="0:00" max ="24:00" required> -->
                        <label for="date">Ημερομηνία-Ώρα</label>
                        <input type="datetime-local" class="form-control" name="evDateTime" required>
                    </div>
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
        var lat=null;
        var long=null;
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
			url:'https://nominatim.openstreetmap.org/search/q='.concat(place,'?city=',city,'&format=geojson'),
			dataType:'json',
			success:function(data){
                console.log(data);
                lat=data.features.geometry.coordinates[1];
                long=data.features.geometry.coordinates[0];
                
			},
            error:function(text){
                console.log("There was an error");
            }
		});
    }
    createEditor();
        </script>

        <!-- Footer -->
        <script>footer_gen();</script>
        <!-- ./Footer -->
    </body>
</html>