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
        <form class="form form--add-lot container <?=is_empty("lot-name","category","message","lot-rate","lot-step","lot-date")?> <?=$error_name1?> "
              action="../add.php" method="post" enctype="multipart/form-data">
            <h2>Добавление лота</h2>
            <div class="form__container-two">
                <div class="form__item <?=is_empty2("lot-name")?>">
                    <label for="lot-name">Наименование <sup>*</sup></label>
                    <input id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота" value = <?=$_POST["lot-name"]?>>
                    <span class="form__error">Введите наименование лота</span>
                </div>
                <div class="form__item <?=is_empty2("category")?>">
                    <label for="category">Категория <sup>*</sup></label>
                    <select id="category" name="category">
                        <?php
                        foreach($array as $category){
                        ?>
                        <option><?=$category["name"]?></option>
                        <?php } ?>

                    </select>
                    <span class="form__error">Выберите категорию</span>
                </div>
            </div>
            <div class="form__item form__item--wide <?=is_empty2("message")?>">
                <label for="message">Описание <sup>*</sup></label>
                <textarea id="message" name="message" placeholder="Напишите описание лота"><?=$_POST["message"]?></textarea>
                <span class="form__error">Напишите описание лота</span>
            </div>
            <div class="form__item form__item--file <?=empty_image()?>">
                <label>Изображение <sup>*</sup></label>
                <div class="form__input-file">
                    <input name="image" class="visually-hidden" type="file" id="lot-img" value="">
                    <label for="lot-img">
                        Добавить
                    </label>
                    <span class="form__error">Добавьте изображение</span>
                </div>
            </div>
            <div class="form__container-three">
                <div class="form__item form__item--small <?=type_int_empty("lot-rate")?>">
                    <label for="lot-rate">Начальная цена <sup>*</sup></label>
                    <input id="lot-rate" type="text" name="lot-rate" placeholder="0" value="<?=$_POST["lot-rate"]?>">
                    <span class="form__error">Введите начальную цену</span>
                </div>
                <div class="form__item form__item--small <?=type_int_empty("lot-step")?>">
                    <label for="lot-step">Шаг ставки <sup>*</sup></label>
                    <input id="lot-step" type="text" name="lot-step" placeholder="0" value="<?=$_POST["lot-step"]?>">
                    <span class="form__error">Введите шаг ставки</span>
                </div>
                <div class="form__item <?=is_empty2("lot-date")?>">
                    <label for="lot-date">Дата окончания торгов <sup>*</sup></label>
                    <input class="form__input-date" id="lot-date" type="text" name="lot-date" placeholder="Введите дату в формате ГГГГ-ММ-ДД" value="<?=$_POST["lot-date"]?>">
                    <span class="form__error">Введите дату завершения торгов</span>
                </div>
            </div>
            <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
            <button type="submit" class="button">Добавить лот</button>
        </form>
