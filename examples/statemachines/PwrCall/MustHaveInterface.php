<?php
namespace examples\statemachines\PwrCall;

/**
 * Interface MustHaveInterface
 *
 * This is an example of an interface file.
 * You can use this to ensure your statemachines to have certain interface functions present
 *
 * @package examples\statemachines\PwrCall
 */
interface MustHaveInterface {
    /**
     * @throws IllegalStateTransitionException
     */
    public function MustHaveFunction1();

    /**
     * @throws IllegalStateTransitionException
     */
    public function MustHaveFunction2();

}