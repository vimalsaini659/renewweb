<?php include 'includes/session.php'; ?>

<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">

  <div class="wrapper">



    <?php include 'includes/navbar.php'; ?>

    <?php include 'includes/menubar.php'; ?>



    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">

      <!-- Content Header (Page header) -->

      <section class="content-header">

        <h1>

          Download List

        </h1>

        <ol class="breadcrumb">

          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

          <li>Download</li>

          <li class="active">Download List</li>

        </ol>

      </section>

      <!-- Main content -->

      <section class="content">

        <?php

        if (isset($_SESSION['error'])) {

          echo "

            <div class='alert alert-danger alert-dismissible'>

              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>

              <h4><i class='icon fa fa-warning'></i> Error!</h4>

              " . $_SESSION['error'] . "

            </div>

          ";

          unset($_SESSION['error']);
        }

        if (isset($_SESSION['success'])) {

          echo "

            <div class='alert alert-success alert-dismissible'>

              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>

              <h4><i class='icon fa fa-check'></i> Success!</h4>

              " . $_SESSION['success'] . "

            </div>

          ";

          unset($_SESSION['success']);
        }

        ?>

        <div class="row">

          <div class="col-xs-12">

            <div class="box">

              <div class="box-header with-border">

                <a href="#addDownload" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>

              </div>

              <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered">

                    <thead>

                      <th>ID</th>

                      <th>File</th>

                      <th>Title Name</th>

                      <th>Purpose</th>                  

                      <th>ACtion</th>

                    </thead>

                    <tbody>

                      <?php

                      $sql = "SELECT * FROM admin";

                      $query = $conn->query($sql);

                      while ($row = $query->fetch_assoc()) {

                      ?>

                        <tr>

                          <td><?php echo $row['id']; ?></td>

                          <td><img src="<?php echo (!empty($row['photo'])) ? '../images/' . $row['photo'] : '../images/profile.jpg'; ?>" width="30px" height="30px"> <a href="#photo" data-toggle="modal" class="pull-right photos" data-id="<?php echo $row['id']; ?>"><span class="fa fa-edit"></span></a></td>

                          <td><?php echo $row['username']; ?></td>

                          <td><?php echo $row['firstname']; ?></td>

                                                   <td>

                            <button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['id']; ?>"><i class="fa fa-edit"></i> Edit</button>

                            <button class="btn btn-danger btn-sm delete btn-flat" id="<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>"><i class="fa fa-trash"></i> Delete</button>
                            

                          </td>

                        </tr>

                      <?php

                      }

                      ?>

                    </tbody>

                  </table>

                </div>
              </div>

            </div>

          </div>

        </div>

      </section>

    </div>



    <?php include 'includes/footer.php'; ?>

    <?php include 'includes/download_modal.php'; ?>

  </div>

  <?php include 'includes/scripts.php'; ?>

  <script>
    $(function() {


      $(document).on('click', '.btnUpdateUserStatus', function(e) {
        var user_id = $(this).attr('id');
        var status = $(this).data('status');
        //alert('Testing' + status);

        $.ajax({
          url: 'server/updateuserstatus.php',
          method: 'POST',
          data: {
            'user_id': user_id,
            'status': status
          },
          success: function(response) {
            console.log(response);
            location.reload();
          },
          error: function(error) {
            console.log(error);
          },
        })

      });


      $('.photos').click(function(e) {

        e.preventDefault();

        $('#edit_photo').modal('show');

        var id = $(this).data('id');
        console.log(id);
        getRow(id);

      });


      $('.edit').click(function(e) {

        e.preventDefault();

        $('#edituser').modal('show');

        var id = $(this).data('id');
        console.log(id);

        getRow(id);

      });


      $('.delete').click(function(e) {

        e.preventDefault();
        var id = $(this).attr('id');

        $.confirm({
          title: 'Confirm!',
          content: 'Delete confirm!',
          buttons: {
            confirm: function() {
              $.ajax({
                url: 'server/delete_admin_user.php',
                method: 'post',
                data: {
                  'id': id
                },
                success: function(response) {
                  var obj = JSON.parse(response);
                  $.alert(response.response);
                  location.realod();
                },
                error: function(error) {
                  $.alert('Error!' + error);
                }
              });


            },
            cancel: function() {
              $.alert('Canceled!');
            }
          }
        });

      });


    });

    function getRow(id) {

      //console.log(id);

      $.ajax({

        type: 'POST',

        url: 'User_row.php',

        data: {
          'id': id
        },

        dataType: 'json',

        success: function(response) {

          console.log(response);

          $('.userid').val(response.id);

          $('.user_id').html(response.firstname + ' ' + response.lastname);

          $('.del_user_name').html(response.firstname + ' ' + response.lastname);

          $('#employee_name').html(response.firstname + ' ' + response.lastname);

          $('#edit_firstname').val(response.firstname);

          $('#edit_lastname').val(response.lastname);
          $('#edit_username').val(response.username);

          $('#edit_address').val(response.address);

          $('#datepicker_edit').val(response.birthdate);

          $('#edit_contact').val(response.contact_info);

          $('#gender_val').val(response.gender).html(response.gender);

          $('#position_val').val(response.position_id).html(response.description);

          $('#schedule_val').val(response.schedule_id).html(response.time_in + ' - ' + response.time_out);

        },

        error: function(error) {

          console.log(error);

        }

      });

    }
  </script>

</body>

</html>