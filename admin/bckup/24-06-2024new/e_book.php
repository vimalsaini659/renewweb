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

          E-Book List

        </h1>

        <ol class="breadcrumb">

          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

          <li>Admin</li>

          <li class="active"> E-Book List</li>

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

                <a href="#bookadd" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>

              </div>

              <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered">

                    <thead>
                      <th>ID</th>
                      <th>Photo</th>
                      <th>Name</th>
                      <th>Author</th>
                      <th>Price</th>
                      <th>Short Description</th>
                    
                      <th>Action</th>
                    </thead>

                    <tbody>

                      <?php

                      // $sql = "SELECT * FROM ai_courses as course inner join computer_centers as cnt on course.center_id=cnt.id";
                      $sql="SELECT * FROM ai_book";

                      $query = $conn->query($sql);

                      while ($row = $query->fetch_assoc()) {
                      ?>
                        <tr>
                          <td><?php echo $row['book_id']; ?></td>
                          <td><img src="<?php echo (!empty($row['book_image'])) ? '../uploads/' . $row['book_image'] : '../uploads/profile.jpg'; ?>" width="30px" height="30px"> <button class="btn btn-link photos btn-flat" data-id="<?php echo $row['book_id']; ?>"><i class="fa fa-edit"></i></button>

                          </td>
                          <td><?php echo $row['book_name']; ?></td>
                          <td><?php echo $row['book_author']; ?></td>
                          <td><?php echo $row['book_price']; ?></td>
                          <td><?php echo $row['book_shortDescription']; ?></td>
                        
                          <td>

                            <button class="btn btn-success btn-sm edits btn-flat" data-id="<?php echo $row['book_id']; ?>"><i class="fa fa-edit"></i> Edit</button>

                            <button class="btn btn-danger btn-sm deletes btn-flat" data-id="<?php echo $row['book_id']; ?>"><i class="fa fa-trash"></i> Delete</button>

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

    <?php include 'includes/book_modal.php'; ?>

  </div>

  <?php include 'includes/scripts.php'; ?>

  <script>
    $(function() {
      $('.photos').click(function(e) {

        e.preventDefault();

        $('#edit_coursenew').modal('show');

        var id = $(this).data('id');

        console.log(id);
        getRow(id);

      });

      $('.edits').click(function(e) {

        e.preventDefault();

        $('#editbook').modal('show');

        var id = $(this).data('book_id');

        console.log(book_id);
        getRow(book_id);

      });


      $(document).on('click', '.deletes', function(e) {
        e.preventDefault();
        $('#deletecourse').modal('show');
        var id = $(this).data('id');
        $('.courseid').val(id);
        getRow(id);
      });


      $('.photo').click(function(e) {

        e.preventDefault();

        $('#editcourse').modal('show');

        var id = $(this).data('id');

        console.log(id);
        getRow(id);

      });


    });

    function getRow(id) {

      $.ajax({

        type: 'POST',

        url: 'book_row.php',

        data: {
          id: id
        },

        dataType: 'json',

        success: function(response) {
          // console.log(response);
          // console.log(response.course_title);
          // $('.del_course_name').html(response.course_title);
 
          // $('.course_id').html(response.book_id);

          // $('#ecourse_title').val(response.book_title);

          // $('#ecourse_details').val(response.course_details);

          // $('#ecourse_fees').val(response.course_fees);

          // $('#econtact').val(response.contact);

          // $('#edit_contact').val(response.contact_info);
          // $('#ecourse_duration').val(response.course_duration);

        }

      });

    }
  </script>

</body>

</html>