        <div id="page-wrapper">
        <h5><?php echo "Toplam kullanıcı sayısı : " . $kullaniciSayisi; ?></h5>
        <h5><?php echo "Son 24 saat kayıt olan kullanıcı sayısı : " . $kullaniciSayisiBugun; ?></h5>
        <h5><?php echo "Toplam soru sayısı : " . $soruSayisi; ?></h5>
        <h5><?php echo "Son 24 saat gönderilen soru sayısı : " . $soruSayisiBugun; ?></h5>
        <h5><?php echo "Toplam cevap sayısı : " . $cevapSayisi; ?></h5>
        <h5><?php echo "Son 24 saat toplam cevap sayısı : " . $cevapSayisiBugun; ?></h5>
        <br />
        <a href="<?php echo URL . "yonet/kullanicilar" ?>" class="btn btn-raised btn-primary">Kullanıcı Kontrolü</a>
        <a href="<?php echo URL . "yonet/sorular" ?>" class="btn btn-raised btn-primary">Questions Kontrolü</a>
</div>