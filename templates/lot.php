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
                <div class="lot-item__right">
                    <?php  if($is_auth==1)
                        {
                            ?>
                    <div class="lot-item__state">
                        <div class="lot-item__timer timer">
                            <?=timer()?>
                        </div>
                        <div class="lot-item__cost-state">
                            <div class="lot-item__rate">
                                <span class="lot-item__amount">Текущая цена</span>
                                <span class="lot-item__cost">10 999</span>
                            </div>
                            <div class="lot-item__min-cost">
                                Мин. ставка <span>12 000 р</span>
                            </div>
                        </div>
                        <form class="lot-item__form" action="#" method="post" autocomplete="off">
                            <p class="lot-item__form-item form__item form__item--invalid">
                                <label for="cost">Ваша ставка</label>
                                <input id="cost" type="text" name="cost" placeholder="12 000">
                                <span class="form__error">Введите ставку</span>
                            </p>
                            <button type="submit" class="button">Сделать ставку</button>
                        </form>
                    </div>
                    <div class="history">
                        <h3>История ставок (<span>10</span>)</h3>
                        <table class="history__list">
                            <tr class="history__item">
                                <td class="history__name">Иван</td>
                                <td class="history__price">10 999 р</td>
                                <td class="history__time">5 минут назад</td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </section>
