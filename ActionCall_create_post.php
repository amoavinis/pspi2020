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
    <script>
    $.ajax({
        url:'https://nominatim.openstreetmap.org/search/q=addressName?city=city',
        datatype:'json',
        success:function(data){
            data=data.results;
            console.log(data)
            setDataSelectionEvent(data);
        }
    });
    </script>
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
                        <input type="text"  class="form-control" id="cityName" name="city" placeholder="e.g. Thessaloniki" required>
                    </div>
                    <div class="form-group">
                        <label for="place">Διεύθυνση</label>
                        <input type="text" class="form-control" id="addressName" placeholder="e.g. Πλατεία Αριστοτέλους" required>
                    </div>
                    <div class="form-group">
                        <!--
                        <label for="date">Ημερομηνία</label>
                        <input type="date" class="form-control" id="eventDate" name="evDate" required>
                        <label for="hour">Ώρα</label>
                        <input type="time" class="form-control" id="eventTime" name="evTime" min="0:00" max ="24:00" required> -->
                        <input type="datetime-local" class="form-control" name="evDateTime" required>
                        <label for="repeat">Επαναλαμβανόμενο</label>
                        <input type="checkbox" id="rep" name="repeated_event" onClick="toggleVisibility(this,'recurring')" value="isRepeated">
                    </div>
                    <div id="recurring" style="display:none" class="form-group">
                        <label for="times">Πόσες φορές;</label>
                        <input type="number" class="form-control" id="recc" name="reccTimes" placeholder="1" min="1">
                    </div>
                    <div class="form-group">
                        <textarea name="content" id="editor"></textarea>
                    </div>
                    <button style="margin:10px;" type="submit" class="btn btn-primary center-block">Αποστολή</button>
                </form>
            </div>
        </div>
        <script>
            createEditor();
             var cities=['Attica, Athens','Thessaloniki','Patras','Larissa','Heraklion','Attica, Peristeri','Attica, Kallithea','Attica, Acharnes','Thessaloniki, Kalamaria','Attica, Nikaia','Attica, Glyfada','Thessaloniki, Evosmos','Attica, Chalandri','Attica, Nea Smyrni','Attica, Marousi','Attica, Agios Dimitrios','Attica, Zografou','Attica, Egaleo','Attica, Nea Ionia','Ioannina','Attica, Palaio Faliro','Attica, Korydallos','Trikala','Attica, Vyronas','Attica, Agia Paraskevi','Attica, Galatsi','Agrinio','Chalcis','Attica, Petroupoli','Serres','Alexandroupoli','Xanthi','Katerini','Kalamata','Kavala','Chania','Lamia','Drama','Veria','Attica, Alimos','Kozani','Thessaloniki, Polichni','Karditsa','Thessaloniki, Sykies','Thessaloniki, Ampelokipoi','Thessaloniki, Pylaia','Attica, Agioi Anargyroi','Attica, Argyroupoli','Attica, Ano Liosia','Rethymno','Ptolemaida','Tripoli','Attica, Cholargos','Attica, Vrilissia','Attica, Aspropyrgos','Corinth','Attica, Gerakas','Attica, Metamorfosi','Giannitsa','Athens, Voula','Athens, Kamatero','Mytilene','Thessaloniki, Neapoli','Thessaloniki, Eleftherio-Kordelio','Chios','Attica, Agia Varvara','Attica, Kaisariani','Attica, Nea Filadelfeia','Attica, Moschato','Attica, Perama','Salamina','Attica, Eleusis','Corfu','Pyrgos','Megara','Kilkis','Attica, Dafni','Thebes','Attica, Melissia','Argos','Arta','Artemida','Livadeia','Attica, Pefki','Thessaloniki, Oraiokastro','Aigio','Kos','Attica, Koropi','Preveza','Naousa','Orestiada','Thessaloniki, Peraia','Edessa','Florina','Attica, Nea Erythraia','Attica, Elliniko','Amaliada','Attica, Pallini','Sparta','Attica, Agios Ioannis Rentis','Thessaloniki, Thermi','Attica, Vari','Attica, Nea Makri','Attica, Tavros','Alexandreia','Thessaloniki, Menemeni','Paiania','Attica, Kalyvia Thorikou','Nafplio','Drapetsona','Thessaloniki, Efkarpia','Attica, Papagou','Nafpaktos','Kastoria','Grevena','Thessaloniki, Pefka','Nea Alikarnassos','Missolonghi','Attica, Gazi','Ierapetra','Kalymnos','Attica, Rafina','Attica, Loutraki','Agios Nikolaos','Ermoupoli','Ialysos','Attica, Mandra','Tyrnavos','Attica, Glyka Nera','Attica, Ymittos','Attica, Neo Psychiko'];
            autocomplete(document.getElementById("cityName"), cities);
        </script>

        <!-- Footer -->
        <script>footer_gen();</script>
        <!-- ./Footer -->
    </body>
</html>