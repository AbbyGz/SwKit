<?php

namespace Loader;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\Config;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class SwKits extends PluginBase implements Listener {

	public function onEnable() {
		$this->getServer()->getPluginManager()->registerEvents($this,$this);
		$this->getServer()->getLogger()->info(TextFormat::GREEN."Enabling SwKits plugin of @DarkByx &Abby");
	}

	public function onCommand(CommandSender $player, Command $command, $label, array $cmd) : bool {
		if (!$player instanceof Player) {
			$player->sendMessage(TextFormat::RED.TextFormat::ITALIC."Solo puedes usar el comando in-game");
			return false;
		}

		if (!$player->hasPermission("swkit.command")) {
			$player->sendMessage(TextFormat::RED.TextFormat::ITALIC."No tienes permiso para usar kits");
			return false;
		}
		$this->giveKit($player);
		return true;
	}

	private function giveKit(Player $player) {
		# agrega el kit aqui
		$player->sendMessage(TextFormat::GREEN.TextFormat::ITALIC."Recibiste el kit!");
	}
}