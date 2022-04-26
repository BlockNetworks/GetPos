<?php

namespace GetPos;

use pocketmine\plugin\PluginBase;
use pocketmine\permission\DefaultPermissions;
use pocketmine\permission\PermissionManager;
use pocketmine\permission\Permission;
use GetPos\Command\GetPosCommand;

class GetPos extends PluginBase {

    public function onEnable() {
        DefaultPermissions::registerPermission(new Permission("getpos.command", "Allows players to use /getpos"), [PermissionManager::getInstance()->getPermission("pocketmine.group.user")]);
        $this->getServer()->getCommandMap()->register("getpos", new GetPosCommand($this));
    }

}
