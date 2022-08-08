<?php declare(strict_types=1);

namespace Macademy\BlogExtra\Plugin;

use Macademy\Blog\Observer\PostObserver;

class PreventLogger
{

public function aroundExecute(PostObserver $subject, callable $proceed){

//do something

}
}
