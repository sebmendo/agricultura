<?php

/**
 * This is the model class for table "detalle_compra".
 *
 * The followings are the available columns in table 'detalle_compra':
 * @property integer $id_detalle_compra
 * @property integer $id_compra
 * @property integer $id_producto
 * @property string $precio
 * @property string $cantidad
 *
 * The followings are the available model relations:
 * @property Compra $idCompra
 * @property Producto $idProducto
 */
class DetalleCompra extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'detalle_compra';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_compra, id_producto, precio, cantidad', 'required'),
			array('id_compra, id_producto', 'numerical', 'integerOnly'=>true),
			array('precio, cantidad', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_detalle_compra, id_compra, id_producto, precio, cantidad', 'safe', 'on'=>'search'),
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
			'idProducto' => array(self::BELONGS_TO, 'Producto', 'id_producto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_detalle_compra' => 'Id Detalle Compra',
			'id_compra' => 'Id Compra',
			'id_producto' => 'Id Producto',
			'precio' => 'Precio',
			'cantidad' => 'Cantidad',
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

		$criteria->compare('id_detalle_compra',$this->id_detalle_compra);
		$criteria->compare('id_compra',$this->id_compra);
		$criteria->compare('id_producto',$this->id_producto);
		$criteria->compare('precio',$this->precio,true);
		$criteria->compare('cantidad',$this->cantidad,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DetalleCompra the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
