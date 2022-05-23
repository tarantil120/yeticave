<nav class="nav">
            <ul class="nav__list container">
                <?php
                foreach($array as $category){
                    ?>
                    <li class="nav__item">
                        <a href="pages/all-lots.html"><?=$category["name"]?></a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
        <section class="lot-item container">

            <h2><?=$lot_site['lot_name']?></h2>
            <div class="lot-item__content">
                <div class="lot-item__left">
                    <div class="lot-item__image">
                        <img src="<?=$lot_site["image"]?>" width="730" height="548" alt="Сноуборд">
                    </div>
                    <p class="lot-item__category">Категория: <span><?=$lot_site["name"]?></span></p>
                    <p class="lot-item__description"><?=$lot_site["description"]?></p>
                </div>
