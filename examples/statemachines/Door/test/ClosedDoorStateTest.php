<?php
namespace examples\statemachines\Door\test;
use \examples\statemachines\Door\Door;
use \examples\statemachines\Door\ClosedDoorState;

//>>>> don't change the CUSTOM CODE comments, if you do generation will overwrite your code >>>>
//###START_CUSTOMCODE1

    

//###END_CUSTOMCODE1
class ClosedDoorTest extends \PHPUnit_Framework_TestCase {
    /**
     * @var Door
     */
    private $door;

    /**
     * @covers \examples\statemachines\Door\Door::__construct
     * @covers \examples\statemachines\Door\Door::setState
     */
    protected function setUp() {
        $this->door = new Door(new ClosedDoorState);
    }
//>>>> don't change the CUSTOM CODE comments, if you do generation will overwrite your code >>>>
//###START_CUSTOMCODE2

    

//###END_CUSTOMCODE2

    /**
     * @covers \examples\statemachines\Door\Door::isOpenDoorState
     */
    public function testIsNotOpenDoorState() {
        $this->assertFalse($this->door->isOpenDoorState());
    }

    /**
     * @covers \examples\statemachines\Door\Door::isClosedDoorState
     */
    public function testIsClosedDoorState() {
        $this->assertTrue($this->door->isClosedDoorState());
    }

    /**
     * @covers \examples\statemachines\Door\Door::isLockedDoorState
     */
    public function testIsNotLockedDoorState() {
        $this->assertFalse($this->door->isLockedDoorState());
    }

    /**
     * @covers \examples\statemachines\Door\Door::open
     * @covers \examples\statemachines\Door\ClosedDoorState::open
     * @uses   \examples\statemachines\Door\Door::isOpenDoorState
     */
    public function testCanOpen() {
        $this->door->open();
        $this->assertTrue($this->door->isOpenDoorState());
    }

    /**
     * @covers \examples\statemachines\Door\Door::close
     * @covers \examples\statemachines\Door\AbstractDoorState::close
     * @expectedException \examples\statemachines\Door\IllegalStateTransitionException
     */
    public function testCannotClose() {
        $this->door->close();
    }

    /**
     * @covers \examples\statemachines\Door\Door::lock
     * @covers \examples\statemachines\Door\ClosedDoorState::lock
     * @uses   \examples\statemachines\Door\Door::isLockedDoorState
     */
    public function testCanLock() {
        $this->door->lock();
        $this->assertTrue($this->door->isLockedDoorState());
    }

    /**
     * @covers \examples\statemachines\Door\Door::unlock
     * @covers \examples\statemachines\Door\AbstractDoorState::unlock
     * @expectedException \examples\statemachines\Door\IllegalStateTransitionException
     */
    public function testCannotUnlock() {
        $this->door->unlock();
    }

}
