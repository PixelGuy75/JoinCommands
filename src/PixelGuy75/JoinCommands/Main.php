<?php
namespace PixelGuy75\JoinCommands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecuter;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\event\player\PlayerJoinEvent;

class Main extends PluginBase implements Listener {
  public function onEnable() {
	$this->getServer()->getPluginManager()->registerEvents($this, $this);
	$this->saveDefaultConfig();
    }
  
  public function onJoin(PlayerJoinEvent $event) {
	$player = $event->getPlayer();
	$command = str_replace("{player}", $player->getName(), $this->getConfig()->get("Command"));
	$this->getServer()->dispatchCommand(new ConsoleCommandSender(), $command);
  }
}
?>
