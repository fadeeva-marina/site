<section class="tm-section">
    <header>
        <h2 class="tm-blue-text tm-welcome-title tm-margin-b-45"><?php echo $data2[$idR]['Name'] ?></h2>
    </header>
    <div class="row">
        <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 push-lg-4 push-md-5">
            <input type="hidden" name="recept1" value="5">
            <p class="ingr">Ингредиенты:</p>
            <?php
            for ($j = 1; $j <= count($data); $j++):
                if ($data[$j]['idR'] == $idR) {
                    echo $data[$j]['Name'] . " " . $data[$j]['Count'] . " " . $data[$j]['UnitOfM'] . "<br />";
                }
            endfor;
            ?>
            <br>
            <p><?php echo $data2[$idR]['Descrtiption'] ?></p>
        </div>
        <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 pull-lg-8 pull-md-7 tm-about-img-container">
            <?php
            $str = "img/rec/" . $idR . ".jpg";
            echo $string = "<img src='" . $str . "' alt='Image' class='img-fluid'>"; ?>
        </div>
    </div>
</section>