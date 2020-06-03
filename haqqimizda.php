<?php
include "header.php";

$haqqimizdasor = $db->prepare("SELECT * FROM haqqimizda WHERE haqqimizda_id=?");
$haqqimizdasor->execute(array(0));
$haqqimizdacek = $haqqimizdasor->fetch(PDO::FETCH_ASSOC);


?>

<div role="main" class="main">
    <div class="container">
        <div class="row pt-xl">
            <div class="col-md-7">
                <h1 class="mt-xl mb-none"><?php echo $haqqimizdacek['haqqimizda_basliq']; ?></h1>
                <div class="divider divider-primary divider-small mb-xl">
                    <hr>
                </div>
                <span style="font-size: 16px;"><?php echo $haqqimizdacek['haqqimizda_mezmun']; ?></span>

            </div>
            <div class="col-md-4 col-md-offset-1">

                <h4 class="mt-xl mb-none">Video Tanıtım</h4>
                <div class="divider divider-primary divider-small mb-xl">
                    <hr>
                </div>

                <div class="embed-responsive embed-responsive-16by9 mb-xl">
                    <iframe width="360" height="203" src="https://www.youtube.com/embed/<?php echo $haqqimizdacek['haqqimizda_video']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <h4 class="mt-xlg">Hədəfimiz</h4>

                <div class="divider divider-primary divider-small mb-xl">
                    <hr>
                </div>

                <blockquote class="blockquote-secondary">
                    <p class="font-size-lg">"<?php echo $haqqimizdacek['haqqimizda_hedef']; ?>"</p>
                    <footer style="font-size: 14px">Hədəfimiz</footer>
                </blockquote>
                <h4 class="mt-xlg">Missiyamız</h4>

                <div class="divider divider-primary divider-small mb-xl">
                    <hr>
                </div>
                <blockquote class="blockquote-secondary">
                    <p class="font-size-lg">"<?php echo $haqqimizdacek['haqqimizda_missiya']; ?>"</p>
                    <footer style="font-size: 14px">Missiyamız</footer>
                </blockquote>



                <!-- <ul class="list list-unstyled list-primary list-borders">
								<li class="pt-sm pb-sm"><strong class="text-color-primary font-size-xl">2016 - </strong> Moves its headquarters to a new building</li>
								<li class="pt-sm pb-sm"><strong class="text-color-primary font-size-xl">2014 - </strong> Porto creates its new brand</li>
								<li class="pt-sm pb-sm"><strong class="text-color-primary font-size-xl">2006 - </strong> Porto Office opens it doors in London</li>
								<li class="pt-sm pb-sm"><strong class="text-color-primary font-size-xl">2003 - </strong> Inauguration of the new office</li>
								<li class="pt-sm pb-sm"><strong class="text-color-primary font-size-xl">2001 - </strong> Porto goes into business</li>
							</ul> -->

            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>