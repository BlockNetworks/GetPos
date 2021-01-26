<?php

namespace GetPos\Command;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginIdentifiableCommand;
use pocketmine\plugin\Plugin;
use pocketmine\utils\TextFormat;
use pocketmine\Player;
use GetPos\GetPos;

class GetPosCommand extends Command implements PluginIdentifiableCommand {

    private $plugin;

    public function __construct(GetPos $plugin) {
        $this->plugin = $plugin;
        parent::__construct(
            "getpos",
            "Gives your current coordinates",
            "/getpos"
        );
        $this->setPermission("getpos.command");
    }

    public function getPlugin() : Plugin {
        return $this->plugin;
    }

    public function execute(CommandSender $sender, string $label, array $args) {
        if (!$this->testPermission($sender)) {
            return;
        }

        if (isset($args[0])) {
            if ($this->plugin->getServer()->getPlayer($args[0])) {
                $player = $this->plugin->getServer()->getPlayer($args[0]);
                $x = round($player->getX(), 1);
                $y = round($player->getY(), 1);
                $z = round($player->getZ(), 1);
                $level = $player->getLevel()->getName();
                $sender->sendMessage(TextFormat::GREEN . $player->getName() . "'s coordinates");
                $sender->sendMessage(TextFormat::YELLOW . "X:" . TextFormat::AQUA . $x .
                                     TextFormat::YELLOW . " Y:" . TextFormat::AQUA . $y .
                                     TextFormat::YELLOW . " Z:" . TextFormat::AQUA . $z .
                                     TextFormat::YELLOW . " Level:" . TextFormat::AQUA . $level);
            }
        } else {
            if ($sender instanceof Player) {
                $x = round($sender->getX(), 1);
                $y = round($sender->getY(), 1);
                $z = round($sender->getZ(), 1);
                $level = $sender->getLevel()->getName();
                $sender->sendMessage(TextFormat::YELLOW . "X:" . TextFormat::AQUA . $x .
                                     TextFormat::YELLOW . " Y:" . TextFormat::AQUA . $y .
                                     TextFormat::YELLOW . " Z:" . TextFormat::AQUA . $z .
                                     TextFormat::YELLOW . " Level:" . TextFormat::AQUA . $level);
            } else {
                $sender->sendMessage(TextFormat::RED . "Please enter a player name");
            }
        }
    }

}
