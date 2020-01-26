<?php

namespace GetPos;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\utils\TextFormat as c;

class GetPos extends PluginBase {

	public function onEnable() : void{
	$this->getLogger()->info("GetPos enabled.");
	}
	

	public function onLoad() : void{
		$this->getLogger()->info("GetPos loaded");
	}
	

	public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool{
		switch($command->getName()){
			case "getpos":
				if($sender instanceof Player){
					$playerX = $sender->getX();
                	$playerY = $sender->getY();
                	$playerZ = $sender->getZ();

                	$outX=round($playerX,1);
                	$outY=round($playerY,1);
                	$outZ=round($playerZ,1);

                	$playerLevel = $sender->getLevel()->getName();

                	$sender->sendMessage(c::YELLOW."X:".c::RESET.c::AQUA . $outX . c::RESET.c::YELLOW." Y:".c::RESET.c::AQUA . $outY . c::RESET.c::YELLOW." Z:".c::RESET.c::AQUA . $outZ . c::RESET.c::YELLOW." Level: ".c::RESET.c::AQUA . $playerLevel);
					return true;
				}

				else{
					$sender->sendMessage("This command only works in-game.");
            }
		}
	}    

	
    public function onDisable() : void{
        $this->getLogger()->info("GetPos disabled.");
	}
}
