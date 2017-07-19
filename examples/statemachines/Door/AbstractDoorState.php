<?php
namespace examples\statemachines\Door;
use \examples\statemachines\Door\IllegalStateTransitionException;
//>>>> don't change the CUSTOM CODE comments, if you do generation will overwrite your code >>>>
//###START_CUSTOMCODE1

    

//###END_CUSTOMCODE1
abstract class AbstractDoorState implements DoorState {
//>>>> don't change the CUSTOM CODE comments, if you do generation will overwrite your code >>>>
//###START_CUSTOMCODE2

    

//###END_CUSTOMCODE2

    public function setParentStateMachine(Door $SM) {
        $this->SM = $SM;
    }

    public function onEnterState() {

    }

    public function onExitState() {

    }

    /**
     * @throws IllegalStateTransitionException
     */
    public function open() {
        throw new IllegalStateTransitionException;
    }

    /**
     * @throws IllegalStateTransitionException
     */
    public function close() {
        throw new IllegalStateTransitionException;
    }

    /**
     * @throws IllegalStateTransitionException
     */
    public function lock() {
        throw new IllegalStateTransitionException;
    }

    /**
     * @throws IllegalStateTransitionException
     */
    public function unlock() {
        throw new IllegalStateTransitionException;
    }

}
