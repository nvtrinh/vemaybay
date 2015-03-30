<?php

defined('_JEXEC') or die;

class ModSupportHelper
{

    public static function getList(&$params)
    {
        $db    = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('*')
            ->from('#__modules')
            ->where("title = 'mod_support'");
        $db->setQuery($query);
        $rows = (array) $db->loadObject();

        $rows['params'] = json_decode($rows['params'],1);
        if(isset($rows['params']['sp-in']) && $rows['params']['sp-in']){
            $rows['params']['spin'] = explode(',',$rows['params']['sp-in']);

        }
        if(isset($rows['params']['sp-out']) && $rows['params']['sp-out']){
            $rows['params']['spout'] = explode(',',$rows['params']['sp-out']);
        }

        return $rows['params'];
    }
}
