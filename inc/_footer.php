
<div class="footer">
  <div class="nav">
    <div class="nav__btn-wrap">
      <button class="btn nav__btn" type="button">
        <span class="btn__text">
          <span class="nav__icon"></span>
        </span>
      </button>
    </div>
    <div class="nav__body container">
      <div class="nav__inner">
        <div class="nav__close"></div>
        <ul class="nav__list">
          <li class="nav__item"><a href="/" class="nav__link">Главная</a></li>
          <li class="nav__item"><a href="/about" class="nav__link">О проекте</a></li>
          <li class="nav__item"><a href="/stat" class="nav__link">Статистика</a></li>
          <li class="nav__item"><a href="/guaranteed" class="nav__link">Гарантии</a></li>
          <li class="nav__item"><a href="/contest" class="nav__link">Конкурсы</a></li>
          <li class="nav__item"><a href="/feedback" class="nav__link">Отзывы</a></li>
          <li class="nav__item"><a href="/helpme" class="nav__link">Помощь</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="footer__body container">
    <div class="row">
      <div class="footer__section col-md-3">
        <div class="footer__about">
          <h4 class="footer__title">Описание</h4>
          <p class="footer__text">MotorMoney - это экономическая игра с выводом денег высокой надежности. Расширяйте автопарк, приводите друзей и зарабатывайте реальные деньги вместе с нами в увлекательной игре MotorMoney!</p>
          <div class="logo footer__logo">
            <a href="/" class="logo__link">
              <img src="/img/foot_logo.png" class="logo__icon">
            </a>
          </div>
        </div>
      </div>
      <div class="footer__section col-md-6">
        <div class="footer__blog">
          <h4 class="footer__title">Новости проекта</h4>
          <article class="footer__post">
            <script type="text/javascript" src="//vk.com/js/api/openapi.js?146"></script>

            <!-- VK Widget -->
<div id="vk_widget">
    <div id="vk_groups"></div>
</div>
<script>
    function VK_Widget_Init(){
        document.getElementById('vk_groups').innerHTML = "";
        var vk_width = document.getElementById('vk_widget').clientWidth;
        VK.Widgets.Group("vk_groups", {mode: 3, width: 'auto'}, 147975035);
    };
    window.addEventListener('load', VK_Widget_Init, false);
    window.addEventListener('resize', VK_Widget_Init, false);
</script>
          </article>
        </div>
      </div>
      <div class="footer__section col-md-3">
        <div class="footer__hours">
          <h4 class="footer__title">Наши адреса</h4>
          <div class="footer__hours-item">
            <div class="footer__hours-day">motormoney.org</div>
            <div class="footer__hours-separ"></div>
            <div class="footer__hours-time">основной</div>
          </div>
          <div class="footer__hours-item">
            <div class="footer__hours-day">motormoney.biz</div>
            <div class="footer__hours-separ"></div>
            <div class="footer__hours-time">зеркало</div>
          </div>
          <div class="footer__hours-item">
            <div class="footer__hours-day">motormoney.me</div>
            <div class="footer__hours-separ"></div>
            <div class="footer__hours-time">зеркало</div>
          </div>
          <div class="footer__hours-item">
            <div class="footer__hours-day">motormoney.co</div>
            <div class="footer__hours-separ"></div>
            <div class="footer__hours-time">зеркало</div>
          </div>

		  <div class="foot_fk"><center>
		    <a href="http://archi.ltd" target="_blank"><img src="/img/archi.png" style="width:192px;margin-bottom:15px;"></a>
		    <a href="//www.free-kassa.ru/"><img src="//www.free-kassa.ru/img/fk_btn/4.png"></a>

          <a target="_blank" href="https://sslanalyzer.comodoca.com/?url=motormoney.org"><img src="https://trustlogo.com/images/install/comodo_secure_seal_76x26_transp.png" style="width:76px;margin-bottom: 2px;"></a>

		  </center></div>

        </div>
      </div>
    </div>
  </div>
</div>

<div class="dev">
  <div class="container">
    <div class="dev__item">
      Copyrights © 2017 motormoney.org All rights reserved. <a href="/rules">Правила проекта.</a>
    </div>
  </div>
</div>

<script>
  window.jQuery || document.write('<script src="/js/jquery-3.1.0.min.js"><\/script>');

</script>
<script src="/js/jquery.formstyler.js"></script>
<script src="/js/jquery.countdown.js"></script>
<script src="/js/jquery.magnific-popup.min.js"></script>
<script src="/js/swiper.min.js"></script>
<script src="/js/jquery.knob.js"></script>
<script src="/js/rome.min.js"></script>
<script src="/js/isotope.pkgd.min.js"></script>
<script src="/js/app.min.js"></script>
<script src="/js/sweet-alert.min.js"></script>
<script type="text/javascript">
  function onSubmit() {
    var postData = $('#regform').serialize();
    $.post("https://motormoney.org/ajax/reg.php", postData)
    .done(function(data) {
      if(data!='success') {
        swal({
            type: "warning",
            title: "Ошибка!",
            text: data,
            timer: 5000,
            showConfirmButton: true
        }, function() {grecaptcha.reset();});
      }
      else
      {
        swal({
            type: "success",
            title: "Отлично!",
            text: "<br>Регистрация успешно завершена!",
            timer: 1000
        });
        setTimeout(function() {location.href='/user/';}, 1);
      }
    });
    return false;
  }
</script>
</body>
</html>