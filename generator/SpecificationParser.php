<?php
use TheSeer\fDOM\fDOMDocument;

class SpecificationParser
{
    /**
     * @var TheSeer\fDOM\fDOMDocument
     */
    private $dom;

    /**
     * @var array
     */
    private $specification;

    /**
     * @param SpecificationFilename $file
     */
    public function __construct($file)
    {
        $this->dom = new fDOMDocument;
        $this->dom->load($file);
    }

    /**
     * @return string
     */
    public function getTargetDir()
    {
        return $this->dom->queryOne('configuration/targetdir')->getAttribute('name');
    }

    /**
     * @return string
     */
    public function getNamespace()
    {
        return $this->dom->queryOne('configuration/namespace')->getAttribute('name');

    }

    /**
     * @return string
     */
    public function getSMImplements()
    {

        $ret = '';
        try{
            $DomElem = $this->dom->queryOne('configuration/sm_implements');
            if($DomElem != null) {
                $ret = $DomElem->getAttribute('name');
            }
        } catch (\Exception $e) {

        }

        return $ret;
    }

    /**
     * @return array
     */
    public function getOperations()
    {
        $this->parse();

        return $this->specification['operations'];
    }

    /**
     * @return array
     */
    public function getQueries()
    {
        $this->parse();

        return $this->specification['queries'];
    }

    /**
     * @return array
     */
    public function getStates()
    {
        $this->parse();

        return $this->specification['states'];
    }

    /**
     * @return array
     */
    private function parse()
    {
        if ($this->specification !== NULL) {
            return;
        }

        $queries = array();
        $states  = array();

        $dom_states = $this->dom->query('states/state');
        foreach ($dom_states as $state) {
            /** @var TheSeer\fDOM\fDOMElement $state */

            $state_name = $state->getAttribute('name');
            $states[$state_name] = array(
                'transitions' => array(),
                'query'       => 'is'.$state_name
            );

            $queries[] = 'is'.$state_name;
        }

        $operations = array();



        foreach ($this->dom->query('transitions/transition') as $transition) {
            /** @var TheSeer\fDOM\fDOMElement $transition */

            $from      = $transition->getAttribute('from');
            $to        = $transition->getAttribute('to');
            $operation = $transition->getAttribute('operation');

            $states[$from]['transitions'][$operation] = $to;
        }

        foreach ($this->dom->query('transitions/transition') as $transition) {
            /** @var TheSeer\fDOM\fDOMElement $operation */
            $operation = $transition->getAttribute('operation');
            $operations[$operation] = array(
                'allowed'    => 'can'.ucfirst($operation),
                'disallowed' => 'cannot'.ucfirst($operation),
            );
        }

        $this->specification = array(
            'operations' => $operations,
            'queries'    => $queries,
            'states'     => $states
        );
    }
}
