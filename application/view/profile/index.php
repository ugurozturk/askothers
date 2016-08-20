        <div id="page-wrapper">
		<?php if ($user):  ?>
        <?php echo $user->username . "<br />"; 
        echo $user->created_date; ?>
        <br />
        <?php if ($showSendQuestionBtn) { ?>
        <a class="btn btn-raised btn-primary" href="<?php echo URL . 'profile/userQuestionsList' ?>">Gönderdiğim Soruları Listele</a>
        <?php } ?>
        <?php else: echo "Kullanıcı Bulunamadı"; ?>
        </div>
        <?php endif ?>

        <!-- /#page-wrapper -->
    