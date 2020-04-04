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