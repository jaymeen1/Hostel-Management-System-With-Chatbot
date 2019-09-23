<footer>
    <div class="wrap-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="copyright">Copyright &copy; www.Hostbot.com<br/>Designed by <a href="adminpanel.php">Jaymeen Gehlot</a></div>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-google"></i></a>
                        </li>
                        <li><a href="https://www.facebook.com/jaymeen14333"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="js/jquery-2.1.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/agency.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/classie.js"></script>
<script src="js/cbpAnimatedHeader.js"></script>
<script>
    $(function() {
        $('#nav-wrapper').height($("#nav").height());

        $('#nav').affix({
            offset: { top: $('#nav').offset().top }
        });
    });
</script>
<script src="owl-carousel/owl.carousel.js"></script>
<script>
    $(document).ready(function() {
        $("#owl-brand").owlCarousel({
            autoPlay: 3000,
            items : 1,
            itemsDesktop : [1199,1],
            itemsDesktopSmall : [979,2],
            navigation: false,
        });
    });
</script>
<script>
    $('.maps').click(function () {
        $('.maps iframe').css("pointer-events", "auto");
    });

    $( ".maps" ).mouseleave(function() {
        $('.maps iframe').css("pointer-events", "none");
    });
</script>
</body>
</html>