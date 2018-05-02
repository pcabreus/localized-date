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
     * @param null $pattern
     * @return bool|string
     */
    public static function getLocaleFormatDate(
        \DateTime $date,
        $locale = null,
        $datetype = \IntlDateFormatter::LONG,
        $timetype = \IntlDateFormatter::NONE,
        $pattern = null
    ) {
        $formatter = \IntlDateFormatter::create(
            $locale,
            $datetype,
            $timetype,
            $date->getTimezone()->getName(),
            \IntlDateFormatter::GREGORIAN,
            $pattern
        );

        return $formatter->format($date->getTimestamp());
    }

    /**
     * Get the month and year, it works for es and en locale it's not proved on others locales
     *
     * @param \DateTime $date
     * @param null $locale
     * @param int $datetype
     * @param int $timetype
     * @return string
     */
    public static function getLocaleFormatMountAndYear(
        \DateTime $date,
        $locale = null,
        $datetype = \IntlDateFormatter::LONG,
        $timetype = \IntlDateFormatter::NONE
    ) {
        if ($locale === 'es') {
            return ucfirst(
                explode(' ', LocalizedDate::getLocaleFormatDate($date, $locale, $datetype, $timetype), 3)[2]
            );
        }

        return LocalizedDate::getLocaleFormatDate($date, $locale, $datetype, $timetype, 'MMMM Y');
    }

    /**
     * Get a list of all months according with the locale e.g. January, February
     *
     * @param $locale
     * @return array
     */
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