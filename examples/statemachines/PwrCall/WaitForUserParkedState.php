<?php
namespace examples\statemachines\PwrCall;
//>>>> don't change the CUSTOM CODE comments, if you do generation will overwrite your code >>>>
//###START_CUSTOMCODE1

    

//###END_CUSTOMCODE1
class WaitForUserParkedState extends AbstractPwrCallState {
//>>>> don't change the CUSTOM CODE comments, if you do generation will overwrite your code >>>>
//###START_CUSTOMCODE2

    

//###END_CUSTOMCODE2

    public function onEnterState() {

    }

    public function onExitState() {

    }

    /**
     * @return UserParkedState
     */
    public function userParked() {
        return new UserParkedState();
    }

    /**
     * @return UserParkFailState
     */
    public function userParkFailed() {
        return new UserParkFailState();
    }

    /**
     * @return EndState
     */
    public function cancel() {
        return new EndState();
    }

    /**
     * @return TechnicalProblemState
     */
    public function techProblem() {
        return new TechnicalProblemState();
    }

}
