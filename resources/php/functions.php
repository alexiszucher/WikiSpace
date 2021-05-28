<?php 
    function createBootstrapCard($imgSrc, $title, $link) {
        ?>
        <div class="card" style="width: 18rem;">
            <img src="<?php echo $imgSrc ?>" class="card-img-top">
            <div class="card-body">
                <h5><?php echo $title ?></h5>
                <a href="<?php echo $link ?>" class="btn btn-primary">Regarder</a>
            </div>
        </div>
        <?php
    }
?>