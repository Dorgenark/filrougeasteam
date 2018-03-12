<?php
	include "header.php";
	include "get_Articles.php";
?>
		<main role="main">
			<!-- Start Intro -->
			<div id="fh5co-intro">
				<div class="container">
						<div class="row">
							<div class="col-md-6 fh5co-intro-sub">
								<p>L'ASBL Les Meubles Du Coeur est une association à but non lucratif.
									Sa mission : permettre aux familles les plus démunis d'apporter le confort que mérite leur foyer.
									Par la vente et le don de mobiliers nous apportons notre soutient à l'éducation
									en participant à la construction d'écoles.
									L'écologie nous tient également à coeur, nous apportons notre aide à des centres de tris de déchets afin de trouver les meilleures solutions de recyclage..

									Les Meubles du Coeur ASBL
								</p>
							</div>
						</div>
				</div>
			</div>
			<!-- End Intro -->

			<!-- Start Work -->
			<div id="fh5co-work">
				<div class="container">
					<div class="row">
						<?php
						$i = 0;
						foreach ($row as $key => $value){
						?>
						<div class="col-md-6 col-sm-6 col-xs-6 fh5co-work-wrap">
							<a href="articles.php?ID=<?=$row[$key]->id?>" class="fh5co-work-item js-fh5co-work-item">
								<img src="images/work_1.jpg" alt="Image" class="img-responsive">
								<div class="fh5co-overlay-bg js-fh5co-overlay-bg"></div>
								<div class="fh5co-overlay-text js-fh5co-overlay-text">
									<h2><?=$row[$key]->titre?></h2>
								</div>
							</a>
						</div>
					<?php $i++; } ?>
					</div>
						</div>
						<div class="col-md-12 text-center">
						<a href="#" class="fh5co-view js-fh5co-view"><span class="fh5co-icon-view"><i class="ti-plus"></i></span> <span class="js-fh5co-view-text">View All</span></a>
						</div>
					</div>
					<!-- End More Works -->


				</div>
			</div>
			<!-- End Work -->

			<div class="fh5co-spacer fh5co-spacer-md"></div>

			<div class="fh5co-spacer fh5co-spacer-sm"></div>

		</main>
<?php include "footer.php"; ?>
