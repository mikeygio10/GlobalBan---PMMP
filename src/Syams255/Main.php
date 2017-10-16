<?php

namespace Syams255;

use pocketmine\event\Listener;

use pocketmine\Server;

use pocketmine\Player;

use pocketmine\utils\TextFormat as color;

use pocketmine\command\Command;

use pocketmine\command\CommandSender;

use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener{

    public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		
		$this->getLogger()->info("§eGlobalBan Now Enable[S255]");
	}
    
    public function onDisable(){
		$this->getLogger()->info("§eGlobalBan §4Now Disable!");
    }

public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        switch($command->getName()){
            case "gban":
                if(isset($args[0])){
                        $player = $this->getServer()->getPlayer($args[0]);
                        if($this->getServer()->getPlayer($args[0])){
            $reason = implode(" ", $args);
            $worte = explode(" ", $reason);
			 unset($worte[0]);
			  $reason = implode(" ", $worte);
 $sender->getServer()->getCIDBans()->addBan($player->getClientId(), $reason, null, $sender->getName());                     
                            $player->kick("§cYou Have Been Banned From The Server,  §l§b\nREASON:\n[" .$reason ."]§r");
          $this->getServer()->broadcastMessage("§l§7[§6Global§7-§6Ban§7] §e" .$args[0] ." §aBanned From The Server, REASON: §c[" .$reason ."]");
             } else {
      if(!$player instanceof Player){
           $sender->sendMessage("§cThis Player Is Not Online!! ");
                     return true;
                         }
      if($sender instanceof Player) {
               if($sender->hasPermission("gban.command")) {
                   } else {
           $sender->sendMessage("§cYou Don't Have Permission!");
           return true;
                 }
              }
          }
       }
     }
  }
  }
 
     
   
