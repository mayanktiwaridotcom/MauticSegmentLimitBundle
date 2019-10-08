<?php
return array(
    'name' => 'Segment Limit',
    'description' => 'This plugin lets you move contacts from one segment to another based on pre defined limit',
    'author' => 'Andreas Stoll, Mayank Tiwari',
    'website' => 'http://www.stoerkens.de/',
    'version' => '1.0.0',
    "routes" => array(
        'main' => array(
            'plugin_mautic_sl_index' => array(
                'path' => '/sl',
                'controller' => 'MauticSegmentLimitBundle:SegmentLimit:index'
            ),
            'plugin_mautic_gs_changesegment' => [
                'path' => '/sl/changesegment',
                'controller'=> 'MauticSegmentLimitBundle:SegmentLimit:changeSegment'
            ],
            'plugin_mautic_sl_deletechangesegment' => [
                'path' => '/sl/deletechangesegment',
                'controller'=> 'MauticSegmentLimitBundle:SegmentLimit:deleteChangeSegment'
            ]
        )
    ),
    'menu' => array(
        'main' => array(
            'priority' => 24,
            'items' => array(
                'Segment Limit' => array(
                    'route' => 'plugin_mautic_sl_index',
                    'iconClass' => 'fa fa-plus'
                )
            )
        )
    ),
);