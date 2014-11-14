<div id="sidebar" class="navbar-collapse collapse">
    <ul class="nav nav-list">
        <?php if (is_admin()) { ?>
            <!--<li class="active"> HIGHLIGHTS MENU-->

            <li class="<?php echo is_active_menu('admin/index'); ?>">

                <a href="<?php echo site_url('admin/index'); ?>">

                    <i class="fa fa-dashboard"></i>

                    <span>داشبورد</span>

                </a>

            </li>



            <li class="<?php echo is_active_menu('admin/themes'); ?>">

                <a href="<?php echo site_url('admin/themes'); ?>">

                    <i class="fa fa-desktop"></i>

                    <span>پوسته ها</span>

                </a>

            </li>


        <?php } ?>
        <li class="<?php echo is_active_menu('admin/realestate/'); ?>">

            <a href="#" class="dropdown-toggle">

                <i class="fa fa-plus-circle"></i>

                <span>املاک و مستغلات</span>

                <b class="arrow fa fa-angle-right"></b>

            </a>

            <ul class="submenu">

                <?php if (is_admin()) { ?>
                    <li class="<?php echo is_active_menu('admin/realestate/allestates'); ?>"><a href="<?php echo site_url('admin/realestate/allestates'); ?>">

                            تمامی املاک

                        </a>

                    </li>
                <?php } else { ?>
                    <li class="<?php echo is_active_menu('admin/realestate/allestatesagent'); ?>"><a href="<?php echo site_url('admin/realestate/allestatesagent'); ?>">

                            تمامی املاک

                        </a>

                    </li>
                    <li class="<?php echo is_active_menu('account/renew'); ?>">
                        <a href="<?php echo site_url('account/renew'); ?>">
                            <?php echo 'تغییر پکیج'; ?>
                        </a>
                    </li>
                <?php } ?>
                <li class="<?php echo is_active_menu('admin/realestate/newestate'); ?>"><a href="<?php echo site_url('admin/realestate/newestate'); ?>">

                        ملک جدید

                    </a>

                </li>

                  <!--li class="<?php echo is_active_menu('admin/realestate/activeposts'); ?>"><a href="<?php echo site_url('admin/realestate/activeposts'); ?>">

                          Active estates

                      </a>

                  </li>


                  <li class="<?php echo is_active_menu('admin/realestate/pendingposts'); ?>"><a href="<?php echo site_url('admin/realestate/pendingposts'); ?>">

                          Pending estates

                      </a>

                  </li>

                  <li class="<?php echo is_active_menu('admin/realestate/allreported'); ?>"><a href="<?php echo site_url('admin/realestate/allreported'); ?>">

                          Reported estates

                      </a>

                  </li-->




                <?php if (is_admin()) { ?>

                    <li class="<?php echo is_active_menu('admin/realestate/locations'); ?>"><a href="<?php echo site_url('admin/realestate/locations'); ?>">

                            مناطق

                        </a>

                    </li>


                    <li class="<?php echo is_active_menu('admin/realestate/facilities'); ?>"><a href="<?php echo site_url('admin/realestate/facilities'); ?>">

                            امکانات

                        </a>

                    </li>

                    <li class="<?php echo is_active_menu('admin/realestate/realestatesettings'); ?>"><a href="<?php echo site_url('admin/realestate/realestatesettings'); ?>">

                            تنظیمات سایت

                        </a>

                    </li>

                    <li class="hidden <?php echo is_active_menu('admin/realestate/paypalsettings'); ?>"><a href="<?php echo site_url('admin/realestate/paypalsettings'); ?>">

                            Paypal Settings

                        </a>

                    </li>

                    <li class="hidden <?php echo is_active_menu('admin/realestate/payments'); ?>"><a href="<?php echo site_url('admin/realestate/payments'); ?>">

                            Payment history

                        </a>

                    </li>

                    <li class="<?php echo is_active_menu('admin/realestate/bannersettings'); ?>"><a href="<?php echo site_url('admin/realestate/bannersettings'); ?>">

                            تنظیمات سایت بنگاه

                        </a>

                    </li>

                <?php } ?>
            </ul>

        </li>


        <!--<li class="active"> OPENS SUBMENU BY DEFAULT-->

        <li class="<?php echo is_active_menu('admin/phone'); ?>">

            <a href="#" class="dropdown-toggle">

                <i class="fa fa-cog"></i>

                <span>آگاه ساز</span>

                <b class="arrow fa fa-angle-right"></b>

            </a>

            <ul class="submenu">

                <!--<li class="active"> HIGHLIGHTS SUBMENU-->

                <li class="<?php echo is_active_menu('admin/phone/add'); ?>"><a href="<?php echo site_url('admin/phone/add'); ?>">افزودن</a></li>

                <li class="<?php echo is_active_menu('admin/phone/lists'); ?>"><a href="<?php echo site_url('admin/phone/lists'); ?>">لیست شماره ها</a></li>

                <li class="<?php echo is_active_menu('admin/phone/settings'); ?>"><a href="<?php echo site_url('admin/phone/settings'); ?>">تنظیمات ارسال</a></li>

                <li class="<?php echo is_active_menu('admin/phone/sent'); ?>"><a href="<?php echo site_url('admin/phone/sent'); ?>">پیام های ارسالی</a></li>
            </ul>

        </li>


        <li class="<?php echo is_active_menu('admin/editprofile'); ?>">

            <a href="<?php echo site_url('admin/editprofile'); ?>">

                <i class="fa fa-user"></i>

                <span>پروفایل</span>

            </a>

        </li>

        <?php if (is_admin()) { ?>

            <li class="<?php echo is_active_menu('admin/package/'); ?>">

                <a href="#" class="dropdown-toggle">

                    <i class="fa fa-bars"></i>

                    <span>بسته ها</span>

                    <b class="arrow fa fa-angle-right"></b>

                </a>

                <ul class="submenu">

                    <li class="<?php echo is_active_menu('admin/package/all'); ?>"><a href="<?php echo site_url('admin/package/all'); ?>">

                            تمامی بسته ها

                        </a>

                    </li>
                    <?php $urls = array('admin/package/addpackage', 'admin/package/newpackage'); ?>
                    <li class="<?php echo is_active_menu($urls); ?>"><a href="<?php echo site_url('admin/package/newpackage'); ?>">

                            بسته جدید

                        </a>

                    </li>

                </ul>
            </li>


            <li class="<?php echo is_active_menu('admin/users'); ?>">

                <a href="<?php echo site_url('admin/users'); ?>">

                    <i class="fa fa-users"></i>

                    <span>آژانس ها</span>

                </a>

            </li>



            <li class="<?php echo is_active_menu('admin/widgets/'); ?>">

                <a href="#" class="dropdown-toggle">

                    <i class="fa fa-bars"></i>

                    <span>ویجت</span>

                    <b class="arrow fa fa-angle-right"></b>

                </a>

                <ul class="submenu">

                    <li class="<?php echo is_active_menu('admin/widgets/all'); ?>"><a href="<?php echo site_url('admin/widgets/all'); ?>">

                            تمامی ویجت ها

                        </a>

                    </li>

                    <li class="<?php echo is_active_menu('admin/widgets/widgetpositions'); ?>"><a href="<?php echo site_url('admin/widgets/widgetpositions'); ?>">

                            موقعیت  ویجت ها

                        </a>

                    </li>

                </ul>



            </li>



<!--            <li class="<?php echo is_active_menu('admin/plugins/all'); ?>">

                <a href="#" class="dropdown-toggle">

                    <i class="fa fa-code-fork"></i>

                    <span>افزودنی ها</span>

                    <b class="arrow fa fa-angle-right"></b>

                </a>

                <ul class="submenu">

                    <li class="<?php echo is_active_menu('admin/plugins/all'); ?>"><a href="<?php echo site_url('admin/plugins/all'); ?>">تمامی افزونه ها</a></li>

                    <?php $plugins = get_plugins(); ?>

                    <?php
                    foreach ($plugins->result() as $row) {

                        $plugin = json_decode($row->plugin);
                        ?>

                        <li><a href="<?php echo site_url($plugin->access_url); ?>"><?php echo $plugin->name; ?></a></li>

                    <?php } ?>

                </ul>

            </li>-->



<!--            <li class="<?php echo is_active_menu('admin/plugins/index'); ?>">

                <a href="<?php echo site_url('admin/plugins/index'); ?>">

                    <i class="fa fa-cloud-upload"></i>

                    <span>ارسال</span>

                </a>

            </li>-->



            <!--<li class="active"> OPENS SUBMENU BY DEFAULT-->

            <li class="<?php echo is_active_menu('admin/page/'); ?>">

                <a href="#" class="dropdown-toggle">

                    <i class="fa fa-file-o"></i>

                    <span>صفحات و منو ها</span>

                    <b class="arrow fa fa-angle-right"></b>

                </a>

                <ul class="submenu">

                    <!--<li class="active"> HIGHLIGHTS SUBMENU-->

                    <li class="<?php echo is_active_menu('admin/page/all'); ?>"><a href="<?php echo site_url('admin/page/all'); ?>">تمامی صفحات</a></li>

                    <li class="<?php echo is_active_menu('admin/page/index'); ?>"><a href="<?php echo site_url('admin/page/index'); ?>">صفحه جدید</a></li>

                    <li class="<?php echo is_active_menu('admin/page/menu'); ?>"><a href="<?php echo site_url('admin/page/menu'); ?>">منو</a></li>

                </ul>

            </li>


            <!--<li class="active"> OPENS SUBMENU BY DEFAULT-->

            <li class="<?php echo is_active_menu('admin/system'); ?>">

                <a href="#" class="dropdown-toggle">

                    <i class="fa fa-cog"></i>

                    <span>سیستم</span>

                    <b class="arrow fa fa-angle-right"></b>

                </a>

                <ul class="submenu">

                    <!--<li class="active"> HIGHLIGHTS SUBMENU-->

                    <li class="<?php echo is_active_menu('admin/system/allbackups'); ?>"><a href="<?php echo site_url('admin/system/allbackups'); ?>">مدیریت پشتیبان</a></li>

                                                              <!--li class="<?php echo is_active_menu('admin/system/newlang'); ?>"><a href="<?php echo site_url('admin/system/newlang'); ?>">زبان جدید</a></li-->

                    <li class="<?php echo is_active_menu('admin/system/editlang'); ?>"><a href="<?php echo site_url('admin/system/editlang'); ?>">مدیریت زبان</a></li>

                    <li class="hidden <?php echo is_active_menu('admin/system/translate'); ?>"><a href="<?php echo site_url('admin/system/translate'); ?>">ترجمه اتومانیک</a></li>

                    <li class="<?php echo is_active_menu('admin/system/emailtmpl'); ?>"><a href="<?php echo site_url('admin/system/emailtmpl'); ?>">تنظیمات ارسال ایمیل</a></li>

                    <li class="<?php echo is_active_menu('admin/system/sitesettings'); ?>"><a href="<?php echo site_url('admin/system/sitesettings'); ?>">تنظیمات سایت</a></li>                      

                    <li class="<?php echo is_active_menu('admin/system/settings'); ?>"><a href="<?php echo site_url('admin/system/settings'); ?>">تنظیمات بخش مدیریت</a></li>                    

                </ul>

            </li>

        <?php } ?>



    </ul>

    <div id="sidebar-collapse" class="visible-lg">

        <i class="fa fa-angle-double-left"></i>

    </div>

</div>