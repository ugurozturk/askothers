        <div id="page-wrapper">
		<?php if (isset($questions)):  ?>
			<table class="table table-striped table-hover ">
  			<thead>
  			<tr>
          <th>İşlem</th>
  				<th>Soru</th>
  				<th>Cevap Sayısı</th>
  			</tr>
  			</thead>
  			<tbody>
        <?php foreach ($questions as $key => $value): ?>
  			<tr>
          <td><a href="<?php echo URL . 'shuffle/q/'. $value->question_id; ?>"><i class="fa fa-caret-square-o-right" aria-hidden="true"></i>
</a></td>
  				<td><?php echo $value->question_detail; ?></td>
  				<td><?php echo $value->cevapsayisi; ?></td>	
  			</tr>
        <?php endforeach ?>
        </tbody>
  			</table>
        <?php else: echo "Kullanıcı Bulunamadı"; ?>
        </div>
        <?php endif ?>

        <!-- /#page-wrapper -->
    