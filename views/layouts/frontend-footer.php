<?php
use yii\helpers\Url;
?>
<!-- footer -->

<footer id="footer">
 
		<div class="container">
   <div class="row">
  <div class="footerbottom">
    
    
    
    <div class="col-md-3 col-sm-6 pull-right"> 
            	<div class="footerwidget"> 
                         <h4>Informasi Kontak</h4> 
                        <p>Kemhan RI</p>
            <div class="contact-info"> 
            <i class="fa fa-map-marker"></i> Jalan Medan Merdeka Barat No. 13-14, Jakarta Pusat 10110<br>
            <i class="fa fa-phone"></i> 021-382050<br>
              </div> 
                </div><!-- end widget --> 
    </div>
  </div>
</div>
			<div class="social text-center">
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-instagram"></i></a>
			</div>

			<div class="clear"></div>
			<!--CLEAR FLOATS-->
		</div>
		<div class="footer2">
			<div class="container">
				<div class="row">

					<div class="col-md-6 panel">
						<div class="panel-body">
							<p class="simplenav">
								<a href="<?= Yii::$app->homeUrl ?>">Home</a> | 
								<a href="<?= Url::toRoute('home/registrasi') ?>">E-Registrasi</a> |
								<a href="<?= Url::toRoute('home/profil') ?>">Profil</a> |
								<a href="<?= Url::toRoute('home/info-penting')?>">Info Penting</a> 
							</p>
						</div>
					</div>

					<div class="col-md-6 panel">
						<div class="panel-body">
							<p class="text-right">
								Copyright &copy; 2019
							</p>
						</div>
					</div>

				</div>
				<!-- /row of panels -->
			</div>
		</div>
	</footer>

<!-- /footer -->