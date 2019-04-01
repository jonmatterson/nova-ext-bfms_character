<?php

require_once dirname(__FILE__).'/helpers/bfms_character_api_helper.php';

$this->require_extension('jquery');

$labels = [
  'bfms' => 'Bravo Fleet Management System',
  'bfms_instructions' => 'If you provide the URL to your character within BFMS, the data from BFMS will be displayed so that you do not have to duplicate it. This URL should be of the form <span style="font-family: monospace">https://www.bravofleet.com/character/###/</span> and can be retrieved by visiting your profile and navigating to your character.',
  'bfms_character_url' => 'Character URL'
];

$this->event->listen(['db', 'insert', 'prepare', 'characters', 'main', 'join'], function($event){
  if(empty($event['data']['bfms_character_url']) && $this->input->post('bfms_character_url', true))
    $event['data']['bfms_character_url'] = $this->input->post('bfms_character_url', true);
});

$this->event->listen(['location', 'view', 'data', 'main', 'main_join_2'], function($event) use (&$labels){
  $event['data']['label']['bfms'] = $labels['bfms'];
  $event['data']['label']['bfms_instructions'] = $labels['bfms_instructions'];
  $event['data']['label']['bfms_character_url'] = $labels['bfms_character_url'];
  $event['data']['inputs']['bfms_character_url'] = array(
    'name' => 'bfms_character_url',
    'id' => 'bfms_character_url'
  );
});

$this->event->listen(['location', 'view', 'output', 'main', 'main_join_2'], function($event){
  $event['output'] .= $this->extension['jquery']['generator']
                  ->select('#three')
                  ->prepend($this->extension['bfms_character']->view('characters_bio', $this->skin, 'admin', $event['data']));
});

$this->event->listen(['location', 'view', 'data', 'admin', 'characters_create'], function($event) use (&$labels){
  $event['data']['label']['bfms'] = $labels['bfms'];
  $event['data']['label']['bfms_instructions'] = $labels['bfms_instructions'];
  $event['data']['label']['bfms_character_url'] = $labels['bfms_character_url'];
  $event['data']['inputs']['bfms_character_url'] = array(
    'name' => 'bfms_character_url',
    'id' => 'bfms_character_url'
  );
});

$this->event->listen(['location', 'view', 'output', 'admin', 'characters_create'], function($event){
  $event['output'] .= $this->extension['jquery']['generator']
                  ->select('#two')
                  ->prepend($this->extension['bfms_character']->view('characters_bio', $this->skin, 'admin', $event['data']));
});

$this->event->listen(['location', 'view', 'data', 'admin', 'characters_bio'], function($event) use (&$labels){
  $id = $this->uri->segment(3);
  $char = $this->char->get_character($id);
  $event['data']['label']['bfms'] = $labels['bfms'];
  $event['data']['label']['bfms_instructions'] = $labels['bfms_instructions'];
  $event['data']['label']['bfms_character_url'] = $labels['bfms_character_url'];
  $event['data']['inputs']['bfms_character_url'] = array(
    'name' => 'bfms_character_url',
    'id' => 'bfms_character_url',
    'value' => $char->bfms_character_url
  );
});

$this->event->listen(['location', 'view', 'output', 'admin', 'characters_bio'], function($event){
  $event['output'] .= $this->extension['jquery']['generator']
                  ->select('#two')
                  ->prepend($this->extension['bfms_character']->view('characters_bio', $this->skin, 'admin', $event['data']));
});

$this->event->listen(['location', 'view', 'data', 'main', 'personnel_character'], function($event){
  $id = $this->uri->segment(3);
  $char = $this->char->get_character($id);
  $content = bfms_character__api__get_character($char);
  $event['data']['bfms_character'] = json_decode($content, true);
});

$this->event->listen(['location', 'view', 'output', 'main', 'personnel_character'], function($event){
  $event['output'] .= $this->extension['jquery']['generator']
                  ->select('#tabs')
                  ->append($this->extension['bfms_character']->view('personnel_character', $this->skin, 'main', $event['data']));
});
