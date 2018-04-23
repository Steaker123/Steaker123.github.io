
<?PHP
$_OPTIMIZATION["title"] = "Рекламные материалы";
$user_id = $_SESSION["user_id"];
$uname = $_SESSION["user"];
$db->Query("SELECT COUNT(*) FROM db_users_a WHERE referer_id = '$user_id'");
$refs = $db->FetchRow(); // Считаем рефералов 1 уровня
$db->Query("SELECT COUNT(*) FROM db_users_a WHERE referer_id2 = '$user_id'");
$refs2 = $db->FetchRow(); // Считаем рефералов 2 уровня
$db->Query("SELECT COUNT(*) FROM db_users_a WHERE referer_id3 = '$user_id'");
$refs3 = $db->FetchRow(); // Считаем рефералов 3 уровня

?>
<div class="page-content-wrapper ">

    <div class="container">
        <div class="row">
            <div class="col-lg-9 partner_cl">
                <div class="panel panel-primary">
                    <div class="panel-body">
  <div class="row">
  <div class="col-md-6">
    <p class="profileinfoh5"><b class="partner_statlink">Реф. ссылка 1:</b>  http://<?=$_SERVER['HTTP_HOST']; ?>/?ref=<?=$_SESSION["user_id"]; ?></p>
    <p class="profileinfoh5 m-b-0"><b class="partner_statlink">Реф. ссылка 2:</b> http://<?=$_SERVER['HTTP_HOST']; ?>/?ref=<?=$_SESSION["user_id"]; ?></p>
                        </div>
  <div class="col-md-6">
    <p class="profileinfoh5"><b class="partner_statlink">Промо страница 1:</b> https://motormoney.org/?u=17&amp;promo </p>
    <p class="profileinfoh5 m-b-0"><b class="partner_statlink">Промо страница 2:</b> https://motormoney.org/?u=17&amp;promo2 </p>
  </div>
  </div>
</div>
                </div>
            </div>
<style>
.promo_dev{width: 100%;
    margin-bottom: 30px;
    margin-top: 30px;
    border: 1px solid #ddd;
    display: inline-block;}
</style>
            <div class="col-lg-9 partner_cl">
                <div class="panel panel-default">
                    <div class="panel-body text-center">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tabs-vertical-env m-b-0">
                                    <ul class="nav tabs-vertical">
                                        <li class="active">
                                            <a href="#v-728" data-toggle="tab" aria-expanded="true">Размер: 728x90</a>
                                        </li>
                                        <li class="">
                                            <a href="#v-468" data-toggle="tab" aria-expanded="false">Размер: 468x60</a>
                                        </li>
                                        <li class="">
                                            <a href="#v-240" data-toggle="tab" aria-expanded="false">Размер: 240x400</a>
                                        </li>
                                        <li class="">
                                            <a href="#v-200x300" data-toggle="tab" aria-expanded="false">Размер: 200x300</a>
                                        </li>
                                        <li class="">
                                            <a href="#v-300" data-toggle="tab" aria-expanded="false">Размер: 300x300</a>
                                        </li>
                                        <li class="">
                                            <a href="#v-250" data-toggle="tab" aria-expanded="false">Размер: 250x250</a>
                                        </li>
                                        <li class="">
                                            <a href="#v-200" data-toggle="tab" aria-expanded="false">Размер: 200x200</a>
                                        </li>
                                        <li class="">
                                            <a href="#v-125" data-toggle="tab" aria-expanded="false">Размер: 125x125</a>
                                        </li>
                                        <li class="">
                                            <a href="#v-100" data-toggle="tab" aria-expanded="false">Размер: 100x100</a>
                                        </li>
                                        <li class="">
                                            <a href="#v-88" data-toggle="tab" aria-expanded="false">Размер: 88x31</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content" style="width:100%;">
                                        <div class="tab-pane active" id="v-728">
                                            <div class="row">
                                                <div class="promo_img">
                                                    <img src="https://motormoney.org/pic/MM-728.gif">
                                                </div>
                                                <div class="col-md-6">
                                                    <span class="label label-default promo_label1">Ссылка на баннер:</span>
                                                    <div class="form-group"><input value="https://motormoney.org/pic/MM-728.gif" onclick="this.select()" class="form-control promo_input" type="text"></div>
                                                </div>
                                                <div class="col-md-6">
                                                <span class="label label-default promo_label2">Размер баннера: 298кб</span>
                                                    <a href="https://motormoney.org/pic/MM-728.gif" download=""><button type="button" class="btn btn-primary btn-block promo_btn"><i class="fa fa-download"></i> Скачать баннер</button></a>
                                                </div>
												<div class="col-md-12">
													<div class="promo_dev"></div>
												</div>
												<div class="col-md-12">
                                                    <div class="promo_img">
                                                        <img src="https://motormoney.org/pic/new-MM-728.gif">
                                                    </div>
												</div>
                                                <div class="col-md-6">
                                                    <span class="label label-default promo_label1">Ссылка на баннер:</span>
                                                    <div class="form-group"><input value="https://motormoney.org/pic/new-MM-728.gif" onclick="this.select()" class="form-control promo_input" type="text"></div>
                                                </div>
                                                <div class="col-md-6">
                                                <span class="label label-default promo_label2">Размер баннера: 251кб</span>
                                                    <a href="https://motormoney.org/pic/new-MM-728.gif" download=""><button type="button" class="btn btn-primary btn-block promo_btn"><i class="fa fa-download"></i> Скачать баннер</button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="v-468">
                                            <div class="row">
                                                <div class="promo_img">
                                                    <img src="https://motormoney.org/pic/MM-468.gif">
                                                </div>
                                                <div class="col-md-6">
                                                    <span class="label label-default promo_label1">Ссылка на баннер:</span>
                                                    <div class="form-group"><input value="https://motormoney.org/pic/MM-468.gif" onclick="this.select()" class="form-control promo_input" type="text"></div>
                                                </div>
                                                <div class="col-md-6">
                                                <span class="label label-default promo_label2">Размер баннера: 172кб</span>
                                                    <a href="https://motormoney.org/pic/MM-468.gif" download=""><button type="button" class="btn btn-primary btn-block promo_btn"><i class="fa fa-download"></i> Скачать баннер</button></a>
                                                </div>
												<div class="col-md-12">
													<div class="promo_dev"></div>
												</div>
												<div class="col-md-12">
                                                    <div class="promo_img">
                                                        <img src="https://motormoney.org/pic/new-MM-468.gif">
                                                    </div>
												</div>
                                                <div class="col-md-6">
                                                    <span class="label label-default promo_label1">Ссылка на баннер:</span>
                                                    <div class="form-group"><input value="https://motormoney.org/pic/new-MM-468.gif" onclick="this.select()" class="form-control promo_input" type="text"></div>
                                                </div>
                                                <div class="col-md-6">
                                                <span class="label label-default promo_label2">Размер баннера: 148кб</span>
                                                    <a href="https://motormoney.org/pic/new-MM-468.gif" download=""><button type="button" class="btn btn-primary btn-block promo_btn"><i class="fa fa-download"></i> Скачать баннер</button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="v-240">
                                            <div class="row">
                                                <div class="promo_img">
                                                    <img src="https://motormoney.org/pic/MM-240.gif">
                                                </div>
                                                <div class="col-md-6">
                                                    <span class="label label-default promo_label1">Ссылка на баннер:</span>
                                                    <div class="form-group"><input value="https://motormoney.org/pic/MM-240.gif" onclick="this.select()" class="form-control promo_input" type="text"></div>
                                                </div>
                                                <div class="col-md-6">
                                                <span class="label label-default promo_label2">Размер баннера: 268кб</span>
                                                    <a href="https://motormoney.org/pic/MM-240.gif" download=""><button type="button" class="btn btn-primary btn-block promo_btn"><i class="fa fa-download"></i> Скачать баннер</button></a>
                                                </div>
												<div class="col-md-12">
													<div class="promo_dev"></div>
												</div>
												<div class="col-md-12">
                                                    <div class="promo_img">
                                                        <img src="https://motormoney.org/pic/new-MM-240.gif">
                                                    </div>
												</div>
                                                <div class="col-md-6">
                                                    <span class="label label-default promo_label1">Ссылка на баннер:</span>
                                                    <div class="form-group"><input value="https://motormoney.org/pic/new-MM-240.gif" onclick="this.select()" class="form-control promo_input" type="text"></div>
                                                </div>
                                                <div class="col-md-6">
                                                <span class="label label-default promo_label2">Размер баннера: 259кб</span>
                                                    <a href="https://motormoney.org/pic/new-MM-240.gif" download=""><button type="button" class="btn btn-primary btn-block promo_btn"><i class="fa fa-download"></i> Скачать баннер</button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="v-200x300">
                                            <div class="row">
                                                <div class="promo_img">
                                                    <img src="https://motormoney.org/pic/MM-200x300.gif">
                                                </div>
                                                <div class="col-md-6">
                                                    <span class="label label-default promo_label1">Ссылка на баннер:</span>
                                                    <div class="form-group"><input value="https://motormoney.org/pic/MM-200x300.gif" onclick="this.select()" class="form-control promo_input" type="text"></div>
                                                </div>
                                                <div class="col-md-6">
                                                <span class="label label-default promo_label2">Размер баннера: 271кб</span>
                                                    <a href="https://motormoney.org/pic/MM-200x300.gif" download=""><button type="button" class="btn btn-primary btn-block promo_btn"><i class="fa fa-download"></i> Скачать баннер</button></a>
                                                </div>
												<div class="col-md-12">
													<div class="promo_dev"></div>
												</div>
												<div class="col-md-12">
                                                    <div class="promo_img">
                                                        <img src="https://motormoney.org/pic/new-MM-200x300.gif">
                                                    </div>
												</div>
                                                <div class="col-md-6">
                                                    <span class="label label-default promo_label1">Ссылка на баннер:</span>
                                                    <div class="form-group"><input value="https://motormoney.org/pic/new-MM-200x300.gif" onclick="this.select()" class="form-control promo_input" type="text"></div>
                                                </div>
                                                <div class="col-md-6">
                                                <span class="label label-default promo_label2">Размер баннера: 226кб</span>
                                                    <a href="https://motormoney.org/pic/new-MM-200x300.gif" download=""><button type="button" class="btn btn-primary btn-block promo_btn"><i class="fa fa-download"></i> Скачать баннер</button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="v-300">
                                            <div class="row">
                                                <div class="promo_img">
                                                    <img src="https://motormoney.org/pic/MM-300.gif">
                                                </div>
                                                <div class="col-md-6">
                                                    <span class="label label-default promo_label1">Ссылка на баннер:</span>
                                                    <div class="form-group"><input value="https://motormoney.org/pic/MM-300.gif" onclick="this.select()" class="form-control promo_input" type="text"></div>
                                                </div>
                                                <div class="col-md-6">
                                                <span class="label label-default promo_label2">Размер баннера: 269кб</span>
                                                    <a href="https://motormoney.org/pic/MM-300.gif" download=""><button type="button" class="btn btn-primary btn-block promo_btn"><i class="fa fa-download"></i> Скачать баннер</button></a>
                                                </div>
												<div class="col-md-12">
													<div class="promo_dev"></div>
												</div>
												<div class="col-md-12">
                                                    <div class="promo_img">
                                                        <img src="https://motormoney.org/pic/new-MM-300.gif">
                                                    </div>
												</div>
                                                <div class="col-md-6">
                                                    <span class="label label-default promo_label1">Ссылка на баннер:</span>
                                                    <div class="form-group"><input value="https://motormoney.org/pic/new-MM-300.gif" onclick="this.select()" class="form-control promo_input" type="text"></div>
                                                </div>
                                                <div class="col-md-6">
                                                <span class="label label-default promo_label2">Размер баннера: 267кб</span>
                                                    <a href="https://motormoney.org/pic/new-MM-300.gif" download=""><button type="button" class="btn btn-primary btn-block promo_btn"><i class="fa fa-download"></i> Скачать баннер</button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="v-250">
                                            <div class="row">
                                                <div class="promo_img">
                                                    <img src="https://motormoney.org/pic/MM-250.gif">
                                                </div>
                                                <div class="col-md-6">
                                                    <span class="label label-default promo_label1">Ссылка на баннер:</span>
                                                    <div class="form-group"><input value="https://motormoney.org/pic/MM-250.gif" onclick="this.select()" class="form-control promo_input" type="text"></div>
                                                </div>
                                                <div class="col-md-6">
                                                <span class="label label-default promo_label2">Размер баннера: 277кб</span>
                                                    <a href="https://motormoney.org/pic/MM-250.gif" download=""><button type="button" class="btn btn-primary btn-block promo_btn"><i class="fa fa-download"></i> Скачать баннер</button></a>
                                                </div>
												<div class="col-md-12">
													<div class="promo_dev"></div>
												</div>
												<div class="col-md-12">
                                                    <div class="promo_img">
                                                        <img src="https://motormoney.org/pic/new-MM-250.gif">
                                                    </div>
												</div>
                                                <div class="col-md-6">
                                                    <span class="label label-default promo_label1">Ссылка на баннер:</span>
                                                    <div class="form-group"><input value="https://motormoney.org/pic/new-MM-250.gif" onclick="this.select()" class="form-control promo_input" type="text"></div>
                                                </div>
                                                <div class="col-md-6">
                                                <span class="label label-default promo_label2">Размер баннера: 236кб</span>
                                                    <a href="https://motormoney.org/pic/new-MM-250.gif" download=""><button type="button" class="btn btn-primary btn-block promo_btn"><i class="fa fa-download"></i> Скачать баннер</button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="v-200">
                                            <div class="row">
                                                <div class="promo_img">
                                                    <img src="https://motormoney.org/pic/MM-200.gif">
                                                </div>
                                                <div class="col-md-6">
                                                    <span class="label label-default promo_label1">Ссылка на баннер:</span>
                                                    <div class="form-group"><input value="https://motormoney.org/pic/MM-200.gif" onclick="this.select()" class="form-control promo_input" type="text"></div>
                                                </div>
                                                <div class="col-md-6">
                                                <span class="label label-default promo_label2">Размер баннера: 200кб</span>
                                                    <a href="https://motormoney.org/pic/MM-200.gif" download=""><button type="button" class="btn btn-primary btn-block promo_btn"><i class="fa fa-download"></i> Скачать баннер</button></a>
                                                </div>
												<div class="col-md-12">
													<div class="promo_dev"></div>
												</div>
												<div class="col-md-12">
                                                    <div class="promo_img">
                                                        <img src="https://motormoney.org/pic/new-MM-200.gif">
                                                    </div>
												</div>
                                                <div class="col-md-6">
                                                    <span class="label label-default promo_label1">Ссылка на баннер:</span>
                                                    <div class="form-group"><input value="https://motormoney.org/pic/new-MM-200.gif" onclick="this.select()" class="form-control promo_input" type="text"></div>
                                                </div>
                                                <div class="col-md-6">
                                                <span class="label label-default promo_label2">Размер баннера: 171кб</span>
                                                    <a href="https://motormoney.org/pic/new-MM-200.gif" download=""><button type="button" class="btn btn-primary btn-block promo_btn"><i class="fa fa-download"></i> Скачать баннер</button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="v-125">
                                            <div class="row">
                                                <div class="promo_img">
                                                    <img src="https://motormoney.org/pic/MM-125.gif">
                                                </div>
                                                <div class="col-md-6">
                                                    <span class="label label-default promo_label1">Ссылка на баннер:</span>
                                                    <div class="form-group"><input value="https://motormoney.org/pic/MM-125.gif" onclick="this.select()" class="form-control promo_input" type="text"></div>
                                                </div>
                                                <div class="col-md-6">
                                                <span class="label label-default promo_label2">Размер баннера: 122кб</span>
                                                    <a href="https://motormoney.org/pic/MM-125.gif" download=""><button type="button" class="btn btn-primary btn-block promo_btn"><i class="fa fa-download"></i> Скачать баннер</button></a>
                                                </div>
												<div class="col-md-12">
													<div class="promo_dev"></div>
												</div>
												<div class="col-md-12">
                                                    <div class="promo_img">
                                                        <img src="https://motormoney.org/pic/new-MM-125.gif">
                                                    </div>
												</div>
                                                <div class="col-md-6">
                                                    <span class="label label-default promo_label1">Ссылка на баннер:</span>
                                                    <div class="form-group"><input value="https://motormoney.org/pic/new-MM-125.gif" onclick="this.select()" class="form-control promo_input" type="text"></div>
                                                </div>
                                                <div class="col-md-6">
                                                <span class="label label-default promo_label2">Размер баннера: 93кб</span>
                                                    <a href="https://motormoney.org/pic/new-MM-125.gif" download=""><button type="button" class="btn btn-primary btn-block promo_btn"><i class="fa fa-download"></i> Скачать баннер</button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="v-100">
                                            <div class="row">
                                                <div class="promo_img">
                                                    <img src="https://motormoney.org/pic/MM-100.gif">
                                                </div>
                                                <div class="col-md-6">
                                                    <span class="label label-default promo_label1">Ссылка на баннер:</span>
                                                    <div class="form-group"><input value="https://motormoney.org/pic/MM-100.gif" onclick="this.select()" class="form-control promo_input" type="text"></div>
                                                </div>
                                                <div class="col-md-6">
                                                <span class="label label-default promo_label2">Размер баннера: 103кб</span>
                                                    <a href="https://motormoney.org/pic/MM-100.gif" download=""><button type="button" class="btn btn-primary btn-block promo_btn"><i class="fa fa-download"></i> Скачать баннер</button></a>
                                                </div>
												<div class="col-md-12">
													<div class="promo_dev"></div>
												</div>
												<div class="col-md-12">
                                                    <div class="promo_img">
                                                        <img src="https://motormoney.org/pic/new-MM-100.gif">
                                                    </div>
												</div>
                                                <div class="col-md-6">
                                                    <span class="label label-default promo_label1">Ссылка на баннер:</span>
                                                    <div class="form-group"><input value="https://motormoney.org/pic/new-MM-100.gif" onclick="this.select()" class="form-control promo_input" type="text"></div>
                                                </div>
                                                <div class="col-md-6">
                                                <span class="label label-default promo_label2">Размер баннера: 127кб</span>
                                                    <a href="https://motormoney.org/pic/new-MM-100.gif" download=""><button type="button" class="btn btn-primary btn-block promo_btn"><i class="fa fa-download"></i> Скачать баннер</button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="v-88">
                                            <div class="row">
												<div class="col-md-12">
                                                    <div class="promo_img">
                                                        <img src="https://motormoney.org/pic/new-MM-88.gif">
                                                    </div>
												</div>
                                                <div class="col-md-6">
                                                    <span class="label label-default promo_label1">Ссылка на баннер:</span>
                                                    <div class="form-group"><input value="https://motormoney.org/pic/new-MM-88.gif" onclick="this.select()" class="form-control promo_input" type="text"></div>
                                                </div>
                                                <div class="col-md-6">
                                                <span class="label label-default promo_label2">Размер баннера: 28кб</span>
                                                    <a href="https://motormoney.org/pic/new-MM-88.gif" download=""><button type="button" class="btn btn-primary btn-block promo_btn"><i class="fa fa-download"></i> Скачать баннер</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->


    </div><!-- container -->


</div>