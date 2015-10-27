<?php
namespace djsharman\examples\statemachinesPwrCall\test;
use \djsharman\examples\statemachinesPwrCall;
//>>>> don't change the CUSTOM CODE comments, if you do generation will overwrite your code >>>>
//###START_CUSTOMCODE1

    

//###END_CUSTOMCODE1
class CustCallHangupTest extends \PHPUnit_Framework_TestCase {
    /**
     * @var PwrCall
     */
    private $pwrcall;

    /**
     * @covers PwrCall::__construct
     * @covers PwrCall::setState
     */
    protected function setUp() {
        $this->pwrcall = new PwrCall(new CustCallHangupState);
    }
//>>>> don't change the CUSTOM CODE comments, if you do generation will overwrite your code >>>>
//###START_CUSTOMCODE2

    

//###END_CUSTOMCODE2

    /**
     * @covers PwrCall::isStartUpState
     */
    public function testIsNotStartUpState() {
        $this->assertFalse($this->pwrcall->isStartUpState());
    }

    /**
     * @covers PwrCall::isWaitForUserRegState
     */
    public function testIsNotWaitForUserRegState() {
        $this->assertFalse($this->pwrcall->isWaitForUserRegState());
    }

    /**
     * @covers PwrCall::isWaitForUserParkedState
     */
    public function testIsNotWaitForUserParkedState() {
        $this->assertFalse($this->pwrcall->isWaitForUserParkedState());
    }

    /**
     * @covers PwrCall::isUserParkedState
     */
    public function testIsNotUserParkedState() {
        $this->assertFalse($this->pwrcall->isUserParkedState());
    }

    /**
     * @covers PwrCall::isNextCallState
     */
    public function testIsNotNextCallState() {
        $this->assertFalse($this->pwrcall->isNextCallState());
    }

    /**
     * @covers PwrCall::isInCallState
     */
    public function testIsNotInCallState() {
        $this->assertFalse($this->pwrcall->isInCallState());
    }

    /**
     * @covers PwrCall::isAgentCallHangupState
     */
    public function testIsNotAgentCallHangupState() {
        $this->assertFalse($this->pwrcall->isAgentCallHangupState());
    }

    /**
     * @covers PwrCall::isCustCallHangupState
     */
    public function testIsCustCallHangupState() {
        $this->assertTrue($this->pwrcall->isCustCallHangupState());
    }

    /**
     * @covers PwrCall::isWPCompleteState
     */
    public function testIsNotWPCompleteState() {
        $this->assertFalse($this->pwrcall->isWPCompleteState());
    }

    /**
     * @covers PwrCall::isUserRegFailState
     */
    public function testIsNotUserRegFailState() {
        $this->assertFalse($this->pwrcall->isUserRegFailState());
    }

    /**
     * @covers PwrCall::isUserParkFailState
     */
    public function testIsNotUserParkFailState() {
        $this->assertFalse($this->pwrcall->isUserParkFailState());
    }

    /**
     * @covers PwrCall::isTechnicalProblemState
     */
    public function testIsNotTechnicalProblemState() {
        $this->assertFalse($this->pwrcall->isTechnicalProblemState());
    }

    /**
     * @covers PwrCall::isEndState
     */
    public function testIsNotEndState() {
        $this->assertFalse($this->pwrcall->isEndState());
    }

    /**
     * @covers PwrCall::reqRegState
     * @covers AbstractPwrCallState::reqRegState
     * @expectedException IllegalStateTransitionException
     */
    public function testCannotReqRegState() {
        $this->pwrcall->reqRegState();
    }

    /**
     * @covers PwrCall::cancel
     * @covers AbstractPwrCallState::cancel
     * @expectedException IllegalStateTransitionException
     */
    public function testCannotCancel() {
        $this->pwrcall->cancel();
    }

    /**
     * @covers PwrCall::wpComplete
     * @covers AbstractPwrCallState::wpComplete
     * @expectedException IllegalStateTransitionException
     */
    public function testCannotWpComplete() {
        $this->pwrcall->wpComplete();
    }

    /**
     * @covers PwrCall::techProblem
     * @covers CustCallHangupState::techProblem
     * @uses   PwrCall::isTechnicalProblemState
     */
    public function testCanTechProblem() {
        $this->pwrcall->techProblem();
        $this->assertTrue($this->pwrcall->isTechnicalProblemState());
    }

    /**
     * @covers PwrCall::userRegistered
     * @covers AbstractPwrCallState::userRegistered
     * @expectedException IllegalStateTransitionException
     */
    public function testCannotUserRegistered() {
        $this->pwrcall->userRegistered();
    }

    /**
     * @covers PwrCall::userRegFailed
     * @covers AbstractPwrCallState::userRegFailed
     * @expectedException IllegalStateTransitionException
     */
    public function testCannotUserRegFailed() {
        $this->pwrcall->userRegFailed();
    }

    /**
     * @covers PwrCall::userParked
     * @covers AbstractPwrCallState::userParked
     * @expectedException IllegalStateTransitionException
     */
    public function testCannotUserParked() {
        $this->pwrcall->userParked();
    }

    /**
     * @covers PwrCall::userParkFailed
     * @covers AbstractPwrCallState::userParkFailed
     * @expectedException IllegalStateTransitionException
     */
    public function testCannotUserParkFailed() {
        $this->pwrcall->userParkFailed();
    }

    /**
     * @covers PwrCall::startCalling
     * @covers AbstractPwrCallState::startCalling
     * @expectedException IllegalStateTransitionException
     */
    public function testCannotStartCalling() {
        $this->pwrcall->startCalling();
    }

    /**
     * @covers PwrCall::showCall
     * @covers AbstractPwrCallState::showCall
     * @expectedException IllegalStateTransitionException
     */
    public function testCannotShowCall() {
        $this->pwrcall->showCall();
    }

    /**
     * @covers PwrCall::stopCalling
     * @covers CustCallHangupState::stopCalling
     * @uses   PwrCall::isEndState
     */
    public function testCanStopCalling() {
        $this->pwrcall->stopCalling();
        $this->assertTrue($this->pwrcall->isEndState());
    }

    /**
     * @covers PwrCall::agentHangup
     * @covers AbstractPwrCallState::agentHangup
     * @expectedException IllegalStateTransitionException
     */
    public function testCannotAgentHangup() {
        $this->pwrcall->agentHangup();
    }

    /**
     * @covers PwrCall::customerHangup
     * @covers AbstractPwrCallState::customerHangup
     * @expectedException IllegalStateTransitionException
     */
    public function testCannotCustomerHangup() {
        $this->pwrcall->customerHangup();
    }

    /**
     * @covers PwrCall::goNextCall
     * @covers CustCallHangupState::goNextCall
     * @uses   PwrCall::isNextCallState
     */
    public function testCanGoNextCall() {
        $this->pwrcall->goNextCall();
        $this->assertTrue($this->pwrcall->isNextCallState());
    }

    /**
     * @covers PwrCall::redialCustomer
     * @covers CustCallHangupState::redialCustomer
     * @uses   PwrCall::isInCallState
     */
    public function testCanRedialCustomer() {
        $this->pwrcall->redialCustomer();
        $this->assertTrue($this->pwrcall->isInCallState());
    }

    /**
     * @covers PwrCall::restartAfterTechFailure
     * @covers AbstractPwrCallState::restartAfterTechFailure
     * @expectedException IllegalStateTransitionException
     */
    public function testCannotRestartAfterTechFailure() {
        $this->pwrcall->restartAfterTechFailure();
    }

}
