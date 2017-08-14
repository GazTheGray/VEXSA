<?php
/**
 * Created by PhpStorm.
 * User: Nihilum
 * Date: 2016/08/22
 * Time: 7:56 PM
 */
?>
<header class="page-header bg">
  <?= $this->element('common/navbar') ?>
</header>
<?= $this->Flash->render() ?>
<main class="page-content">

  <!-- Feedback -->
  <section class="well well-2 bg-image bg-blue-lighter bg-image-2">
    <div class="container">
      <h2>Inquiry</h2>
      <!-- RD Mailform -->
      <br>
      <h5>Can't find the right vehicle for you?</h5>
      <p>Are you looking for something more specific perhaps?</p>
      <strong style="margin: 0 0 0 20px">No Problem!</strong>
      <?php
      if (isset($yay))
      {
        ?>
        <div class="alert alert-success">Your message was successfully sent! We will get in touch with you as soon as we
          are able to.
        </div>
        <?php
      }
      ?>
      <?php
      echo $this->Form->create('contact', ['url' => '/pages/contact', 'class' => 'rd-mailform']);
      ?>
      <!-- RD Mailform Type -->
      <input name="form-version" value="contact" type="hidden">
      <?php
      if (isset($vehicleID))
      {
        ?>

        <input name="vehicle_id" value="<?= $vehicleID ?>" type="hidden">
        <?php
      }
      ?>
      <!-- END RD Mailform Type -->
      <fieldset>
        <div class="row">
          <div class="col-md-4">
            <label class="mfInput" data-add-placeholder="">
              <input name="name" data-constraints="@NotEmpty @LettersOnly" type="text">
              <span class="mfValidation"></span><span class="mfPlaceHolder">Your name</span></label>
          </div>
          <div class="col-md-4">
            <label class="mfInput" data-add-placeholder="">
              <input name="email" data-constraints="@NotEmpty @Email" type="text">
              <span class="mfValidation"></span><span class="mfPlaceHolder">Your email</span></label>
          </div>
          <div class="col-md-4">
            <label class="mfInput" data-add-placeholder="">
              <input name="phone" data-constraints="@Phone" type="text">
              <span class="mfValidation"></span><span class="mfPlaceHolder">Your phone</span></label>
          </div>
        </div>
        <label class="mfInput" data-add-placeholder="">
          <?php
          if (isset($sendStr))
          {
          ?>
          <textarea name="message" data-constraints="@NotEmpty"><?= $sendStr ?></textarea>
          <span class="mfValidation"></span><span class="mfPlaceHolder">...</span></label>
        <?php
        }
        else
        {
          ?>
          <textarea name="message" data-constraints="@NotEmpty"></textarea>
          <span class="mfValidation"></span><span class="mfPlaceHolder">A detailed message about the vehicle that's right for you...</span></label>
          <?php
        }
        ?>

        <div class="mfControls btn-group text-center">
          <button class="btn btn-sm btn-sunglow" type="submit">Submit</button>
        </div>
      </fieldset>
      </form>
      <!-- END RD Mailform -->
    </div>
  </section>
  <!-- END Feedback -->

  <!-- Contact Info -->
  <section class="well well-2 bg-black-haze">
    <div class="container">
      <div class="row flow-offset-1 row-xs-center">
        <div class="col-sm-12 col-md-6">
          <div class="contact-info-1 text-center">
            <h2>Contact Details</h2>
            <p class="heading-5">Fourways, Sandton <br class="hidden visible-lg-block">
              Gauteng, South Africa.
            </p>
            <br>
            <div style="padding-left: 10%; padding-right: 10%">
              <table class="table">
                <tbody>
                <tr>
                  <td>Telephone</td>
                  <td><a href="callto:#">+27 83 975 4067</a></td>
                </tr>
                <tr>
                  <td>FAX</td>
                  <td><a href="callto:#">+27 86 606 1314</a></td>
                </tr>
                <tr>
                  <td>E-mail</td>
                  <td><a href="mailto:vesa@address.co.za">vesa@address.co.za</a>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-6">
          <div class="contact-info-1 text-center">
            <h2>Operating Hours</h2>
            <p class="heading-5">Please note <br class="hidden visible-lg-block">
              Times are GSM +2
            </p>
            <br>
            <div style="padding-left: 10%; padding-right: 10%">
              <table class="table">
                <tbody>
                <tr>
                  <td>Weekdays</td>
                  <td>8:00 AM - 20:00 PM</td>
                </tr>
                <tr>
                  <td>Saturdays</td>
                  <td>9:00 AM - 17:00 PM</td>
                </tr>
                <tr>
                  <td><strong><a href="https://www.officeholidays.com/countries/south_africa/" target="_blank">South
                        African Holidays</a></strong></td>
                  <td>9:00 AM - 17:00 PM</td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
  <!-- END Contact Info -->

  <section class="well well-2 bg-image bg-image-4 bg-blue-lighter">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12">
          <div class="contact-info-1 text-center">
            <h1>Countries of Operation</h1>
           <p>Anguilla, Antiqua & Barbuda, Australia, Bahamas, Bangladesh, Barbados, Bermuda, Bhutan, British Virgin Islands, Brunei, Cayman Islands, Channel Islands, Christmas Islands, Cocos(Keeling) Islands, Cook Islands, Cyprus, Dominica, East Timor, Falkland Islands, Fiji, Grenada, Guernsey, Guyana, Hong Kong, India, Indonesia, Jamaica, Japan, Jersey, Kenya, Kiribati, Lesotho, Macau, Malaysia, Maldives, Malta, Mauritius, Montserrat, Nauru, Nepal, New Zealand, Niue, Norfolk Island, Pakistan, Papua New Guinea, Pitcairn Islands, Saint Lucia, Saint Helena, Samoa, Seychelles, Singapore, Solomon Islands, Sri Lanka, Suriname, Swaziland, Thailand, Tokelau, Tonga, Trinidad & Tobago, Turks & Caicos Island, Tuvalu, Uganda, United states Virgin Island, Namibia , Botswana , Malawi , Mozambique, Zambia , Tanzania, Zimbabwe.
           </p>
          </div>
        </div>
      </div>

    </div>
  </section>


</main>
<footer class="page-footer">
  <?= $this->element('common/footer') ?>
</footer>