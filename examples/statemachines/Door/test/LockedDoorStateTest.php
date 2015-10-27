<?php
namespace djsharman\examples\statemachinesDoor\test;
use \djsharman\examples\statemachinesDoor;
//>>>> don't change the CUSTOM CODE comments, if you do generation will overwrite your code >>>>
//###START_CUSTOMCODE1

    

//###END_CUSTOMCODE1
class LockedDoorTest extends \PHPUnit_Framework_TestCase {
    /**
     * @var Door
     */
    private $door;

    /**
     * @covers Door::__construct
     * @covers Door::setState
     */
    protected function setUp() {
        $this->door = new Door(new LockedDoorState);
    }
//>>>> don't change the CUSTOM CODE comments, if you do generation will overwrite your code >>>>
//###START_CUSTOMCODE2

    

//###END_CUSTOMCODE2

    /**
     * @covers Door::isOpenDoorState
     */
    public function testIsNotOpenDoorState() {
        $this->assertFalse($this->door->isOpenDoorState());
    }

    /**
     * @covers Door::isClosedDoorState
     */
    public function testIsNotClosedDoorState() {
        $this->assertFalse($this->door->isClosedDoorState());
    }

    /**
     * @covers Door::isLockedDoorState
     */
    public function testIsLockedDoorState() {
        $this->assertTrue($this->door->isLockedDoorState());
    }

    /**
     * @covers Door::open
     * @covers AbstractDoorState::open
     * @expectedException IllegalStateTransitionException
     */
    public function testCannotOpen() {
        $this->door->open();
    }

    /**
     * @covers Door::close
     * @covers AbstractDoorState::close
     * @expectedException IllegalStateTransitionException
     */
    public function testCannotClose() {
        $this->door->close();
    }

    /**
     * @covers Door::lock
     * @covers AbstractDoorState::lock
     * @expectedException IllegalStateTransitionException
     */
    public function testCannotLock() {
        $this->door->lock();
    }

    /**
     * @covers Door::unlock
     * @covers LockedDoorState::unlock
     * @uses   Door::isClosedDoorState
     */
    public function testCanUnlock() {
        $this->door->unlock();
        $this->assertTrue($this->door->isClosedDoorState());
    }

}
