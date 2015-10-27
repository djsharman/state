<?php
namespace djsharman\examples\statemachinesPwrCall;
//>>>> don't change the CUSTOM CODE comments, if you do generation will overwrite your code >>>>
//###START_CUSTOMCODE1

    

//###END_CUSTOMCODE1
class UserParkFailState extends AbstractPwrCallState {
//>>>> don't change the CUSTOM CODE comments, if you do generation will overwrite your code >>>>
//###START_CUSTOMCODE2

    

//###END_CUSTOMCODE2

    public function onEnterState() {

    }

    public function onExitState() {

    }

    /**
     * @return StartUpState
     */
    public function restartAfterTechFailure() {
        return new StartUpState();
    }

    /**
     * @return EndState
     */
    public function cancel() {
        return new EndState();
    }

}
