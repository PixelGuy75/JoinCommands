<?php
namespace PixelGuy75\JoinCommands;

use pocketmine\command\ConsoleCommandSender;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
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
	if($this->getConfig->get("enablejoin") == "true"){
		$player = $event->getPlayer();
		$command = str_replace("{player}", $player->getName(), $this->getConfig()->get("JoinCommand"));
		$this->getServer()->dispatchCommand(new ConsoleCommandSender(), $command);
	}
  }
  
  public function onDeath(PlayerDeathEvent $event) {
	if($this->getConfig->get("enabledeath") == "true"){
		$player = $event->getEntity();
		$command = str_replace("{player}", $player->getName(), $this->getConfig()->get("DeathCommand"));
		$this->getServer()->dispatchCommand(new ConsoleCommandSender(), $command);
	}
  }
  
  public function onRespawn(PlayerRespawnEvent $event) {
	if($this->getConfig->get("enablespawn") == "true"){
		$player = $event->getPlayer();
		$command = str_replace("{player}", $player->getName(), $this->getConfig()->get("RespawnCommand"));
		$this->getServer()->dispatchCommand(new ConsoleCommandSender(), $command);
	}
  }
  
  public function onQuit(PlayerQuitEvent $event) {
	if($this->getConfig->get("enableleave") == "true"){
		$player = $event->getPlayer();
		$command = str_replace("{player}", $player->getName(), $this->getConfig()->get("LeaveCommand"));
		$this->getServer()->dispatchCommand(new ConsoleCommandSender(), $command);
	}
  }
}
?>
