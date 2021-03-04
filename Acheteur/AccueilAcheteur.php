 <?php
 require_once('../auth/EtreAuthentifie.php');
	if($idm->getRole() == 'acheteur'){
		include ('headerAcheteur.php');
	?>
				<section>
				<div id="video-carousel-example2" class="carousel slide carousel-fade" data-ride="carousel" style="padding-bottom: 50px;">
					<ol class="carousel-indicators">
					    <li data-target="#video-carousel-example2" data-slide-to="0" class="active"></li>
					    <li data-target="#video-carousel-example2" data-slide-to="1"></li>
					    <li data-target="#video-carousel-example2" data-slide-to="2"></li>
					    <li data-target="#video-carousel-example2" data-slide-to="3"></li>
				  	</ol>
		
					<div class="carousel-inner" role="listbox">
				    	<div class="carousel-item active">
					      	<div class="view">
				        		<img src="../images/carrousel.jpg" alt="Image d'accueil" height="600px" width="100%">
				        	    <div class="mask rgba-indigo-light"></div>
				      	    </div>

	                        <div class="carousel-caption">
						        <div class="animated fadeInDown">
						          <h3 class="h3-responsive">Pain retrodor un pur délice</h3>
						          <p style="color: red;">3 pain acheté le 4ème offert</p>
						        </div>
						    </div>
				        </div>
				   	  
				        <div class="carousel-item">
					        <div class="view">
					   	        <img src="../images/carousel2.jpg" alt="Image d'accueil" height="600px" width="100%">
					        	<div class="mask rgba-purple-slight"></div>
					      	</div>

							<div class="carousel-caption">
						        <div class="animated fadeInDown">
						          <h3 class="h3-responsive">Avec ceci vos bouchou ne vous dérangerons plus pendant le confinement</h3>
						          <p style="color: red;">-25% jusqu'au 19 Avril 2020</p>
						        </div>
						    </div>
				    	</div>
					    		 
					    <div class="carousel-item">
					        <div class="view">
					   	        <img src="../images/carousel3.jpg" alt="Image d'accueil" height="600px" width="100%">
					            <div class="mask rgba-black-strong"></div>
					        </div>

		                    <div class="carousel-caption">
					            <div class="animated fadeInDown">
					                <h3 class="h3-responsive" style="color: #99a2a9;">Voila la PS4; avec sa vous ne serai plus ennuyer.</h3>
					          		<p style="color: red;">-20% à l'achat plus 5 CD offert </p>
					        	</div>
					      	</div>
					    </div> 

					    <div class="carousel-item">
					        <div class="view">
					   	        <img src="../images/carousel4.jpg" alt="Image d'accueil" height="600px" width="100%">
					            <div class="mask rgba-black-strong"></div>
					        </div>

		                    <div class="carousel-caption">
					            <div class="animated fadeInDown">
					                <h3 class="h3-responsive">Pour être aussi élégant que cet homme acheté ce manteau</h3>
					          		<p style="color: red;">-10% jusqu'au 20 Mai 2020</p>
					        	</div>
					      	</div>
					    </div>  
					</div>

					<a class="carousel-control-prev" href="#video-carousel-example2" role="button" data-slide="prev">
					    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					</a>
				    
				    <a class="carousel-control-next" href="#video-carousel-example2" role="button" data-slide="next">
					    <span class="carousel-control-next-icon" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
	                </a>
				</div>	


				<p><h4>Alimentaires</h4><hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="color: #b8b9bb; width: 100%;"></p>

				<div class="row row-cols-1 row-cols-md-3">
					
							<div class="col mb-4">
					            <div class="card">
					              	<center><img src="../images/pain.jpg" class="card-img-top" alt="photo aliment" style="height: 250px; width: 300px;"></center>
					              	<div class="card-body">
						                <p>
						                    <center><a href="listeAlimentAcheteur.php">
						                    	<button type = "button" class="btn btn-primary register">Voir plus d'aliments</button>
						                    </a></center>
						                </p>
					              	</div>
					            </div>
					        </div>

					        <div class="col mb-4">
					            <div class="card">
					              	<center><img src="../images/lait.jpg" class="card-img-top" alt="photo aliment" style="height: 250px; width: 300px;"></center> 
					              	<div class="card-body">
						                <p>
						                    <center><a href="listeAlimentAcheteur.php">
						                    	<button type = "button" class="btn btn-primary register">Voir plus d'aliments</button>
						                    </a></center>
						                </p>
					              	</div>
					            </div>
					        </div>

					        <div class="col mb-4">
					            <div class="card">
					              	<center><img src="../images/sucre.jpg" class="card-img-top" alt="photo aliment" style="height: 250px; width: 300px;"></center>
					              	<div class="card-body">
						                <p>
						                    <center><a href="listeAlimentAcheteur.php">
						                    	<button type = "button" class="btn btn-primary register">Voir plus d'aliments</button>
						                    </a></center>
						                </p>
					              	</div>
					            </div>
					        </div>
					
				</div>
				
				<br>

				<p><h4>Jouets</h4><hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="color: #b8b9bb; width: 100%;"></p>

				<div class="row row-cols-1 row-cols-md-3">
					
							<div class="col mb-4">
					            <div class="card">
					              	<center><img src="../images/playmobil.jpg" class="card-img-top" alt="photo jouet" style="height: 250px; width: 300px;"></center>
					              	<div class="card-body">
						                <p>
						                    <center><a href="listeJouetAcheteur.php">
						                    	<button type = "button" class="btn btn-primary register">Voir plus de jouets</button>
						                    </a></center>
						                </p>
					              	</div>
					            </div>
					        </div>

					        <div class="col mb-4">
					            <div class="card">
					              	<center><img src="../images/train.jpg" class="card-img-top" alt="photo jouet" style="height: 250px; width: 300px;"></center>
					              	<div class="card-body">
						                <p>
						                    <center><a href="listeJouetAcheteur.php">
						                    	<button type = "button" class="btn btn-primary register">Voir plus de jouets</button>
						                    </a></center>
						                </p>
					              	</div>
					            </div>
					        </div>

					        <div class="col mb-4">
					            <div class="card">
					              	<center><img src="../images/voiture.jpg" class="card-img-top" alt="photo jouet" style="height: 250px; width: 300px;"></center>
					              	<div class="card-body">
						                <p>
						                    <center><a href="listeJouetAcheteur.php">
						                    	<button type = "button" class="btn btn-primary register">Voir plus de jouets</button>
						                    </a></center>
						                </p>
					              	</div>
					            </div>
					        </div>
					
				</div>

				<br>

				<p><h4>Vêtements<h4><hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="color: #b8b9bb; width: 100%;"></p>

				<div class="row row-cols-1 row-cols-md-3">
					
							<div class="col mb-4">
					            <div class="card">
					              	<center><img src="../images/veste.webp" class="card-img-top" alt="photo vetement" style="height: 250px; width: 300px;"></center>
					              	<div class="card-body">
						                <p>
						                    <center><a href="listeVetementAcheteur.php">
						                    	<button type = "button" class="btn btn-primary register">Voir plus de vetements</button>
						                    </a></center>
						                </p>
					              	</div>
					            </div>
					        </div>

					        <div class="col mb-4">
					            <div class="card">
					              	<center><img src="../images/pantalon.jpg" class="card-img-top" alt="photo vetement" style="height: 250px; width: 300px;"></center>
					              	<div class="card-body">
						                <p>
						                    <center><a href="listeVetementAcheteur.php">
						                    	<button type = "button" class="btn btn-primary register">Voir plus de vetements</button>
						                    </a></center>
						                </p>
					              	</div>
					            </div>
					        </div>

					        <div class="col mb-4">
					            <div class="card">
					              	<center><img src="../images/chaussette.jpg" class="card-img-top" alt="photo vetement" style="height: 250px; width: 300px;"></center>
					              	<div class="card-body">
						                <p>
						                    <center><a href="listeVetementAcheteur.php">
						                    	<button type = "button" class="btn btn-primary register">Voir plus de vetements</button>
						                    </a></center>
						                </p>
					              	</div>
					            </div>
					        </div>

					
				</div>

			</section>
<?php
		}else{
			redirect($pathFor['logout']);
		}
	include ('../footer.php');
?>