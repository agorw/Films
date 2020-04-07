let ajax = new XMLHttpRequest();
let title = document.getElementById('title');
title.addEventListener("change", function() {
    if(title.value != ""){
        ajax.responseType = 'json';
        ajax.open('GET', 'http://www.omdbapi.com/?apikey=a76f9717&t=' + title.value);
        ajax.send();
        let data = JSON.stringify(ajax.responseURL);
        console.log(data);
    }
});
