<?php

namespace CommandProhibit\Layton;

use pocketmine\plugin\PluginBase;

class CommandProhibit extends PluginBase
{

    public function onLoad() :void
    {
        $commands = yaml_parse(stream_get_contents($this->getResource("config.yml")))["commands"];
        $map = $this->getServer()->getCommandMap();

        foreach ($commands as $command)
        {
            $command = $map->getCommand($command);
            if ($command !== null) $map->unregister($command);
        }
    }

}