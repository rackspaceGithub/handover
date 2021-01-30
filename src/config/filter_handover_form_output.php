<!-- 
  AUTHOR: 
  MATTHEW ABLOTT
-->
<?php

define("TASK_CATEGORY", 1);
define("SET_TASK_SECTION", 0);
define("EACH_TASK", 0);
define("DC_SECTION", 0);
define("OFFICE_SECTION", 1);
define("CORE_SECTION", 2);

//handover sections
define("DC", "Data Centre");
define("OFFICE", "Office");
define("CORE", "Core");

//completed tasks
$completed_data_centre_tasks = array();
$completed_office_tasks = array();
$completed_core_tasks = array();

//incompleted tasks
$incompleted_data_centre_tasks = array();
$incompleted_office_tasks = array();
$incompleted_core_tasks = array();

//checkbox fields
$json['form_checked_fields'] = $json['form_checked_fields'] ?? array();
$json['form_fields'] = $json['form_fields'] ?? array();

$completed_tasks = array_intersect($json['form_checked_fields'], $json['form_fields']);
$incompleted_tasks = array_diff($json['form_fields'], $json['form_checked_fields']);

//if form_checked_fields not set, no tickboxes have been checked so we pass in complete list of dcops tasks (form_fields)
if (!isset($json['form_checked_fields'])) {
  $incompleted_tasks = $json['form_fields'];
}

//completed tasks are placed into each respective array
foreach($completed_tasks as $key => $completed_task):
	if (array_key_exists($key, $completed_tasks)) {
		$task = explode(":", $completed_task);
		switch($task[TASK_CATEGORY]) {
		  case "data_centre":
		    $completed_data_centre_tasks[] = $task[EACH_TASK];
		    break;

		  case "office":
		    $completed_office_tasks[] = $task[EACH_TASK];
		    break;

		  case "core":
		    $completed_core_tasks[] = $task[EACH_TASK];
		    break;
		}
	}
endforeach;


//incompleted tasks are placed into each respective array
foreach ($incompleted_tasks as $key => $incompleted_task):
	if (array_key_exists($key, $incompleted_tasks)) {
	  $task = explode(":", $incompleted_task);
		switch($task[TASK_CATEGORY]) {
		  case "data_centre":
		    //$incompleted_tasks_titles[DC_SECTION] = DC;
		    $incompleted_data_centre_tasks[] = $task[EACH_TASK];
		    break;

		  case "office":
		    //$incompleted_tasks_titles[OFFICE_SECTION] = OFFICE;
		    $incompleted_office_tasks[] = $task[EACH_TASK];
		    break;

		  case "core":
		    //$incompleted_tasks_titles[CORE_SECTION] = CORE;
		    $incompleted_core_tasks[] = $task[EACH_TASK];
		    break;
		}
	}
endforeach;


function check_completed_tasks($dc, $office, $core) {
	$task_titles = array("","","");
	//dc tasks isn't empty
	if ($dc) {
		$task_titles[DC_SECTION] = DC;
	}
	//office tasks isn't empty
	if ($office) {
		$task_titles[OFFICE_SECTION] = OFFICE;
	}
	//core tasks isn't empty
	if ($core) {
		$task_titles[CORE_SECTION] = CORE;
	}
	return $task_titles;
}


//set each task title depending on whether tasks are set for corresponding sections
$completed_tasks_titles = check_completed_tasks($completed_data_centre_tasks, $completed_office_tasks, $completed_core_tasks);

$incompleted_tasks_titles = check_completed_tasks($incompleted_data_centre_tasks, $incompleted_office_tasks, $incompleted_core_tasks);