<?php
namespace djsharman\examples\statemachinesDoor;
//>>>> don't change the CUSTOM CODE comments, if you do generation will overwrite your code >>>>
//###START_CUSTOMCODE1

    

//###END_CUSTOMCODE1
class LockedDoorState extends AbstractDoorState {
//>>>> don't change the CUSTOM CODE comments, if you do generation will overwrite your code >>>>
//###START_CUSTOMCODE2

    

//###END_CUSTOMCODE2

    public function onEnterState() {

    }

    public function onExitState() {

    }

    /**
     * @return ClosedDoorState
     */
    public function unlock() {
        return new ClosedDoorState();
    }

}
