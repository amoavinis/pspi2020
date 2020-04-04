//YOU CAN IGNORE THE BACKSLASHES BEFORE THE QUOTATION MARKS, 
//WHEN ADDING NEW CODE YOU DO NOT NEED TO ADD THEM. THEY WERE ADDED IN EARLY DEVELOPMENT.

function header_gen()
{
    var header = `<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">

    <!-- Bootstrap CSS -->
    <link rel=\"stylesheet\" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity=\"sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh\" crossorigin=\"anonymous\">
    <link rel=\"stylesheet\" href=\"fontawesome/fontawesome.all.css\">
    <link rel=\"stylesheet\" href=\"css/footer.css\">

    <!--Bootstrap JS-->
    <script src=\"https://code.jquery.com/jquery-3.4.1.slim.min.js\" 
    integrity=\"sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n\" crossorigin=\"anonymous\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js\" integrity=\"sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo\" crossorigin=\"anonymous\"></script>
    <script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js\" integrity=\"sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6\" crossorigin=\"anonymous\"></script>

    <!--Favicon setup-->
    <link rel="shortcut icon" type=\"image/x-icon\" href=\"favicon.ico\" />`;

    document.write(header);
}

function navbar_gen()
{
    var navbar = `<nav class=\"navbar bg-light navbar-default navbar-expand-lg\" >
                    <a class=\"navbar-brand\" href=\"ActionCall_homepage.html\"> <img src=\"actioncallfinaldraft2.png\" alt=\"ActionCall logo image\"
                    style=\"width: 120px; height: auto;\" > </a>
                    <ul class=\"navbar-nav mr-auto\">
                        <li class=\"active nav-item\"> <a class=\"nav-link\" href=\"ActionCall_homepage.html\"> Home</a> </li>
                        <li class=\"active nav-item\"> <a class=\"nav-link\" href=\"ActionCall_about_us.html\"> About Us </a></li>
                        <li class=\"active nav-item\"> <a class=\"nav-link\" href=\"ActionCall_forum.html\"> Forum</a> </li>
                        <li class=\"active nav-item\"> <a class=\"nav-link\" href=\"ActionCall_contact.html\"> Contact</a> </li>
                    </ul>
                    <ul class=\"nav navbar-nav navbar-right\">
                        <li><a class=\"nav-link\" href=\"ActionCall_sign_up.html\"> <i class=\"fas fa-users\"></i></span> Sign-Up </a> </li>
                        <li><a class=\"nav-link\" href=\"ActionCall_login.html\"> <i class=\"fas fa-sign-in-alt\"></i> Login </a></li>
                    </ul>
                    </nav>`;
    document.write(navbar);
}

function footer_gen()
{
    var footer = `<footer class=\"footer\" style=\"background-color: darkslategray; margin-top: 10px;\">
                    <div class=\"container\">
                        <div class=\"row\">
                            <div class=\"col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5\">
                                <ul class=\"list-unstyled list-inline social text-center\">
                                    <li class=\"list-inline-item\"><a href=\"javascript:void();\"><i class=\"fab fa-facebook\"></i></a></li>
                                    <li class=\"list-inline-item\"><a href=\"javascript:void();\"><i class=\"fab fa-twitter\"></i></a></li>
                                    <li class=\"list-inline-item\"><a href=\"javascript:void();\"><i class=\"fab fa-instagram\"></i></a></li>
                                    <li class=\"list-inline-item\"><a href=\"javascript:void();\"><i class=\"fab fa-google-plus\"></i></a></li>
                                    <li class=\"list-inline-item\"><a href=\"javascript:void();\" target=\"_blank\"><i class=\"fa fa-envelope\"></i></a></li>
                                </ul>
                            </div>
                            </hr>
                        </div>	
                        <div class=\"row\">
                            <div class=\"col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white\">
                                <p><i>ActionCall</i> is a work of Moavinis Angelos, Raitsidis Georgios-Anargyros, Romanos Georgios, Stavratis Konstantinos</p>
                                <p class=\"h6\">&copy All rights reserved.</p>
                            </div>
                            </hr>
                        </div>	
                    </div>
                    </footer>`;
    document.write(footer);
}

//The function below should be removed and work remotely from the file: objects.js
//function that represents all the data of a post, including a filter function that compares the filter with the post's city
function Post(id, date, city, title, from){
    this.id = id;
    this.date = date;
    this.city = city;
    this.title = title;
    this.from = from;
    this.isSearched = function(filter){
        if(normalizeGreek(filter.toLowerCase())===normalizeGreek(this.city.toLowerCase())){
            return true;
        }
        return false;
    }
}
//The function above should be removed and work remotely from the file: objects.js

//the function below may be moved to a specific JS file.
//function that normalizes all letters for filter purposes
function normalizeGreek(text) {
    text = text.replace(/Ά|Α|ά/g, 'α')
        .replace(/Έ|Ε|έ/g, 'ε')
        .replace(/Ή|Η|ή/g, 'η')
        .replace(/Ί|Ϊ|Ι|ί|ΐ|ϊ/g, 'ι')
        .replace(/Ό|Ο|ό/g, 'ο')
        .replace(/Ύ|Ϋ|Υ|ύ|ΰ|ϋ/g, 'υ')
        .replace(/Ώ|Ω|ώ/g, 'ω')
        .replace(/Σ|ς/g, 'σ');
    return text;
}
//the function above may be moved to a specific JS file.

function forum_gen(filter){
    var list = [];
    //generates all data of each currently available post.
    list.push(new Post(1, "26-4-2020", "Θεσσαλονίκη", "Καθαρισμός σκουπιδιών στην πλατεία Αριστοτέλους", "Ορέστης"));
    list.push(new Post(2, "23-5-2020", "Πάτρα", "Αποκατάσταση βανδαλισμών στη Πλατεία Όλγας", "Μιχάλης"));
    list.push(new Post(3, "28-3-2020", "Θεσσαλονίκη", "Παροχή βοήθειας σε αδέσποτα στην Καμάρα", "Μαρία"));
    list.push(new Post(4, "5-6-2020", "Αθήνα", "Συλλογή ειδών πρώτης ανάγκης για τους άστεγους", "Παντελής"));
    list.push(new Post(5, "23-5-2020", "Αθήνα", "Συσσίτιο για όσους το έχουν ανάγκη", "Pavlos"));
    
    //checks if filter is default. If it is, then the deletion with use of filter is not operated and all posts are being posted
    if(filter !== ""){
        //renaming the search text result and title
        var title = document.getElementById("result")
        if(title!==null){
            title.innerHTML = 'Αποτελέσπατα για: ' + filter;
        }
        console.log("gg");
        //deletion loop based on filter
        for(var i=0;i<list.length;i++){
            if(!list[i].isSearched(filter)){
                list.splice(i,1);
                i--;
            }
        }
    }

   //generating the html of forum
    var forum = 
    `<div id="forum" class="table-container">
        <table class="topics-table">
            <thead>    
                <tr>
                    <th scope="col" width=15%>Για Ημερομηνία</th>
                    <th scope="col" width =15%>Πόλη</th>
                    <th scope="col" width=50%>Θέμα</th>
                    <th scope="col" width=20%>Από</th>
                </tr>`
    for(let post of list){
        forum +=
                    `<tr>
                        <td>`+post.date+`</td>
                        <td href><a class="city" href = "ActionCall_forum_`+post.city+`.html">`+post.city+`</a></td>
                        <td><a class="post" href = "ActionCall_event`+post.id+`.html">`+post.title+`</a></td>
                        <td>`+post.from+`</td>
                    </tr>`
    }
    forum +=
           `</thead>
        </table>
    </div>`;

    document.write(forum);
}


