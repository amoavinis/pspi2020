function Post(date, city, title, from){
    this.date = date;
    this.city = city;
    this.title = title;
    this.from = from;
    this.isSe = function(filter){
        if(toLowerCase(filter)===toLowerCase(city)){
            return true;
        }
        return false;
    }
}