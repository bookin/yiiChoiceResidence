<?php

/**
 * This is the model class for table "12_countries".
 *
 * The followings are the available columns in table '12_countries':
 * @property integer $id_country
 * @property string $country_name_ru
 * @property string $country_name_en
 * @property string $country_iso
 * @property integer $country_order
 */
class Country extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Country the static model class
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
		return '12_countries';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('country_name_en, country_order', 'required'),
			array('country_order', 'numerical', 'integerOnly'=>true),
			array('country_name_ru, country_name_en', 'length', 'max'=>50),
			array('country_iso', 'length', 'max'=>2),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_country, country_name_ru, country_name_en, country_iso, country_order', 'safe', 'on'=>'search'),
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
			'id_country' => 'Id Country',
			'country_name_ru' => 'Country Name Ru',
			'country_name_en' => 'Country Name En',
			'country_iso' => 'Country Iso',
			'country_order' => 'Country Order',
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

		$criteria->compare('id_country',$this->id_country);
		$criteria->compare('country_name_ru',$this->country_name_ru,true);
		$criteria->compare('country_name_en',$this->country_name_en,true);
		$criteria->compare('country_iso',$this->country_iso,true);
		$criteria->compare('country_order',$this->country_order);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}