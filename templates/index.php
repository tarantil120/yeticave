<section class="promo">
        <h2 class="promo__title">Нужен стафф для катки?</h2>
        <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
        <ul class="promo__list">
            <?php
            foreach($array as $category){
                ?>
                <li class="promo__item promo__item--<?=$category["eng_name"]?>">
                    <a class="promo__link" href="all-lots.html"><?=$category["name"]?></a>
                </li>
            <?php } ?>
        </ul>
</section>
    <section class="lots">
        <div class="lots__header">
            <h2>Открытые лоты</h2>
        </div>
        <ul class="lots__list">
            <?php
            foreach ($category_info as $info){
                ?>
                <li class="lots__item lot">
                    <div class="lot__image">
                        <img src="<?=$info["image"]?>" width="350" height="260" alt="">
                    </div>
                    <div class="lot__info">
                        <span class="lot__category"><?=$info["name"]?></span>
                        <h3 class="lot__title"><a class="text-link" href="lot.php?id_lot=<?=$info["id_lot"]?>"><?=$info["lot_name"]?></a></h3>
                        <div class="lot__state">
                            <div class="lot__rate">
                                <span class="lot__amount">Стартовая ставка</span>
                                <span class="lot__cost"><?=sub_format($info["start_price"])?></span>
                            </div>
                            <div class="lot__timer timer">
                                <?=timer()?>
                            </div>
                        </div>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </section>
