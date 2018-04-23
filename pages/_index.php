
<?PHP
$tfstats = time() - 60*60*24;
$db->Query("SELECT 
(SELECT COUNT(*) FROM db_users_a) all_users,
(SELECT SUM(insert_sum) FROM db_users_b) all_insert, 
(SELECT SUM(payment_sum) FROM db_users_b) all_payment,
(SELECT COUNT(*) FROM db_users_a WHERE date_reg > '$tfstats') new_users");
$stats_data = $db->FetchArray();
?>
<div class="numbers">
  <div class="container">
    <div class="row">
      <ul class="numbers__list">
        <li class="numbers__list-item col-md-3">
          <h3 class="numbers__value"><?=$stats_data["all_users"]; ?> чел.</h3>
          <p class="numbers__desc">Всего участников</p>
          <div class="homestatico"><img src="/img/stat_1.png"></div>
        </li>
        <li class="numbers__list-item col-md-3">
          <h3 class="numbers__value"><?=sprintf("%.2f",$stats_data["all_insert"]); ?> руб.</h3>
          <p class="numbers__desc">Сумма пополнений</p>
          <div class="homestatico"><img src="/img/stat_2.png"></div>
        </li>
        <li class="numbers__list-item col-md-3">
          <h3 class="numbers__value"><?=sprintf("%.2f",$stats_data["all_payment"]); ?> руб.</h3>
          <p class="numbers__desc">Заработано участниками</p>
          <div class="homestatico"><img src="/img/stat_3.png"></div>
        </li>
        <li class="numbers__list-item col-md-3">
          <h3 class="numbers__value"><?=intval(((time() - $config->SYSTEM_START_TIME) / 86400 ) +1); ?> день</h3>
          <p class="numbers__desc">Время работы</p>
          <div class="homestatico"><img src="/img/stat_4.png"></div>
        </li>
      </ul>
    </div>
  </div>
</div>
<div class="about">
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <div class="about__body">
          <div class="about__body-inner">
            <h2 class="title"><span class="title__mark">О проекте </span></h2>
            <p>MOTORMONEY - это RIP увлекательный игровой симулятор с возможностью <b>заработка</b> и вывода <b>реальных денег</b>!
            Все что от Вас требуется это зарегистрироваться в нашем проекте, развивать свой собственный автопарк и получать стабильный доход!</p>
            <p></p>
            <a class="btn about__btn" href="/about">
              <span class="btn__text">Больше информации</span>
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-5">
        <div class="discount">
          <h2 class="title discount__title">
            <span class="title__mark">ЗАРЕГИСТРИРУЙТЕСЬ </span>ПРЯМО СЕЙЧАС!</h2>
          <div class="discount__body">
            <p class="discount__desc">Каждому новому участнику проекта мы дарим в подарок <span style="background: rgb(255, 210, 0);padding: 2px 5px;border-radius: 3px;color: #001530;font-size:13px;">Hyundai Solaris</span> Ознакомьтесь с нашим замечательным проектом в полном обьеме!</p>
            <a class="btn" href="/user/register">
              <span class="btn__text">Регистрация</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="feature">
  <div class="feature__list">
    <div class="container">
      <div class="feature__row-list row">
        <div class="feature__item col-md-3">
          <div class="feature__icon">
            <img src="/img/pre_1.png">
          </div>
          <h3 class="feature__title">Собственный скрипт</h3>
          <p class="feature__desc">Мы используем уникальный скрипт собственной разработки, сайт создавался с нуля лично нами. </p>
        </div>
        <div class="feature__item col-md-3">
          <div class="feature__icon">
            <img src="/img/pre_2.png">
          </div>
          <h3 class="feature__title">Открытая статистика</h3>
          <p class="feature__desc">Статистика проекта всегда открыта и доступна для просмотра любому пользователю проекта.</p>
        </div>
        <div class="feature__item col-md-3">
          <div class="feature__icon">
            <img src="/img/pre_3.png">
          </div>
          <h3 class="feature__title">Регулярные конкурсы</h3>
          <p class="feature__desc">Регулярно мы проводим конкурсы активности, участие в которых может принять любой участник проекта.</p>
        </div>
        <div class="feature__item col-md-3">
          <div class="feature__icon">
            <img src="/img/pre_4.png">
          </div>
          <h3 class="feature__title">Уникальный дизайн</h3>
          <p class="feature__desc">Приятный и уникальный дизайн, интерфейс проекта оставит у Вас только положительные впечатления.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="feature__list">
    <div class="container">
      <div class="feature__row-list row">
        <div class="feature__item col-md-3">
          <div class="feature__icon">
            <img src="/img/pre_5.png">
          </div>
          <h3 class="feature__title">Выделенный сервер</h3>
          <p class="feature__desc">Проект размещен на выделенном, защищенном сервере, что обеспечит максимальную доступность.</p>
        </div>
        <div class="feature__item col-md-3">
          <div class="feature__icon">
            <img src="/img/pre_6.png">
          </div>
          <h3 class="feature__title">SSL сертификат</h3>
          <p class="feature__desc">Мы имеем сертификат надежности от Comodo, ваши данные никогда не попадут в руки злоумышленников.</p>
        </div>
        <div class="feature__item col-md-3">
          <div class="feature__icon">
            <img src="/img/pre_7.png">
          </div>
          <h3 class="feature__title">Мобильная версия</h3>
          <p class="feature__desc">Сайт доступен с любых мобильных устройств, и будет масштабироваться под Ваше разрешение экрана.</p>
        </div>
        <div class="feature__item col-md-3">
          <div class="feature__icon">
            <img src="/img/pre_8.png">
          </div>
          <h3 class="feature__title">Плавный маркетинг</h3>
          <p class="feature__desc">Благодаря плавному и продуманному маркетингу motormoney обещает стать настоящим долгожителем.</p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="best">
  <div class="container">
    <div class="row">
      <div class="best__title col-md-12">
        <h2 class="title">
          <span class="title__mark">ОСНОВНЫЕ </span>Качества</h2>
      </div>
      <ul class="best__list">
        <li class="best__item col-md-4">
          <img src="/img/features_1.png" class="featuresico">
          <h3 class="best__item-title">Процесс</h3>
          <p class="best__item-desc">Увлекательный игровой процесс не даст заскучать. Вам обязательно понравится в нашем проекте!</p>
        </li>
        <li class="best__item col-md-4">
          <img src="/img/features_2.png" class="featuresico">
          <h3 class="best__item-title">Заработок</h3>
          <p class="best__item-desc">Именно в нашем проекте можно не только увлекательно проводить время но и зарабатывать деньги!</p>
        </li>
        <li class="best__item col-md-4">
          <img src="/img/features_3.png" class="featuresico">
          <h3 class="best__item-title">Прозрачность</h3>
          <p class="best__item-desc">Статистика проекта открыта для всех пользователей. Анализируйте и принимайте решения самостоятельно!</p>
        </li>
      </ul>
    </div>
  </div>
</div>
		<div class="faq">
			<div class="container">
				<h2 class="title">
					<span class="title__mark">Вопрос/Ответ</span>
				</h2>
				<ul class="faq__list">
					<li class="faq__item faq__item_active row">
						<div class="col-md-7">
							<div class="faq__question">Как я могу заработать в проекте motormoney?</div>
							<div class="faq__answer">Все просто. В нашем проекте существует несколько способов заработка, это: развитие своего автопарка, просмотр сайтов в  сёрфинге, реферальная программа и т.д</div>
							<div class="faq__answer"><br>Подробнее о способах заработка Вы можете прочитать сразу после регистрации в "<a href="">Обучающем разделе</a>".</div>
						</div>
					</li>
					<li class="faq__item row">
						<div class="col-md-7">
							<div class="faq__question">У Вас есть баллы или какие то другие ограничения на заработок?</div>
							<div class="faq__answer">Нет, у нас нету баллов, Вы можете выводить ровно столько, сколько заработали на нашем проекте, без каких-либо ограничений.</div>
						</div>
					</li>
					<li class="faq__item row">
						<div class="col-md-7">
							<div class="faq__question">На какие платежные системы осуществляется ввод и вывод средств?</div>
							<div class="faq__answer">Пополнение баланса можно осуществить через платежные системы: Яндекс.Деньги, QIWI Кошелек, WebMoney, PAYEER, Perfect Money, ADV Cash, Free-Kassa и т.д</div>
							<div class="faq__answer"><br>Выплаты осуществляются в автоматическом режиме на платежные системы: PAYEER, Яндекс.Деньги, QIWI Кошелек, VISA/MasterCard, Perfect Money и мобильные телефоны.</div>
						</div>
					</li>
					<li class="faq__item row">
						<div class="col-md-7">
							<div class="faq__question">Есть ли у Вас партнерская программа?</div>
							<div class="faq__answer">Конечно. Партнерская программа в motormoney имеет 2 уровня, заработок с партнерской программы перечисляется на счет для вывода.</div>
						</div>
					</li>
					<li class="faq__item row">
						<div class="col-md-7">
							<div class="faq__question">У меня остались вопросы, куда я могу обратиться?</div>
							<div class="faq__answer">Вы можете написать в службу поддержки пользователей, для этого перейдите в раздел "<a href="/helpme">Помощь</a>" и выберите любой удобный для Вас способ общения с администрацией.</div>
						</div>
					</li>
				</ul>
			</div>
		</div>