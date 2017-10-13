var pattern = GeoPattern.generate();

$(document).ready(function(){
    $('ul.tabs').tabs();
    $('.modal').modal({
        dismissible: true,
    });
    $('.collapsible').collapsible();
    $('select').material_select();
    $('#geopattern').css('background-image', pattern.toDataUrl());
});

