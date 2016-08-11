<div id="page-wrapper">
<h1>Soru Gönder  </h1>
<br />
  <form name="questionform" action="newquestion" method="POST">
    <div class="form-group label-placeholder is-empty">
     <label for="questiondetail" class="control-label">Soru Başlığı</label>
      <input name="questiondetail" class="form-control" id="questiondetail" type="text" value="" />
    </div>
    <div class="row">
     <div class="pull-left radio radio-primary">
      <label>
       <input name="optionsRadios" value="checked1" checked type="radio"/>
       <span class="circle"></span><span class="check"></span>
      </label>
     </div>
     <div class="col-md-9 form-group label-placeholder is-empty">
      <label for="ip1" class="control-label">Seçenek eklemek için tıklayınız</label>
      <input class="form-control" id="ip1" type="text" name="anketsorusu[]" />
     </div>
    </div>
    <button type="submit" id="sorugonderbtn" class="btn btn-raised btn-primary">Soru Gönder</button>       
  </form>
</div>
        <!-- /#page-wrapper -->
