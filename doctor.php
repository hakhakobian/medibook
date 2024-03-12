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
$doctor_id = $_SESSION['id'];
$schedule = get_data("schedule/" . $doctor_id);

if ( !empty($_POST['schedule_id']) ) {
  $schedule_id = (int) $_POST['schedule_id'];
  $deleted = get_data("appointment/" . $doctor_id . "/" . $schedule_id, "DELETE");
}
?>
<div class="container">
  <form id="form" action="" method="POST">
    <table>
      <?php
      if ( !empty($deleted) ) {
        ?>
        <tr>
          <td>
            <p class="header-text">Dear <?php echo $_SESSION['name']; ?></p>
          </td>
        </tr>
        <tr>
          <td>
            <p class="body-text">The appointment was successfully canceled.</p>
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
        <?php
        if ( !empty($schedule) ) {
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
                foreach ( $schedule as $item ) {
                  ?>
                  <option <?php echo(!empty($item['booked']) ? 'class="booked" title="Booked"' : 'disabled'); ?>
                    value="<?php echo $item['id']; ?>"><?php echo $item['time']; ?></option>
                  <?php
                }
                ?>
              </select>
            </td>
          </tr>
          <tr>
            <td>
              <input type="submit" value="Cancel appointment" class="login-btn btn-primary btn">
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