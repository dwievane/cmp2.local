<!--Footer-->
<footer class="footer">
    <div class="navbar navbar-default bottom">
        <div class="container">
            <!--WP-Footer Menu-->
            <?php wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?>
        </div><!--end container-->
            <div class="container">
                <?php wp_nav_menu( array( 'theme_location' => 'tertiary' ) ); ?>
            </div>
            <div class="container">
                 <div class="col-xs-12">
                    <p class="text-center">	&#9400; 2017 - Woohoo Chocolade
                    </br>
                    <a id="disclaimer" href="https://www.arteveldehogeschool.be/disclaimer">Disclaimer</a> - <a id="privacypolicy" href="https://i.imgflip.com/jiz3p.jpg">Privacy Policy</a></p>
                </div>
            </div>
                <?php dynamic_sidebar('footer'); ?>
            </div>
        </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>