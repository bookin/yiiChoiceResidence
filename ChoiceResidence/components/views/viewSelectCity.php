 <div>
	<label><?=$title?></label>
	<div>
		<span class="select"><?=($model['countries']?Country::model()->findByPk($model['countries'])->country_name_ru:'Страна')?></span>
		<?$country=Country::model()->findAll();?>
		<select class="style" name="<?=$prefix_name?>[countries]" onChange="showCities($(this),'region','country','<?=Yii::app()->createUrl('/ChoiceResidence/residence')?>')">
			<?foreach($country as $c){?>
				<option value="<?=$c->id_country?>" <?=($model['countries']==$c->id_country?'selected="selected"':'')?> ><?=$c->country_name_ru?></option>
			<?}?>
		</select>
	</div>
	<?if($model['countries']){?>
	<div style="margin-top:5px;">
		<span class="select"><?=($model['region']?Regions::model()->findByPk($model['region'])->region_name_ru:'Область')?></span>
		<?$region=Regions::model()->findAll('id_country='.$model['countries']);?>
		<select id="region" class="style" name="<?=$prefix_name?>[region]" onChange="showCities($(this),'city','region','<?=Yii::app()->createUrl('/ChoiceResidence/residence')?>')">
		<?foreach($region as $r){?>
			<option value="<?=$r->id_region?>" <?=($model['region']==$r->id_region?'selected="selected"':'')?> ><?=$r->region_name_ru?></option>
		<?}?>
		</select>
	</div>
	<?}?>
	<?if($model['region']){?>
	<div style="margin-top:5px;">
		<span class="select"><?=($model['city']?City::model()->findByPk($model['city'])->city_name_ru:'Город')?></span>
		<?$city=City::model()->findAll('id_region='.$model['region']);?>
		<select id="city" class="style" name="<?=$prefix_name?>[city]" onChange="showCities($(this),'','city','<?=Yii::app()->createUrl('/ChoiceResidence/residence')?>')">
		<?foreach($city as $city){?>
			<option value="<?=$city->id_city?>" <?=($model['city']==$city->id_city?'selected="selected"':'')?> ><?=$city->city_name_ru?></option>
		<?}?>
		</select>
	</div>
	<?}?>
	<img class="city-mini-loader" src="/images/mini-loader.gif" />
</div>

<script type="text/javascript">
	showCities = function(element,who_model,who_this,url){
	    if(element.val()&&who_model){
			$('.city-mini-loader').css('display','block');
			$.post(url,{'id':element.val(),'who_model':who_model,'who_this':who_this},function(data){
				$('#'+who_model).closest('div').remove();
				if(who_model=='region'){
				$('#city').closest('div').remove();
				}
				element.closest('div').after(data);
				$('.city-mini-loader').css('display','none');
			});
	    }
	}
</script>