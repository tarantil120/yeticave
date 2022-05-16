INSERT INTO `category`(`id_category`, `name`) VALUES (NULL,'Доски и лыжи')
,(NULL,'Крепления'),(NULL,'Ботинки'),(NULL,'Одежда'),(NULL,'Инструменты'),(NULL,'Разное');  /* добавление в бд данных о категориях товара */

INSERT INTO `users` (`id_user`, `date_register`, `email`, `name`, `password`, `avatar`, `contacts`) VALUES (NULL, '2022-05-16 09:20:05.000000', 'prosyankin.vlad@yandex.ru', 'Владислав', 'asdafaraasdasd', 'asdasda', 'dasdasdasd'),       /* добавление данных о пользователях */
                                                                                                           (NULL, '2022-05-16 09:30:05.000000', 'koksmc2002@gmail.com', 'Дмитрий', 'zzzzzzzzzzz', 'ssssssss', 'qqqqqqqqqqqqq');

INSERT INTO `lot` (`id_lot`, `id_user`, `id_category`, `id_winner`, `creation_date`, `name`, `description`, `image`, `start_price`, `date_end`, `step_price`)                  /* добавление данных о лотах */
VALUES (NULL, '1', '1', '1', '2022-05-16 09:24:08.000000', '2014 Rossignol District Snowboard', 'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчкоми четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот снаряд отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом кэмбер позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется, просто посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла равнодушным.', 'lot-2.jpg', '10999', '2022-05-17 09:24:08.000000', '100'),
       (NULL, '2', '1', '2', '2022-05-16 09:27:27.000000', 'DC Ply Mens 2016/2017 Snowboard', 'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчкоми четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот снаряд отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом кэмбер позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется, просто посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла равнодушным.', 'lot-2.jpg', '159999', '2022-05-16 09:27:27.000000', '100'),
       (NULL, '1', '2', '1', '2022-05-16 09:30:30.000000', 'Крепления Union Contact Pro 2015 года размер L/XL', 'f', 'lot-3.jpg', '8000', '2022-05-17 09:30:30.000000', '100'),
       (NULL, '2', '3', '2', '2022-05-16 09:30:57.000000', 'Ботинки для сноуборда DC Mutiny Charocal', 'a', 'lot-4.jpg', '10999', '2022-05-17 09:30:57.000000', '100'),
       (NULL, '1', '4', '1', '2022-05-16 09:33:35.000000', 'Куртка для сноуборда DC Mutiny Charocal', 'asdasd', 'lot-5.jpg', '7500', '2022-05-17 09:33:35.000000', '100'),
       (NULL, '2', '6', '2', '2022-05-16 09:34:33.000000', 'Маска Oakley Canopy', 'asfqweqwrzxczxczxczczxc', 'lot-6.jpg', '5400', '2022-05-17 09:34:33.000000', '100');

INSERT INTO `steps` (`id_steps`, `id_user`,`id_lot`, `date_placement`, `sum`) VALUES (NULL, '1','1', '2022-05-16 09:36:17.000000', '11099'), /* добавление  в бд данных о ставках пользователей на лоты */
                                                                                     (NULL, '2','1', '2022-05-16 09:41:51.000000', '11199');

SELECT * FROM `category`;  /* получить все данные о категориях */

SELECT a.Name,
       start_price,
       image,
       (sum(b.sum)+a.start_price)Последняя_ставка,
       count(b.sum)Количество_ставок,
       c.name,
       id_winner
from lot as a
       left join steps b
                 on a.id_lot = b.id_lot
       inner join category c on a.id_category = c.id_category
group by a.name, start_price, image,creation_date,date_end, c.name, id_winner
having ISNULL(date_end)
order by creation_date desc; /*получить самые новые, открытые лоты. Каждый лот должен включать
название, стартовую цену, ссылку на изображение, цену последней ставки,
количество ставок, название категории;*/

SELECT `id_lot`,`category`.`name` FROM lot INNER JOIN category ON `lot`.`id_category` = `category`.`id_category`; /* получить id лота и название категории по id */

UPDATE `lot` SET `name`= 'You my butterfly, sugar, lady' WHERE `id_lot` = 1;   UPDATE `lot` SET `name`= '2014 Rossignol District Snowboard' WHERE `id_lot` = 1;   /* обновить название лота по его идентификатору */

SELECT `id_steps`,`steps`.`id_user`,`date_placement`,`sum` FROM `steps` INNER JOIN `users` ON `steps`.`id_user` = `users`.`id_user` WHERE DATE(`date_placement`) = '2022-05-16';  /* получить список самых свежих ставок для лота по его идентификатору;  */
