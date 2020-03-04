<?php
use yii\helpers\Url;
?>

<!-- Fixed navbar -->
<div class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
				<a class="navbar-brand" href="index.html">
					<img src="<?= $directoryAsset; ?>assets/images/logo-tekfunghan.png" alt="Pusdiklat Tekfunghan"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right mainNav">
					
					<?php 
                        if(Yii::$app->request->url == Yii::$app->homeUrl){
                            echo '<li class="active"><a href="'.Yii::$app->homeUrl.'">Home</a></li>';
                        }else{
                            echo '<li><a href="'.Yii::$app->homeUrl.'">Home</a></li>';
                        }
                    ?>

					<?php 
                        if(Yii::$app->request->url == Url::toRoute('home/registrasi')){
                            echo '<li class="active"><a href="'.Url::toRoute('home/registrasi').'">E-Registrasi</a></li>';
                        }else{
                            echo '<li><a href="'.Url::toRoute('home/registrasi').'">E-Registrasi</a></li>';
                        }
                    ?>

					<?php 
                        if(Yii::$app->request->url == Url::toRoute('home/profil')){
                            echo '<li class="active"><a href="'.Url::toRoute('home/profil').'">Profil</a></li>';
                        }else{
                            echo '<li><a href="'.Url::toRoute('home/profil').'">Profil</a></li>';
                        }
                    ?> 

					<?php 
                        if(Yii::$app->request->url == Url::toRoute('home/info-penting')){
                            echo '<li class="active"><a href="'.Url::toRoute('home/info-penting').'">Info Penting</a></li>';
                        }else{
                            echo '<li><a href="'.Url::toRoute('home/info-penting').'">Info Penting</a></li>';
                        }
                    ?>

					<!--<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="sidebar-right.html">Right Sidebar</a></li>
							<li><a href="#">Dummy Link1</a></li>
							<li><a href="#">Dummy Link2</a></li>
							<li><a href="#">Dummy Link3</a></li>
						</ul>
					</li>-->
					<?php
					/* if (!Yii::$app->siswa->isGuest){
							var_dump(Yii::$app->siswa->identity->nama_lengkap);
							var_dump(Yii::$app->siswa->identity->email);exit;
						} */
					?>
					<!-- #/Login Status -->
					<?php
					if (Yii::$app->siswa->isGuest){
						echo '<li><a href="'.Url::toRoute('home/login').'">Login</a></li>'; 
					}else{
						echo '<li>
								<a href="'.Url::to(['home/logout']).'" data-method="post">
									<i class="fa fa-sign-out"></i> Logout
									(' . Yii::$app->siswa->identity->nama_lengkap . ')
								</a>
							<li>';
					}  
					?>
					<!-- #/End Login Status -->

				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->