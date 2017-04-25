NamedCharacterConverter
=======================

This library provide you a simple way to convert datetime into formatted string depent on the given locale.

    <?php
    namespace App;

    use Pcabreus\Utils\DateTime\
    echo LocalizedDate::getLocaleFormatDate(new \DateTime('now'), 'es'); // e.g. 17 de Junio de 1988
