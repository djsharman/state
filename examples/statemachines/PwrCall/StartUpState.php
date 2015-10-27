<?php
namespace djsharman\examples\statemachinesPwrCall;
//>>>> don't change the CUSTOM CODE comments, if you do generation will overwrite your code >>>>
//###START_CUSTOMCODE1

    

//###END_CUSTOMCODE1
class StartUpState extends AbstractPwrCallState {
//>>>> don't change the CUSTOM CODE comments, if you do generation will overwrite your code >>>>
//###START_CUSTOMCODE2
	
	public function onEnterState() {
		/*
		 * When the code is here between the START CUSTOMCODE and END CUSTOMCODE comment elements
		 * your code will 
		 */
	}
    

//###END_CUSTOMCODE2



    public function onExitState() {

    }

    /**
     * @return WaitForUserRegState
     */
    public function reqRegState() {
        return new WaitForUserRegState();
    }

    /**
     * @return EndState
     */
    public function cancel() {
        return new EndState();
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
