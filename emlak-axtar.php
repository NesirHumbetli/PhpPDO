<?php include "header.php"; ?>

<div role="main" class="main">

	<div class="container">
		<div class="row pt-xlg mt-xlg">
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-12">
						<h2 style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif" class="font-weight-normal mb-xs">
							<strong class="text-color-secondary font-weight-extra-bold">Satılan</strong> <span class="font-weight-light">və</span> <strong class="text-color-secondary font-weight-extra-bold">Kirayə</strong> əmlaklar hazırlanır.
						</h2>
					</div>
				</div>
				<div class="row">
					<ul id="listingLoadMoreWrapper" class="properties-listing sort-destination p-none" data-total-pages="2">


						<?php 
						

						if (empty($_POST['aranan'])) {
							if(empty($_POST['emlak_qiymetaz']) && empty($_POST['emlak_qiymetcox'])){
								$emlaksor = $db->prepare("SELECT * FROM emlak WHERE emlak_durum=:durum");
								$emlaksor->execute(array(
								':durum' => $_POST['emlak_durum']));

							}elseif (empty($_POST['emlak_durum']) && empty($_POST['emlak_qiymetcox'])){
								$emlaksor = $db->prepare("SELECT * FROM emlak WHERE emlak_qiymet>:emlak_qiymetaz");
								$emlaksor->execute(array(
									':emlak_qiymetaz' => $_POST['emlak_qiymetaz']
								));

							}elseif(empty($_POST['emlak_durum']) && empty($_POST['emlak_qiymetaz'])){
								$emlaksor = $db->prepare("SELECT *FROM emlak WHERE emlak_qiymet<:emlak_qiymetcox");
								$emlaksor->execute(array(
									':emlak_qiymetcox' => $_POST['emlak_qiymetcox']
								));

							}elseif(empty($_POST['emlak_durum'])) {
								$emlaksor = $db->prepare("SELECT * FROM emlak WHERE emlak_qiymet>:emlak_qiymetaz and emlak_qiymet<:emlak_qiymetcox");
								$emlaksor->execute(array(
									':emlak_qiymetaz' => $_POST['emlak_qiymetaz'],
									':emlak_qiymetcox' => $_POST['emlak_qiymetcox']
								));

							}elseif(empty($_POST['emlak_qiymetcox'])){
								$emlaksor = $db->prepare("SELECT * FROM emlak WHERE emlak_durum=:durum and emlak_qiymet>:emlak_qiymetaz");
								$emlaksor->execute(array(
									':durum' => $_POST['emlak_durum'],
									':emlak_qiymetaz' => $_POST['emlak_qiymetaz']
								));

							}elseif(empty($_POST['emlak_qiymetaz'])){
								$emlaksor = $db->prepare("SELECT * FROM emlak WHERE emlak_durum=:durum and emlak_qiymet<:emlak_qiymetcox");
								$emlaksor->execute(array(
									':durum' => $_POST['emlak_durum'],
									':emlak_qiymetcox' => $_POST['emlak_qiymetcox']
								));

							}elseif(!empty($_POST['emlak_durum'])
								&& !empty($_POST['emlak_qiymetaz'])
								&& !empty($_POST['emlak_qiymetcox'])){
								$emlaksor = $db->prepare("SELECT * FROM emlak WHERE emlak_durum=:durum and emlak_qiymet>:emlak_qiymetaz and emlak_qiymet<:emlak_qiymetcox");
								$emlaksor->execute(array(
									':durum' => $_POST['emlak_durum'],
									':emlak_qiymetaz' => $_POST['emlak_qiymetaz'],
									':emlak_qiymetcox' => $_POST['emlak_qiymetcox']
								));
								

							}





						}else {
							$aranan = $_POST['aranan'];
							$emlaksor = $db->prepare("SELECT * FROM emlak WHERE emlak_basliq LIKE '%$aranan%'");
							$emlaksor->execute();

						}
                        
					

                       

						while($emlakcek = $emlaksor->fetch(PDO::FETCH_ASSOC)){
                            ?>

						<li class="col-md-4 col-sm-6 col-xs-12 p-md isotope-item">
							<div class="listing-item">
								<a href="emlak-<?php echo seo($emlakcek['emlak_basliq'])."-".$emlakcek['emlak_id']; ?>" class="text-decoration-none">
									<span class="thumb-info thumb-info-lighten">
										<span class="thumb-info-wrapper m-none">
											<img style="width: 262px;height: 165px;" src="<?php echo $emlakcek['emlak_resimyol']; ?>" class="img-responsive" alt="">
											
											<span <?php 
											if($emlakcek['emlak_durum'] == "Satılır") {?>
											 style="background-color: #ff2626!important;"
											<?php }elseif($emlakcek['emlak_durum'] == "Kirayə") { ?>
												style="background-color: #2bca6e!important;"

											<?php }?> class="thumb-info-listing-type background-color-secondary text-uppercase text-color-light font-weight-semibold p-xs pl-md pr-md">
												<?php echo $emlakcek['emlak_durum']; ?>
											</span>
										</span>
										<span class="thumb-info-price background-color-primary text-color-light text-lg p-sm pl-md pr-md">
											<?php echo $emlakcek['emlak_qiymet']; ?> USD
											<i class="fa fa-caret-right text-color-secondary pull-right"></i>
										</span>
										<span class="custom-thumb-info-title b-normal p-lg">
											<span class="thumb-info-inner text-md"><?php echo $emlakcek['emlak_basliq']; ?></span>

											<!-- PREMİUM EDƏ BİLƏRSƏN SONDA -->
											<!-- <ul class="accommodations text-uppercase font-weight-bold p-none text-sm">
												<li>
													<span class="accomodation-title">
														Beds:
													</span>
													<span class="accomodation-value custom-color-1">
														3
													</span>
												</li>
												<li>
													<span class="accomodation-title">
														Baths:
													</span>
													<span class="accomodation-value custom-color-1">
														2
													</span>
												</li>
												<li>
													<span class="accomodation-title">
														Sq Ft:
													</span>
													<span class="accomodation-value custom-color-1">
														500
													</span>
												</li>
											</ul> -->
										</span>
									</span>
								</a>
							</div>
						</li>
						<?php } ?>

					</ul>

					<!-- LOAD MORE ELAVE EDE BİLERSEN SONDA -->

					<!-- <div class="col-md-12">
						<div id="listingLoadMoreLoader" class="listing-load-more-loader">
							<div class="bounce-loader">
								<div class="bounce1"></div>
								<div class="bounce2"></div>
								<div class="bounce3"></div>
							</div>
						</div>

						<button id="listingLoadMore" type="button" class="btn btn-secondary btn-xs font-size-md text-uppercase outline-none p-md pl-xlg pr-xlg m-auto mb-xlg mt-xlg">Load More...</button>
					</div> -->
				</div>
				<hr class="dashed">

				<!-- İSTİFADƏ EDƏ BİLƏRSƏN SONDA -->
				<!-- <div class="row pb-lg mt-xlg">
					<div class="col-md-12">
						<h2 class="mt-xs mb-none">Exclusive Locations</h2>
					</div>
				</div> -->

				<!-- İSTİFADƏ EDƏ BİLƏRSƏN SONDA -->
				<!-- <div class="row pb-lg mb-xlg">
					<div class="col-sm-4 col-md-4">
						<div class="special-offer-item center text-color-light">
							<a href="demo-real-estate-properties.html" class="text-decoration-none">
								<span class="special-offer-wrapper">
									<img src="img/demos/real-estate/listings/listing-exclusive-location-1.jpg" class="img-responsive" alt="">
									<span class="special-offer-infos text-color-light">
										<span class="special-offer-title font-weight-normal text-lg p-xs mb-xs">
											Palm Beach
										</span>
										<button class="btn btn-secondary text-uppercase p-sm pl-md pr-md">11 Properties</button>
									</span>
								</span>
							</a>
						</div>
					</div>
					<div class="col-sm-4 col-md-4 xs-custom-mt-xlg">
						<div class="special-offer-item center text-color-light">
							<a href="demo-real-estate-properties.html" class="text-decoration-none">
								<span class="special-offer-wrapper">
									<img src="img/demos/real-estate/listings/listing-exclusive-location-2.jpg" class="img-responsive" alt="">
									<span class="special-offer-infos text-color-light">
										<span class="special-offer-title font-weight-normal text-lg p-xs mb-xs">
											Fischer Island
										</span>
										<button class="btn btn-secondary text-uppercase p-sm pl-md pr-md">2 Properties</button>
									</span>
								</span>
							</a>
						</div>
					</div>
					<div class="col-sm-4 col-md-4 xs-custom-mt-xlg">
						<div class="special-offer-item center text-color-light">
							<a href="demo-real-estate-properties.html" class="text-decoration-none">
								<span class="special-offer-wrapper">
									<img src="img/demos/real-estate/listings/listing-exclusive-location-3.jpg" class="img-responsive" alt="">
									<span class="special-offer-infos text-color-light">
										<span class="special-offer-title font-weight-normal text-lg p-xs mb-xs">
											South Miami
										</span>
										<button class="btn btn-secondary text-uppercase p-sm pl-md pr-md">25 Properties</button>
									</span>
								</span>
							</a>
						</div>
					</div>
				</div> -->
			</div>

			<?php include "rightbar.php"; ?>
		</div>
	</div>

	<?php include "footer.php"; ?>