<?php
/**
 * Created by PhpStorm.
 * User: Nihilum
 * Date: 2016/08/22
 * Time: 7:55 PM
 */
?>
<header class="page-header bg">
  <?= $this->element('common/navbar') ?>
</header>
<?= $this->Flash->render() ?>
<main class="page-content">

  <!-- About us -->
  <section class="well well-2 bg-image bg-image-1 bg-blue-lighter">
    <div class="container">
      <h2>a few words about us</h2>
      <div class="row text-center text-md-left">
        <div class="col-md-6 col-lg-5">
          <?=
          $this->Html->image("page-02_img16.jpg", [
            "alt" => "",
            'url' => ['controller' => 'Recipes', 'width' => "470", "height" => "268"]
          ]);
          ?>
        </div>
        <div class="col-md-6 col-lg-7">
          <h5><strong>Vehicle Exports</strong> South Africa  has everything you need to find the best <br class="hidden visible-lg-block">
            car to meet your needs.
          </h5>
          <p>We are company that specialize in the procuring, obtaining and export of motor vehicles into Africa from
            South Africa (any country that is right hand drive), having seventeen years experiences with in the motor
            industry and our roots well established and our strong network of dealers, traders and motor dealerships.
            The industry is continuously evolving and growing, this has made it challenging for customers to be up to
            date with what information is needed to receive the best of service well getting optimum value for their
            money and this is where we pride ourselves in our field of expertise.</p>
          <p>We sell motor vehicles excluding vat, with the sole purpose of exporting beyond our borders. This allows
            customers to preserve their vat that would be used if purchased directly at a dealerships in South Africa.
            This makes it less of a financial burden for whom is importing the vehicle into their country.</p>
          <p>Our team is prompt, transparent and highly efficient, this is what makes us leader is our field and why we
            are regarded by our customers as the only company they use when purchasing a vehicle. </p>
        </div>
      </div>
    </div>
  </section>
  <!-- END About us -->

  <!-- How to Find the Perfect Car Online -->
  <section class="well well-2 bg-black-haze">
    <div class="container">
      <h2>How to Find the Perfect Car Online</h2>
      <div class="row flow-offset-1 row-sm-middle row-lg-top text-center text-sm-left">
        <div class="col-sm-6 col-md-4 col-lg-3">
          <?=
          $this->Html->image("page-02_img17.png", [
            "alt" => "",
            'url' => [
              'controller' => 'Recipes',
              'width' => "270",
              "height" => "235",
              "style" => "visibility: visible; animation-name: fadeIn;",
              "class" => "wow fadeIn",
            ]
          ]);
          ?>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-3">
          <h4 class="text-primary">Determine the type
            of car</h4>
          <p>Avoid making impulsive decisions and purchasing cars that don't match your lifestyle. Make a list of your
            routine driving needs and select a car that best matches those needs.</p>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 offset-3">
          <?=
          $this->Html->image("page-02_img18.jpg", [
            "alt" => "",
              'width' => "270",
              "height" => "235",
              "style" => "visibility: visible; animation-name: fadeIn;",
              "class" => "wow fadeIn",
          ]);
          ?>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-3 offset-3">
          <h4 class="text-primary">Define the features
            you need</h4>
          <p>Just as optional features increase the cost of a new car, they can make a car more expensive. If you
            won't use a navigation system, for instance, it
            might be cheaper to choose a car without one.</p>
        </div>


      </div>
      <hr>
      <div class="row flow-offset-1 row-sm-middle row-lg-top text-center text-sm-left">
        <div class="col-sm-6 col-md-4 col-lg-3">
          <?=
          $this->Html->image("page-02_img19.png", [
            "alt" => "",
              'width' => "270",
              "height" => "235",
              "style" => "visibility: visible; animation-name: fadeIn;",
              "class" => "wow fadeIn",
          ]);
          ?>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-3">
          <h4 class="text-primary">Factor of additional
            costs</h4>
          <p>Apart from the car's selling price, you should also budget for a small admin fee to cover the cost of the export.
            Once the total cost of the car is determined, look at your financing options to obtain the best deal
            available.</p>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 offset-3">
          <?=
          $this->Html->image("page-02_img20.png", [
            "alt" => "",
              'width' => "270",
              "height" => "235",
              "style" => "visibility: visible; animation-name: fadeIn;",
              "class" => "wow fadeIn",
          ]);
          ?>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-3 offset-3">
          <h4 class="text-primary">Run a vehicle history
            check</h4>
          <p>Before buying any car online, it's advisable to run a vehicle history check to find out if the
            car has been in accidents. A vehicle's history report also provides information on the number of times the
            car was previously sold.</p>
        </div>
      </div>
    </div>
  </section>
  <!-- END How to Find the Perfect Car Online -->

  <!-- Why us? -->
  <section class="well well-2">
    <div class="container">
      <h2>Why us?</h2>
      <div class="row text-center row-sm-center flow-offset-1">
        <div style="visibility: visible; animation-name: fadeInLeft;" class="col-sm-12 col-lg-4 wow fadeInLeft">
          <div class="inset-3 bg-black-haze">
            <div class="box-1">
              <div class="box-1-top">
                <span class="icon icon-xl icon-yellow-green fa-thumbs-o-up"></span>
              </div>
              <div class="box-1-bottom box-1-bottom-1">
                <h4 class="line-height-auto">Trusted</h4>
                <p class="">Buying a car is an important decision in your life, that is why here at <strong>Vehicle Exports</strong> South Africa  we ensure
                  that all cars available on our site come from people and dealerships who we are proud to work
                  with.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-lg-4">
          <div class="inset-3 bg-black-haze">
            <div class="box-1">
              <div class="box-1-top">
                <span class="icon icon-xl icon-yellow-green fa-check"></span>
              </div>
              <div class="box-1-bottom box-1-bottom-1">
                <h4 class="line-height-auto">Verified</h4>
                <p class="">At <strong>Vehicle Exports</strong> South Africa , we know that there are
                  a lot of fake advertisements on the internet, that is why we go the extra mile to make sure that
                  every car we offer on our site is genuine.</p>
              </div>
            </div>
          </div>
        </div>
        <div style="visibility: visible; animation-name: fadeInRight;" class="col-sm-12 col-lg-4 wow fadeInRight">
          <div class="inset-3 bg-black-haze">
            <div class="box-1">
              <div class="box-1-top">
                <span class="icon icon-xl icon-yellow-green fa-group"></span>
              </div>
              <div class="box-1-bottom box-1-bottom-1">
                <h4 class="line-height-auto">Reliable</h4>
                <p class="">We make it our mission to ensure all car listings are real and up to date. To make our
                  site a safe community, we take your complaints seriously and investigate any fraudulent activity
                  immediately.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- END Why us? -->

  <!-- our customers say -->
  <section class="well well-2 bg-image bg-image-3 bg-blue-lighter">
    <div class="container">
      <h2>our customers say</h2>

      <div class="row row-xs-center row-sm-center text-center">
        <div class="col-xs-10 col-sm-12">
          <blockquote class="quote">
            <p style="visibility: visible; animation-name: fadeIn;" class="heading-6 text-regular text-none wow fadeIn">
              <q style="visibility: visible; animation-name: fadeIn;" class="wow fadeIn">« I would just like to say
                thank you for your prompt and effective service, for your friendly and professional
                support staff! I will recommend your expert company to all my friends. »</q>
            </p>
            <?=
            $this->Html->image("page-02_img21.jpg", [
              "alt" => "",
              'url' => [
                'controller' => 'Recipes',
                'width' => "87",
                "height" => "87",
                "style" => "visibility: visible; animation-name: fadeIn;",
                "class" => "round wow fadeIn",
              ]
            ]);
            ?>
            <!--            <img style="visibility: visible; animation-name: fadeIn;" src="img/page-02_img21.jpg" alt="" class="round wow fadeIn" width="87" height="87">-->
            <p class="heading-6 text-none">
              <cite style="visibility: visible; animation-name: fadeIn;" class="wow fadeIn">
                Matthew Hayward, Client
              </cite>
            </p>
          </blockquote>
        </div>
      </div>
    </div>
  </section>
  <!-- END our customers say -->

</main>
<footer class="page-footer">
  <?= $this->element('common/footer') ?>
</footer>

