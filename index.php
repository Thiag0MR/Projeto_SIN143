<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Tem Vaga Aí ?</title>
        <link rel="stylesheet" href="./css/index.css">
        <link rel="stylesheet" href="./css/footer.css">
        <link rel="stylesheet" href="./css/header.css">
        <script src="https://kit.fontawesome.com/107c433e36.js" crossorigin="anonymous"></script>
    <body>
        <?php require "./paginas/header.php"; ?>

        <div class="conteudo">
            <div id = "SecaoPrincipal">
                <div id = "ImagemPrincipal">
                    <div id = "ConteudoImagem">
                        <h1>Bem vindo ao Tem Vaga Aí ?</h1>
                        <h3>As melhores vagas em um só lugar !</h3>
                        <div id="divBusca">
                          <form action="/action_page.php">
                            <div id="txtBusca">
                                <input type="text" placeholder="Buscar..."/>
                            </div>
                            <div id="Pesquisar">
                                <input type="submit" value="Pesquisar">
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
              </div>


            <section id="SecaoCategorias">
                <div class="container">
                    <ul class="linha">
                        <li class="item">
                            <a href="./paginas/Camas/Camas.html">
                                <span><img src="./images/icons/bed.png" alt=""></span>
                                <small>Camas</small>
                            </a>
                        </li>
                        <li class="item">
                            <a href="./paginas/Sofas/Sofa.html">
                                <span><img src="./images/icons/couch.png" alt=""></span>
                                <small>Sofás</small>
                            </a>
                        </li>
                        <li class="item">
                            <a href="./paginas/Redes/Redes.html">
                                <span><img src="./images/icons/hammocks.png" alt=""></span>
                                <small>Redes</small>
                            </a>
                        </li>
                        <li class="item">
                            <a href="#">
                                <span><img src="./images/icons/wardrobe.png" alt=""></span>
                                <small>Armários</small>
                            </a>
                        </li>
                    </div>
                </div>
            </section>

            <section id="SecaoSlider">
                <div class="slidershow">
                    <div class="slides">
                        <input type="radio" name="r" id="r1" checked>
                        <input type="radio" name="r" id="r2">
                        <input type="radio" name="r" id="r3">
                        <input type="radio" name="r" id="r4">
                        <input type="radio" name="r" id="r5">

                        <div  class="slide s1">
                            <a href="./paginas/Camas/CamaMedia.html"><img src="./paginas/Camas/CamaMedia.jpg" alt="Cama"></a>
                        </div>
                        <div class="slide">
                            <a href="./paginas/Redes/RedeCara.html"><img src="./paginas/Redes/RedeCara.jpg" alt="Rede"></a>
                        </div>
                        <div class="slide">
                            <a href="./paginas/Sofas/SofaCaro.html"><img src="./paginas/Sofas/SofaCaro.jpg" alt="Sofá"></a>
                        </div>
                        <div class="slide">
                            <a href="./paginas/Camas/CamaCara.html"><img src="./paginas/Camas/CamaCara.jpg" alt="Cama"></a>
                        </div>
                        <div class="slide">
                            <a href="./paginas/Redes/RedeBarata.html"><img src="./paginas/Redes/RedeBarata.jpg" alt="Rede"></a>
                        </div>
                    </div>

                    <div class="navigation">
                        <label for="r1" class="bar"></label>
                        <label for="r2" class="bar"></label>
                        <label for="r3" class="bar"></label>
                        <label for="r4" class="bar"></label>
                        <label for="r5" class="bar"></label>
                    </div>
                </div>
            </section>

            <div id="divTexto">
                <h3>Nunc velit lectus</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sollicitudin urna in nibh iaculis dignissim. Donec efficitur nunc vitae ultricies mattis. Donec non nisl sit amet est placerat cursus in nec justo. Etiam aliquam, quam mollis ornare tincidunt, turpis nibh elementum magna, ut porttitor metus risus eget odio. Quisque ante urna, consequat blandit nisi vitae, eleifend dapibus nisl. Phasellus pulvinar urna sed est convallis, in fringilla ex lobortis. Maecenas sit amet purus tempor, ornare mi ut, dapibus dolor. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed commodo lectus in tempus viverra. Vivamus imperdiet lorem et sapien viverra, eu venenatis dolor accumsan.</p>
                <p>Donec porttitor, ex ac hendrerit posuere, augue eros tristique est, nec viverra ex nisl sed elit. Fusce a sapien vitae arcu maximus faucibus. Nullam pellentesque, velit vitae vulputate volutpat, justo velit rhoncus sem, non tempor dui purus sit amet mi. Ut viverra ornare dui sed semper. Cras tincidunt, sapien eget varius tristique, nibh dolor posuere massa, sed accumsan est nisl in felis. Mauris ut risus in massa posuere dictum. Nullam id vehicula quam. Praesent at vulputate mi, a rhoncus mauris. Morbi iaculis nibh quis sollicitudin pretium. Mauris ut pretium odio. Vivamus dolor turpis, viverra luctus ipsum sit amet, varius fringilla massa.</p>
                <p>Vestibulum eget sem in risus aliquam dapibus. Curabitur condimentum, augue et semper rhoncus, augue nibh pellentesque nulla, id porttitor nulla metus a metus. Quisque egestas imperdiet gravida. Quisque dictum ante quis mauris tristique, vitae sagittis leo molestie. Vivamus ut purus dui. Ut eu est ac purus molestie fermentum porttitor sit amet ligula. Sed sodales vel mi eu congue. Nulla suscipit sed sapien non porta. Mauris hendrerit vel nunc vitae tempus. Maecenas commodo venenatis condimentum. Mauris pulvinar nibh a viverra placerat. Proin quam ante, dignissim a dictum at, suscipit a felis. Pellentesque vel vestibulum felis, vel tempus metus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean pellentesque placerat ex nec tempus. Vestibulum libero nibh, tincidunt et lobortis eu, eleifend non diam.</p>

            </div>
        </div>

        <?php require "./paginas/footer.php"; ?>
    </body>
</html>
