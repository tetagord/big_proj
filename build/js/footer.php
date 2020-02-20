<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package schuledas
 */

?>

<footer class="footer">
    <div class="container flex flex-wrap">
        <div class="col-12 col-md-6 col-lg-3 footer-item">
            <div class="row">
                <h4 class="footer-item--title">Статьи</h4>
                <nav class="footer-nav">
                    <ul class="footer-nav--ul">
                        <li class="footer-nav--li"><a class="footer-link" href="/category/articles/obrazovanie/">Образование</a></li>
                        <li class="footer-nav--li"><a class="footer-link" href="https://www.schuledas.com/category/articles/novosti/">Новости</a></li>
                        <li class="footer-nav--li"><a class="footer-link" href="https://www.schuledas.com/category/articles/karera-i-svoj-biznes/">Карьера и свой бизнес</a></li>
                        <li class="footer-nav--li"><a class="footer-link" href="https://www.schuledas.com/category/articles/kultura/">Культура</a></li>
                        <li class="footer-nav--li"><a class="footer-link" href="https://www.schuledas.com/category/articles/semja/">Семья</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3 footer-item">
        <div class="row">

                <h4 class="footer-item--title">Образование</h4>
                 <nav class="footer-nav">
                    <ul class="footer-nav--ul">
                        <li class="footer-nav--li"><a class="footer-link" href="https://www.schuledas.com/search-school/">Школы</a></li>
                        <li class="footer-nav--li"><a class="footer-link" href="https://www.schuledas.com/search-universities/">Вузы</a></li>
                        <li class="footer-nav--li"><a class="footer-link" href="https://www.schuledas.com/search-specializations/">Специальности</a></li>
                    </ul>
                </nav>
        </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3 footer-item">
        <div class="row">

                <h4 class="footer-item--title">Карьера</h4>
                 <nav class="footer-nav">
                    <ul class="footer-nav--ul">
                        <li class="footer-nav--li"><a class="footer-link" href="#">Ищу работу</a></li>
                        <li class="footer-nav--li"><a class="footer-link" href="#">Ищу сотрудников</a></li>
                    </ul>
                </nav>
        </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3 footer-item">
            <div class="row">
                <h4 class="footer-item--title">Компания</h4><a class="footer-link" href="/politika-konfidencialnosti/">Политика конфеденциальности</a>
                <a class="footer-link" href="/uslovija-predostavlenija-uslug/">Условия предоставления услуг</a><a class="footer-link" href="/svjazhites-s-nami/">Свяжитесь с нами</a>
            </div>
        </div>

 
    </div>
    <div class="footer-bottom">
        <div class="container"> 
            <div class="col-12"> 
                <div class="row justify-content-between">
                    <p class="copyright">© <?= date('Y') ?> Schuledas.</p>
                    <div class="footer-social"><a class="footer-social--link" href="https://www.instagram.com/schuledas/"><i class="fab fa-instagram"></i></a><a class="footer-social--link" href="https://www.facebook.com/SchuledasRUS/"><i class="fab fa-facebook-f"></i></a></div>
                </div>
            </div> 
        </div>
    </div>

</footer><a class="to-top" href="#"><i class="fas fa-arrow-circle-up"></i></a>
<script>$ = jQuery;</script>
<script src="<?= get_template_directory_uri() ?>/js/slick.min.js"></script>
<script src="<?= get_template_directory_uri() ?>/js/rating/jquery.barrating.min.js" type="text/javascript"></script>
<script src="<?= get_template_directory_uri() ?>/js/main.js?v=2"></script>
<script>
$(document).on('click','#wc_show_hide_loggedin_username a',function(e){
    e.preventDefault();
    $('.lrm-login').click();
});
</script>
<?php wp_footer(); ?>
</body>
</html>





