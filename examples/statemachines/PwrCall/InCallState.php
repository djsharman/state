<?php
namespace djsharman\examples\statemachinesPwrCall;
//>>>> don't change the CUSTOM CODE comments, if you do generation will overwrite your code >>>>
//###START_CUSTOMCODE1

    

//###END_CUSTOMCODE1
class InCallState extends AbstractPwrCallState {
//>>>> don't change the CUSTOM CODE comments, if you do generation will overwrite your code >>>>
//###START_CUSTOMCODE2

    

//###END_CUSTOMCODE2

    public function onEnterState() {

    }

    public function onExitState() {

    }

    /**
     * @return AgentCallHangupState
     */
    public function agentHangup() {
        return new AgentCallHangupState();
    }

    /**
     * @return CustCallHangupState
     */
    public function customerHangup() {
        return new CustCallHangupState();
    }

    /**
     * @return TechnicalProblemState
     */
    public function techProblem() {
        return new TechnicalProblemState();
    }

}
