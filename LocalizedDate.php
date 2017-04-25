<?php
/**
 * This file is part of the Pcabreus Projects.
 *
 * (c) Pedro Carlos Abreu <pcabreus@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pcabreus\Utils\DateTime;


/**
 * Class LocalizedDate
 * @package Pcabreus\Utils\DateTime
 *
 * @author Pedro Carlos Abreu <pcabreus@gmail.com>
 */
class LocalizedDate
{
    /**
     * Get a localiced date es e.g. 21 de Enero del 2016
     *
     * @param \DateTime $date
     * @param null $locale
     * @param int $datetype
     * @param int $timetype
     * @return bool|string
     */
    public static function getLocaleFormatDate(
        \DateTime $date,
        $locale = null,
        $datetype = \IntlDateFormatter::LONG,
        $timetype = \IntlDateFormatter::NONE
    ) {
        $formatter = \IntlDateFormatter::create(
            $locale,
            $datetype,
            $timetype,
            $date->getTimezone()->getName(),
            \IntlDateFormatter::GREGORIAN
        );

        return $formatter->format($date->getTimestamp());
    }

    /**
     * Caution: This only works to english
     *
     * @param \DateTime $date
     * @param null $locale
     * @param int $datetype
     * @param int $timetype
     * @param $format
     * @return string
     */
    public static function getLocaleFormatMountAndYear(
        \DateTime $date,
        $locale = null,
        $datetype = \IntlDateFormatter::LONG,
        $timetype = \IntlDateFormatter::NONE,
        $format
    ) {
        if ($locale === 'es') {
            return ucfirst(
                explode(' ', LocalizedDate::getLocaleFormatDate($date, $locale, $datetype, $timetype), 3)[2]
            );
        }

        return $date->format($format);
    }

    public static function getMonthsLocalized($locale)
    {
        $formatter = \IntlDateFormatter::create(
            $locale,
            $datetype = \IntlDateFormatter::LONG,
            $timetype = \IntlDateFormatter::NONE,
            null,
            \IntlDateFormatter::GREGORIAN,
            'MMMM'
        );

        $months = [];
        foreach (range(1, 12) as $number) {
            $months[] = ucwords($formatter->format(new\DateTime(sprintf('0000-%s-01', $number))));
        }

        return $months;
    }
} 