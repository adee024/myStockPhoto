	var test;

function validateImage() {
    var formData = new FormData();


    var file = document.getElementById("file").files[0];

    formData.append("Filedata", file);
    var t = file.type.split('/').pop().toLowerCase();
    if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {
        document.getElementById('log').innerHTML = 'Please upload a valid image file!';
        document.getElementById("file").value = '';
        test = "x";

        return false;
    }
    if (file.size > 2048000) {

        document.getElementById('log').innerHTML = 'Max upload size is 2MB!';
        document.getElementById("file").value = '';
        test = "y";
        return false;
    }
    return true;
}


function reload() {
    location.reload();
}


$(document).ready(function (e) {
    $("#uploadForm").on('submit', (function (e) {

        e.preventDefault();
        $.ajax({
            url: "upload.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                $("#targetLayer").html(data);
                var x = document.forms["uploadForm"]["title"].value;
                var y = document.forms["uploadForm"]["description"].value;
                if (x == "" || y == "" || test !== "") {
                    document.getElementById('log').innerHTML = '<br>Cant be emtpy!';
                    return false;
                }

                if (x !== "" || y !== "" || test == "") {
                    document.getElementById('log').innerHTML = 'Image Uploaded';
                    return false;
                }


            },
            error: function () {}
        });

    }));
});


$(document).ready(function () {
    $('#pingForm').validate({
        rules: {
            fullname: "required",
            email: {
                required: true,
                email: true
            },

        },
        errorElement: "span",
        messages: {
            fullname: "Please enter your full name",
            email: "Please enter valid email address",

        },
        submitHandler: function (form) {
            var dataparam = $('#pingForm').serialize();

            $.ajax({
                type: 'POST',
                async: true,
                url: 'process.php',
                data: dataparam,
                datatype: 'json',
                cache: true,
                global: false,
                beforeSend: function () {
                    $('#loader').show();
                },
                success: function (data) {
                    if (data == 'success') {
                        console.log(data);
                    } else {
                        $('.no-config').show();
                        console.log(data);
                    }

                },
                complete: function () {
                    $('#loader').hide();
                }
            });
        }
    });
});


function regvalidate() {

    var errortable = document.getElementById('log');

    var x = document.forms["regform"]["username"].value;
    var y = document.forms["regform"]["email"].value;
    var z = document.forms["regform"]["pass1"].value;
    var b = document.forms["regform"]["pass2"].value;

    if (x == "" || y == "" || z == "" || b == "") {
        errortable.innerHTML = 'Cant be empty field';
        return false;
    }

    var regexEmail = /\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
    var email = document.getElementById("email");

    if (regexEmail.test(email.value)) {} else {
        errortable.innerHTML = 'Invaild email address';
        return false;

    }

    password1 = regform.pass1.value;
    password2 = regform.pass2.value;

    if (password1 != password2) {
        errortable.innerHTML = 'Two pass dosent match';
        return false;

    }
}