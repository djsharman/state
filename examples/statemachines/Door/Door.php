<?php
namespace examples\statemachines\Door;
//>>>> don't change the CUSTOM CODE comments, if you do generation will overwrite your code >>>>
//###START_CUSTOMCODE1

    

//###END_CUSTOMCODE1
class Door {
    /**
     * @var DoorState
     */
    private $state = null;

//>>>> don't change the CUSTOM CODE comments, if you do generation will overwrite your code >>>>
//###START_CUSTOMCODE2

    

//###END_CUSTOMCODE2



    public function __construct(DoorState $state) {
        $this->setState($state);
    }


    /**
     * @throws IllegalStateTransitionException
     */
    public function open() {
        $this->setState($this->state->open());
    }

    /**
     * @throws IllegalStateTransitionException
     */
    public function close() {
        $this->setState($this->state->close());
    }

    /**
     * @throws IllegalStateTransitionException
     */
    public function lock() {
        $this->setState($this->state->lock());
    }

    /**
     * @throws IllegalStateTransitionException
     */
    public function unlock() {
        $this->setState($this->state->unlock());
    }

    /**
     * @return bool
     */
    public function isOpenDoorState() {
        return $this->state instanceof OpenDoorState;
    }

    /**
     * @return bool
     */
    public function isClosedDoorState() {
        return $this->state instanceof ClosedDoorState;
    }

    /**
     * @return bool
     */
    public function isLockedDoorState() {
        return $this->state instanceof LockedDoorState;
    }



    public function setState(DoorState $state) {

        if($this->state !== null) {
            $this->state->onExitState();
        }

        $this->state = $state;
        $this->state->onEnterState();

    }

}
