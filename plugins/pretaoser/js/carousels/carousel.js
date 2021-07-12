(function ($) {
    $(document).ready(function () {

        // Set all variables to be used in scope
        var frame,
            addImgLink = $('.upload-custom-img'),
            delImgLink = $('.delete-custom-img'),
            regImgLink = $('.register-custom-img'),
            imgContainer = $('.custom-img-container'),
            imgIdInput = $('.custom-img-url');
        imglinkInput = $('.custom-img-link');
        delCarouselImg = $('.delete-carousel-img');

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

                // Unhide the rgister image link
                regImgLink.removeClass('d-none');

                // Unhide the image link input
                imglinkInput.removeClass('d-none');
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

            // Hide the delete image link
            regImgLink.addClass('d-none');


            // Delete the image id from the hidden input
            imgIdInput.val('');

            // Delete the image link 
            imglinkInput.val('');

            // hide the image link input
            imglinkInput.addClass('d-none');

        });

        // DELETE IMAGE FROM CAROUSEL IMAGES LIST
        function removeCarouselImg() {
            delCarouselImg.on('click', function (event) {
                event.preventDefault();
                $(this).parent().remove();
            });
        }
        removeCarouselImg();

        
        
        regImgLink.on('click', function (event) {
            event.preventDefault();         
            var carouselImgContainer = $('.carousel-img-container');
            var count = carouselImgContainer.children().length;
            var newElement = '<div class=" m-2 position-relative">';
            newElement += '<img class="img-thumbnail" src="' + imgIdInput.val() + '" alt="" style="width:150px; height:150px ;" />';
            newElement += '<a href ="#" class=" delete-carousel-img position-absolute btn btn-danger btn-sm " title="Remove" style="top:2px;right:2px;"> &times;</a>';
            newElement += '<input type="hidden" name="carousel[' + count + '][url]" value="' + imgIdInput.val() + '" />';
            newElement += '<input type="hidden" name="carousel[' + count + '][link]" value="' + imglinkInput.val() + '" />';
            newElement += '</div>';
            console.log(count);
            carouselImgContainer.append(newElement);
            delImgLink.click();
            $('.delete-carousel-img').on('click', function (event) {
                event.preventDefault();
                $(this).parent().remove();
            });
            count++;

        });



    });
})(jQuery);