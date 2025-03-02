$(document).ready(function () {
    $("#formAuthentication").submit(function (event) {
        event.preventDefault();

        let formData = {
            email: $("#email").val(),
            password: $("#password").val(),
        };

         // Get the data-url attribute from the form
         let redirectUrl = $("#formAuthentication").attr("data-url");


        $.ajax({
            url: '/api/v1/admin-login',
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "POST",
            contentType: "application/json",
            data: JSON.stringify(formData),
            success: function (response) {
                if (response.status === 200) {
                    console.log("Redirecting to:", redirectUrl);
                    localStorage.setItem("access_token", response.access_token);
                    window.location.href = redirectUrl;

                    // window.location.href =  baseURL + 'admin/dashboard';
                } else {
                    alert(response.message);
                }
            },
            error: function (xhr) {
                console.log("Redirecting to:", redirectUrl);
                alert(xhr.responseJSON.message || "Login failed!");
            },
        });
    });
});
