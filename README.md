Localized Date
==============

This library provide some utilities to work with dates in different languages by using the locale.

Utilities:

1. Convert datetime into formatted string depent on the given locale:

    <?php
    echo Pcabreus\Utils\DateTime\LocalizedDate::getLocaleFormatDate(new \DateTime('now'), 'es'); // e.g. 17 de Junio de 1988
    echo Pcabreus\Utils\DateTime\LocalizedDate::getLocaleFormatMountAndYear(new \DateTime('now'), 'es') // e.g. Junio de 1988

2. Get a list of months:
    
    <?php
    $months =  Pcabreus\Utils\DateTime\LocalizedDate::getMonthsLocalized('es'); // [1 => Enero, 2 => Febrero,...12 => Dicimebre
 
This utils all just shortcut to \IntlDateFormatter