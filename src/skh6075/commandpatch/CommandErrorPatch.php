<?php

declare(strict_types=1);

namespace skh6075\commandpatch;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

final class CommandErrorPatch extends PluginBase implements Listener{

	protected function onEnable() : void{
		$this->getServer()->getPluginManager()->registerEvents($this, $this);

		$server = $this->getServer();

		$ref = new \ReflectionProperty($server, "commandMap");
		$ref->setAccessible(true);
		$ref->setValue($server, new SimpleCommandMap($this->getServer()));
	}
}