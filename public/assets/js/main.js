var pattern = GeoPattern.generate();

$(document).ready(function(){
    // Init tabs
    $('ul.tabs').tabs();
    // Init modals and set close when clickOut
    $('.modal').modal({
        dismissible: true,
    });
    // Init collapse
    $('.collapsible').collapsible();
    // Init Select
    $('select').material_select();
    // Init geopattern plugins
    $('#geopattern').css('background-image', pattern.toDataUrl());
});

