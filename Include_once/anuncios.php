<form action="anuncio.php" method="POST">
    <div class="anuncios" loading="lazy">
         <?php foreach ($result as $item) : ?>
       

            <a href="../PHP/anuncio.php?idAnuncio=<?= $item['idAnuncio'] ?>">
                <div class="itemAnuncio">
                    <img class="itemImagem" alt="Image" src="../uploads/<?= $item['imagem'] ?>">
                    <div class="itemInfo">
                        <h2><?php echo $item['titulo'] ?></h2>
                        <h3><?php echo $item['preco'] . "€" ?></h3>
                        <?php if ($item['localizacao'] == null) {
                            $item['localizacao'] = "Localização";
                        } ?>
                        <h4><!-- Icon SVG -->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="12" height="12" viewBox="0 0 256 256" xml:space="preserve">
                                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                                    <path d="M 45 0 C 27.677 0 13.584 14.093 13.584 31.416 c 0 4.818 1.063 9.442 3.175 13.773 c 2.905 5.831 11.409 20.208 20.412 35.428 l 4.385 7.417 
                                    C 42.275 89.252 43.585 90 45 90 s 2.725 -0.748 3.444 -1.966 l 4.382 -7.413 c 8.942 -15.116 17.392 -29.4 20.353 -35.309 c 0.027 -0.051 0.055 -0.103 0.08 -0.155 c 2.095 -4.303 3.157 -8.926 3.157 -13.741 C 76.416 14.093 62.323 0 45 0 z M 45 42.81 
                                    c -6.892 0 -12.5 -5.607 -12.5 -12.5 c 0 -6.893 5.608 -12.5 12.5 -12.5 c 6.892 0 12.5 5.608 12.5 12.5 C 57.5 37.202 51.892 42.81 45 42.81 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter;
                                    stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                </g>
                            </svg><?php echo $item['localizacao'] ?>
                        </h4>
                    </div>
                </div>
            </a>

</form>

<?php endforeach; ?>


</div><br><br>
<script>

</script>