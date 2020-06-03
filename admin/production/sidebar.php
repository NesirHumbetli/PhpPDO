 <!-- sidebar menu -->
 <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
     <div class="menu_section">
         <h3><?php
                if ($userfetch['user_yetki'] == 5) {
                    echo "Vəzifə: İdarəçi";
                } elseif ($userfetch['user_yetki'] != 5) {
                    echo "Vəzifə: İstifadəçi";
                }
                ?></h3>
         <ul class="nav side-menu">
             <li><a href="index.php"><i class="fa fa-home"></i>Ana səhifə<span class="label label-success pull-right"></span></a></li>
             <li><a href="haqqimizda.php"><i class="fa fa-book"></i>Haqqımızda<span class="label label-success pull-right"></span></a></li>
             <li><a href="slider.php"><i class="fa fa-image"></i>Slider<span class="label label-success pull-right"></span></a></li>
             <li><a href="menu.php"><i class="fa fa-list"></i>Menu<span class="label label-success pull-right"></span></a></li>
             <li><a href="emlak.php"><i class="fa fa-home"></i>Əmlak<span class="label label-success pull-right"></span></a></li>
             <li><a href="mezmun.php"><i class="fa fa-file-text"></i>Məzmun<span class="label label-success pull-right"></span></a></li>
             <li><a><i class="fa fa-cog"></i>Parametrlər <span class="fa fa-chevron-down"></span></a>
                 <ul class="nav child_menu">
                     <li><a href="genel-ayar.php">Ümumi Parametrlər</a></li>
                     <li><a href="elaqe-ayar.php">Əlaqə Parametrləri</a></li>
                     <li><a href="api-ayar.php">Api Parametrləri</a></li>
                     <li><a href="sosial-ayar.php">Sosial Şəbəkə Parametrləri</a></li>
                     <li><a href="mail-ayar.php">Mail Parametrləri</a></li>
                 </ul>
             </li>

         </ul>
     </div>


 </div>
 <!-- /sidebar menu -->