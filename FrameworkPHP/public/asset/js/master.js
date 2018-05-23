$( function() {
    $(".modal-dialog").draggable({
        handle: ".modal-header",
    });
} );

/* NOT WORKING */
function get_coords(address, code_postal) {
    let array = [0,0];
    $.ajax({
        url: 'https://api-adresse.data.gouv.fr/search/?q=' + address + '&postcode=' + code_postal + '&autocomplete=0',
        method: 'GET',
    }).done(function(data) {
        console.log(data);
        return data;
    });
}
//get_coords('1 rue guglielmo marconi', '76130');