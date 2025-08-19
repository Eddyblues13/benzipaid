$(function() {

    try {
        const response = (message, status) => {
            return `<div class='alert alert-${status}'>${message}</div>`;
        };
        let app = "app/ajax/request";

        //Delete user inbox
        $(document).on("click", "#delete_message", function(event) {
            var target = $(this).attr("target-id");

            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover mail",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.post(app, {
                            delete_message: target
                        }, function(data) {
                            if (data == true) {
                                tata.success("Success", "Mail box successfully deleted");
                                setTimeout(() => {
                                    location.replace(location.href);
                                }, 2000);
                            } else {
                                tata.error("Error", data);
                            }
                        });
                    }
                });

        })

        $("#loan_form").on("submit", function(e) {
            e.preventDefault();
            const formData = $(this).serialize();
            $.post(app, formData, function(data) {
                if (data == "success") {
                    $("#loan_response").html(response("Congrats! Your loan request is logged and being viewed", "success"));
                    $("#tab1").load(" #tab1");
                } else {
                    $("#loan_response").html(response(data, "danger"));
                }
            });
        });

        var clipboard = new ClipboardJS('#copy-addr');

        clipboard.on('success', function(e) {
            var disTxt = $(".copy").attr("shoutext");
            tata.success('Address Copied!', "Proceed with payment");
            //e.clearSelection();
        });

        // change password
        $(document).on("submit", "#user_password", function(e) {
            e.preventDefault();
            var json, btn = $("#btnPassword").text("loading..");
            const formData = $(this).serialize();
            $.post(app, formData, function(data) {
                json = JSON.parse(data);
                $("#user_password_response").html(response(json.message, json.status));
                btn.text("Save");
            });
        });


        $("#user_info").on("submit", function(e) {
            e.preventDefault();
            const btn = $("#btn1").text("loading..");
            const formData = $(this).serialize();
            $.post(app, formData, function(data) {
                $("#user_info_response").html(data);
                btn.text("Save Data");
            });
        });


        $(document).on('submit', '#update___avatar', function(e) {
            e.preventDefault();
            let fdata = new FormData($(this)[0]);
            $.ajax({
                // Your server script to process the upload
                url: app,
                type: 'POST',
                data: fdata,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    $("#avatar_response").html(data);
                }
            });
        });
    } catch (e) {
        console.error(e);
    }

});