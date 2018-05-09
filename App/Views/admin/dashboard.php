<html>
<head></head>
<body>
<form action="<?php echo url('/admin/submit')?>" method="POST" enctype="multipart/form-data">
    <label for="email"> email
    </label>
    <input type="email" name="email">
    <br>
    <label for="">Password</label>
    <input type="password" name="password">
    </br>
    <br>
    <label for="">Confirm Password</label>
    <input type="password" name="confirm_password">
    </br>
    </br>
    <label for="full name">full_name</label>
    <input type="text" name="fullname">
    <br>
    <br>
    <input type="file" name="image">
    <button>Send</button>
</form>
<script
    src="https://code.jquery.com/jquery-3.1.1.js"
    integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
    crossorigin="anonymous"></script>
<script>
    $('form').on('submit', function (e) {
        e.preventDefault();
        form = $(this);
        urlRequest = form.attr('action');
        typyRequest = form.attr('method');
        senData = new FormData(form[0]);
        $.ajax({
            url: urlRequest,
            type: typyRequest,
            data: senData,
            dataType: 'json',
            success: function (r) {
                $('body').append(r.email);
            },
            cache: false,
            processData : false,
            contentType: false,
        });
    });
</script>
</body>
</html>