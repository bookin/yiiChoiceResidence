<?php

/**
 * This is the model class for table "12_regions".
 *
 * The followings are the available columns in table '12_regions':
 * @property string $id_region
 * @property integer $id_country
 * @property string $region_name_ru
 * @property string $region_name_en
 * @property string $region_order
 */
class Regions extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Regions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '12_regions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_country, region_name_en, region_order', 'required'),
			array('id_country', 'numerical', 'integerOnly'=>true),
			array('region_name_ru, region_name_en', 'length', 'max'=>255),
			array('region_order', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_region, id_country, region_name_ru, region_name_en, region_order', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_region' => 'Id Region',
			'id_country' => 'Id Country',
			'region_name_ru' => 'Region Name Ru',
			'region_name_en' => 'Region Name En',
			'region_order' => 'Region Order',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_region',$this->id_region,true);
		$criteria->compare('id_country',$this->id_country);
		$criteria->compare('region_name_ru',$this->region_name_ru,true);
		$criteria->compare('region_name_en',$this->region_name_en,true);
		$criteria->compare('region_order',$this->region_order,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}