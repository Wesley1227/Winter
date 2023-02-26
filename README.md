A segunda entrga consiste no avanço no trabalho que foi feito desde a primeria entrega.

Conta ADMIN:
Admin (email/user: amin // Senha: 1227)

Alterações Back-end:

*Pasta Base de dados* - Nela contém a base de dados em formato SQL.

*Pasta Admin* - Nela contém páginas admin adicionadas que só quem é admin tem acesso, como por exemplo, adicionar categorias, marcas, etc, ao site.
O admin, é úncio, ele tem acesso e consegue como por exemplo remover e eitar anúncios, e isso está disponível apenas para quem criou o anúncio.

*Pasta Login* - Nela contém páginas para o funcionamento o login e registro do usuário.

*Pasta uploads* - Nela contém itens adicionadas a base de dados, como por exemplo imagens de anúncios, foto de perfil, etc.
Por não ter uma base de dados remota para ficheirops, optei por essa fuincionaliade no momento, na base de dados é inserida o nome o ficheiro e o mesmo é guardado na pasta, assim apenas precisa fazer a busca pelo nome.

*Pasta Include_once* - Nela contém ficheiros .php pastas, pasta expecifica para guardar código que depois será chamado com Include_once, assim nao precisar encher ficheiros com o mesmo código, basta criar uma vez e chamar quantas vezes eu quiser, como por exemplo o footer do site, basta inserir "<?php include_once '../Include_once/footer.php'; ?>". Assim ficando mais organizao e leve.

Entre váaarias alterações, como pesquisa, anuncios, perfil, dados, criar anuncio, etc...



Alterações Front-end:

Página index.php - Nela agora contém Destaques que faz a busca dos ultimos 15 anúncios adicionados e obrigatóriamente tem que possuir imagem.
Possui tambem, deslumbre do que será feito em projhetos futuros, que serão:

-"Winter produtos" parte que ja esta quase pronta e já está disponivel, onde podes vender e comprar proutos, novos e usados.

-"Winter empregos" onde poderá porcurar e adicionar vagas de empregos.

-"Winter entreterimento" onde poderá porcurar e adicionar coisas de entretenimento como videos e músicas e pessoas poddem ir lá e comprar, como por exemplo, vender musica instrumental, assim quem comprar terá total direto ao prouto e será disponiblizado um certificado a compra. Ou então ver intro de um vídeo, assim quem comprar terá direito a ele poder edita-lo como quiser.

-"Winter programação" onde poderá porcurar e adicionar projetos de programação, como por exemplo, "App de gestãop e stock", ou contrar alguém fazer fazer algo que envolva programação como por exemplo: "Preciso de um site que gere a minha loja de cosméticos".

-"Winter fórum" onde poderás entrar em grupos e conversar com pessoas com mesmo interesse que o seu, como por exemplo: "Fórum programação PT" esse forum pode ser utilizado para as pessoas conversarem sobre programação, ajudarem uns aos outros, etc.
