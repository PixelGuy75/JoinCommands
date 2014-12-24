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
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\event\player\PlayerQuitEvent;

class Main extends PluginBase implements Listener {
  public function onEnable() {
	$this->getServer()->getPluginManager()->registerEvents($this, $this);
	$this->saveDefaultConfig();
    }
  
  public function onJoin(PlayerJoinEvent $event) {
	$player = $event->getPlayer();
	$command = str_replace("{player}", $player->getName(), $this->getConfig()->get("JoinCommand"));
	$this->getServer()->dispatchCommand(new ConsoleCommandSender(), $command);
  }
  
  public function onDeath(PlayerDeathEvent $event) {
	$player = $event->getEntity();
	$command = str_replace("{player}", $player->getName(), $this->getConfig()->get("DeathCommand"));
	$this->getServer()->dispatchCommand(new ConsoleCommandSender(), $command);
  }
  
  public function onRespawn(PlayerRespawnEvent $event) {
	$player = $event->getPlayer();
	$command = str_replace("{player}", $player->getName(), $this->getConfig()->get("RespawnCommand"));
	$this->getServer()->dispatchCommand(new ConsoleCommandSender(), $command);
  }
  
  public function onQuit(PlayerQuitEvent $event) {
	$player = $event->getPlayer();
	$command = str_replace("{player}", $player->getName(), $this->getConfig()->get("LeaveCommand"));
	$this->getServer()->dispatchCommand(new ConsoleCommandSender(), $command);
  }
}
?>
