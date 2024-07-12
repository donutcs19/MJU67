<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once('config/cdn.php'); ?>
    <link rel="icon" type="image/png" href="config/favicon/favicon-32x32.png">
    <title>Search MJU 67</title>
</head>

<body style="font-family:'Courier New', Courier, monospace" ;>
    <?php
    require_once('bootstrap/nav.php');
    require_once('config/connect_db.php');
    require_once('class/Alert.php');
    require_once('class/ListData.php');

    $connectDB = new Database();
    $db = $connectDB->getConnection();
    $data = new ListData($db);
    $alert = new Alert();
    ?>
    <div class="container w-100 d-flex justify-content-center">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
            <label for="fname" class="form-label">Student Code : </label>
            <input type="text" name="stdCode" id="stdCode" required>
            <button type="submit" name="submit" class="btn btn-outline-primary">Search</button>
            
        </form>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        $std = $_POST['stdCode'];
        $std_data = $data->SelectData($std);

        if (!$data->SelectData($std)) {
            // $alert->display('Cannot Search Student Data', 'danger');
            $alert->swal_alert('Cannot Search Student Data', 'error');
        } else {
            $alert->swal_alert('Student Data OK', 'success');
        }
    }
    ?>

    <?php if (isset($std_data['SAME'])) { ?>

        <div class=" d-flex justify-content-center">
            <div class="card text-white bg-success m-5" style="max-width: 67rem;">
                <div class="card-header"><h3><?php echo $std_data["STUDENTCODE"];?></h3></div>
                <div class="card-body">
                    <h5 class="card-title">Username : <?php echo $std_data['SAME']; ?></h5>
                    <h5 class="card-title">Password : <?php echo $std_data['PASSWORD']; ?></h5>
                    <h5 class="card-title">ชื่อ-นามสกุล : <?php echo $std_data['FIRSTNAME'];?>  <?php echo $std_data['LASTNAME'];?></h5>
                    <h5 class="card-title">รหัสประจำตัวประชาชน : <?php echo $std_data['IDCARD']?></h5>
                    <h5 class="card-title">คณะ : <?php echo $std_data['FACULTY'];?></h5>
                    <h5 class="card-title">สาขา : <?php echo $std_data['DEPARTMENT'];?></h5>
                    <h5 class="card-title">ปริญญา : <?php echo $std_data['TITLE'];?></h5>
                    <h5 class="card-title">วิทยาเขต : แม่โจ้ - <?php echo $std_data['COMPANY'];?></h5>
                    
                </div>
            </div>
        </div>
        
        

    <?php } else {?>
        <div class=" d-flex justify-content-center">
            <div class="card text-white bg-danger m-5" style="max-width: 67rem;">
                <div class="card-header"><h3>ไม่พบข้อมูล</h3></div>
                <div class="card-body">
                    <h5 class="card-title">Username : Data not found<h5>
                    <h5 class="card-title">Password : Data not found</h5>
                    <h5 class="card-title">ชื่อ-นามสกุล : Data not found</h5>
                    <h5 class="card-title">รหัสประจำตัวประชาชน : Data not found</h5>
                    <h5 class="card-title">คณะ : Data not found</h5>
                    <h5 class="card-title">สาขา : Data not found</h5>
                    <h5 class="card-title">ปริญญา : Data not found</h5>
                    <h5 class="card-title">วิทยาเขต : Data not found</h5>
                    
             
                </div>
            </div>
        </div>
        <?php }?>
</body>
<?php include_once('config/script.php') ?>

</html>