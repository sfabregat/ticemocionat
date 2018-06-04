<div id="perfil-cont">
<div class="container-perfil">
  <div class="menu"><div>≡</div></div>
  <nav class="nav-juegos"><ul><a href="<?= APP_W.''; ?>"><li><img src="/M-master/pub/images/juegos.png" /><span>Juegos</span></li></a><a href="<?= APP_W.'cuentos'; ?>"><li><img src="/M-master/pub/images/cuentos.png" /><span>Cuentos</span></li></a><a href="<?= APP_W.'paint'; ?>"><li><img src="/M-master/pub/images/dibuja.png" /><span>Dibuja</span></li></a><a href="<?= APP_W.'emociones'; ?>"><li><img src="/M-master/pub/images/diccionario.png" /><span>Diccionario</span></li></a></ul></nav>

  <div class="readcrumb"></div>

  <h2>Perfil de usuario</h2>
      <hr />
      
      <div id="img_perfil"></div>
      <form action="../M-master/perfil/cambiarimg" method="post" enctype="multipart/form-data"> <!-- class="camb-form" -->
      <input type="hidden" name="MAX_FILE_SIZE" value="50000000">
    <input name="perfil" type="file"  onChange="ver(form.file.value)"> 
    <input name="submit" type="submit" value="Guardar">  
</form><br> <span id="image"></span> 
      
  <table class="tg">

  </table>
   <div id="fr"> <hr /><div class="imagenpaint"><h3>Dibujos realizados</h3></div></div>

</div>
</div>