$( function() {
    $(".modal-dialog").draggable({
        handle: ".modal-header",
    });

    let hash = window.location.hash;
    $(hash).modal('show');
} );