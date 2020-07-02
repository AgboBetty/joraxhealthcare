// Slide alert messages off after 4 secs (4000 milliseconds)
$(".alert").fadeTo(4000, 500).slideUp(500, function(){
    $(".alert").slideUp(500);
});