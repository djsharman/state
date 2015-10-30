<?php
namespace examples\statemachines\PwrCall;
//>>>> don't change the CUSTOM CODE comments, if you do generation will overwrite your code >>>>
//###START_CUSTOMCODE1

    

//###END_CUSTOMCODE1
class NextCallState extends AbstractPwrCallState {
//>>>> don't change the CUSTOM CODE comments, if you do generation will overwrite your code >>>>
//###START_CUSTOMCODE2

    

//###END_CUSTOMCODE2

    public function onEnterState() {

    }

    public function onExitState() {

    }

    /**
     * @return InCallState
     */
    public function showCall() {
        return new InCallState();
    }

    /**
     * @return WPCompleteState
     */
    public function wpComplete() {
        return new WPCompleteState();
    }

    /**
     * @return TechnicalProblemState
     */
    public function techProblem() {
        return new TechnicalProblemState();
    }

}
