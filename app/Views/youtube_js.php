<script>
    $('.btn_get_channel_info').click(
        function () {
            $.ajax({
                url: "/Youtube/getinfoChanel",
                dataType: "json",
                data: {link: $('#channel_url').val()},
                type: "POST",
                success: function (data) {

                },
                error: function () {
                }
            });

        }
    )
</script>