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
              
                <?php if ($radioBtnGoster) { ?>
                  <?php foreach ($questionPollOptions as $key => $value){ ?>
               	<div class="radio radio-primary">
                  <label>
                    <input name="optionsRadios" value="r<?php echo $value->poll_option_id; ?>" type="radio">
                    <span class="circle"></span>
                    <span class="check"></span>
                    <?php echo $value->poll_option_detail . "</a>"; ?>
                  </label>
                </div>
               
              <?php }} else { ?>
                <table class="table table-striped table-hover ">
                <thead>
                <tr>
                  <th>Şıklar</th>
                  <th class="text-right">Seçilme Oranı</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($questionPollOptions as $key => $value){ ?>
                  <tr> 
                  <td><?php echo $value->poll_option_detail; ?></td>
                  <td class="text-right"><?php echo round($value->voted * 100 / $value->tpl,3); ?></td>
                </tr>
              <?php }}} ?>
              </tbody>
              </table>
              <?php if(isset($question) && $question ){ ?>
               <?php if ($radioBtnGoster) { ?>
                 <button type="submit" class="btn btn-raised btn-info pull-left">Oyla</button>
                 <div class="row">
                 <a href="<?php echo URL . 'shuffle/q/' . $question->question_id . '?sonucgoster=t'; ?>" class="btn btn-raised btn-primary pull-left">Sonuçları Göster</a>
                 <a href="<?php echo URL . 'shuffle/skip/' . $question->question_id; ?>" class="btn btn-raised btn-primary pull-left">Atla</a>
                 <a href="<?php echo URL . 'report/r/2/' . $question->question_id; ?>" class="btn btn-raised btn-danger pull-right">Rapor Et</a>
                 </div>
                <?php } else { 
                  if(isset($_GET["sonucgoster"])){
                    $sonusgoster = htmlspecialchars($_GET["sonucgoster"]);
                    if ($sonusgoster == "t") { ?>
                      <a class="btn btn-raised btn-primary" href="<?php echo URL . 'shuffle/q/' . $question->question_id; ?>">Oylamaya Git</a>
                  <?php }}}} ?>
        </form>
        <?php 
        } else {
          echo "<h1>Soruları görmek için üye girişi yapınız.</h1>";
        }
        ?>

    </div>
        <!-- /#page-wrapper -->
