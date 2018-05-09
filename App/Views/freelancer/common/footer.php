
<div class="clearfix"></div>
<!--footer-->
<section class="footer__wrapper text-center">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-7 list-inline site-links">
                <ul class="list-inline">
                    <li>
                        <a href="https://blog.nabbesh.com/2015/12/02/our-story/" target="_blank">About Us</a>
                    </li>
                    <li>
                        <a href="/en/how-it-works/client">How It Works</a>
                    </li>
                    <li>
                        <a href="/en/terms-of-business">Legal</a>
                    </li>
                    <li>
                        <a href="http://blog.nabbesh.com/" target="_blank">Blog</a>
                    </li>
                    <li>
                        <a href="/en/contact">Contact Us</a>
                    </li>
                    <li>
                        <a href="#" class="js-support-link">Support</a>
                    </li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-5 social-links">
                <ul class="list-inline social-icons">
                    <li><a href="https://www.facebook.com/freelancer" rel="nofollow" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="https://twitter.com/freelancer" rel="nofollow" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="http://www.linkedin.com/company/freelancer" rel="nofollow" title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="http://instagram.com/freelancer" rel="nofollow" target="_blank" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                </ul>
                <p>
                </p>
            </div>
        </div>
    </div>
</section>
<script src="<?php echo assets('freelancer/js/jquery-1.12.4.min.js');?>"></script>
<!--rating start-->
<script src="<?php echo assets('freelancer/js/jquery.star-rating-svg.js');?>"></script>

<script src="<?php echo assets('freelancer/js/selectize.js');?>"></script>
<script type="text/javascript" src="<?php echo assets('freelancer/js/bootstrap-tokenfield.js')?>"></script>
<script src="<?php echo assets('freelancer/js/datepicker.min.js')?>"></script>
<script src="<?php echo assets('js/selectize.js');?>"></script>
<script type="text/javascript" src="<?php echo assets('js/bootstrap-tokenfield.js');?>"></script>
<script src="<?php echo assets('freelancerظjs/jquery.fs.dropper.js');?>"></script>
<script src="<?php echo assets('freelancer/js/bootstrap.min.js')?>"></script>
<script>
    $(".my-rating").starRating({
        initialRating: 4,
        starSize: 25,
        strokeWidth: 0,
        useGradient: false
    });
</script>
<script>
    $('#tokenfield').tokenfield({
        autocomplete: {
            delay: 100
        },
        showAutocompleteOnFocus: true
    });
    $("#show-datepicke").datepicker({
        isDisabled: function(date) {
            return date.getDay() === 3 ? true : false;
        }
    });
</script>
<script>
    $(".dropper").dropper({
        action: "//example.com/handle-upload.php"
    });
</script>
</body>

</html>


