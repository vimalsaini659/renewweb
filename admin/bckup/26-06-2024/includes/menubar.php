<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->

  <section class="sidebar">

    <!-- Sidebar user panel -->

    <div class="user-panel">

      <div class="pull-left image">

        <img src="<?php echo (!empty($user['photo'])) ? '../images/' . $user['photo'] : '../images/GAGANDEEP_MD.png'; ?>" class="img-circle" alt="User Image">

      </div>

      <div class="pull-left info">

        <p><?php echo $user['firstname'] . ' ' . $user['lastname']; ?></p>

        <a><i class="fa fa-circle text-success"></i> Online</a>

      </div>

    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->

    <ul class="sidebar-menu" data-widget="tree">

      <li class="header">REPORTS</li>

      <li class=""><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

      <li class="header">MANAGE</li>

      <li><a href="admin_users.php"><i class="fa fa-calendar"></i> <span>Admin Users</span></a></li>

      <li><a href="centers.php"><i class="fa fa-calendar"></i> <span>Centers</span></a></li>

      <li><a href="courses.php"><i class="fa fa-calendar"></i> <span>Courses</span></a></li>

      <li><a href="questions.php"><i class="fa fa-calendar"></i> <span>Questions</span></a></li>

      <li><a href="notices.php"><i class="fa fa-calendar"></i> <span>Notices</span></a></li>

      <li><a href="datesheet.php"><i class="fa fa-calendar"></i> <span>Create Datesheet</span></a></li>

      <li><a href="exams.php"><i class="fa fa-calendar"></i> <span>Exam</span></a></li>
      
      <!-- <li><a href="createxams.php"><i class="fa fa-calendar"></i> <span>Create Exam</span></a></li> -->
      
      <li><a href="studentexamhistory.php"><i class="fa fa-circle-o"></i> Exam History</a></li>

      <li><a href="admission.php"><i class="fa fa-circle-o"></i> Admission Form</a></li> 

      <li><a href="frenchise_data.php"><i class="fa fa-circle-o"></i> Frenchise Form</a></li>

      <li><a href="subjects.php"><i class="fa fa-calendar"></i> <span>Subjects</span></a></li>

      <li><a href="student.php"><i class="fa fa-calendar"></i> <span>Student List</span></a></li>

      <li><a href="studentoff.php"><i class="fa fa-calendar"></i> <span>Student online</span></a></li>

      <li><a href="certificate.php"><i class="fa fa-circle-o"></i> Certificate</a></li>

      <li><a href="marksheet.php"><i class="fa fa-calendar"></i> <span>Marksheet</span></a></li>

      <li><a href="studentidcard.php"><i class="fa fa-calendar"></i> <span>Student ID Card</span></a></li>

      <li><a href="studentadmitcard.php"><i class="fa fa-calendar"></i> <span>Student Admit Card</span></a></li>

      <li><a href="studentfees.php"><i class="fa fa-calendar"></i> <span>Fee Managment</span></a></li>

      <li><a href="upload.php"><i class="fa fa-envelope"></i> <span>Upload Documents</span></a></li>      
      <li><a href="e_book.php"><i class="fa fa-envelope"></i> <span>E-Book</span></a></li>
      <li><a href="scr.php"><i class="fa fa-calendar"></i> <span>RFC</span></a></li>
    </ul>
    <!--li class="treeview">

          <a href="#">

            <i class="fa fa-users"></i>

            <span>Employees</span>

            <span class="pull-right-container">

              <i class="fa fa-angle-left pull-right"></i>

            </span>

          </a>

          <ul class="treeview-menu">

            <li><a href="employee.php"><i class="fa fa-circle-o"></i> Employee List</a></li>

            <li><a href="overtime.php"><i class="fa fa-circle-o"></i> Overtime</a></li>

            <li><a href="cashadvance.php"><i class="fa fa-circle-o"></i> Cash Advance</a></li>

            <li><a href="schedule.php"><i class="fa fa-circle-o"></i> Schedules</a></li>

          </ul>

        </li-->

    <!--li class="treeview">

          <a href="#">

            <i class="fa fa-users"></i>

            <span>Students</span>

            <span class="pull-right-container">

              <i class="fa fa-angle-left pull-right"></i>

            </span>

          </a>

          <ul class="treeview-menu">

            <li><a href="student.php"><i class="fa fa-circle-o"></i> Student List</a></li>

            <li><a href="certificate.php"><i class="fa fa-circle-o"></i> Certificate</a></li>

            <li><a href="marksheet.php"><i class="fa fa-circle-o"></i> Marksheet</a></li>

            <li><a href="studentidcard.php"><i class="fa fa-circle-o"></i> Student ID Card</a></li>

            <li><a href="studentadmitcard.php"><i class="fa fa-circle-o"></i> Student Admit Card</a></li>
            

            <li><a href="overtime.php"><i class="fa fa-circle-o"></i> Issued Certificate</a></li>

            <li><a href="studentcashadvance.php"><i class="fa fa-circle-o"></i> Cash Advance</a></li-->




    <!--li><a href="deduction.php"><i class="fa fa-file-text"></i> Deductions</a></li>

        <li><a href="position.php"><i class="fa fa-suitcase"></i> Positions</a></li>

        <li class="header">PRINTABLES</li>

        <li><a href="payroll.php"><i class="fa fa-files-o"></i> <span>Payroll</span></a></li>

        <li><a href="schedule_employee.php"><i class="fa fa-clock-o"></i> <span>Schedule</span></a></li-->



    <!--li style="color:white"><i class="fa fa-clock-o"><?php //echo $online; 
                                                        ?></i> <span>Online Users</span></li-->



  </section>

  <!-- /.sidebar -->

</aside>