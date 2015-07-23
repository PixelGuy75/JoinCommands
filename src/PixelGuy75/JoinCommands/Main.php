<?php

namespace PixelGuy75\JoinCommands;

use pocketmine\command\ConsoleCommandSender;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Player;

class Main extends PluginBase implements Listener{
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->saveDefaultConfig();
    }
    public function onJoin(PlayerJoinEvent $event){
        if($this->getConfig()->get("enablejoin") === true){
            $player = $event->getPlayer();
            foreach($this->getConfig()->get("JoinCommand") as $command){
                $this->getServer()->dispatchCommand(new ConsoleCommandSender(), str_replace("{player}", $player->getName(), $command));	
            }
        }
    }
    public function onDeath(PlayerDeathEvent $event){
        if($this->getConfig()->get("enabledeath") === true){
            $player = $event->getEntity();
            if($player instanceof Player) {
                foreach($this->getConfig()->get("DeathCommand") as $command){
                  $this->getServer()->dispatchCommand(new ConsoleCommandSender(), str_replace("{player}", $player->getName(), $command));	
                }
            }
        }
    }
    public function onRespawn(PlayerRespawnEvent $event){
        if($this->getConfig()->get("enablespawn") === true){
            $player = $event->getPlayer();
            foreach($this->getConfig()->get("RespawnCommand") as $command){
                $this->getServer()->dispatchCommand(new ConsoleCommandSender(), str_replace("{player}", $player->getName(), $command));	
            }
        }
    }
    public function onQuit(PlayerQuitEvent $event){
        if($this->getConfig()->get("enableleave") === true){
            $player = $event->getPlayer();
            foreach($this->getConfig()->get("LeaveCommand") as $command){
                $this->getServer()->dispatchCommand(new ConsoleCommandSender(), str_replace("{player}", $player->getName(), $command));	
            }
        }
    }
}
