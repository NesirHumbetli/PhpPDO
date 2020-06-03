<?php
include "admin/netting/connect.php";
include "admin/production/function.php";

$ayarsor = $db->prepare("SELECT * FROM ayar WHERE ayar_id=:id");
$ayarsor->execute(array(
	':id' => 0
));
$ayarcek = $ayarsor->fetch(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html>

<head>

	<!-- Basic -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?php echo $ayarcek['ayar_title']; ?></title>

	<meta name="keywords" content="<?php echo $ayarcek['ayar_keywords']; ?>" />
	<meta name="description" content="<?php echo $ayarcek['ayar_description']; ?>">
	<meta name="author" content="<?php echo $ayarcek['ayar_author']; ?>">

	<!-- Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
	<link rel="apple-touch-icon" href="img/apple-touch-icon.png">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<!-- Web Fonts  -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

	<!-- Vendor CSS -->
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="vendor/animate/animate.min.css">
	<link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.min.css">
	<link rel="stylesheet" href="vendor/owl.carousel/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="vendor/owl.carousel/assets/owl.theme.default.min.css">
	<link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.min.css">

	<!-- Theme CSS -->
	<link rel="stylesheet" href="css/theme.css">
	<link rel="stylesheet" href="css/theme-elements.css">
	<link rel="stylesheet" href="css/theme-blog.css">
	<link rel="stylesheet" href="css/theme-shop.css">

	<!-- Current Page CSS -->
	<link rel="stylesheet" href="vendor/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="vendor/rs-plugin/css/layers.css">
	<link rel="stylesheet" href="vendor/rs-plugin/css/navigation.css">

	<!-- Skin CSS -->
	<link rel="stylesheet" href="css/skins/skin-real-estate.css">

	<!-- Demo CSS -->
	<link rel="stylesheet" href="css/demos/demo-real-estate.css">

	<!-- Theme Custom CSS -->
	<link rel="stylesheet" href="css/custom.css">

	<!-- Head Libs -->
	<script src="vendor/modernizr/modernizr.min.js"></script>

</head>

<body class="loading-overlay-showing" data-loading-overlay>
	<div class="loading-overlay">
		<div class="bounce-loader">
			<div class="bounce1"></div>
			<div class="bounce2"></div>
			<div class="bounce3"></div>
		</div>
	</div>

	<div class="body">
		<header id="header" class="header-narrow" data-plugin-options='{"stickyEnabled": true, "stickyEnableOnBoxed": true, "stickyEnableOnMobile": true, "stickyStartAt": 37, "stickySetTop": "-37px", "stickyChangeLogo": false}'>
			<div class="header-body background-color-primary pt-none pb-none">
				<div class="header-top header-top header-top-style-3 header-top-custom background-color-primary m-none">
					<div class="container">
						<nav class="header-nav-top pull-left">
							<ul class="nav nav-pills">
								<li class="hidden-xs">
									<span class="ws-nowrap"><i class="icon-location-pin icons"></i><?php echo $ayarcek['ayar_adres']; ?> / <?php echo $ayarcek['ayar_ray']; ?>/ <?php echo $ayarcek['ayar_sehr']; ?></span>
								</li>
								<li>
									<span class="ws-nowrap"><i class="icon-call-out icons"></i> <?php echo $ayarcek['ayar_tel']; ?></span>
								</li>
								<li class="hidden-xs">
									<span class="ws-nowrap"><i class="icon-envelope-open icons"></i> <a class="text-decoration-none" href="mailto:<?php echo $ayarcek['ayar_mail']; ?>"><?php echo $ayarcek['ayar_mail']; ?></a></span>
								</li>
							</ul>
						</nav>
						<nav class="header-nav-top langs pull-right mr-none">
							<ul class="nav nav-pills">
								<!--<li>
										<a href="#" class="dropdown-menu-toggle" id="dropdownLanguage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
											English
											<i class="fa fa-sort-down"></i>
										</a>
										<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownLanguage">
											<li>
												<a href="#english"><img src="img/blank.gif" class="flag flag-us" alt="English"> English</a>
											</li>
											<li>
												<a href="#espanol"><img src="img/blank.gif" class="flag flag-es" alt="Español"> Español</a>
											</li>
											<li>
												<a href="#francaise"><img src="img/blank.gif" class="flag flag-fr" alt="Française"> Française</a>
											</li>
										</ul>
									</li>-->
								<li class="blog">
									<a href="xeberler">
										Blog / Xəbərlər
									</a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
				<div class="header-container container custom-position-initial">
					<div class="header-row">
						<div class="header-column">
							<div class="header-logo">
								<a href="index.php">
									<img alt="Porto" width="143" height="40" src="<?php echo $ayarcek['ayar_logo']; ?>">
								</a>
							</div>
						</div>
						<div class="header-column">
							<div class="header-row">
								<div class="header-nav">
									<button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main">
										<i class="fa fa-bars"></i>
									</button>
									<div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse m-none">
										<nav>
											<ul class="nav nav-pills" id="mainNav">

												<?php
												$menusor = $db->prepare("SELECT * FROM menu WHERE menu_ust=:ust ORDER BY menu_sira ASC");
												$menusor->execute(array(
													':ust' => 0
												));
												while ($menucek = $menusor->fetch(PDO::FETCH_ASSOC)) {
													$menu_id = $menucek['menu_id'];
													$altmenusor = $db->prepare("SELECT * FROM menu WHERE menu_ust=:menu_ust ORDER BY menu_sira ASC");
													$altmenusor->execute(array(
														':menu_ust' => $menu_id
													));
													$say = $altmenusor->rowCount();
												?>

													<li <?php if ($say > 0) {
															echo "class='dropdown dropdown-full-color dropdown-quaternary'";
														}else{
															echo "class='dropdown-full-color dropdown-quaternary'";
														} ?>>
														<a href="<?php
																	if (strlen($menucek['menu_url']) > 0) {
																		echo $menucek['menu_url'];
																	} elseif (strlen($menucek['menu_url']) == 0) { ?>
																							
												sayfa-<?= seo($menucek['menu_ad']) . "-" . $menucek['menu_id'] ?>
												

											<?php } ?>
											
										"><?php echo $menucek['menu_ad']; ?></a>

														<ul class="dropdown-menu">

															<!-- ALT MENU -->
															<?php

															while ($altmenucek = $altmenusor->fetch(PDO::FETCH_ASSOC)) { ?>

																<li>
																	<a href="<?php

																				if (strlen($altmenucek['menu_url']) > 0) {
																					echo $altmenucek['menu_url'];
																				} elseif (strlen($altmenucek['menu_url']) == 0) { ?>
															sayfa-<?php echo seo($altmenucek['menu_ad']) . "-" . $altmenucek['menu_id']; ?>

														<?php } ?>
														
														"><?php echo $altmenucek['menu_ad']; ?></a></a>
																</li>

															<?php } ?>
														</ul>

													</li>


												<?php } ?>



												<li class="dropdown dropdown-full-color dropdown-quaternary dropdown-mega" id="headerSearchProperties">
													<a class="dropdown-toggle" href="#">
														Axtar <i class="fa fa-search"></i>
													</a>
													<ul class="dropdown-menu custom-fullwidth-dropdown-menu">
														<li>
															<div class="dropdown-mega-content">
																<form id="propertiesFormHeader" action="emlak-axtar.php" method="POST">
																	<div class="container p-none">
																		<div class="row">
																			<div class="col-md-2">
																				<div class="form-control-custom">
																					<select class="form-control text-uppercase font-size-sm" name="emlak_durum" data-msg-required="Doldurun." id="propertiesPropertyType" >


																						<option value="">Əmlak Status</option>
																						<option value="Satılır">Satılır</option>
																						<option value="Kirayə">Kirayə</option>

																					</select>
																				</div>
																			</div>

																			<!-- PREMİUMDA LAZİM OLACAQ  -->
																			<!-- <div class="col-md-2">
																				<div class="form-control-custom">
																					<select class="form-control text-uppercase font-size-sm" name="propertiesLocation" data-msg-required="This field is required." id="propertiesLocation" required="">
																						<option value="">Location</option>
																						<option value="1">Miami</option>
																						<option value="2">New York</option>
																						<option value="3">Houston</option>
																						<option value="4">Los Angeles</option>
																					</select>
																				</div>
																			</div>
																			<div class="col-md-2">
																				<div class="form-control-custom">
																					<select class="form-control text-uppercase font-size-sm" name="propertiesMinBeds" data-msg-required="This field is required." id="propertiesMinBeds" required="">
																						<option value="">Min Beds</option>
																						<option value="1">1</option>
																						<option value="2">2</option>
																						<option value="3">3</option>
																						<option value="4">4</option>
																					</select>
																				</div>
																			</div> -->
																			<div class="col-md-2">
																				<div class="form-control-custom">
																					<select class="form-control text-uppercase font-size-sm" name="emlak_qiymetaz" data-msg-required="Doldurun." id="propertiesMinPrice" >
																						<option value="">Ən az</option>
																						<option value="1000">$1,000</option>
																						<option value="10000">$10,000</option>
																						
																				
																						
																					</select>
																				</div>
																			</div>
																			<div class="col-md-2">
																				<div class="form-control-custom">
																					<select class="form-control text-uppercase font-size-sm" name="emlak_qiymetcox" data-msg-required="Doldurun." id="propertiesMaxPrice" >
																						<option value="">Ən Çox</option>
																						<option value="5000">$5,000</option>
																						<option value="50000">$50,000</option>
																						
																				
																						
																					</select>
																				</div>
																			</div>

																			<div class="col-md-4">
																				<div class="form-control-custom">
                        														<input type="text" placeholder="Açar sözü girin..." data-msg-required="Zəhmət olmasa adınızı daxil edin." maxlength="100" class="form-control" name="aranan" id="name" >
																				</div>
																			</div>
																			
																			<div class="col-md-2">
																				<input type="submit" name="emlakaxtar" value="Əmlak Axtar" class="btn btn-secondary btn-lg btn-block text-uppercase font-size-sm">
																			</div>
																		</div>
																	</div>
																</form>
															</div>
														</li>
													</ul>
												</li>
											</ul>
										</nav>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>