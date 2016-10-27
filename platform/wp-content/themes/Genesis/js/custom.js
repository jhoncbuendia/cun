$(document).ready(function(){

    var nameMenu = [];
    var dropDownMenu = [];
    $('.attachment-full').each(function( index ) {
        nameMenu[index] = '<h5>' + $(this).attr('alt') + "</h5>";
        dropDownMenu[index] = '<span>' + $(this).attr('alt') + "</span>";
    });

    $('#menu-lineas-de-conocimiento-home a').each(function(index){
        $(this).append(nameMenu[index]);
    });

    $('.change-line ul li a').each(function(index){
        $(this).append(dropDownMenu[index]);
    });
});