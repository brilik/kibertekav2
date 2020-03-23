<?php ar_the_view('header'); ?>

<!-- BEGIN FOOTER -->
<footer class="footer">
    <div class="footer-top">
        <div class="wrapper">
            <div class="footer-top__box">
                <div class="footer-col footer-col__nav">
                    <div class="footer-logo">
                        <img data-src="img/logo-footer.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACw="
                             alt="" class="js-img">
                    </div>
                    <div class="footer-nav__box">
                        <ul class="footer-nav">
                            <li>
                                <a href="#">
                                    О клубах
                                    <i class="icon-arrow-down-small"></i>
                                </a>
                                <ul>
                                    <li><a href="#">Правила центров</a></li>
                                    <li><a href="#">Вопросы/ответы</a></li>
                                    <li><a href="#">Проведение мероприятий</a></li>
                                    <li><a href="#">Для инвесторов</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Новости (акции)</a></li>
                            <li>
                                <a href="#">
                                    Информация
                                    <i class="icon-arrow-down-small"></i>
                                </a>
                                <ul>
                                    <li><a href="#">Правила центров</a></li>
                                    <li><a href="#">Вопросы/ответы</a></li>
                                    <li><a href="#">Проведение мероприятий</a></li>
                                    <li><a href="#">Для инвесторов</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Как добраться</a></li>
                            <li><a href="#">библиотека игр</a></li>
                        </ul>
                        <div class="footer-social">
                            <ul>
                                <li class="social-icon"><a href="#"><i class="icon-vk"></i></a></li>
                                <li class="social-icon"><a href="#"><i class="icon-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer-col footer-col__center">
                    <div class="footer-call">
                        <span>ПЛАНИРУЙ СВОЙ ОТДЫХ ЗАРАНЕЕ!</span>
                        <a href="#" class="btn" data-popup-link="js-popup-call">заказать звонок</a>
                    </div>
                </div>
                <div class="footer-col footer-col__info">
                    <div class="footer-info__block">
                        <ul>
                            <li class="social-icon"><a href="https://wa.me/84950555599"><i class="icon-whatsup"></i></a></li>
                            <li class="social-icon"><a href="https://telegram.me/groupname"><i class="icon-telegram"></i></a></li>
                            <li><a href="tel:84950555599" class="link">8 (495) 055-55-99</a></li>
                        </ul>
                    </div>
                    <div class="footer-info__block">
                        <ul>
                            <li class="social-icon"><a href="mailto:admin@kiberteka.com"><i class="icon-mail"></i></a></li>
                            <li><a href="mailto:admin@kiberteka.com" class="link">admin@kiberteka.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="wrapper">
            <div class="footer-bottom__box">
                <p>&copy;2020 <span>Kiberteka</span>. Все права защищены</p>
                <p><a href="#">Политика конфиденциальности</a></p>
                <p>Дизайн разработан <a href="#">Slice Planet</a></p>
            </div>
        </div>
    </div>
</footer>
<!-- FOOTER EOF   -->

<?php ar_the_view( 'popup__call' ); ?>
<?php ar_the_view( 'popup__booking' ); ?>

</div>

<div class="icon-load"></div>

<!-- BODY EOF   -->
<?php wp_footer(); ?>
</body>

</html>