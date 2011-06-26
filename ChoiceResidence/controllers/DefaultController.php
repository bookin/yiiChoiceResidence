<?php
class DefaultController extends Controller
{
	public function actionResidence(){
	    if($_POST){
		$id=(int)$_POST['id'];
		$this_model=$_POST["who_this"];
		$who_model=$_POST['who_model'];
		if($who_model=='region'){
		    $js_param_two='city';
		    $model=Regions::model()->findAll('id_'.$this_model.'='.$id);
		}elseif($who_model=='city'){
		    $js_param_two='';
		    $model=City::model()->findAll('id_'.$this_model.'='.$id);
		}
		$select.='<div style="margin-top:5px;">';
		$select.='<span class="select">'.($who_model=='region'?'Область':($who_model=='city'?'Город':'')).'</span>';
		$select.='<select  onChange=showCities($(this),"'.$js_param_two.'","'.$who_model.'","'.$this->createUrl('/ChoiceResidence/residence').'")  '.($who_model=='city'?'name="user_info[city]"':'name="user_info[region]"').'class="style" id="'.$who_model.'">';
		//$select.='<option></option>';
		$show_id="id_".$who_model;
		$show_name=$who_model."_name_ru";

		foreach($model as $m){
		    $select.='<option value="'.$m->$show_id.'">'.$m->$show_name.'</option>';
		}
		$select.='</select>';
		$select.='</div>';
		print $select;
	    }
	}
}