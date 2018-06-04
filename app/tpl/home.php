<div id="home-cont">
<div class="container-home">
    <div id="slider">
            <a href="/M-master/licencia">
            <img id="slide-image" src="/M-master/pub/images/215245_5.jpg" />
            </a>
        <div id="container-buttons">
            <div class="button-slider" id="button1"></div><div class="button-slider" id="button2"></div><div class="button-slider" id="button3"></div>
        </div>
    </div>

    <div class="menu"><div>≡</div></div>
    <nav><ul><a href="<?= APP_W.''; ?>"><li><img src="/M-master/pub/images/juegos.png" /><span>Juegos</span></li></a><a href="<?= APP_W.'cuentos'; ?>"><li><img src="/M-master/pub/images/cuentos.png" /><span>Cuentos</span></li></a><a href="<?= APP_W.'paint'; ?>"><li><img src="/M-master/pub/images/dibuja.png" /><span>Dibuja</span></li></a><a href="<?= APP_W.'emociones'; ?>"><li><img src="/M-master/pub/images/diccionario.png" /><span>Diccionario</span></li></a></ul></nav>

    <div class="readcrumb"></div>

    <?php
        if(isset($_SESSION['user']) == FALSE){
                echo '<div id="link-licencia"><a href="/M-master/licencia"><div id="licencias">
                    <img src="/M-master/pub/images/licencias.jpg" /><div><span>TICEMOCIONAT APP</span></br><span>COMPRA YA TU LICENCIA PARA EMPEZAR A DISFRUTAR!</span></br><span>*A partir de 20 euros + IVA el grupo de licencias</span></div>
                    <div class="licen-res">COMPRA YA!</div>
                </div></a></div>';
            }

     ?>

    <div id="ultimos-juegos">
        <div class="title">
            <img class="log-section" src="/M-master/pub/images/ultimos.png" /><h1>Últimos juegos</h1>
        </div>
        <div class="juegos">
            <?php 
                if(isset($_SESSION['user']) == FALSE){
                    echo '<div class="item-juego"><a href="../M-master/licencia"><img class="imagen-juego" src="/M-master/pub/images/memory.png" /></a><div class="text-game"><a href="../M-master/licencia"><div class="compra"></div><div>Memory</div></div></a></div>

                    <div class="item-juego"><a href="../M-master/licencia"><img class="imagen-juego" src="/M-master/pub/images/relaciona.jpg" /></a><div class="text-game"><a href="../M-master/licencia"><div class="compra"></div><div>relaciona</div></div></a></div>

                    
                    <div class="item-juego"><a href="../M-master/licencia"><img class="imagen-juego" src="/M-master/pub/images/comosiento.jpg" /></a><div class="text-game"><a href="../M-master/licencia"><div class="compra"></div><div>como me siento</div></div></a></div>

                    <div class="item-juego"><a href="../M-master/licencia"><img class="imagen-juego" src="/M-master/pub/images/puzzle_rabbit.jpg" /></a><div class="text-game"><a href="../M-master/licencia"><div class="compra"></div><div>puzzle</div></div></a></div>

                    <div class="item-juego"><a href="../M-master/licencia"><img class="imagen-juego" src="/M-master/pub/images/simpson.jpg" /></a><div class="text-game"><a href="../M-master/licencia"><div class="compra"></div><div>Simpson Atrapado</div></div></a></div>

                    <div class="item-juego"><a href="../M-master/licencia"><img class="imagen-juego" src="/M-master/pub/images/bob.jpg" /></a><div class="text-game"><a href="../M-master/licencia"><div class="compra"></div><div>bob el correcaminos</div></div></a></div>';
                }
            ?>
        </div>
    </div>
    <?php 
            if(isset($_SESSION['user']) == TRUE){
                echo '<div id="top-jugados">
                        <div class="title">
                            <img class="log-section" src="/M-master/pub/images/trofeo.png" /><h1>Top jugadores</h1>
                        </div>
                        <div class="top-jugadores"></div>
                    </div>';
            }
    ?>
</div>
</div>