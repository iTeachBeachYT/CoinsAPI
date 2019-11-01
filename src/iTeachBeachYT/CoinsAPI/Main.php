<?php

namespace iTeachBeachYT\CoinsAPI;

use iTeachBeachYT\CoinsAPI\event\EventListener;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase
{

    public static $instance;

    public function onEnable()
    {
        self::$instance = $this;

        $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
    }

    /**
     * @param Player $player
     * @return bool|mixed
     */
    public function getCoins(Player $player)
    {
        $config = new Config($this->getDataFolder() . "players.yml", Config::YAML);

        return $config->get(strtolower($player->getName()));
    }

    /**
     * @param Player $player
     * @param int $amount
     */
    public function addCoins(Player $player, int $amount)
    {
        $config = new Config($this->getDataFolder() . "players.yml", Config::YAML);

        $config->set(strtolower($player->getName()), $this->getCoins($player) + $amount);
        $config->save();
    }

    /**
     * @param Player $player
     * @param int $amount
     */
    public function removeCoins(Player $player, int $amount)
    {
        $config = new Config($this->getDataFolder() . "players.yml", Config::YAML);

        $config->set(strtolower($player->getName()), $this->getCoins($player) + $amount);
        $config->save();
    }

    /**
     * @param Player $player
     * @param int $amount
     */
    public function setCoins(Player $player, int $amount)
    {
        $config = new Config($this->getDataFolder() . "players.yml", Config::YAML);

        $config->set(strtolower($player->getName()), $amount);
        $config->save();
    }

    public static function getInstance(): self
    {
        return self::$instance;
    }

}