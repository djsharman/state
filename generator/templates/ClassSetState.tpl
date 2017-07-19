

    public function setState(___INTERFACE___ $state) {

        if($this->state !== null) {
            $this->state->onExitState();
        }

        $this->state = $state;
        $this->state->onEnterState();

    }
