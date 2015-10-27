<?php
namespace djsharman\examples\statemachinesPwrCall;
//>>>> don't change the CUSTOM CODE comments, if you do generation will overwrite your code >>>>
//###START_CUSTOMCODE1

    

//###END_CUSTOMCODE1
class PwrCall {
    /**
     * @var PwrCallState
     */
    private $state = null;

//>>>> don't change the CUSTOM CODE comments, if you do generation will overwrite your code >>>>
//###START_CUSTOMCODE2

    

//###END_CUSTOMCODE2



    public function __construct(PwrCallState $state) {
        $this->setState($state);
    }


    /**
     * @throws IllegalStateTransitionException
     */
    public function reqRegState() {
        $this->setState($this->state->reqRegState());
    }

    /**
     * @throws IllegalStateTransitionException
     */
    public function cancel() {
        $this->setState($this->state->cancel());
    }

    /**
     * @throws IllegalStateTransitionException
     */
    public function wpComplete() {
        $this->setState($this->state->wpComplete());
    }

    /**
     * @throws IllegalStateTransitionException
     */
    public function techProblem() {
        $this->setState($this->state->techProblem());
    }

    /**
     * @throws IllegalStateTransitionException
     */
    public function userRegistered() {
        $this->setState($this->state->userRegistered());
    }

    /**
     * @throws IllegalStateTransitionException
     */
    public function userRegFailed() {
        $this->setState($this->state->userRegFailed());
    }

    /**
     * @throws IllegalStateTransitionException
     */
    public function userParked() {
        $this->setState($this->state->userParked());
    }

    /**
     * @throws IllegalStateTransitionException
     */
    public function userParkFailed() {
        $this->setState($this->state->userParkFailed());
    }

    /**
     * @throws IllegalStateTransitionException
     */
    public function startCalling() {
        $this->setState($this->state->startCalling());
    }

    /**
     * @throws IllegalStateTransitionException
     */
    public function showCall() {
        $this->setState($this->state->showCall());
    }

    /**
     * @throws IllegalStateTransitionException
     */
    public function stopCalling() {
        $this->setState($this->state->stopCalling());
    }

    /**
     * @throws IllegalStateTransitionException
     */
    public function agentHangup() {
        $this->setState($this->state->agentHangup());
    }

    /**
     * @throws IllegalStateTransitionException
     */
    public function customerHangup() {
        $this->setState($this->state->customerHangup());
    }

    /**
     * @throws IllegalStateTransitionException
     */
    public function goNextCall() {
        $this->setState($this->state->goNextCall());
    }

    /**
     * @throws IllegalStateTransitionException
     */
    public function redialCustomer() {
        $this->setState($this->state->redialCustomer());
    }

    /**
     * @throws IllegalStateTransitionException
     */
    public function restartAfterTechFailure() {
        $this->setState($this->state->restartAfterTechFailure());
    }

    /**
     * @return bool
     */
    public function isStartUpState() {
        return $this->state instanceof StartUpState;
    }

    /**
     * @return bool
     */
    public function isWaitForUserRegState() {
        return $this->state instanceof WaitForUserRegState;
    }

    /**
     * @return bool
     */
    public function isWaitForUserParkedState() {
        return $this->state instanceof WaitForUserParkedState;
    }

    /**
     * @return bool
     */
    public function isUserParkedState() {
        return $this->state instanceof UserParkedState;
    }

    /**
     * @return bool
     */
    public function isNextCallState() {
        return $this->state instanceof NextCallState;
    }

    /**
     * @return bool
     */
    public function isInCallState() {
        return $this->state instanceof InCallState;
    }

    /**
     * @return bool
     */
    public function isAgentCallHangupState() {
        return $this->state instanceof AgentCallHangupState;
    }

    /**
     * @return bool
     */
    public function isCustCallHangupState() {
        return $this->state instanceof CustCallHangupState;
    }

    /**
     * @return bool
     */
    public function isWPCompleteState() {
        return $this->state instanceof WPCompleteState;
    }

    /**
     * @return bool
     */
    public function isUserRegFailState() {
        return $this->state instanceof UserRegFailState;
    }

    /**
     * @return bool
     */
    public function isUserParkFailState() {
        return $this->state instanceof UserParkFailState;
    }

    /**
     * @return bool
     */
    public function isTechnicalProblemState() {
        return $this->state instanceof TechnicalProblemState;
    }

    /**
     * @return bool
     */
    public function isEndState() {
        return $this->state instanceof EndState;
    }



    private function setState(PwrCallState $state) {
        $this->state = $state;
    }

}
