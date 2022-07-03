<div class="left-sidebar bg-black-300 box-shadow ">
    <div class="sidebar-content">
        <div class="user-info closed">
            <img src="images/user.png" alt="Profile Pic" width="100" height="100" class="img-circle profile-img">
            <h6 class="title"><?php echo $_SESSION['alogin']; ?></h6>
            <small class="info">Administrator</small>
        </div>
        <!-- /.user-info -->

        <div class="sidebar-nav">
            <ul class="side-nav color-gray">
                <li class="nav-header">
                    <span class="">Main Category</span>
                </li>
                <li>
                    <a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span> </a>

                </li>

                                   <!--  <li class="nav-header">
                                        <span class="">Appearance</span>
                                    </li> -->
                                    <?php if($_SESSION['role']==='admin'){ ?>
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-home"></i> <span>School</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="add-school.php"><i class="fa fa-plus"></i> <span>Add School</span></a></li>
                                            <li><a href="view-school.php"><i class="fa fa fa-eye"></i> <span>view school</span></a></li>
                                           
                                        </ul>
                                    </li>
                                <?php } ?>
                                    <?php if($_SESSION['role']==='admin'){ ?>
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-user"></i> <span>Users</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="add-users.php"><i class="fa fa-plus"></i> <span>Add User</span></a></li>
                                            <li><a href="view-users.php"><i class="fa fa fa-eye"></i> <span>View User</span></a></li>
                                        </ul>
                                    </li>
                                    <?php } ?>


                                    <?php if($_SESSION['role']==='admin'|| $_SESSION['role']==='head'|| $_SESSION['role']==='academic'){ ?>
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-users"></i> <span>Students</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="add-student.php"><i class="fa fa-plus"></i> <span>Add Students</span></a></li>
                                            <li><a href="view-student.php"><i class="fa fa fa-eye"></i> <span>View Students</span></a></li>
                                           
                                        </ul>
                                    </li>
                                    <?php } ?>

                                    <?php if($_SESSION['role']==='admin' || $_SESSION['role']==='head'){ ?>
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-lightbulb-o"></i> <span>Subject</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="add-subject.php"><i class="fa fa-plus"></i> <span>Add Subject</span></a></li>
                                            <li><a href="view-subject.php"><i class="fa fa fa-eye"></i> <span>View Subject</span></a></li>
                                           
                                        </ul>
                                    </li>
                                <?php } ?>

                                    <?php if($_SESSION['role']==='teacher'){ ?>
                                      <li class="has-children">
                                        <a href="#"><i class="fa fa-check-square-o"></i> <span>Score</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="add-score.php"><i class="fa fa-plus"></i> <span>Manage Score</span></a></li>
                                        </ul>
                                     </li>
                                    <?php } ?>

                                    <?php if($_SESSION['role']==='admin'){ ?>
                                      <li class="has-children">
                                        <a href="#"><i class="fa fa-check-square-o"></i> <span>Score</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="add-score-admin.php"><i class="fa fa-plus"></i> <span>Manage Score</span></a></li>
                                        </ul>
                                     </li>
                                    <?php } ?>



                                        <li class="has-children">
                                        <a href="#"><i class="fa fa-line-chart"></i> <span>Result Analysis</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="best-10.php"><i class="fa fa-plus"></i> <span>Overall Best-ten</span></a></li>
                                            <!-- <li><a href="manage-results.php"><i class="fa fa fa-server"></i> <span>Overall ten-looser</span></a></li> -->
                                            <!-- <li><a href="subjectperformance.php"><i class="fa fa fa-server"></i> <span>Subject Performance</span></a></li> -->
                                            <!-- <li><a href="schoolperformance.php"><i class="fa fa fa-server"></i> <span>School Performance</span></a></li> -->
                                            <li><a href="generalresults.php"><i class="fa fa fa-eye"></i> <span>Student Detailed Results</span></a></li>
                                            <!-- <li><a href="divisionperformance.php"><i class="fa fa fa-server"></i> <span>Division performance</span></a></li> -->
                                            </ul>
                                        </li>

                                        <?php if($_SESSION['role']==='admin'){ ?>
                                        <li><a href="declare-results.php"><i class="fa fa-balance-scale"></i> <span>Declare Results</span></a></li>
                                        <?php } ?>

                                        <li><a href="my-profile.php"><i class="fa fa-folder-open"></i> <span> My profile</span></a></li>

                                        <li><a href="change-password.php"><i class="fa fa-adjust"></i> <span> Change Password</span></a></li>

                                        
                                           
                            
                            </div>
                            <!-- /.sidebar-nav -->
                        </div>
                        <!-- /.sidebar-content -->
                    </div>