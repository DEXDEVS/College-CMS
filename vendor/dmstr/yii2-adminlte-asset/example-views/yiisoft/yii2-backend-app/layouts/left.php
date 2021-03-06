<?php 

    $userID = Yii::$app->user->id;
    $user = Yii::$app->db->createCommand("SELECT user_photo FROM user WHERE id = $userID")->queryAll();
    // Student Photo...
    $userPhoto = $user[0]['user_photo'];
    // echo $userPhoto;  
?>
<aside class="main-sidebar">

    <section class="sidebar" style="overflow-y: visible;">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo '../frontend/web/'.$userPhoto; ?>" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>
                    <?= Yii::$app->user->identity->username ?>
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
                <?= Yii::$app->user->identity->email ?>
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <?php if(Yii::$app->user->can('navigation')){ ?>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menus', 'options' => ['class' => 'header center']],
                    ['label' => 'Home', 'icon' => 'dashboard', 'url' => "./home"],
                    //['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Login', 'url' => ["../login"], 'visible' => Yii::$app->user->isGuest],
                    // Student Module start...
                    [
                        'label' => 'Student Module',
                        'icon' => 'users',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Student Inquiry', 'icon' => 'caret-right', 'url' => ["/std-inquiry"],],
                            ['label' => 'Student Registration', 'icon' => 'caret-right', 'url' => ["/std-personal-info"],],
                            ['label' => 'Student Enrollment', 'icon' => 'caret-right', 'url' => ["/std-enrollment-head"],],
                            ['label' => 'Student Promotion', 'icon' => 'caret-right', 'url' => ["./std-promote"],],
                            
                            //['label' => 'Class', 'icon' => 'caret-right', 'url' => ["/std-class"],],
                            // ['label' => 'Students Enrolment', 'icon' => 'caret-right', 'url' => ["/std-enrollment-head"],],
                            // ['label' => 'Assign Teacher', 'icon' => 'caret-right', 'url' => ["/teacher-subject-assign-head"],],
                        ],
                    ],
                    // Student Module CLose...
                    // ------------------------------------------------
                    // Employee Registration start...
                    [
                        'label' => 'Employee Registration',
                        'icon' => 'user-plus',
                        'url' => ["/emp-info"],
                        'items' => [
                            //['label' => 'Employee Personal Info', 'icon' => 'caret-right', 'url' => 'index.php?r=emp-info',],
                            // ['label' => 'Employee Reference', 'icon' => 'caret-right', 'url' => 'index.php?r=emp-reference',]
                        ],
                    ],
                    // ------------------------------------------------
                    // Employee Registration close...
                    // ------------------------------------------------
                    // Assign Teacher start...
                    [
                        'label' => 'Assign Teacher',
                        'icon' => 'id-badge',
                        'url' => ["/teacher-subject-assign-head "],
                    ],
                    // Assign Teacher close...
                    // ------------------------------------------------
                    // ------------------------------------------------
                    // Fee Registration start...
                    [
                        'label' => 'Fee Module',
                        'icon' => 'credit-card',
                        'url' => '#',
                        'items' => [
                            //['label' => 'Manage Fee Vouchers', 'icon' => 'caret-right', 'url' => 'index.php?r=fee-transaction-detail',],
                            ['label' => 'Manage Class Fee Accounts', 'icon' => 'caret-right', 'url' => "./class-account"],
                            ['label' => 'Generate Student Vouchers', 'icon' => 'caret-right', 'url' => "./fee-transaction-detail-fee-voucher"],
                            ['label' => 'Collect Student Vouchers', 'icon' => 'caret-right', 'url' => "./fee-transaction-detail-collect-voucher"],
                             ['label' => 'Class Fee Report', 'icon' => 'caret-right', 'url' => "./fee-transaction-detail-class-account-fee-report"]
                        ],
                    ],
                    // ------------------------------------------------
                    // Fee Registration close...
                    // ------------------------------------------------
                    // Account Module start...
                    [
                        'label' => 'Account Module',
                        'icon' => 'credit-card',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Account Head', 'icon' => 'caret-right', 'url' => "./account-register"],
                            ['label' => 'Account Transaction', 'icon' => 'caret-right', 'url' => "./account-transactions"]
                        ],
                    ],
                    // ------------------------------------------------
                    // Account Module close...
                    // ------------------------------------------------
                    // Msg of Day start...
                    [
                        'label' => 'Communications',
                        'icon' => 'comments',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Message Management', 'icon' => 'caret-right', 'url' => "./msg-of-day"],
                            ['label' => 'Events Management', 'icon' => 'caret-right', 'url' => "./events"],
                            ['label' => 'Notice Management', 'icon' => 'caret-right', 'url' => "./notice"],
                        ],
                    ],
                    // ------------------------------------------------
                    // Msg of Day close...
                    // ------------------------------------------------
                    // SMS start...
                    [
                        'label' => 'SMS',
                        'icon' => 'comments-o',
                        'url' => '#',
                        'items' => [
                            ['label' => 'SMS Templates', 'icon' => 'caret-right', 'url' => "./sms",],
                            ['label' => 'Absent Students SMS', 'icon' => 'caret-right', 'url' => "./absent-sms",],
                            ['label' => 'Custom SMS', 'icon' => 'caret-right', 'url' => "./custom-sms",],
                            
                            // ['label' => 'Fee Transaction Details', 'icon' => 'caret-right', 'url' => 'index.php?r=fee-transaction-detail',]
                        ],
                    ],
                    // ------------------------------------------------
                    // SMS close...
                    // ------------------------------------------------
                    // Email start...
                    [
                        'label' => 'Email',
                        'icon' => 'envelope-o',
                        'url' => ["/emails"],
                    ],
                    // Email close...
                    // ------------------------------------------------
                    // Exams module start here
                    [
                        'label' => 'Exam Module',
                        'icon' => 'cog',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Grades', 'icon' => 'caret-right', 'url' => ["/grades"],],
                            ['label' => 'Exams Category', 'icon' => 'caret-right', 'url' => ["/exams-category"],],
                            ['label' => 'Exams Criteria', 'icon' => 'caret-right', 'url' => ["/exams-criteria"],],
                            ['label' => 'Exams Schedule', 'icon' => 'caret-right', 'url' => ["/exams-schedule"],],
                            ['label' => 'Manage Exams', 'icon' => 'caret-right', 'url' => ["/exams-schedule/manage-exams"],],
                            ['label' => 'Marks Weitage', 'icon' => 'caret-right', 'url' => ["/marks-weitage"],],
                        ],
                    ],
                    // Exams module close here
                    // ------------------------------------------------
                    // System Configuration start...
                    [
                        'label' => 'System Configurations',
                        'icon' => 'cogs',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Institute', 'icon' => 'caret-right', 'url' => ["/institute"],],
                            ['label' => 'Branches', 'icon' => 'caret-right', 'url' => ["/branches"],],
                            ['label' => 'Departments', 'icon' => 'caret-right', 'url' => ["/departments"],],
                            ['label' => 'Sessions', 'icon' => 'caret-right', 'url' => ["/std-sessions"],],
                            ['label' => 'Sections', 'icon' => 'caret-right', 'url' => ["/std-sections"],],
                            ['label' => 'Classes', 'icon' => 'caret-right', 'url' => ["/std-class-name"],],
                            [
                                'label' => 'Subjects',
                                'icon' => 'caret-right',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Subjects List', 'icon' => 'chevron-right', 'url' => './subjects',],
                                    ['label' => 'Subject Combination', 'icon' => 'chevron-right', 'url' => './std-subjects',],
                                ],
                            ],
                            [
                                'label' => 'Employees',
                                'icon' => 'caret-right',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Employee Type', 'icon' => 'chevron-right', 'url' => './emp-type',],
                                    ['label' => 'Employee Designation', 'icon' => 'chevron-right', 'url' => './emp-designation',],
                                ],
                            ],
                            [
                                'label' => 'Fee',
                                'icon' => 'caret-right',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Fee Types', 'icon' => 'chevron-right', 'url' => './fee-type',],
                                    ['label' => 'Fee Packages', 'icon' => 'chevron-right', 'url' => './std-fee-pkg',],
                                ],
                            ],
                        ],
                    ],
                    // System Configuration close...
                    // ------------------------------------------------
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
        <?php } ?>

        <!-- Inquiry Nav Start -->
        <?php if(Yii::$app->user->can('inquiry-nav')){ ?>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menus', 'options' => ['class' => 'header center']],
                    ['label' => 'Home', 'icon' => 'dashboard', 'url' => "./home"],
                    //['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Login', 'url' => ["../login"], 'visible' => Yii::$app->user->isGuest],

                    // ------------------------------------------------
                    // Student Module start...
                    [
                        'label' => 'Student Module',
                        'icon' => 'users',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Student Inquiry', 'icon' => 'caret-right', 'url' => ["/std-inquiry"],],
                            //['label' => 'Student Registration', 'icon' => 'caret-right', 'url' => ["/std-personal-info"],],
                            //['label' => 'Student Enrollment', 'icon' => 'caret-right', 'url' => ["/std-enrollment-head"],],
                            //['label' => 'Student Promotion', 'icon' => 'caret-right', 'url' => ["./std-promote"],],
                        ],
                    ],
                    
                    // ------------------------------------------------
                    
                ],
            ]
        ) ?>
        <?php } ?>
        <!-- Inquiry Nav end -->

    </section>

</aside>
