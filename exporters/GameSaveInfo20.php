<?php
require_once 'AGameSaveInfo2.php';
class GameSaveInfo20 extends AGameSaveInfo2 {
    public function __construct($comment = null, $time = null) {
        parent::__construct(2,0,null,$comment,$time);
    }
    
    
    protected function createGameVersionElement($version) {
        // The revision attribute didn't exist in 2.0, so we filter out any elements that have one,
        // Unless the revision is zero, which we can auto-assume points to the original revision,
        // Which we can just assume is the one already in the file, since it will also have a 0-revision
        if($version->revision!=null&&$version->revision!="0") {
            return null;
        }
        return $this->createGameVersionElementBase($version);
    }


    protected function createLocationElement($location) {
        // The revision attribute didn't exist in 2.0, so we filter out any elements that have one,
        // Unless the revision is zero, which we can auto-assume points to the original revision,
        // Which we can just assume is the one already in the file, since it will also have a 0-revision
        if(property_exists($location,"revision")&&$location->revision!=null&&$location->revision!="0") {
            return null;
        }
        return $this->createLocationElementBase($location);
    }
}

?>
