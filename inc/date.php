<?php

class date {

    static function number($num, $one, $two, $more) {
        $num = (int) $num;
        $l2 = substr($num, strlen($num) - 2, 2);

        if ($l2 >= 5 && $l2 <= 20) {
            return $more;
        }
        $l = substr($num, strlen($num) - 1, 1);
        switch ($l) {
            case 1:
                return $one;
                break;
            case 2:
                return $two;
                break;
            case 3:
                return $two;
                break;
            case 4:
                return $two;
                break;
            default:
                return $more;
                break;
        }
    }

    #читабельное представление времени с учетом часового пояса пользователя

    static function time($time = null, $adaptive = true) {
        if ($time > TIME) {
            $time -= TIME;
            $mes = 0;
            $day = 0;
            $hour = 0;
            $min = 0;
            $sec = 0;
            if ($time) {
                $sec = $time % 60;
            }
            if ($time >= 60) {
                $min = floor($time / 60 % 60);
            }
            if ($time >= 3600) {
                $hour = floor($time / 3600 % 24);
            }
            if ($time >= 86400) {
                $day = floor($time / 86400 % 30);
            }
            if ($time >= 2592000) {
                $mes = floor($time / 2592000 % 12);
            }

            if ($mes) {
                return $mes . ' месяц' . self::number($mes, '', 'а', 'ев') . ($day ? (', ' . $day . ' ' . self::number($day, 'день', 'дня', 'дней') . ($hour ? ' и ' . $hour . ' час' . self::number($hour, '', 'а', 'ов') : '')) : '');
            }
            if ($day) {
                return $day . ' ' . self::number($day, 'день', 'дня', 'дней') . ($hour ? (', ' . $hour . ' час' . self::number($hour, '', 'а', 'ов') . ($min ? ' и ' . $min . ' минут' . self::number($min, 'а', 'ы', '') : '')) : '');
            }
            if ($hour) {
                return $hour . ' час' . self::number($hour, '', 'а', 'ов') . ($min ? (', ' . $min . ' минут' . self::number($min, 'а', 'ы', '') . ($sec ? ' и ' . $sec . ' секунд' . self::number($sec, 'а', 'ы', '') : '')) : '');
            }
            if ($min) {
                return $min . ' минут' . self::number($min, 'а', 'ы', '') . ($sec ? ' и ' . $sec . ' секунд' . self::number($sec, 'а', 'ы', '') : '');
            }
            return $sec . ' секунд' . self::number($sec, 'а', 'ы', '');
        } else {
            global $user;
            if (!$time) {
                $time = TIME;
            }
            if ($user['group_access']) {
                $time_shift = $user['set_timesdvig'];
            } else {
                $time_shift = 0;
            }
            $time = $time + $time_shift * 3600;
            $vremja = date('j M в H:i', $time);
            $time_p[0] = date('j n Y', $time);
            $time_p[1] = date('H:i', $time);
            if ($adaptive && $time_p[0] == date('j n Y', TIME + $time_shift * 60 * 60)) {
                $vremja = date('H:i:s', $time);
            }
            if ($adaptive && $time_p[0] == date('j n Y', TIME - 60 * 60 * (24 - $time_shift))) {
                $vremja = lang("Вчера, в") . " $time_p[1]";
            }
            if ($adaptive && $time_p[0] == date('j n Y', TIME - 60 * 60 * (48 - $time_shift))) {
                $vremja = lang("Позавчера, в") . " $time_p[1]";
            }
            $vremja = str_replace("Jan", "Янв", $vremja);
            $vremja = str_replace("Feb", "Фев", $vremja);
            $vremja = str_replace("Mar", "Марта", $vremja);
            $vremja = str_replace("May", "Мая", $vremja);
            $vremja = str_replace("Apr", "Апр", $vremja);
            $vremja = str_replace("Jun", "Июня", $vremja);
            $vremja = str_replace("Jul", "Июля", $vremja);
            $vremja = str_replace("Aug", "Авг", $vremja);
            $vremja = str_replace("Sep", "Сент", $vremja);
            $vremja = str_replace("Oct", "Окт", $vremja);
            $vremja = str_replace("Nov", "Ноября", $vremja);
            $vremja = str_replace("Dec", "Дек", $vremja);
            return $vremja;
        }
    }

    static function timemini($time = null, $adaptive = true) {
        if ($time > TIME) {
            $time -= TIME;
            $mes = 0;
            $day = 0;
            $hour = 0;
            $min = 0;
            $sec = 0;
            if ($time) {
                $sec = $time % 60;
            }
            if ($time >= 60) {
                $min = floor($time / 60 % 60);
            }
            if ($time >= 3600) {
                $hour = floor($time / 3600 % 24);
            }
            if ($time >= 86400) {
                $day = floor($time / 86400 % 30);
            }
            if ($time >= 2592000) {
                $mes = floor($time / 2592000 % 12);
            }

            if ($mes) {
                return $mes . ' ' . self::number($mes, lang('месяц'), lang('месяца'), lang('месяцев')) . ($day ? (', ' . $day . ' ' . self::number($day, lang('день'), lang('дня'), lang('дней')) . ($hour ? ' ' . lang('и') . ' ' . $hour . ' ' . self::number($hour, lang('час'), lang('часа'), lang('часов')) : '')) : '');
            }
            if ($day) {
                return $day . ' ' . self::number($day, lang('день'), lang('дня'), lang('дней')) . ($hour ? (', ' . $hour . ' ' . self::number($hour, lang('час'), lang('часа'), lang('часов')) . ($min ? ' ' . lang('и') . ' ' . $min . ' ' . self::number($min, lang('минута'), lang('минуты'), lang('минут')) : '')) : '');
            }
            if ($hour) {
                return $hour . ' ' . self::number($hour, lang('час'), lang('часа'), lang('часов')) . ($min ? (', ' . $min . ' ' . self::number($min, lang('минута'), lang('минуты'), lang('минут')) . ($sec ? ' ' . lang('и') . ' ' . $sec . ' ' . self::number($sec, lang('секунда'), lang('секунды'), lang('секунд')) : '')) : '');
            }
            if ($min) {
                return $min . ' ' . self::number($min, lang('минута'), lang('минуты'), lang('минут')) . ($sec ? ' и ' . $sec . ' ' . self::number($sec, lang('секунда'), lang('секунды'), lang('секунд')) : '');
            }
            return $sec . ' ' . self::number($sec, lang('секунда'), lang('секунды'), lang('секунд'));
        } else {
            global $user;
            if (!$time) {
                $time = TIME;
            }
            if ($user['group_access']) {
                $time_shift = $user['set_timesdvig'];
            } else {
                $time_shift = 0;
            }
            $time = $time + $time_shift * 3600;
            $vremja = date('H:i', $time);
            $time_p[0] = date('j n Y', $time);
            $time_p[1] = date('H:i', $time);
            if ($adaptive && $time_p[0] == date('j n Y', TIME + $time_shift * 60 * 60)) {
                $vremja = date('H:i', $time);
            }
            if ($adaptive && $time_p[0] == date('j n Y', TIME - 60 * 60 * (24 - $time_shift))) {
                $vremja = "$time_p[1]";
            }
            if ($adaptive && $time_p[0] == date('j n Y', TIME - 60 * 60 * (48 - $time_shift))) {
                $vremja = "$time_p[1]";
            }
            $vremja = str_replace("Jan", "Янв", $vremja);
            $vremja = str_replace("Feb", "Фев", $vremja);
            $vremja = str_replace("Mar", "Марта", $vremja);
            $vremja = str_replace("May", "Мая", $vremja);
            $vremja = str_replace("Apr", "Апр", $vremja);
            $vremja = str_replace("Jun", "Июня", $vremja);
            $vremja = str_replace("Jul", "Июля", $vremja);
            $vremja = str_replace("Aug", "Авг", $vremja);
            $vremja = str_replace("Sep", "Сент", $vremja);
            $vremja = str_replace("Oct", "Окт", $vremja);
            $vremja = str_replace("Nov", "Ноября", $vremja);
            $vremja = str_replace("Dec", "Дек", $vremja);
            return $vremja;
        }
    }

    static function times($times) {
        global $set, $time;
        static $users;
        $lama = round(($time - $times) / 60);
        if ($lama < 1) {
            $lama = lang("только что");
        }
        if ($lama >= 1 && $lama < 60) {
            $lama = sklon_text($lama, array(lang('минуту'), lang('минуты'), lang('минут'))) . " " . lang('назад') . "";
        }
        if ($lama >= 60 && $lama < 1440) {
            $lama = round($lama / 60);
            $lama = sklon_text($lama, array(lang('час'), lang('часа'), lang('часов'))) . " " . lang('назад') . "";
        }
        if ($lama >= 1440) {
            $lama = round($lama / 60 / 24);
            $lama = sklon_text($lama, array(lang('день'), lang('дня'), lang('дней'))) . " " . lang('назад') . "";
        }
        return $lama;
    }

    static function timek($times) {
        global $set, $time;
        static $users;
        $lama = round(($time - $times) / 60);
        if ($lama < 1) {
            $lama = lang("только что");
        }
        if ($lama >= 1 && $lama < 60) {
            $lama = "$lama " . lang('м. назад') . "";
        }
        if ($lama >= 60 && $lama < 1440) {
            $lama = round($lama / 60);
            $lama = "$lama " . lang('ч. назад') . "";
        }
        if ($lama >= 1440) {
            $lama = round($lama / 60 / 24);
            $lama = "$lama " . lang('д. назад') . "";
        }
        return $lama;
    }

    static function sictime($timediff) {
        $oneMinute = 60;
        $oneHour = 60 * 60;
        $oneDay = 60 * 60 * 24;
        $dayfield = floor($timediff / $oneDay);
        $hourfield = floor(($timediff - $dayfield * $oneDay) / $oneHour);
        $minutefield = floor(($timediff - $dayfield * $oneDay - $hourfield * $oneHour) / $oneMinute);
        $secondfield = floor(($timediff - $dayfield * $oneDay - $hourfield * $oneHour - $minutefield * $oneMinute));
        $time_1 = "$hourfield ч. $minutefield м. $secondfield сек.";
        return $time_1;
    }

    #Вывод названия месяца

    static function rus_mes($num, $v = 1) {
        switch ($num) {
            case 1:return 'Январ' . ($v ? 'я' : 'ь');
            case 2:return 'Феврал' . ($v ? 'я' : 'ь');
            case 3:return 'Март' . ($v ? 'а' : '');
            case 4:return 'Апрел' . ($v ? 'я' : 'ь');
            case 5:return 'Ма' . ($v ? 'я' : 'й');
            case 6:return 'Июн' . ($v ? 'я' : 'ь');
            case 7:return 'Июл' . ($v ? 'я' : 'ь');
            case 8:return 'Август' . ($v ? 'а' : '');
            case 9:return 'Сентябр' . ($v ? 'я' : 'ь');
            case 10:return 'Октябр' . ($v ? 'я' : 'ь');
            case 11:return 'Ноябр' . ($v ? 'я' : 'ь');
            case 12:return 'Декабр' . ($v ? 'я' : 'ь');
            default:return false;
        }
    }

}
