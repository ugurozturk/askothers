    <div id="page-wrapper">
    <?php if(isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"])){ ?>
        <form action="<?php echo URL."shuffle"?>" method="post">
          <?php 
              if(isset($question) && $question ){
                echo "<h1>Soru : " . $question->question_detail . "</h1><br />";
              }
              else {
                echo "<h1>Tüm soruları cevapladınız.</h1>";
              }
          ?>
              <?php if (isset($questionPollOptions) && $questionPollOptions){ ?>
              <?php foreach ($questionPollOptions as $key => $value){ ?>
               	<div class="radio radio-primary">
                  <label>
                    <input name="optionsRadios" value="r<?php echo $value->poll_option_id; ?>" type="radio">
                    <span class="circle"></span>
                    <span class="check"></span>
                    <?php echo $value->poll_option_detail . " <a class='badge'>". round($value->voted * 100 / $value->tpl,3) ."%</a>"; ?>
                  </label>
                </div>
              <?php } ?>
              <button type="submit" class="btn btn-raised btn-primary">Oyla</button>
              <?php } ?>
        </form>
        <?php 
        } else {
          echo "<h1>Soruları görmek için üye girişi yapınız.</h1>";
        }
        ?>
    </div>
        <!-- /#page-wrapper -->
