function searchUser() {
    var value = document.getElementById("search_value").value.trim();
    var url = 'http://101.78.175.101:6780/userList';
    url.searchParams.set('username', value);
    window.location.assign(url.toString());
}