<?php
namespace djsharman\examples\statemachinesPwrCall;
//>>>> don't change the CUSTOM CODE comments, if you do generation will overwrite your code >>>>
//###START_CUSTOMCODE1

    

//###END_CUSTOMCODE1
class AgentCallHangupState extends AbstractPwrCallState {
//>>>> don't change the CUSTOM CODE comments, if you do generation will overwrite your code >>>>
//###START_CUSTOMCODE2

    

//###END_CUSTOMCODE2

    public function onEnterState() {

    }

    public function onExitState() {

    }

    /**
     * @return TechnicalProblemState
     */
    public function techProblem() {
        return new TechnicalProblemState();
    }

    /**
     * @return EndState
     */
    public function stopCalling() {
        return new EndState();
    }

    /**
     * @return NextCallState
     */
    public function goNextCall() {
        return new NextCallState();
    }

    /**
     * @return InCallState
     */
    public function redialCustomer() {
        return new InCallState();
    }

}
