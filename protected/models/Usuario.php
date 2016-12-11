<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property integer $id_usuario
 * @property string $username
 * @property string $password
 * @property string $rut
 * @property string $nombre_completo
 * @property string $email
 * @property string $telefono
 * @property string $direccion
 * @property integer $id_tipo_usuario
 * @property integer $id_comuna
 *
 * The followings are the available model relations:
 * @property Producto[] $productos
 * @property Comuna $idComuna
 * @property TipoUsuario $idTipoUsuario
 */
class Usuario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, rut, nombre_completo, email, telefono, direccion, id_tipo_usuario, id_comuna', 'required'),
			array('id_tipo_usuario, id_comuna', 'numerical', 'integerOnly'=>true),
			array('username, password', 'length', 'max'=>128),
			array('rut','length', 'max'=>20),
			array('telefono', 'length', 'max'=>10),

			array('nombre_completo, email', 'length', 'max'=>70),
			array('direccion', 'length', 'max'=>80),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_usuario, username, password, rut, nombre_completo, email, telefono, direccion, id_tipo_usuario, id_comuna', 'safe', 'on'=>'search'),
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
			'productos' => array(self::HAS_MANY, 'Producto', 'id_usuario'),
			'idComuna' => array(self::BELONGS_TO, 'Comuna', 'id_comuna'),
			'idTipoUsuario' => array(self::BELONGS_TO, 'TipoUsuario', 'id_tipo_usuario'),
			'compras' => array(self::HAS_MANY, 'Compra', 'id_compra'),

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_usuario' => 'Id Usuario',
			'username' => 'Username',
			'password' => 'Password',
			'rut' => 'Rut',
			'nombre_completo' => 'Nombre Completo',
			'email' => 'Email',
			'telefono' => 'Telefono',
			'direccion' => 'Direccion',
			'id_tipo_usuario' => 'Id Tipo Usuario',
			'id_comuna' => 'Id Comuna',
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

		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('rut',$this->rut,true);
		$criteria->compare('nombre_completo',$this->nombre_completo,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('id_tipo_usuario',$this->id_tipo_usuario);
		$criteria->compare('id_comuna',$this->id_comuna);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
