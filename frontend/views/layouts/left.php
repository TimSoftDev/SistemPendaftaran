<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?php $menu = [
            ['label' => 'Main Menu', 'options' => ['class' => 'header']],
        ];

            if (Yii::$app->user->isGuest) {                        
                $menu[] = ['label' => 'Home', 'icon' => 'fa fa-home', 'url' => ['/']];
                $menu[] = ['label' => 'Signup', 'icon' => 'fa fa-user', 'url' => ['/site/signup']];
                $menu[] = ['label' => 'Sign In', 'icon' => 'fa fa-sign-in', 'url' => ['/site/login']];
            } else {
                $menu[] = ['label' => 'Dasboard', 'icon' => 'fa fa-dashboard', 'url' => ['/']];
                $menu[] = ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']];
                $menu[] = ['label' => 'Debug', 'icon' => 'fa fa-wrench', 'url' => ['/debug']];
                $menu[] =
                    [
                        'label' => 'Info Terbaru</span><span class="pull-right-container"><small class="label pull-right bg-yellow">100</small>',
                        'icon' => 'fa fa fa-envelope-o',
                        'url' => ['/'],
                        'encode' => false,
                    ];
                $menu[] =
                    [
                        'label' => 'Info Terbaru</span><span class="pull-right-container"><small class="label pull-right bg-aqua">100</small><small class="label pull-right bg-red">100</small>',
                        'icon' => 'fa fa fa-instagram',
                        'url' => ['/'],
                        'encode' => false,
                    ];
            }

        ?>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => $menu,
            ]
        ) ?>

    </section>

</aside>
