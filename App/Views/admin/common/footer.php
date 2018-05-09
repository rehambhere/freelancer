<!-- jQuery 2.2.0 -->
<script
    src="https://code.jquery.com/jquery-1.12.4.min.js"
    integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
    crossorigin="anonymous"></script>
<!---<script src=('admin/plugins/jQuery/jQuery-2.2.0.min.js')?>"></script>-->
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo assets('admin/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo assets('admin/ckeditor/ckeditor.js')?>"></script>

<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo assets('admin/plugins/morris/morris.min.js')?>"></script>
<!-- Sparkline -->
<script src="<?php echo assets('admin/plugins/sparkline/jquery.sparkline.min.js')?>"></script>
<!-- jvectormap -->
<script src="<?php echo assets('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')?>"></script>
<script src="<?php echo assets('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo assets('admin/plugins/knob/jquery.knob.js')?>"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo assets('admin/plugins/datepicker/bootstrap-datepicker.js')?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo assets('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')?>"></script>
<!-- Slimscroll -->
<script src="<?php echo assets('admin/plugins/slimScroll/jquery.slimscroll.min.js')?>"></script>
<!-- FastClick -->
<script src="<?php echo assets('admin/plugins/fastclick/fastclick.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo assets('admin/dist/js/app.min.js')?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo assets('admin/dist/js/pages/dashboard.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo assets('admin/dist/js/demo.js')?>"></script>

<script>

    //CKEDITOR.replaceAll( 'details' );

        // get current url
        var currentUrl = window.location.href;

        // get the last seqment of the url//
        var segment = currentUrl.split('/').pop();
        
        // add the active class to the id in sidebar//
        $('#'+ segment+'-link').addClass('active');

    $('.open-popup').on('click', function () {

        btn = $(this);
        url = btn.data('target');
        modelTarget = btn.data('modal-target');
        $.ajax({
            url: url,
            type: 'POST',
            success: function (html) {
                $('body').append(html);
                $(modelTarget).modal('show');

            }
        });
        return false;
    });



    $(document ).on('click' ,'.submit-btn', function (e) {
        btn = $(this);

        e.preventDefault();

        form = btn.parent('.form');
        if(form.find('#details').length){
            //if there is an element in the form has an id
            // then add the value for it to be gotten from
            //CKEDITOR.instances.details.getData();

            form.find('#details').val(CKEDITOR.instances.details.getData());


        }

        url = form.attr('action');
        data = new  FormData(form[0]);
        formResult = form.find('#form-results');

        $.ajax({
            url:url,
            data:data,
            type:'POST',
            dataType:'json',
            beforeSend: function () {

                formResult.removeClass().addClass('alert alert-info').html('loading...');
            },
            success : function (result) {
                if(result.errors) {
                    formResult.removeClass().addClass('alert alert-danger').html(result.errors);

                } else if(result.success) {
                    formResult.removeClass().addClass('alert alert-success').html(result.success);
                }
                if(result.redirectTo) {
                    window.location.href = result.redirectTo;
                }

            },
            cache: false,
            processData: false,
            contentType : false,
        });
    });
    /*deleting*/
    /*deleting*/
    $('.delete').on('click', function (e) {
        e.preventDefault();
        button = $(this);
        var c= confirm('Are you sure');
        if(c=== true){
            $.ajax({
                url:button.data('target'),
                type:'POST',
                dataType:'json',
                beforeSend:function () {
                    $('#results').removeClass().addClass('alert alert-info').html('Are you sure you want delete');

                },
                success:function (results) {
                    if(results.success)
                        $('#results').removeClass().addClass('alert alert-success').html(results.success);
                    tr = button.parents('tr');
                    tr.fadeOut(function () {
                        tr.remove();
                    })
                }
            })
        } else {
            return false;
        }


    })
</script>
</body>
</html>
