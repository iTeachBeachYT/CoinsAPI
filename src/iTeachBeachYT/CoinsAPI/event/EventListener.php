<?php

namespace iTeachBeachYT\CoinsAPI\event;

use iTeachBeachYT\CoinsAPI\Main;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerLoginEvent;
use pocketmine\utils\Config;

class EventListener implements Listener
{

    public function __construct(Main $plugin)
    {
        $this->plugin = $plugin;
    }

    public function onLogin(PlayerLoginEvent $event)
    {
        $player = $event->getPlayer();

        if (!file_exists($this->plugin->getDataFolder() . "players.yml")) {

            $config = new Config($this->plugin->getDataFolder() . "players.ynl", Config::YAML);
            $config->set($player->getName(), 0);
            $config->save();

        }

    }

}