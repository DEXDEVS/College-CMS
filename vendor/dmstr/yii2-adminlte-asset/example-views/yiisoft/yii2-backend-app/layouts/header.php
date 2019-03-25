<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<?php 

    $userID = Yii::$app->user->id;
    $user = Yii::$app->db->createCommand("SELECT user_photo FROM user WHERE id = $userID")->queryAll();
    // Student Photo...
    $userPhoto = $user[0]['user_photo'];
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini"><b>IC</b></span><span class="logo-lg">' . "<b>Institute on Cloud</b>" . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu invisible">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">4</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 4 messages</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li><!-- start message -->
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle"
                                                 alt="User Image"/>
                                        </div>
                                        <h4>
                                            Support Team
                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <!-- end message -->
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="<?= $directoryAsset ?>/img/user3-128x128.jpg" class="img-circle"
                                                 alt="user image"/>
                                        </div>
                                        <h4>
                                            AdminLTE Design Team
                                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="<?= $directoryAsset ?>/img/user4-128x128.jpg" class="img-circle"
                                                 alt="user image"/>
                                        </div>
                                        <h4>
                                            Developers
                                            <small><i class="fa fa-clock-o"></i> Today</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="<?= $directoryAsset ?>/img/user3-128x128.jpg" class="img-circle"
                                                 alt="user image"/>
                                        </div>
                                        <h4>
                                            Sales Department
                                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="<?= $directoryAsset ?>/img/user4-128x128.jpg" class="img-circle"
                                                 alt="user image"/>
                                        </div>
                                        <h4>
                                            Reviewers
                                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">See All Messages</a></li>
                    </ul>
                </li>
                <li class="dropdown notifications-menu invisible">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">10</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 10 notifications</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-warning text-yellow"></i> Very long description here that may
                                        not fit into the page and may cause design problems
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-red"></i> 5 new members joined
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-user text-red"></i> You changed your username
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                    </ul>
                </li>
                <!-- Tasks: style can be found in dropdown.less -->
                <li class="tasks-menu invisible">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-th"></i>
                        <!-- <span class="label label-danger">9</span> -->
                    </a>
                    <ul class="dropdown-menu" style="width: 340px; height: 400px;">
                        <li class="header"><p align="center"><b>Menus</b></p></li>
                        
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li style="list-style: none;">
                                    <a href="index.php?r=site/system-settings" class="btn btn-sm">
                                        <i class="fa fa-cog fa-2x"></i>
                                           <h5>System<br>Settings</h5>
                                    </a>
                                    <a href="index.php?r=site/system-configuration" class="btn btn-sm">
                                        <i class="fa fa-cogs fa-2x"></i>
                                           <h5>System<br>Configuration</h5>
                                    </a>

                                    <a href="index.php?r=site/students" class="btn btn-sm">
                                        <i class="fa fa-users fa-2x"></i>
                                           <h5>Student</h5>
                                    </a>
                                </li>

                                <li style="list-style: none;">
                                    <a href="index.php?r=site/employees" class="btn btn-sm">
                                        <i class="fa fa-user fa-2x"></i>
                                           <h5>Employee</h5>
                                    </a>
                                    <a href="index.php?r=site/communication" class="btn btn-sm">
                                        <i class="fa fa-comments fa-2x"></i>
                                           <h5>Communication</h5>
                                    </a>
                                    <a href="index.php?r=site/fee" class="btn btn-sm">
                                        <i class="fa fa-credit-card fa-2x"></i>
                                           <h5>Fee</h5>
                                    </a>

                                    
                                </li>
                                
                
                                <!-- end task item -->
                            </ul>
                        <!-- <li class="footer">
                            <a href="#">View all tasks</a>
                        </li> -->
                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo '../frontend/web/'.$userPhoto; ?>" class="user-image" alt="User Image"/>
                        <span class="hidden-xs">
                            <!--  -->
                            <?= Yii::$app->user->identity->username ?>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header" style="height: 200px">
                            <img src="<?php echo '../frontend/web/'.$userPhoto; ?>" class="img-circle"
                                 alt="User Image"/>
                            <p>
                                <label for="">Contact Info</label><br>
                                <?= Yii::$app->user->identity->email ?>
                                <label for="">Designation: </label> <?= Yii::$app->user->identity->user_type ?><br>
                                
                                
                                <!-- user_phone_no -->

                                <!-- email -->
                                <!-- - Web Developer
                                <small>Member since Nov. 2012</small> -->
                            </p>
                        </li><hr>
                        <!-- Menu Body -->
                        <!-- <li class="user-body">
                            <div class="col-xs-12 text-center">
                                <label for="">User Name</label>
                                <a href="#"></a>
                            </div>
                        </li>
                        <li class="user-body">    
                            <div class="col-xs-12 text-center">
                                <label for="">Email</label>
                                <a href="#"></a>
                            </div>
                        </li> -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-primary btn-flat btn-sm">Profile</a>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    'Sign out',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-danger btn-flat btn-sm']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <!-- <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li> -->
            </ul>
        </div>
    </nav>
</header>
