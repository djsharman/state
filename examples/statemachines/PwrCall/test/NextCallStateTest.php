<?php
namespace examples\statemachines\PwrCall\test;
use \examples\statemachines\PwrCall\PwrCall;
use \examples\statemachines\PwrCall\NextCallState;

//>>>> don't change the CUSTOM CODE comments, if you do generation will overwrite your code >>>>
//###START_CUSTOMCODE1

    

//###END_CUSTOMCODE1
class NextCallTest extends \PHPUnit_Framework_TestCase {
    /**
     * @var PwrCall
     */
    private $pwrcall;

    /**
     * @covers \examples\statemachines\PwrCall\PwrCall::__construct
     * @covers \examples\statemachines\PwrCall\PwrCall::setState
     */
    protected function setUp() {
        $this->pwrcall = new PwrCall(new NextCallState);
    }
//>>>> don't change the CUSTOM CODE comments, if you do generation will overwrite your code >>>>
//###START_CUSTOMCODE2

    

//###END_CUSTOMCODE2

    /**
     * @covers \examples\statemachines\PwrCall\PwrCall::isStartUpState
     */
    public function testIsNotStartUpState() {
        $this->assertFalse($this->pwrcall->isStartUpState());
    }

    /**
     * @covers \examples\statemachines\PwrCall\PwrCall::isWaitForUserRegState
     */
    public function testIsNotWaitForUserRegState() {
        $this->assertFalse($this->pwrcall->isWaitForUserRegState());
    }

    /**
     * @covers \examples\statemachines\PwrCall\PwrCall::isWaitForUserParkedState
     */
    public function testIsNotWaitForUserParkedState() {
        $this->assertFalse($this->pwrcall->isWaitForUserParkedState());
    }

    /**
     * @covers \examples\statemachines\PwrCall\PwrCall::isUserParkedState
     */
    public function testIsNotUserParkedState() {
        $this->assertFalse($this->pwrcall->isUserParkedState());
    }

    /**
     * @covers \examples\statemachines\PwrCall\PwrCall::isNextCallState
     */
    public function testIsNextCallState() {
        $this->assertTrue($this->pwrcall->isNextCallState());
    }

    /**
     * @covers \examples\statemachines\PwrCall\PwrCall::isInCallState
     */
    public function testIsNotInCallState() {
        $this->assertFalse($this->pwrcall->isInCallState());
    }

    /**
     * @covers \examples\statemachines\PwrCall\PwrCall::isAgentCallHangupState
     */
    public function testIsNotAgentCallHangupState() {
        $this->assertFalse($this->pwrcall->isAgentCallHangupState());
    }

    /**
     * @covers \examples\statemachines\PwrCall\PwrCall::isCustCallHangupState
     */
    public function testIsNotCustCallHangupState() {
        $this->assertFalse($this->pwrcall->isCustCallHangupState());
    }

    /**
     * @covers \examples\statemachines\PwrCall\PwrCall::isWPCompleteState
     */
    public function testIsNotWPCompleteState() {
        $this->assertFalse($this->pwrcall->isWPCompleteState());
    }

    /**
     * @covers \examples\statemachines\PwrCall\PwrCall::isUserRegFailState
     */
    public function testIsNotUserRegFailState() {
        $this->assertFalse($this->pwrcall->isUserRegFailState());
    }

    /**
     * @covers \examples\statemachines\PwrCall\PwrCall::isUserParkFailState
     */
    public function testIsNotUserParkFailState() {
        $this->assertFalse($this->pwrcall->isUserParkFailState());
    }

    /**
     * @covers \examples\statemachines\PwrCall\PwrCall::isTechnicalProblemState
     */
    public function testIsNotTechnicalProblemState() {
        $this->assertFalse($this->pwrcall->isTechnicalProblemState());
    }

    /**
     * @covers \examples\statemachines\PwrCall\PwrCall::isEndState
     */
    public function testIsNotEndState() {
        $this->assertFalse($this->pwrcall->isEndState());
    }

    /**
     * @covers \examples\statemachines\PwrCall\PwrCall::reqRegState
     * @covers \examples\statemachines\PwrCall\AbstractPwrCallState::reqRegState
     * @expectedException \examples\statemachines\PwrCall\IllegalStateTransitionException
     */
    public function testCannotReqRegState() {
        $this->pwrcall->reqRegState();
    }

    /**
     * @covers \examples\statemachines\PwrCall\PwrCall::cancel
     * @covers \examples\statemachines\PwrCall\AbstractPwrCallState::cancel
     * @expectedException \examples\statemachines\PwrCall\IllegalStateTransitionException
     */
    public function testCannotCancel() {
        $this->pwrcall->cancel();
    }

    /**
     * @covers \examples\statemachines\PwrCall\PwrCall::wpComplete
     * @covers \examples\statemachines\PwrCall\NextCallState::wpComplete
     * @uses   \examples\statemachines\PwrCall\PwrCall::isWPCompleteState
     */
    public function testCanWpComplete() {
        $this->pwrcall->wpComplete();
        $this->assertTrue($this->pwrcall->isWPCompleteState());
    }

    /**
     * @covers \examples\statemachines\PwrCall\PwrCall::techProblem
     * @covers \examples\statemachines\PwrCall\NextCallState::techProblem
     * @uses   \examples\statemachines\PwrCall\PwrCall::isTechnicalProblemState
     */
    public function testCanTechProblem() {
        $this->pwrcall->techProblem();
        $this->assertTrue($this->pwrcall->isTechnicalProblemState());
    }

    /**
     * @covers \examples\statemachines\PwrCall\PwrCall::userRegistered
     * @covers \examples\statemachines\PwrCall\AbstractPwrCallState::userRegistered
     * @expectedException \examples\statemachines\PwrCall\IllegalStateTransitionException
     */
    public function testCannotUserRegistered() {
        $this->pwrcall->userRegistered();
    }

    /**
     * @covers \examples\statemachines\PwrCall\PwrCall::userRegFailed
     * @covers \examples\statemachines\PwrCall\AbstractPwrCallState::userRegFailed
     * @expectedException \examples\statemachines\PwrCall\IllegalStateTransitionException
     */
    public function testCannotUserRegFailed() {
        $this->pwrcall->userRegFailed();
    }

    /**
     * @covers \examples\statemachines\PwrCall\PwrCall::userParked
     * @covers \examples\statemachines\PwrCall\AbstractPwrCallState::userParked
     * @expectedException \examples\statemachines\PwrCall\IllegalStateTransitionException
     */
    public function testCannotUserParked() {
        $this->pwrcall->userParked();
    }

    /**
     * @covers \examples\statemachines\PwrCall\PwrCall::userParkFailed
     * @covers \examples\statemachines\PwrCall\AbstractPwrCallState::userParkFailed
     * @expectedException \examples\statemachines\PwrCall\IllegalStateTransitionException
     */
    public function testCannotUserParkFailed() {
        $this->pwrcall->userParkFailed();
    }

    /**
     * @covers \examples\statemachines\PwrCall\PwrCall::startCalling
     * @covers \examples\statemachines\PwrCall\AbstractPwrCallState::startCalling
     * @expectedException \examples\statemachines\PwrCall\IllegalStateTransitionException
     */
    public function testCannotStartCalling() {
        $this->pwrcall->startCalling();
    }

    /**
     * @covers \examples\statemachines\PwrCall\PwrCall::showCall
     * @covers \examples\statemachines\PwrCall\NextCallState::showCall
     * @uses   \examples\statemachines\PwrCall\PwrCall::isInCallState
     */
    public function testCanShowCall() {
        $this->pwrcall->showCall();
        $this->assertTrue($this->pwrcall->isInCallState());
    }

    /**
     * @covers \examples\statemachines\PwrCall\PwrCall::stopCalling
     * @covers \examples\statemachines\PwrCall\AbstractPwrCallState::stopCalling
     * @expectedException \examples\statemachines\PwrCall\IllegalStateTransitionException
     */
    public function testCannotStopCalling() {
        $this->pwrcall->stopCalling();
    }

    /**
     * @covers \examples\statemachines\PwrCall\PwrCall::agentHangup
     * @covers \examples\statemachines\PwrCall\AbstractPwrCallState::agentHangup
     * @expectedException \examples\statemachines\PwrCall\IllegalStateTransitionException
     */
    public function testCannotAgentHangup() {
        $this->pwrcall->agentHangup();
    }

    /**
     * @covers \examples\statemachines\PwrCall\PwrCall::customerHangup
     * @covers \examples\statemachines\PwrCall\AbstractPwrCallState::customerHangup
     * @expectedException \examples\statemachines\PwrCall\IllegalStateTransitionException
     */
    public function testCannotCustomerHangup() {
        $this->pwrcall->customerHangup();
    }

    /**
     * @covers \examples\statemachines\PwrCall\PwrCall::goNextCall
     * @covers \examples\statemachines\PwrCall\AbstractPwrCallState::goNextCall
     * @expectedException \examples\statemachines\PwrCall\IllegalStateTransitionException
     */
    public function testCannotGoNextCall() {
        $this->pwrcall->goNextCall();
    }

    /**
     * @covers \examples\statemachines\PwrCall\PwrCall::redialCustomer
     * @covers \examples\statemachines\PwrCall\AbstractPwrCallState::redialCustomer
     * @expectedException \examples\statemachines\PwrCall\IllegalStateTransitionException
     */
    public function testCannotRedialCustomer() {
        $this->pwrcall->redialCustomer();
    }

    /**
     * @covers \examples\statemachines\PwrCall\PwrCall::restartAfterTechFailure
     * @covers \examples\statemachines\PwrCall\AbstractPwrCallState::restartAfterTechFailure
     * @expectedException \examples\statemachines\PwrCall\IllegalStateTransitionException
     */
    public function testCannotRestartAfterTechFailure() {
        $this->pwrcall->restartAfterTechFailure();
    }

}
