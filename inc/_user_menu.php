 <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">

                    <div class="user-details">
                        <div class="text-center">
                            <img src="/img/nouser.png" alt="" class="img-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?=$_SESSION["user"]; ?></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/profile"> Мой кабинет</a></li>
                                    <li><a href="/settings"> Настройки</a></li>
				   <li><a href="/myreferrals">Рефералы </a></li>
                                    <li class="divider"></li>
                                    <li><a href="/output"> Выход</a></li>
                                </ul>
                            </div>

                            <p class="text-muted m-0"><i class="fa fa-dot-circle-o text-success"></i> Online</p>
                        </div>
						<br>
                        <button type="button" class="btn waves-effect btn-default btn-block" style="text-align: left;padding: 6px 10px;font-size: 13px;" data-toggle="tooltip" data-placement="top" data-original-title="Баланс на счету для покупок">
						    <i class="mdi mdi-arrow-left-bold-circle-outline"></i> На покупки: <div class="balancelist">{!BALANCE_B!} руб.</div>
						</button>
                        <button type="button" class="btn waves-effect btn-default btn-block" style="text-align: left;padding: 6px 10px;font-size: 13px;margin-top:5px;" data-toggle="tooltip" data-placement="top" data-original-title="Ваш баланс на счету для выплат">
						    <i class="mdi mdi-arrow-right-bold-circle-outline"></i> На вывод: <div class="balancelist">{!BALANCE_P!} руб.</div>
						</button>
                        <button type="button" class="btn waves-effect btn-default btn-block" style="text-align: left;padding: 6px 10px;font-size: 13px;margin-top:5px;" data-toggle="tooltip" data-placement="top" data-original-title="Ваш баланс на счету для рекламы">
						    <i class="mdi mdi-bullhorn"></i> На рекламу: <div class="balancelist">0.00 руб.</div>
						</button>
                    </div>
                    <!--- Divider -->
                   <div id="sidebar-menu">
                        <ul>
                            <li><hr></li>
                            <li><a href="/profile" class="waves-effect"><i class="fa fa-user-circle"></i><span> Мой кабинет </span></a></li>
                            <li><a href="/carpark" class="waves-effect"><i class="fa fa-car"></i><span> Мой автопарк <span class="badge badge-default pull-right" data-toggle="tooltip" data-placement="left" data-original-title="Кол-во машин в вашем автопарке"><?=$prof_data["a_t"]+$prof_data["b_t"]+$prof_data["c_t"]+$prof_data["d_t"]+$prof_data["e_t"]+$prof_data["f_t"]; ?></span></span></a></li>
                            <li><a href="/training" class="waves-effect"><i class="fa fa-info-circle"></i><span> Обучающий раздел </span></a></li>
                            <li><hr></li>
                            <li><a href="/insert" class="waves-effect"><i class="fa fa-plus-square"></i><span> Пополнить баланс </span></a></li>
                            <li><a href="/outpay" class="waves-effect"><i class="fa fa-minus-square"></i><span> Заказать выплату </span></a></li>
                            <li><a href="/exchange" class="waves-effect"><i class="fa fa-refresh"></i><span> Обмен баланса </span></a></li>
                            <li><hr></li>
                            <li><a href="/surfing" class="waves-effect"><i class="fa fa-mouse-pointer"></i><span> Сёрфинг сайтов <span class="badge badge-default pull-right" data-toggle="tooltip" data-placement="left" data-original-title="Доступные ссылки для просмотра">25</span></span></a></li>
                            <li><a href="/addsurfing" class="waves-effect"><i class="fa fa-forward"></i><span> Добавить сайт в серфинг </span></a></li>
			<li><a href="/adv_balance" class="waves-effect"><i class="fa fa-bullhorn"></i><span> Рекламный баланс </span></a></li>
                            <li><hr></li>
                            <li><a href="/partnership" class="waves-effect"><i class="fa fa-handshake-o"></i><span> Партнерская программа </span></a></li>
                            <li><a href="/myreferrals" class="waves-effect"><i class="fa fa-users"></i><span> Список рефералов <span class="badge badge-default pull-right" data-toggle="tooltip" data-placement="left" data-original-title="Кол-во ваших рефералов">19</span></span></a></li>
                            <li><a href="/promo" class="waves-effect"><i class="fa fa-picture-o"></i><span> Рекламные материалы </span></a></li>
                            <li><hr></li>
                            <li><a href="/quests" class="waves-effect" style="color: #b05454;font-weight: bold;"><i class="fa fa-ravelry" style="color: #b05454;"></i><span> Оплачиваемые квесты </span></a></li>
						    <li><a href="./daily" class="waves-effect"><i class="fa fa-gift"></i><span> Ежедневный бонус </span></a></li>
                            <li><a href="/stat" class="waves-effect"><i class="fa fa-area-chart"></i><span> Статистика проекта </span></a></li>
                            <li><a href="/calculator" class="waves-effect"><i class="fa fa-calculator"></i><span> Калькулятор дохода </span></a></li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div> <!-- end sidebarinner -->
            </div>
            <!-- Left Sidebar End -->
