<?php
Yii::import('application.modules.ChoiceResidence.models.*');
class ChoiceResidence extends CWidget {
	public $model=array();
	public $title='Укажите место проживания';
	public $prefix_name='user_info';

	public function run() {
        $this->render('viewSelectCity',array(
			'model'=>$this->model,
			'title'=>$this->title,
			'prefix_name'=>$this->prefix_name
		));
    }
	
	
}
?>