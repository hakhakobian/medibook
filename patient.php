<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/animations.css">
  <link rel="stylesheet" href="css/main.css">
  <script type="text/javascript" src="js/main.js"></script>
</head>
<body>
<?php
require __DIR__ . "/index.php";
session_start();
if ( empty($_SESSION["id"]) ) {
  header("location: /login.php");
}
$data = get_data("doctors");
$doctor_id = 0;
if ( !empty($_POST) ) {
  if ( !empty($_POST['user_id']) ) {
    $doctor_id = (int) $_POST['user_id'];
    $schedule = get_data("schedule/" . $doctor_id);
  }
  if ( !empty($_POST['schedule_id']) ) {
    $schedule_id = (int) $_POST['schedule_id'];
    $post_data = array(
      'doctorID' => $doctor_id,
      'patientID' => $_SESSION["id"],
      'scheduleID' => $schedule_id,
      'status' => 'booked',
    );
    $saved_data = get_data("appointment", "POST", $post_data);
  }
}
?>
<div class="container">
  <form id="form" action="" method="POST">
    <table>
      <?php
      if ( !empty($saved_data) && !empty($saved_data[0]['doctor_name']) ) {
        ?>
        <tr>
          <td>
            <p class="header-text">Dear <?php echo $_SESSION['name']; ?></p>
          </td>
        </tr>
        <tr>
          <td>
            <p class="body-text">Your appointment with <?php echo $saved_data[0]['doctor_name']; ?> was successfully
              booked at <?php echo $saved_data[0]['time']; ?></p>
          </td>
        </tr>
        <tr>
          <td>
            <input type="submit" value="Back to your page" class="login-btn btn-primary-soft btn">
          </td>
        </tr>
        <?php
      }
      else {
        ?>
        <tr>
          <td>
            <p class="header-text">Hi <?php echo $_SESSION['name']; ?></p>
          </td>
        </tr>
        <tr>
          <td class="input-td">
            <select name="user_id" id="user_id" class="input-text" onchange="select('schedule_id')">
              <option value="">Choose the doctor</option>
              <?php
              foreach ( $data as $user ) {
                ?>
                <option <?php echo ($user['id'] == $doctor_id) ? 'selected' : ''; ?>
                  value="<?php echo $user['id']; ?>"><?php echo $user['name']; ?></option>
                <?php
              }
              ?>
            </select>
          </td>
        </tr>
        <?php
        if ( !empty($schedule) && $doctor_id ) {
          ?>
          <tr>
            <td class="label-td">
              <label for="schedule_id" class="form-label">Choose time: </label>
            </td>
          </tr>
          <tr>
            <td class="input-td">
              <select name="schedule_id" id="schedule_id" class="input-text">
                <?php
                $availability = FALSE;
                foreach ( $schedule as $item ) {
                  if ( empty($item['booked']) ) {
                    $availability = TRUE;
                  }
                  ?>
                  <option <?php echo(!empty($item['booked']) ? 'disabled class="booked" title="Booked"' : ''); ?>
                    value="<?php echo $item['id']; ?>"><?php echo $item['time']; ?></option>
                  <?php
                }
                ?>
              </select>
            </td>
          </tr>
          <tr>
            <td>
              <?php
              if ( $availability ) {
                ?>
                <input type="submit" value="Book" class="login-btn btn-primary btn">
                <?php
              }
              else {
                ?>
                <p class="sub-text">All time slots are booked. Please choose another doctor.</p>
                <?php
              }
              ?>
            </td>
          </tr>
          <?php
        }
        ?>
        <tr>
          <td>
            <a href="login.php">
              <input type="button" value="Logout" class="login-btn btn-primary-soft btn">
            </a>
          </td>
        </tr>
        <?php
      }
      ?>
    </table>
  </form>
</div>

</body>
</html>