
var imported = document.createElement('script');
imported.src = '/path/to/imported/script';
document.head.appendChild(imported);


$.getScript("e27animation.js", function(){

   alert("Script loaded but not necessarily executed.");

});