<?php
/**
 * Created by PhpStorm.
 * User: Nihilum
 * Date: 2016/09/14
 * Time: 6:58 PM
 */
?>
<?php
$content = explode("\n", $content);

foreach ($content as $line):
  echo '<p> ' . $line . "</p>\n";
endforeach;
?>
<h4>A contact request has been made from VESA.co.za</h4>
<hr>
<p>Details are as follows;</p>
<table>
  <tbody>
  <tr>
    <td><strong>Name: </strong></td>
    <td><?= $name ?></td>
  </tr>
  <tr>
    <td><strong>Email: </strong></td>
    <td><?= $email ?></td>
  </tr>
  <tr>
    <td><strong>Phone: </strong></td>
    <td><?= $phone ?></td>
  </tr>
  <tr>
    <td><strong>Message: </strong></td>
    <td><?= $message ?></td>
  </tr>
  </tbody>
</table>
<?php
if (isset($vehicleDetails)){
    ?>
<br>
<br>
  <h4>Vehicle Details</h4>
  <hr>
  <p>Please use the ID or Name as a search reference in the ADMIN portal</p>
  <table>
    <tbody>
    <tr>
      <td><strong>Name: </strong></td>
      <td><?= $vehicleDetails['name'] ?></td>
    </tr>
    <tr>
      <td><strong>ID: </strong></td>
      <td><?= $vehicleDetails['id'] ?></td>
    </tr>
    </tbody>
  </table>
<?php
}
?>