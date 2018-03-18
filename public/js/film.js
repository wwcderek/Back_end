function searchFilm() {
    var e = document.getElementById("search_type");
    var parameter = e.options[e.selectedIndex].value;
    var value = document.getElementById("search_value").value.trim();
    var url = 'http://101.78.175.101:6780/list/'+parameter;
    window.location.assign(url.toString());
}