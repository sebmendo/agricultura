<?php

/**
 * This is the model class for table "valoralizacion_producto".
 *
 * The followings are the available columns in table 'valoralizacion_producto':
 * @property integer $id_valoralizacion_producto
 * @property integer $id_producto
 * @property integer $valoralizacion
 *
 * The followings are the available model relations:
 * @property Producto $idProducto
 */
class ValoralizacionProducto extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'valoralizacion_producto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_producto, valoralizacion, comentario', 'required'),
			array('id_valoralizacion_producto, id_producto, valoralizacion', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_valoralizacion_producto, id_producto, valoralizacion,comentario, fecha', 'safe', 'on'=>'search'),
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
			'idProducto' => array(self::BELONGS_TO, 'Producto', 'id_producto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_valoralizacion_producto' => 'Id Valoralizacion Producto',
			'id_producto' => 'Producto',
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

		$criteria->compare('id_valoralizacion_producto',$this->id_valoralizacion_producto);
		$criteria->compare('id_producto',$this->id_producto);
		$criteria->compare('valoralizacion',$this->valoralizacion);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ValoralizacionProducto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
