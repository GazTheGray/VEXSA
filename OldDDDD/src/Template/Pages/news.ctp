<?php
/**
 * Created by PhpStorm.
 * User: Nihilum
 * Date: 2016/08/22
 * Time: 7:56 PM
 */
?>

<style>
  .fill {
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
  }

  .fill img {
    flex-shrink: 0;
    min-width: 100%;
    min-height: 100%
  }
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
            <div class="col-sm-12 col-lg-6">
              <article class="news-post">

                <div class="fill" style="height: 230px; width: 570px;">
                  <?php
                  if ($currArticle["image_path"] != '')
                  {
                    $imgPath = str_replace("\\", "/", $currArticle["image_path"]);


                    echo $this->Html->image($imgPath, ["class" => ""]);
                  }
                  else
                  {
                    echo $this->Html->image('missing-image.png', ["class" => "", "alt" => "...No Image..."]);
                  }
                  ?>
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
                <h5><a
                    href="javascript:readMore('<?= $currArticle['title'] ?>','<?= $currArticle['body'] ?>','<?= date_format($currArticle["created"], "Y/m/d"); ?>')"><?= $currArticle['title'] ?></a>
                </h5>
                <p><?= substr($currArticle->body, 0, 512) ?>...
                  <a
                    href="javascript:readMore('<?= $currArticle['title'] ?>','<?= $currArticle['body'] ?>','<?= date_format($currArticle["created"], "Y/m/d"); ?>')"
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
  <section class="well well-2 bg-black-haze" id="section-featured">
    <div id="div_articles" class="container">
      <div class="row">
        <div class="col-lg-10 col-sm-12"><h2><?= $newsHeader ?></h2></div>
        <div class="col-lg-2 col-sm-12 text-center">
          <?php
          if (!isset($isNews))
          {
            ?>
            <h3>
              <a href="javascript:goBackNews();"><span class="fa fa-arrow-left"></span>BACK</a>
            </h3>

            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                  </div>
                  <div class="modal-body">
                    <p>Some text in the modal.</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>

              </div>
            </div>
            <?php
          }
          ?>
        </div>
      </div>

      <?php
      if (isset($articles))
      {
        foreach ($articles as $currArticle)
        {
          ?>
          <div class="row row-sm-middle news-post text-center text-md-left">
            <div style="visibility: visible; animation-name: fadeInLeft;" class="col-md-5 col-lg-4 wow fadeInLeft">

              <div class="frame2">
                <span class="helper"></span><?php $imgPath = str_replace("\\", "/", $currArticle["image_path"]); ?>
                <?=
                $this->Html->image($imgPath, ["class" => "img-polaroid news-highlighted"]);
                ?>
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
              <h5><a
                  href="javascript:readMore('<?= $currArticle['title'] ?>','<?= $currArticle['body'] ?>','<?= date_format($currArticle["created"], "Y/m/d"); ?>')"><?= $currArticle['title'] ?></a>
              </h5>
              <p><?= substr($currArticle->body, 0, 512) ?>...</p>
              <a
                href="javascript:readMore('<?= $currArticle['title'] ?>','<?= $currArticle['body'] ?>','<?= date_format($currArticle["created"], "Y/m/d"); ?>')"
                class="link link-md link-primary"> Read more...</a>
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
      if (isset($monthsAvailable))
      {
        ?>
        <div class="row row-xs-center flow-offset-1">
          <?php
          foreach ($monthsAvailable as $chunk)
          {
            ?>
            <div style="visibility: visible; animation-name: fadeInLeft;" class="col-xs-4 wow fadeInLeft">
              <ul class="marked-list">
                <?php
                foreach ($chunk as $key => $monthAvailable)
                {
                  $dir = strtolower(str_replace(" ", "-", $monthAvailable));
                  ?>
                  <li>
                    <?=
                    $this->Html->link(
                      "$monthAvailable",
                      '/pages/news/' . $dir,

                      ['class' => 'button', 'escape' => false,]
                    );
                    ?>
                  </li>
                  <?php
                }
                ?>
              </ul>
            </div>
            <?php
          }
          ?>
        </div>
        <?php
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

    </div>
  </section>
  <!-- END news archives -->

</main>
<footer class="page-footer">
  <?= $this->element('common/footer') ?>
</footer>
<script>
  var here = '/vesa/pages/news';
  function goBackNews()
  {
    window.location.replace(here);
  }


</script>