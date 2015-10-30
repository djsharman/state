<?php
namespace examples\statemachines\Door;
//>>>> don't change the CUSTOM CODE comments, if you do generation will overwrite your code >>>>
//###START_CUSTOMCODE1

    

//###END_CUSTOMCODE1
class ClosedDoorState extends AbstractDoorState {
//>>>> don't change the CUSTOM CODE comments, if you do generation will overwrite your code >>>>
//###START_CUSTOMCODE2

    

//###END_CUSTOMCODE2

    public function onEnterState() {

    }

    public function onExitState() {

    }

    /**
     * @return OpenDoorState
     */
    public function open() {
        return new OpenDoorState();
    }

    /**
     * @return LockedDoorState
     */
    public function lock() {
        return new LockedDoorState();
    }

}
