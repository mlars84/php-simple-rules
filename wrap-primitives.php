<?php

//Does it bring clarity?
class Second
{
    protected $seconds;

    public function __construct($seconds)
    {
        $this->seconds = $seconds;
    }
}

//method with data and number of seconds to cache that data
function cache($data, Second $seconds)
{
     
}

//Does it represent an important concept in domain?
class Weight 
{
    protected $weight;

    public function __construct($weight)
    {
        $this->weight = $weight;
    }

    public function gain($pounds)
    {
        return new static($this->weight + $pounds);
    }

    public function lose($pounds)
    {
        return new static($this->weight - $pounds);
    }
}

class GymMember 
{
    public function __construct($name, Weight $weight)
    {
        
    }

    public function workoutFor(TimeLength $length)
    {
        $length->inSeconds();
        $length->inHours();
    }
}

$john = new GymMember('John Doe', new Weight(160));

$john->workoutFor(TimeLength::fromHours(3));

class TimeLength
{
    protected $seconds;

    private function __construct($seconds)
    {
        $this->seconds = $seconds;
    }   

    public static function fromMinutes($minutes)
    {
        return new static($minute * 60);
    }

    public static function fromHours($hours)
    {
        return new static($hours * 60 * 60);
    }

    public function inSeconds()
    {
        return $this->seconds;
    }

    public function inHours()
    {
        return $this->seconds / 60 / 60; 
    }
}