<?php require_once('check_login.php');?>
<?php include('head.php');?>
<?php include('header.php');?>
<link rel="stylesheet" href="popup_style.css">
<?php include('sidebar.php');

if(isset($_GET['id']))
{ ?>
<div class="popup popup--icon -question js_question-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Sure
    </h1>
    <p>Report room as clean</p>
    <p>
      <a href="del_room.php?id=<?php echo $_GET['id']; ?>" class="button button--success" data-for="js_success-popup">Yes</a>
      <a href="cleaning.php" class="button button--error" data-for="js_success-popup">No</a>
    </p>
  </div>
</div>
<?php } ?>
  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Room cleaning details</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Room cleaning details</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                
                <!-- /# row -->
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Overview</h4>
                               
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Sr.No.</th>
                                                <th>Floor No</th>
                                                <th>Room Name</th>
                                                <th>Color</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Sr.No.</th>
                                                <th>Floor No</th>
                                                <th>Room Name</th>

                                                <th>Color</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                    <?php 
                                    include 'connect.php';
                                    $sql = "SELECT * FROM `tbl_rooms`";
                                     $result = $conn->query($sql);
                                  $i=1;
                                   while($row = $result->fetch_assoc()) { 
                               
                                      ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $row['floorno']; ?></td>
                                                <td><?php echo $row['roomname']; ?></td>
                                                 <td><?php echo $row['color']; ?></td>
                                                <td>
                                                  <a href="cleaning.php?id=<?=$row['id'];?>" class="btn btn-xs btn-danger"><i class="fa-light fa-clean"></i></a>
                                                </td>
                                            </tr>
                                          <?php  $i++;} 
                                          ?>

                                        </tbody>
                                    </table>
                                  </form>
                                </div>
                            </div>
                        </div>
               
                <!-- /# row -->

                <!-- End PAge Content -->
           

<?php include('footer.php');?>


<?php if(!empty($_SESSION['success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p><?php echo $_SESSION['success']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["success"]);  
} ?>
<?php if(!empty($_SESSION['error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p><?php echo $_SESSION['error']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["error"]);  } ?>
    <script>
      var addButtonTrigger = function addButtonTrigger(el) {
  el.addEventListener('click', function () {
    var popupEl = document.querySelector('.' + el.dataset.for);
    popupEl.classList.toggle('popup--visible');
  });
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
    </script>