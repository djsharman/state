<?php
namespace djsharman\examples\statemachinesDoor\test;
use \djsharman\examples\statemachinesDoor;
//>>>> don't change the CUSTOM CODE comments, if you do generation will overwrite your code >>>>
//###START_CUSTOMCODE1

    

//###END_CUSTOMCODE1
class ClosedDoorTest extends \PHPUnit_Framework_TestCase {
    /**
     * @var Door
     */
    private $door;

    /**
     * @covers Door::__construct
     * @covers Door::setState
     */
    protected function setUp() {
        $this->door = new Door(new ClosedDoorState);
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
    public function testIsClosedDoorState() {
        $this->assertTrue($this->door->isClosedDoorState());
    }

    /**
     * @covers Door::isLockedDoorState
     */
    public function testIsNotLockedDoorState() {
        $this->assertFalse($this->door->isLockedDoorState());
    }

    /**
     * @covers Door::open
     * @covers ClosedDoorState::open
     * @uses   Door::isOpenDoorState
     */
    public function testCanOpen() {
        $this->door->open();
        $this->assertTrue($this->door->isOpenDoorState());
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
     * @covers ClosedDoorState::lock
     * @uses   Door::isLockedDoorState
     */
    public function testCanLock() {
        $this->door->lock();
        $this->assertTrue($this->door->isLockedDoorState());
    }

    /**
     * @covers Door::unlock
     * @covers AbstractDoorState::unlock
     * @expectedException IllegalStateTransitionException
     */
    public function testCannotUnlock() {
        $this->door->unlock();
    }

}
