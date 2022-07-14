let strGET = window.location.search.replace( '?page=', '');
let elem = document.querySelectorAll('.btn');
elem[strGET-1].style.backgroundColor = "#832b5b"
elem[strGET-1].style.color = "white"