FurnitureBase-specification-txt-onweb
==

Processor specification basis in txt format.

Data processor Basis furnitur - [bazissoft](https://www.bazissoft.ru/products/bazis_mebelschik/doc-bm) maker for furniture production.

DIRECTORY STRUCTURE
-------------------

      .htaccess                     Файл используется для установки безопастности и запрета доступа к данным файла из браузера пользователя;
      indx.php                      Файл используется для настройки fpdf и передачи переменных из главной формы для формирования формы печати
      jquery.autocomplete.css       Файл используется для установки стилей для автозаполнения в input'ы главной формы обработки спецификации
      jquery.autocomplete.pack.js   Файл используется для хранения библиотеки обработки автозаполнения главной формы спецификации
      obrab_fio_save_txt.php        Файл используется для обработки и сохранения часто введенных ФИО в input'ы главной формы спецификации
      price.class.php               Файл используется для обработки и настройки правильного оформления и формирования формы печати
      search.php                    Файл используется для автозаполнения всех облицовок найденных в базе системы
      upload.php                    Файл используется для записи всех данных из формы обработки спецификаций в текстовый файл dd.txt
      search_name.php               Файл используется для поиска и заполнения автозаполнения в форму ввода ФИО заполняемые пользователями


INSTALLATION
------------

### Install

To install the project, use the following command:
~~~
git clone https://github.com/SysProd/FurnitureBase-specification-txt-onweb
~~~

## Technologies used

- [PHP 5: Version 5.6.40](https://www.php.net/ChangeLog-5.php).
- [FPDF: * Version: 1.85](https://github.com/Setasign/FPDF/blob/master/fpdf.php).
- [jQuery v1.9.1](https://blog.jquery.com/2010/02/19/jquery-142-released/).
- [jQuery alert plugin](https://github.com/luizinhoparreira/jQuery-Alert-Dialogs-Plugin).
- [jQuery Autocomplete plugin 1.1](https://github.com/agarzola/jQueryAutocompletePlugin).
- [jquery-ui-1.8.21.custom.min.js](https://gist.github.com/killerbytes/2894453).

-------------------
## latest project update:

- august 1, 2021
-------------------