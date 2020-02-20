<?= get_header() ?>		
<main>
   <div class="video-block">
   <div class="container"> 
           <a class="video-mobile-btn" href="https://www.schuledas.com/wp-content/themes/schuledas/video/Schuledascovervideo.mp4" target="_blank"><i class="fas fa-play-circle"></i></a>
               <div class="video">
                    <video autoplay loop muted id="mainVideo">
                        <source src="<?= get_template_directory_uri(); ?>/video/Schuledascovervideo.mp4" type="video/mp4" >
                    </video>
                    <div class="video-controls flex justify-content-between">
                        <button class="play" id="btnPlayPause"> <i class="far fa-pause-circle"></i></button>
                        <div>
                            <button class="mute" id="btnMute"> <i class="fas fa-volume-up"></i></button>
                            <button class="fullscreen" id="btnFullScreen"><i class="fas fa-arrows-alt"></i></button>
                        </div>
                    </div>
                </div>
                <div class="close-btn">
                    <div class="close-btn--item close-btn--left"></div>
                    <div class="close-btn--item close-btn--right"></div>
                </div>
            </div> 
    </div>

    <div class="container">
        <div class="col-12 join">
            <div class="row">
                <div class="main-title">
                    <h1 class="h1">Для тех, кто завтра изменит мир</h1>
                 
<p class="join-summary">Schuledas — это нишевый информационный портал, который живет для сообщества людей, видящих многогранность мира и достигающих большие цели.</p>

<p class="join-summary">Мы предоставляем мультимедийную платформу для:</p>
<ul>
<li>- Построения карьеры и поиска высококвалифицированных сотрудников</li>
<li>- Поиска и предложения качественного образования</li> 
<li>- Общения с людьми одинаковых ценностей и схожих интересов</li> 
<li>- Получения актуальной, увлекательной и полезной информации и расширения кругозора</li>
<li>- Поиска партнеров и развития бизнеса.</li>
					</ul><br/>
<br/>

<p class="join-summary">Мы говорим о всем многообразии жизни, кроме политики.</p> 


<p class="join-summary">Наша миссия — объединить людей и компании из <strong>Прибалтики и стран СНГ</strong> и <strong>Германии, Австрии и Швейцарии</strong> схожего миропонимания и с&nbsp;большими целями и создать для них единое пространство вне географических границ.</p>
                </div>
                <button class="btn btn--main lrm-login lrm-hide-if-logged-in">Присоедениться </button>
            </div>
        </div>
    </div>
    <div class="adv">
    <?= do_shortcode('[home_features]'); ?>
    </div>
    <?= do_shortcode('[home_posts]'); ?>
    <div class="block-line"></div>
    <?= do_shortcode('[home_blogs]'); ?>
    <div class="block-line"></div>
    <?= do_shortcode('[home_schools]'); ?>
    <div class="block-line"></div>
    <?= do_shortcode('[home_hight_schools]'); ?>
    <div class="block-line"></div>
    <div class="container" style="display: none;"> 
        <div class="col-12 forum flex flex-wrap">
            <div class="forum-top flex justify-content-between align-items-center">
                <h2 class="h2">Форум</h2><a class="btn--forum" href="#">Перейти на форум<i class="fas fa-arrow-circle-right"></i></a>
            </div>
            <div class="forum-item col-12 col-md-6 col-lg-4">
                <div class="row flex-nowrap">
                    <div class="forum-img"> <img src="https://via.placeholder.com/140x140" data-progressive="https://via.placeholder.com/140x140"><span class="forum-title">Форум</span></div>
                    <div class="forum-content flex flex-column">
                        <h3 class="forum-name">Заголовок длинною до 92 символов может поместиться 3 строчки</h3><span class="forum-comments">324<i class="fas fa-comment-alt"></i></span><span class="link forum-link">Пример ссылки<i class="fas fa-link"></i></span>
                    </div>
                </div><a class="link-mask" href="#"></a>
            </div>
            <div class="forum-item col-12 col-md-6 col-lg-4">
                <div class="row flex-nowrap">
                    <div class="forum-img"> <img src="https://via.placeholder.com/140x140" data-progressive="https://via.placeholder.com/140x140"><span class="forum-title">Форум</span></div>
                    <div class="forum-content flex flex-column">
                        <h3 class="forum-name">Заголовок длинною до 92 символов может поместиться 3 строчки</h3><span class="forum-comments">324<i class="fas fa-comment-alt"></i></span><span class="link forum-link">Пример ссылки<i class="fas fa-link"></i></span>
                    </div>
                </div><a class="link-mask" href="#"></a>
            </div>
            <div class="forum-item col-12 col-md-6 col-lg-4">
                <div class="row flex-nowrap">
                    <div class="forum-img"> <img src="https://via.placeholder.com/140x140" data-progressive="https://via.placeholder.com/140x140"><span class="forum-title">Форум</span></div>
                    <div class="forum-content flex flex-column">
                        <h3 class="forum-name">Заголовок длинною до 92 символов может поместиться 3 строчки</h3><span class="forum-comments">324<i class="fas fa-comment-alt"></i></span><span class="link forum-link">Пример ссылки<i class="fas fa-link"></i></span>
                    </div>
                </div><a class="link-mask" href="#"></a>
            </div>
        </div>
    </div>
</main>
<?= get_footer() ?>