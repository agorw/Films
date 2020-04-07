let ajax = new XMLHttpRequest();
ajax.onload = function () {
    if (ajax.status >= 200){
        console.log('success');
    }
}