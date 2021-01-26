<?php

namespace GetPos;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\permission\Permission;
use pocketmine\utils\TextFormat;
use pocketmine\Player;
use GetPos\Command\GetPosCommand;

class GetPos extends PluginBase {

    public function onEnable() {
        $this->getServer()->getPluginManager()->addPermission(new Permission("getpos.command", "Allows players to use /getpos", Permission::DEFAULT_TRUE));
        $this->getServer()->getCommandMap()->register("getpos", new GetPosCommand($this));
        // $this->getLogger()->info("GetPos enabled");
    }

    public function onLoad() {
        // $this->getLogger()->info("GetPos loaded");
    }

}
