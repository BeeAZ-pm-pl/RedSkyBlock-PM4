<?php

namespace RedCraftPE\RedSkyBlock\Commands;

use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\player\GameMode;
use pocketmine\utils\TextFormat;
use pocketmine\world\Position;
use pocketmine\math\Vector3;
use pocketmine\player\Player;
class Spawn {
  
  public $plugin;

  public function __construct($plugin) {

    $this->plugin = $plugin;
  }

  public function onSpawnCommand(CommandSender $sender, Command $command, string $label, array $args): bool {

    $plugin = $this->plugin;
    $check = $plugin->cfg->get("Spawn Command");

    if ($plugin->cfg->get("Spawn Command") === "on") {

      $spawn = $plugin->getServer()->getWorldManager()->getDefaultWorld()->getSafeSpawn();
      if($sender instanceof Player){
        if ($sender->getGamemode() === GameMode::SURVIVAL()) {
          $sender->setAllowFlight(false);
          $sender->setFlying(false);
        }
        $sender->teleport($spawn);
        $position = new Position(12, -7, 14, $spawn);
        return true;
      } else {

        return true;
      }
    }
  }
}
