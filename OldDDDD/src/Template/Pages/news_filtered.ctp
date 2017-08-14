<?php
/**
 * Created by PhpStorm.
 * User: Nihilum
 * Date: 2016/08/22
 * Time: 7:56 PM
 */
?>

<style>
</style>

<header class="page-header bg">
  <?= $this->element('common/navbar') ?>
</header>
<?= $this->Flash->render() ?>
<main class="page-content">

  <!-- special events -->
  <section class="well well-2 bg-blue-lighter bg-image bg-image-2">
    <div class="container">
      <h2>highlighted articles</h2>
      <div class="row row-xs-center flow-offset-2 text-center text-sm-left">
        <?php
        if (isset($articlesHighlighted))
        {
          foreach ($articlesHighlighted as $currArticle)
          {
            ?>
            <div class="col-sm-6">
              <article class="news-post">

                <div class="frame">
                  <span class="helper"></span><?php $imgPath = ($currArticle["image_path"]); ?>
                  <img class="img-polaroid news-highlighted" alt="..."
                       src="../img/<?= $imgPath ?>">
                </div>


                <div class="box">
                  <div class="box__left box__left-1  box__middle">
                    <span class="icon icon-xs-1 icon-silver fa-calendar"></span>
                  </div>
                  <div class="box__body box__middle small">
                    <?= date_format($currArticle["created"], "Y/m/d"); ?>
                  </div>
                </div>
                <div class="box">
                  <div class="box__left box__left-2  box__middle">
                    <span class="icon icon-xs-2 icon-silver fa-clock-o"></span>
                  </div>
                  <div class="box__body box__middle small">
                    <?= date_format($currArticle["created"], " H:i:s"); ?>
                  </div>
                </div>
                <h5><a href="#"><?= $currArticle['title'] ?></a></h5>
                <p><?= substr($currArticle->body, 0, 512) ?>...<a href="#"
                                                                  class="link link-md link-primary">&nbsp;Read
                    more...</a>
                </p>
              </article>
            </div>

            <?php

          }

        }
        else
        {
          ?>
          <div class="col col-lg-12">
            <h4><span class="fa fa-exclamation"></span> Error.</h4>
            <hr>
            <p>There was an issue trying to fetch the Highlighted Articles...</p>
          </div>
          <?php

        }
        ?>


      </div>
    </div>
  </section>
  <!-- END special events -->

  <!-- Featured News -->
  <section class="well well-2 bg-black-haze">
    <div id="div_articles" class="container">
      <h2>Featured News</h2>
      <?php
      if (isset($articles))
      {
        foreach ($articles as $currArticle)
        {
          ?>
          <div class="row row-sm-middle news-post text-center text-md-left">
            <div style="visibility: visible; animation-name: fadeInLeft;" class="col-md-5 col-lg-4 wow fadeInLeft">

              <div class="frame2">
                <span class="helper"></span><?php $imgPath = ($currArticle["image_path"]); ?>
                <img class="img-polaroid news-highlighted2" alt="..."
                     src="../img/<?= $imgPath ?>">
              </div>
            </div>
            <div class="col-md-7 col-lg-8">
              <div class="box">
                <div class="box__left box__left-1  box__middle">
                  <span class="icon icon-xs-1 icon-silver fa-calendar"></span>
                </div>
                <div class="box__body box__middle small">
                  <?= date_format($currArticle["created"], "Y/m/d"); ?>
                </div>
              </div>
              <div class="box">
                <div class="box__left box__left-2  box__middle">
                  <span class="icon icon-xs-2 icon-silver fa-clock-o"></span>
                </div>
                <div class="box__body box__middle small">
                  <?= date_format($currArticle["created"], " H:i:s"); ?>
                </div>
              </div>
              <h5><a href="#"><?= $currArticle['title'] ?></a></h5>
              <p><?= substr($currArticle->body, 0, 512) ?>...</p>
              <a href="#" class="link link-md link-primary"> Read more...</a>
            </div>
          </div>
          <hr>
          <?php

        }

      }
      else
      {
        //no articles
        ?>
        <div class="col col-lg-12">
          <h4><span class="fa fa-exclamation"></span> Error.</h4>
          <hr>
          <p>There was an issue trying to fetch the Articles...</p>
        </div>
        <?php

      }
      ?>
    </div>
    <div id="div_articles_filtered" class="container">

    </div>
  </section>
  <!-- END Featured News -->

  <!-- news archives -->
  <section class="well well-2 bg-image bg-image-4 bg-blue-lighter">
    <div class="container">
      <h2>news archives</h2>
      <?php
      if (isset($monthsAvailable)){
        foreach ($monthsAvailable as $chunk)
        {
          foreach ($chunk as $monthAvailable)
          {
            pd($monthAvailable);
          }
        }
      }
      else
      {
        ?>
        <div class="col col-lg-12">
          <h4><span class="fa fa-exclamation"></span> Error.</h4>
          <hr>
          <p>There was an issue trying to fetch the Articles...</p>
        </div>
        <?php
      }
      ?>

      <div class="row row-xs-center flow-offset-1">
        <div style="visibility: visible; animation-name: fadeInLeft;" class="col-xs-4 wow fadeInLeft">
          <ul class="marked-list">
            <li><a href="#">January 2016</a></li>
            <li><a href="#">February 2016</a></li>
            <li><a href="#">March 2016</a></li>
            <li><a href="#">April 2016</a></li>
            <li><a href="#">May 2016</a></li>
            <li><a href="#">June 2016</a></li>
          </ul>
        </div>
        <div class="col-xs-4">
          <ul class="marked-list">
            <li><a href="#">July 2016</a></li>
            <li><a href="#">August 2016</a></li>
            <li><a href="#">September 2016</a></li>
            <li><a href="#">October 2016</a></li>
            <li><a href="#">November 2016</a></li>
            <li><a href="#">December 2016</a></li>
          </ul>
        </div>
        <div style="visibility: visible; animation-name: fadeInRight;" class="col-xs-4 wow fadeInRight">
          <ul class="marked-list">
            <li><a href="#">January 2015</a></li>
            <li><a href="#">February 2015</a></li>
            <li><a href="#">March 2015</a></li>
            <li><a href="#">April 2015</a></li>
            <li><a href="#">May 2015</a></li>
            <li><a href="#">June 2015</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- END news archives -->

</main>
<footer class="page-footer">
  <?= $this->element('common/footer') ?>
</footer>