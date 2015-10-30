<?php
namespace examples\statemachines\PwrCall;
//>>>> don't change the CUSTOM CODE comments, if you do generation will overwrite your code >>>>
//###START_CUSTOMCODE1

    

//###END_CUSTOMCODE1
interface PwrCallState {
//>>>> don't change the CUSTOM CODE comments, if you do generation will overwrite your code >>>>
//###START_CUSTOMCODE2

    

//###END_CUSTOMCODE2


    public function reqRegState();
    public function cancel();
    public function wpComplete();
    public function techProblem();
    public function userRegistered();
    public function userRegFailed();
    public function userParked();
    public function userParkFailed();
    public function startCalling();
    public function showCall();
    public function stopCalling();
    public function agentHangup();
    public function customerHangup();
    public function goNextCall();
    public function redialCustomer();
    public function restartAfterTechFailure();
}
