<?php

/*
 * Class for detection of gender by names
 */

class Gender {

    private $lang;

    public function __construct() {
        $this->lang = 'ru';
    }

    public function setLang($lang) {
        $this->lang = $lang;
    }

    public function getGender($name) {
        $female = file("dic/female_" . $this->lang . ".txt");

        foreach ($female as $femaleName) {
            $femaleName = str_replace("\n", "", $femaleName);
            $femaleName = str_replace("\r", "", $femaleName);
            if ($name == $femaleName) {
                return 'female';
            }
        }
        unset($female);
        $male = file("dic/male_" . $this->lang . ".txt");

        foreach ($male as $maleName) {
            $maleName = str_replace("\n", "", $maleName);
            $maleName = str_replace("\r", "", $maleName);
            if ($name == $maleName) {
                return 'male';
            }
        }
        unset($male);
        return FALSE;
    }

}

/*
$gender = new Gender();
$gender->setLang('ru');
echo $gender->getGender('Миша');
*/
