<?php
class GenBase{


    private $section1;
    private $section2;

    public function procExistingContent($output_filename) {

        $content = '';
        if (file_exists($output_filename)){
            $content = file_get_contents($output_filename);
        }


        $this->section2 = $this->getAutocode($content, '2');
        $this->section1 = $this->getAutocode($content, '1');

    }


    public function getAutocode($text, $section){
        $start = '//###START_CUSTOMCODE'.$section;
        $end = '//###END_CUSTOMCODE'.$section;
        $pos = stripos($text, $start);
        if ($pos===FALSE){
            return '';
        }
        $text = substr($text, $pos+22);
        $pos = stripos($text, $end);
        if ($pos===FALSE){
            return $text;
        }
        $text = substr($text, 0, $pos);
        $text = trim($text);
        $text = '    '.$text;
        return $text;
    }

    public function methodExists($method_name){
        return preg_match("/function[\s]+[&]?$method_name\(/i", $this->section2);
    }


    public function getSection1() {
        return $this->section1;
    }

    public function getSection2() {
        return $this->section2;
    }

}
?>