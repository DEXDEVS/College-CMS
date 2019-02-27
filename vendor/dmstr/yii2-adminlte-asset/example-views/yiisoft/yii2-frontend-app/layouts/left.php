<?php 
    // $userID = Yii::$app->user->id;
    // $user = Yii::$app->db->createCommand("SELECT user_photo FROM user WHERE id = $userID")->queryAll();
    // // Student Photo...
    // $userPhoto = $user[0]['user_photo'];
?>
<aside class="main-sidebar">
    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php // echo $userPhoto ?>uploads/anasshafqat_photo.jpeg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>
                    <?php // Yii::$app->user->identity->username;  ?>
                    <!--  -->
                </p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menus', 'options' => ['class' => 'header center']],
                    ['label' => 'Home', 'icon' => 'dashboard', 'url' => ["./home"]],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Login', 'url' => ['./login'], 'visible' => Yii::$app->user->isGuest],
                    // ------------------------------------------------
                    // Student Attendance start...
                    [
                        'label' => 'Attendance',
                        'icon' => 'user-plus',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Student Attendance', 'icon' => 'caret-right', 'url' => ["./attendance"],],
                            ['label' => 'View Class Attendance', 'icon' => 'caret-right', 'url' => ["./class-attendance"],]
                        ],
                    ],
                    // ------------------------------------------------
                    // Student Attendance end...
                    // ------------------------------------------------
                    // System Sesstings start...
                    // [
                    //     'label' => 'System Settings',
                    //     'icon' => 'cog',
                    //     'url' => '#',
                    //     'items' => [
                    //         ['label' => 'Class Name', 'icon' => 'caret-right', 'url' => 'index.php?r=std-class-name',],
                    //         ['label' => 'Subjects', 'icon' => 'caret-right', 'url' => 'index.php?r=subjects',],
                    //         ['label' => 'Subjects Combination', 'icon' => 'caret-right', 'url' => 'index.php?r=std-subjects',],
                    //         ['label' => 'Employee Designation', 'icon' => 'caret-right', 'url' => 'index.php?r=emp-designation',],
                    //         ['label' => 'Employee Type', 'icon' => 'caret-right', 'url' => 'index.php?r=emp-type',],
                    //         ['label' => 'Fee Type', 'icon' => 'caret-right', 'url' => 'index.php?r=fee-type',],
                    //         ['label' => 'Fee Packages', 'icon' => 'caret-right', 'url' => 'index.php?r=std-fee-pkg',],
                    //     ],
                    // ],
                    // System Settings close...
                    // ------------------------------------------------
                    // System Configuration start...
                    // [
                    //     'label' => 'System Configuration',
                    //     'icon' => 'cogs',
                    //     'url' => '#',
                    //     'items' => [
                    //         ['label' => 'Institute', 'icon' => 'caret-right', 'url' => 'index.php?r=institute',],
                    //         ['label' => 'Branches', 'icon' => 'caret-right', 'url' => 'index.php?r=branches',],
                    //         ['label' => 'Sessions', 'icon' => 'caret-right', 'url' => 'index.php?r=std-sessions',],
                    //         ['label' => 'Sections', 'icon' => 'caret-right', 'url' => 'index.php?r=std-sections',],
                    //         ['label' => 'Class', 'icon' => 'caret-right', 'url' => 'index.php?r=std-class',],
                    //         ['label' => 'Students Enrolment', 'icon' => 'caret-right', 'url' => 'index.php?r=std-enrollment-detail',],
                    //         ['label' => 'Assign Teacher', 'icon' => 'caret-right', 'url' => 'index.php?r=teacher-subject-assign-detail',],
                    //     ],
                    // ],
                    // System Configuration close...
                    // ------------------------------------------------
                    // Student Registration start...
                    // [
                    //     'label' => 'Student Registration',
                    //     'icon' => 'users',
                    //     'url' => '#',
                    //     'items' => [
                    //         ['label' => 'Student Personal Info', 'icon' => 'caret-right', 'url' => 'index.php?r=std-personal-info',],
                    //         ['label' => 'Student Guardian Info', 'icon' => 'caret-right', 'url' => 'index.php?r=std-guardian-info',],
                    //         ['label' => 'Student Academic Info', 'icon' => 'caret-right', 'url' => 'index.php?r=std-academic-info',],
                    //         ['label' => 'Student Fee Details', 'icon' => 'caret-right', 'url' => 'index.php?r=std-fee-details',],
                    //     ],
                    // ],
                    // Student Registration close...
                    // ------------------------------------------------
                    // Employee Registration start...
                    // [
                    //     'label' => 'Employee Registration',
                    //     'icon' => 'user-plus',
                    //     'url' => '#',
                    //     'items' => [
                    //         ['label' => 'Employee Personal Info', 'icon' => 'caret-right', 'url' => 'index.php?r=emp-info',],
                    //         ['label' => 'Employee Reference', 'icon' => 'caret-right', 'url' => 'index.php?r=emp-reference',]
                    //     ],
                    // ],
                    // ------------------------------------------------
                    // Employee Registration close...
                    // ------------------------------------------------
                    // Fee Registration start...
                    // [
                    //     'label' => 'Fee Voucher',
                    //     'icon' => 'credit-card',
                    //     'url' => '#',
                    //     'items' => [
                    //         ['label' => 'Manage Fee Vouchers', 'icon' => 'caret-right', 'url' => 'index.php?r=fee-transaction-detail',],
                    //         ['label' => 'Manage Class Fee Accounts', 'icon' => 'caret-right', 'url' => 'index.php?r=fee-transaction-detail/class-account'],
                    //         ['label' => 'Generate Student Vouchers', 'icon' => 'caret-right', 'url' => 'index.php?r=fee-transaction-detail/fee-voucher'],
                    //         ['label' => 'Collect Student Vouchers', 'icon' => 'caret-right', 'url' => 'index.php?r=fee-transaction-detail/collect-voucher']
                    //     ],
                    // ],
                    // ------------------------------------------------
                    // Fee Registration close...
                    // ------------------------------------------------
                    // Msg of Day start...
                    // [
                    //     'label' => 'Communications',
                    //     'icon' => 'comments',
                    //     'url' => '#',
                    //     'items' => [
                    //         ['label' => 'Message Management', 'icon' => 'caret-right', 'url' => 'index.php?r=msg-of-day'],
                    //         ['label' => 'Events Management', 'icon' => 'caret-right', 'url' => 'index.php?r=events'],
                    //         ['label' => 'Notice Management', 'icon' => 'caret-right', 'url' => 'index.php?r=notice'],
                    //     ],
                    // ],
                    // ------------------------------------------------
                    // Msg of Day close...
                    // ------------------------------------------------
                    // SMS start...
                    // [
                    //     'label' => 'SMS',
                    //     'icon' => 'comments-o',
                    //     'url' => '#',
                    //     'items' => [
                    //         ['label' => 'SMS Templates', 'icon' => 'caret-right', 'url' => 'index.php?r=sms',],
                    //         ['label' => 'Absent Students SMS', 'icon' => 'caret-right', 'url' => 'index.php?r=sms/absent-sms',],
                            
                    //         // ['label' => 'Fee Transaction Details', 'icon' => 'caret-right', 'url' => 'index.php?r=fee-transaction-detail',]
                    //     ],
                    // ],
                    // ------------------------------------------------
                    // SMS close...
                    // ------------------------------------------------
                    // Email start...
                    // [
                    //     'label' => 'Email',
                    //     'icon' => 'envelope-o',
                    //     'url' => 'index.php?r=emails',
                    // ],
                    // ------------------------------------------------
                    // Email close...
                    // ------------------------------------------------

                    // Calender start...
                    // ['label' => 'Calendar', 'icon' => 'calendar', 'url' => 'index.php?r=site/calendar'],
                    // ------------------------------------------------
                    // Calender close...



                    // ------------------------------------------------
                    // Multilevel Dropdown....!
                    // [
                    //     'label' => 'Some tools',
                    //     'icon' => 'share',
                    //     'url' => '#',
                    //     'items' => [
                    //         ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                    //         ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                    //         [
                    //             'label' => 'Level One',
                    //             'icon' => 'circle-o',
                    //             'url' => '#',
                    //             'items' => [
                    //                 ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                    //                 [
                    //                     'label' => 'Level Two',
                    //                     'icon' => 'circle-o',
                    //                     'url' => '#',
                    //                     'items' => [
                    //                         ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                    //                         ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                    //                     ],
                    //                 ],
                    //             ],
                    //         ],
                    //     ],
                    // ],
                ],
            ]
        ) ?>

    </section>

</aside>
