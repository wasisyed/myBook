// This is My Own Javascript File for use in Web Apps.
 function ajax_post (url,target) {
    var form = document.querySelector('form');
    var form_data = new FormData(form);
    // console.log(form_data);
    var xhr = new XMLHttpRequest();
    xhr.open('POST' , url , true);
    xhr.setRequestHeader('X-Requested-With' , 'XMLHttpRequest');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var result = xhr.responseText;
            target.innerHTML = result;
        }
    };
    xhr.send(form_data);
 }
 function ajax_get(url) {
     var xhr = new XMLHttpRequest();
     xhr.open('GET' , url , true);
     xhr.setRequestHeader('X-Requested-With' , 'XMLHttpRequest');
     xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var result = xhr.responseText;
        }
     };
     xhr.send();
 }

