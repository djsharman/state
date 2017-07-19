<?php
namespace examples\statemachines\PwrCall;
//>>>> don't change the CUSTOM CODE comments, if you do generation will overwrite your code >>>>
//###START_CUSTOMCODE1

    

//###END_CUSTOMCODE1
class WaitForUserRegState extends AbstractPwrCallState {
//>>>> don't change the CUSTOM CODE comments, if you do generation will overwrite your code >>>>
//###START_CUSTOMCODE2

    

//###END_CUSTOMCODE2

    public function onEnterState() {

    }

    public function onExitState() {

    }

    /**
     * @return WaitForUserParkedState
     */
    public function userRegistered() {
        return new WaitForUserParkedState();
    }

    /**
     * @return UserRegFailState
     */
    public function userRegFailed() {
        return new UserRegFailState();
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
