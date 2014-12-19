$(document).ready(function () {

    // Manage timeout
    var STICKY_TIMEOUT=1000;
    var sticky = $( '#sticky_area' );
    var timeoutId;
    var stickySaved = $( '#sticky_saved' );

    sticky.ready(function(){
        // -----------------------------
        // --- Sticky
        // -----------------------------
        $.getJSON('data/sticky.php?action=load', {
        },
                  function(json) {
            sticky.text(json.content);
        });
    });

    sticky.on('input propertychange change', function() {
        stickySaved.text("*");

        clearTimeout(timeoutId);
        timeoutId = setTimeout(function() {
            // Runs 1 second (1000 ms) after the last change
            console.log('Saving to the db');
            $.getJSON('data/sticky.php?action=save', {
                text: sticky.val()
            },
                      function(json) {
                stickySaved.text('');
            });

        }, STICKY_TIMEOUT);
    });
});
