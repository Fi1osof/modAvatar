<?php

$plugins = array();

/*
 * New plugin
 */
$plugin = $modx->newObject('modPlugin');
$plugin->set('id', 1);
$plugin->set('name', 'modavatar');
$plugin->set('description', '');
$plugin->set('plugincode', getSnippetContent($sources['source_core'].'/elements/plugins/plugin.php'));


/* add plugin events */
$events = array(); 
$event = $modx->newObject('modPluginEvent');
$event->fromArray(array(
    'event' => 'OnUserFormPrerender',
    'priority' => 0,
    'propertyset' => 0,
),'',true,true);
$events[] = $event; 
$plugin->addMany($events, 'PluginEvents');
$modx->log(xPDO::LOG_LEVEL_INFO,'Packaged in '.count($events).' Plugin Events.'); flush();
 
$plugins[] = $plugin;
/*
 * 
 */

return $plugins;

