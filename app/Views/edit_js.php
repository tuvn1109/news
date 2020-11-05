<script src="/assets/plugins/custom/uppy/uppy.bundle.js"></script>
<script>
    $('#form_edit_user').on('submit', function (e) {
        e.preventDefault();
        var formData = new FormData($(this)[0]);
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


    "use strict";
    // Class definition
    var KTUppy = function () {
        const Tus = Uppy.Tus;
        const ProgressBar = Uppy.ProgressBar;
        const StatusBar = Uppy.StatusBar;
        const FileInput = Uppy.FileInput;
        const Informer = Uppy.Informer;

        // to get uppy companions working, please refer to the official documentation here: https://uppy.io/docs/companion/
        const Dashboard = Uppy.Dashboard;
        const Dropbox = Uppy.Dropbox;
        const GoogleDrive = Uppy.GoogleDrive;
        const Instagram = Uppy.Instagram;
        const Webcam = Uppy.Webcam;

        // Private functions

        var initUppy5 = function () {
            // Uppy variables
            // For more info refer: https://uppy.io/
            var elemId = 'kt_uppy_5';
            var id = '#' + elemId;
            var $statusBar = $(id + ' .uppy-status');
            var $uploadedList = $(id + ' .uppy-list');
            var timeout;

            var uppyMin = Uppy.Core({
                debug: true,
                autoProceed: true,
                showProgressDetails: true,
                restrictions: {
                    maxFileSize: 10000000, // 1mb
                    maxNumberOfFiles: 5,
                    minNumberOfFiles: 1
                }
            });

            uppyMin.use(FileInput, {target: id + ' .uppy-wrapper', pretty: false});
            uppyMin.use(Informer, {target: id + ' .uppy-informer'});

            // demo file upload server
            uppyMin.use(Tus, {endpoint: 'http://news.com/user/files/'});
            uppyMin.use(StatusBar, {
                target: id + ' .uppy-status',
                hideUploadButton: true,
                hideAfterFinish: false
            });

            $(id + ' .uppy-FileInput-input').addClass('uppy-input-control').attr('id', elemId + '_input_control');
            $(id + ' .uppy-FileInput-container').append('<label class="uppy-input-label btn btn-light-primary btn-sm btn-bold" for="' + (elemId + '_input_control') + '">Chọn tệp</label>');

            var $fileLabel = $(id + ' .uppy-input-label');

            uppyMin.on('upload', function (data) {
                $fileLabel.text("Uploading...");
                $statusBar.addClass('uppy-status-ongoing');
                $statusBar.removeClass('uppy-status-hidden');
                clearTimeout(timeout);
            });

            uppyMin.on('complete', function (file) {
                $.each(file.successful, function (index, value) {
                    var sizeLabel = "bytes";
                    var filesize = value.size;
                    if (filesize > 1024) {
                        filesize = filesize / 1024;
                        sizeLabel = "kb";

                        if (filesize > 1024) {
                            filesize = filesize / 1024;
                            sizeLabel = "MB";
                        }
                    }
                    var uploadListHtml = '<div class="uppy-list-item" data-id="' + value.id + '"><div class="uppy-list-label">' + value.name + ' (' + Math.round(filesize, 2) + ' ' + sizeLabel + ')</div><span class="uppy-list-remove" data-id="' + value.id + '"><i class="flaticon2-cancel-music"></i></span></div>';
                    $uploadedList.append(uploadListHtml);
                });

                $fileLabel.text("Chọn tệp");

                $statusBar.addClass('uppy-status-hidden');
                $statusBar.removeClass('uppy-status-ongoing');
            });

            $(document).on('click', id + ' .uppy-list .uppy-list-remove', function () {
                var itemId = $(this).attr('data-id');
                uppyMin.removeFile(itemId);
                $(id + ' .uppy-list-item[data-id="' + itemId + '"').remove();
            });
        }
        return {
            // public functions
            init: function () {
                initUppy5();
            }
        };
    }();

    KTUtil.ready(function () {
        KTUppy.init();
    });


    var KTDropzoneDemo = function () {
        // Private functions
        var demo1 = function () {
            // multiple file upload
            $('#kt_dropzone_2').dropzone({
                url: "http://news.com/", // Set the url for your upload script location
                paramName: "filesnew", // The name that will be used to transfer the file
                maxFiles: 10,
                maxFilesize: 10, // MB
                addRemoveLinks: true,
                accept: function (file, done) {
                    if (file.name == "justinbieber.jpg") {
                        done("Naha, you don't.");
                    } else {
                        done();
                    }
                }
            });

        }

        return {
            // public functions
            init: function () {
                demo1();
            }
        };
    }();

    KTUtil.ready(function () {
        KTDropzoneDemo.init();
    });


</script>