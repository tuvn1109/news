<script src="/assets/plugins/custom/uppy/uppy.bundle.js"></script>
<script>
    var arrFiles = [];

    var KTDropzoneDemo = function () {
        // Private functions
        var demo2 = function () {
            // set the dropzone container id
            var id = '#kt_dropzone_4';
            // set the preview element template
            var previewNode = $(id + " .dropzone-item");
            previewNode.id = "";
            var previewTemplate = previewNode.parent('.dropzone-items').html();
            //  previewNode.remove();

            var myDropzone4 = new Dropzone(id, { // Make the whole body a dropzone
                url: "https://keenthemes.com/scripts/void.php", // Set the url for your upload script location
                parallelUploads: 20,
                previewTemplate: previewTemplate,
                maxFilesize: 1, // Max filesize in MB
                autoQueue: false, // Make sure the files aren't queued until manually added
                previewsContainer: id + " .dropzone-items", // Define the container to display the previews
                clickable: id + " .dropzone-select" // Define the element that should be used as click trigger to select files.
            });

            myDropzone4.on("addedfile", function (file) {
                // Hookup the start button
                file.previewElement.querySelector(id + " .dropzone-start").onclick = function () {
                    myDropzone4.enqueueFile(file);
                };
                $(document).find(id + ' .dropzone-item').css('display', '');
                $(id + " .dropzone-upload, " + id + " .dropzone-remove-all").css('display', 'inline-block');
                arrFiles.push(file);
            });
            // Update the total progress bar
            myDropzone4.on("totaluploadprogress", function (progress) {
                $(this).find(id + " .progress-bar").css('width', progress + "%");
                console.log(15);
              //  $(".dropzone-items .dropzone-item").removeClass("dropzone-item");
            });

            myDropzone4.on("sending", function (file) {
                // Show the total progress bar when upload starts
                $(id + " .progress-bar").css('opacity', '1');
                // And disable the start button
                file.previewElement.querySelector(id + " .dropzone-start").setAttribute("disabled", "disabled");
            });

            // Hide the total progress bar when nothing's uploading anymore
            myDropzone4.on("complete", function (progress) {
                var thisProgressBar = id + " .dz-complete";
                setTimeout(function () {
                    $(thisProgressBar + " .progress-bar, " + thisProgressBar + " .progress, " + thisProgressBar + " .dropzone-start").css('opacity', '0');
                }, 300)

            });

            // Setup the buttons for all transfers
            document.querySelector(id + " .dropzone-upload").onclick = function () {
                myDropzone4.enqueueFiles(myDropzone4.getFilesWithStatus(Dropzone.ADDED));
            };

            // Setup the button for remove all files
            document.querySelector(id + " .dropzone-remove-all").onclick = function () {
                $(id + " .dropzone-upload, " + id + " .dropzone-remove-all").css('display', 'none');
                myDropzone4.removeAllFiles(true);
                console.log('removeALL');
            };

            // On all files completed upload
            myDropzone4.on("queuecomplete", function (progress) {
                $(id + " .dropzone-upload").css('display', 'none');
            });

            // On all files removed
            myDropzone4.on("removedfile", function (file) {
                if (myDropzone4.files.length < 1) {
                    $(id + " .dropzone-upload, " + id + " .dropzone-remove-all").css('display', 'none');
                    //arrFiles.push(file);
                }
            });
        }
        return {
            // public functions
            init: function () {
                demo2();
            }
        };
    }();

    KTUtil.ready(function () {
        KTDropzoneDemo.init();
    });


    $('#form_edit_user').on('submit', function (e) {
        e.preventDefault();
        var formData = new FormData($(this)[0]);
        var files = $('#files').val();
        $.each(arrFiles, function (keys, values) {
            formData.append('files[]', values);
        });
        $.ajax({
            type: 'post',
            url: '/Users/submitedit',
            data: formData,
            dataType: "json",
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {

                //makeSAlert(data,5000);
                //$("#catlist").load(location.href + " #catlist");
                //$("#noti").html(data);
                //window.setTimeout(function(){location.reload()},1000);
            }
        }); //End Ajax
    }); //End submit
    function deleteFile(filename, id) {
        $.ajax({
            url: "/Users/deleteFile",
            dataType: "json",
            data: {filename: filename, id: id},
            type: "POST",
            success: function (data) {
                if (data == 1) {
                    window.setTimeout(function () {
                        location.reload()
                    }, 1000)
                }
            },
            error: function () {
            }
        });

    }
</script>