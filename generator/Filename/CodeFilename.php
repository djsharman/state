<?php
class CodeFilename
{

    public static function getInst() {
        static $inst = null;
        if($inst === null) {
            $inst = new self();
        }
        return $inst;
    }
    /**
     * @var string
     */
    private $unitName;

    /**
     * @param string $unitName
     */
    public function __construct($unitName)
    {
        $this->unitName = $unitName;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return __DIR__ . '/../../example/src/' . $this->unitName . '.php';
    }
}
