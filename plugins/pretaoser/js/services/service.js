(function ($) {
    $(document).ready(function () {

        // Set all variables to be used in scope
        var frame,
            addImgLink = $('.upload-custom-img'),
            delImgLink = $('.delete-custom-img'),
            imgContainer = $('.custom-img-container'),
            imgIdInput = $('.custom-img');

        // ADD IMAGE LINK
        addImgLink.on('click', function (event) {

            event.preventDefault();

            // If the media frame already exists, reopen it.
            if (frame) {
                frame.open();
                return;
            }

            // Create a new media frame
            frame = wp.media({
                title: 'Select or Upload Media Of Your Chosen Persuasion',
                button: {
                    text: 'Use this media'
                },
                multiple: false  // Set to true to allow multiple files to be selected
            });


            // When an image is selected in the media frame...
            frame.on('select', function () {

                // Get media attachment details from the frame state
                var attachment = frame.state().get('selection').first().toJSON();

                // Send the attachment URL to our custom image input field.
                imgContainer.append('<img class="img-thumbnail mt-2" src="' + attachment.url + '" alt="" style="width:150px; height:150px ;"/>');

                // Send the attachment id to our hidden input
                imgIdInput.val(attachment.url);

                // Hide the add image link
                addImgLink.addClass('d-none');

                // Unhide the remove image link
                delImgLink.removeClass('d-none');
            });

            // Finally, open the modal on click
            frame.open();
        });


        // DELETE IMAGE LINK
        delImgLink.on('click', function (event) {

            event.preventDefault();

            // Clear out the preview image
            imgContainer.html('');

            // Un-hide the add image link
            addImgLink.removeClass('d-none');

            // Hide the delete image link
            delImgLink.addClass('d-none');

            // Delete the image id from the hidden input
            imgIdInput.val('');

        });



    });
})(jQuery);