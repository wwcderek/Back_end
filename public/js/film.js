function searchFilm() {
    var e = document.getElementById("search_type");
    var parameter = e.options[e.selectedIndex].value;
    var value = document.getElementById("search_value").value.trim();
    var link = window.location.href;
    var newURL = link;
    var index = link.indexOf('?');
    if(index === -1){
        index = link.indexOf('#');
    }
    if(index !== -1){
        newURL = link.substring(0, index);
        if (value === "") {
            return window.location.assign(newURL.toString());
        }
    }
    var url = new URL(newURL);
    var regex = "";
    switch (parameter) {
        case "username":
        case "last_name":
        case "first_name":
            regex = /[-'a-z0-9\u4e00-\u9eff_]{1,20}$/i;
            break;
        case "email":
            regex = /^[-0-9a-z@._]+$/;
            break;
        case "company_id":
            regex = /[-'a-z0-9]{1,20}$/i;
            break;
        default:
            window.alert("Invalid search parameter");
            return;
    }
    if (value.indexOf(" ") !== -1) {
        window.alert("Keyword should not be separated by space bar");
        return;
    }
    if (!value.toLowerCase().match(regex)) {
        window.alert("Invalid keyword input");
        return;
    }
    url.searchParams.set(parameter, "*" + value + "*");
    if (parameter === "company_id") {
        url.searchParams.set(parameter, value);
    }
    window.location.assign(url.toString());
}