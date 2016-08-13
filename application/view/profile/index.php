        <div id="page-wrapper">
		<?php if ($user):  ?>
        <?php echo $user->username . "<br />"; 
        echo $user->created_date; ?>
        <br />
        <a class="btn btn-raised btn-primary" href="<?php echo URL . 'profile/userQuestionsList' ?>">Gönderdiğim Soruları Listele</a>
        <?php else: echo "Kullanıcı Bulunamadı"; ?>
        </div>
        <?php endif ?>

        <!-- /#page-wrapper -->
    