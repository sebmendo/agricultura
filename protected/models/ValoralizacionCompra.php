<?php

/**
 * This is the model class for table "valoralizacion_compra".
 *
 * The followings are the available columns in table 'valoralizacion_compra':
 * @property integer $id_valoralizacion_compra
 * @property integer $id_compra
 * @property integer $valoralizacion
 *
 * The followings are the available model relations:
 * @property Compra $idCompra
 */
class ValoralizacionCompra extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'valoralizacion_compra';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_compra, valoralizacion,comentario', 'required'),
			array('id_compra, valoralizacion', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_valoralizacion_compra, id_compra, valoralizacion, comentario', 'safe', 'on'=>'search'),
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
			'idCompra' => array(self::BELONGS_TO, 'Compra', 'id_compra'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_valoralizacion_compra' => 'Id Valoralizacion Compra',
			'id_compra' => 'N° de Compra',
			'valoralizacion' => 'Valoralización',
                        'comentario' => 'Comentarios'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_valoralizacion_compra',$this->id_valoralizacion_compra);
		$criteria->compare('id_compra',$this->id_compra);
		$criteria->compare('valoralizacion',$this->valoralizacion);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ValoralizacionCompra the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
