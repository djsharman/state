<?php
namespace examples\statemachines\Door\test;
use \examples\statemachines\Door\Door;
use \examples\statemachines\Door\OpenDoorState;

//>>>> don't change the CUSTOM CODE comments, if you do generation will overwrite your code >>>>
//###START_CUSTOMCODE1

    

//###END_CUSTOMCODE1
class OpenDoorTest extends \PHPUnit_Framework_TestCase {
    /**
     * @var Door
     */
    private $door;

    /**
     * @covers \examples\statemachines\Door\Door::__construct
     * @covers \examples\statemachines\Door\Door::setState
     */
    protected function setUp() {
        $this->door = new Door(new OpenDoorState);
    }
//>>>> don't change the CUSTOM CODE comments, if you do generation will overwrite your code >>>>
//###START_CUSTOMCODE2

    

//###END_CUSTOMCODE2

    /**
     * @covers \examples\statemachines\Door\Door::isOpenDoorState
     */
    public function testIsOpenDoorState() {
        $this->assertTrue($this->door->isOpenDoorState());
    }

    /**
     * @covers \examples\statemachines\Door\Door::isClosedDoorState
     */
    public function testIsNotClosedDoorState() {
        $this->assertFalse($this->door->isClosedDoorState());
    }

    /**
     * @covers \examples\statemachines\Door\Door::isLockedDoorState
     */
    public function testIsNotLockedDoorState() {
        $this->assertFalse($this->door->isLockedDoorState());
    }

    /**
     * @covers \examples\statemachines\Door\Door::open
     * @covers \examples\statemachines\Door\AbstractDoorState::open
     * @expectedException \examples\statemachines\Door\IllegalStateTransitionException
     */
    public function testCannotOpen() {
        $this->door->open();
    }

    /**
     * @covers \examples\statemachines\Door\Door::close
     * @covers \examples\statemachines\Door\OpenDoorState::close
     * @uses   \examples\statemachines\Door\Door::isClosedDoorState
     */
    public function testCanClose() {
        $this->door->close();
        $this->assertTrue($this->door->isClosedDoorState());
    }

    /**
     * @covers \examples\statemachines\Door\Door::lock
     * @covers \examples\statemachines\Door\AbstractDoorState::lock
     * @expectedException \examples\statemachines\Door\IllegalStateTransitionException
     */
    public function testCannotLock() {
        $this->door->lock();
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
