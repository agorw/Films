
let title = document.getElementById('title');
let poster = document.getElementById('poster');
let actors = document.getElementById('actors');
let plot = document.getElementById('plot');
title.addEventListener("change", function() {
    if(title.value != ""){
        let ajax = new XMLHttpRequest();
        ajax.responseType = 'json';
        ajax.open('GET', 'http://www.omdbapi.com/?apikey=a76f9717&t=' + title.value);
        ajax.send();
        ajax.onload = ()=>{
            let data = ajax.response;
            poster.value = data.Poster;
            actors.value = data.Actors;
            plot.value = data.Plot;
          };
    }
});
