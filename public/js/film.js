function searchFilm() {
    var e = document.getElementById("search_type");
    var parameter = e.options[e.selectedIndex].value;
    var value = document.getElementById("search_value").value.trim();
    // var link = window.location.href;
    // var newURL = link;
    // var index = link.indexOf('?');
    // if(index === -1){
    //     index = link.indexOf('#');
    // }
    // if(index !== -1){
    //     newURL = link.substring(0, index);
    //     if (value === "") {
    //         return window.location.assign(newURL.toString());
    //     }
    // }
    // var url = new URL(newURL);
    // var regex = "";
    //
    // if (value.indexOf(" ") !== -1) {
    //     window.alert("Keyword should not be separated by space bar");
    //     return;
    // }
    // if (!value.toLowerCase().match(regex)) {
    //     window.alert("Invalid keyword input");
    //     return;
    // }
    var url = 'http://101.78.175.101:6780/list/'+parameter;
    //url.searchParams.set(parameter, "*" + value + "*");
    // if (parameter === "company_id") {
    //     url.searchParams.set(parameter, value);
    // }
    window.location.assign(url.toString());
}