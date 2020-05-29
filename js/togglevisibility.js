function toggleVisibility(eventsender,idofDiv){
    var state="none";
    if(eventsender.checked== true){
        state="block"
    }
    document.getElementById(idofDiv).style.display = state;
}