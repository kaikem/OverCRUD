<?php
//VERIFICAÇÃO DE SESSÃO
require_once 'sessionverif.php';
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="./css/bootstrap.min.css" rel="stylesheet" />
    <link href="./css/style.css" rel="stylesheet" />
    <title>OverCRUD - Home</title>
</head>

<body>
    <div class="container">
        <!-- ROW DA NAVBAR -->
        <div class="row" id="navbarTop">
            <?php require_once 'navbarTop.php'; ?>
        </div>

        <!-- ROW DO CORPO -->
        <div class="row mt-5" id="appBody">
            <div class="col mt-5">
                <h1 class="display-5 text-primary">Seja bem-vindo(a), <b><?= $nomeUsu ?></b>!</h1>
                <p class="mt-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem cupiditate neque
                    voluptatem deleniti
                    labore nostrum, tenetur similique, atque sequi, nam soluta ex! Aspernatur harum odio ipsa error
                    illum, unde quod mollitia officiis saepe excepturi. Vel culpa accusamus tempore explicabo error
                    magnam sunt animi voluptatum enim quam vitae voluptas magni quibusdam quod, repellat, repellendus
                    neque architecto perferendis doloremque saepe numquam soluta nam deleniti. Veritatis cumque facilis
                    deleniti debitis amet quis numquam quo, adipisci, porro dicta nisi itaque beatae voluptate optio
                    incidunt. A, ipsam praesentium perferendis minima pariatur repellendus velit deserunt quidem natus
                    accusamus eaque consectetur sint omnis magnam impedit sequi qui id veritatis quas mollitia. Ducimus
                    itaque quos tempora laboriosam odio veniam quis cupiditate? Ex sint in eius, consequuntur accusamus
                    repellendus quos esse obcaecati placeat suscipit distinctio libero autem! Mollitia neque placeat
                    nostrum dicta voluptatibus minima nobis soluta, voluptates, dignissimos, animi voluptate nesciunt?
                    Corrupti et aspernatur molestias quo inventore esse numquam soluta error a maiores vel, cumque eius
                    mollitia porro distinctio perspiciatis at recusandae consectetur doloribus quibusdam ipsa deleniti
                    excepturi quas dicta! Impedit doloribus voluptate mollitia rem aperiam rerum minus nobis non,
                    eveniet distinctio dolorum corporis maxime voluptatum unde accusantium deleniti illum dignissimos
                    commodi! Architecto obcaecati eos maxime enim mollitia nihil beatae quia? Hic, dolores! Delectus
                    enim natus expedita quis cumque distinctio modi ab aliquam cum, aspernatur quo quibusdam quas
                    perferendis deleniti omnis maxime quaerat eum fugit, obcaecati pariatur a ducimus eaque. Porro minus
                    fugiat fugit perferendis, ullam ex exercitationem corporis quidem alias vero expedita facere, libero
                    ratione sapiente sequi consectetur, ut laudantium. Culpa odio voluptatem voluptatibus, porro sed
                    voluptas quibusdam nam ad earum consectetur optio doloremque corrupti hic illo, ratione aliquid
                    veniam ducimus eos itaque, consequuntur doloribus? Nulla labore corporis unde, deserunt commodi
                    inventore, praesentium expedita officiis, odit magni hic. Amet, quas ullam et dignissimos, quo
                    cumque distinctio quisquam officia deleniti eos autem cum aut, provident fugiat? Itaque deserunt
                    voluptatem enim praesentium accusamus magni ab. Odit tempore delectus laborum minus, maiores
                    dignissimos praesentium totam commodi nulla animi. Dignissimos laborum voluptatum repellat.
                    Repellendus nesciunt corrupti repellat tempore atque consectetur error fuga, quas aspernatur optio
                    qui facilis, molestiae cupiditate exercitationem autem minus dolorem natus voluptatem laborum
                    inventore deserunt excepturi id. Suscipit, accusamus eligendi! Nulla dolores repellendus molestias
                    harum modi exercitationem numquam mollitia impedit optio eaque odit deleniti quaerat tempore est
                    totam atque unde illo quasi rerum quisquam officia, consectetur itaque dolore eveniet. Labore quasi
                    sequi obcaecati mollitia commodi maxime a, aliquid aperiam impedit ullam natus voluptates temporibus
                    ab quia cupiditate ratione saepe id corporis ex dicta facilis. Expedita deleniti alias atque labore
                    excepturi tempora. Dolore, nisi! Adipisci, asperiores fugiat, laudantium quia sit non placeat
                    provident explicabo libero debitis consectetur perferendis suscipit eligendi nulla nemo! Quae veniam
                    nam facere esse accusamus iste fugit suscipit cupiditate atque laboriosam, quidem tempora
                    dignissimos, mollitia earum aliquid est voluptas veritatis harum nobis rem quos totam magnam
                    voluptates saepe. Voluptatem, iusto? Ad optio magni molestiae perferendis quasi pariatur quam
                    aperiam sapiente consequuntur quidem, iure quod, nisi ea velit quo obcaecati adipisci. Qui placeat
                    necessitatibus nobis doloremque aliquid quibusdam?</p>
            </div>
        </div>
        <!-- FOOTER -->
        <?php require_once 'footer.php' ?>
    </div>

    <!-- SCRIPTS JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/9e35ffe1bb.js" crossorigin="anonymous"></script>
    <script src="./js/darkmodetoggle.js"></script>
</body>

</html>