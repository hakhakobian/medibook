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
$_SESSION['id'] = "";
$_SESSION['type'] = "";
$_SESSION['name'] = "";
$_SESSION['email'] = "";
if ( !empty($_POST['user_type']) && $_POST['user_type'] === "doctor" ) {
  $user_type = "doctor";
  $data = get_data("doctors");
}
else {
  $user_type = "patient";
  $data = get_data("patients");
}
if ( !empty($_POST) && !empty($_POST['user_id']) ) {
  $user_id = (int) $_POST['user_id'];
  $user_data = $user_type == "doctor" ? get_data("doctors/" . $user_id) : get_data("patients/" . $user_id);

  $_SESSION['id'] = $user_data[0]["id"];
  $_SESSION['type'] = $user_data[0]["type"];
  $_SESSION['name'] = $user_data[0]["name"];
  $_SESSION['email'] = $user_data[0]["email"];
  if ( $user_type == "doctor" ) {
    header('location: doctor.php');
  }
  else {
    header('location: patient.php');
  }
}

$users_types = array(
  'doctor' => 'Doctor',
  'patient' => 'Patient',
);
?>
<div class="container">
  <form id="form" action="" method="POST">
    <table>
      <tr>
        <td>
          <p class="header-text">Login</p>
        </td>
      </tr>
      <tr>
        <td class="label-td">
          <label for="user_type" class="form-label">AS: </label>
        </td>
      </tr>
      <tr>
        <td class="input-td">
          <select name="user_type" id="user_type" class="input-text" onchange="select('user_id')">
            <?php
            foreach ( $users_types as $key => $users_type ) {
              ?>
              <option <?php echo ($key == $user_type) ? 'selected' : ''; ?>
                value="<?php echo $key; ?>"><?php echo $users_type; ?></option>
              <?php
            }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td class="label-td">
          <label for="user_id" class="form-label">Select Patient: </label>
        </td>
      </tr>
      <tr>
        <td class="input-td">
          <select name="user_id" id="user_id" class="input-text">
            <?php
            foreach ( $data as $user ) {
              ?>
              <option value="<?php echo $user['id']; ?>"><?php echo $user['name']; ?></option>
              <?php
            }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>
          <input type="submit" value="Login" class="login-btn btn-primary btn">
        </td>
      </tr>
    </table>
  </form>
</div>
</body>
</html>