<?php
/** @package    Sige::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * ClienteMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the ClienteDAO to the cliente datastore.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * You can override the default fetching strategies for KeyMaps in _config.php.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package Sige::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class ClienteMap implements IDaoMap, IDaoMap2
{

	private static $KM;
	private static $FM;
	
	/**
	 * {@inheritdoc}
	 */
	public static function AddMap($property,FieldMap $map)
	{
		self::GetFieldMaps();
		self::$FM[$property] = $map;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public static function SetFetchingStrategy($property,$loadType)
	{
		self::GetKeyMaps();
		self::$KM[$property]->LoadType = $loadType;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetFieldMaps()
	{
		if (self::$FM == null)
		{
			self::$FM = Array();
			self::$FM["Id"] = new FieldMap("Id","cliente","c_id",true,FM_TYPE_INT,11,null,true,true);
			self::$FM["Nome"] = new FieldMap("Nome","cliente","c_nome",false,FM_TYPE_VARCHAR,45,null,false,true);
			self::$FM["Sobrenome"] = new FieldMap("Sobrenome","cliente","c_sobrenome",false,FM_TYPE_VARCHAR,45,null,false,false);
			self::$FM["Endereco"] = new FieldMap("Endereco","cliente","c_endereco",false,FM_TYPE_VARCHAR,255,null,false,true);
			self::$FM["Cep"] = new FieldMap("Cep","cliente","c_cep",false,FM_TYPE_VARCHAR,45,null,false,false);
			self::$FM["Estado"] = new FieldMap("Estado","cliente","c_estado",false,FM_TYPE_ENUM,array("RN","PB","PE"),null,false,true);
			self::$FM["Cpf"] = new FieldMap("Cpf","cliente","c_cpf",false,FM_TYPE_INT,16,null,false,true);
			self::$FM["Rg"] = new FieldMap("Rg","cliente","c_rg",false,FM_TYPE_INT,16,null,false,true);
			self::$FM["Telefone"] = new FieldMap("Telefone","cliente","c_telefone",false,FM_TYPE_VARCHAR,45,null,false,false);
			self::$FM["Email"] = new FieldMap("Email","cliente","c_email",false,FM_TYPE_VARCHAR,64,null,false,true);
			self::$FM["Observacao"] = new FieldMap("Observacao","cliente","c_observacao",false,FM_TYPE_TEXT,null,null,false,false);
		}
		return self::$FM;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetKeyMaps()
	{
		if (self::$KM == null)
		{
			self::$KM = Array();
			self::$KM["fk_agenda_cliente1"] = new KeyMap("fk_agenda_cliente1", "Id", "Agenda", "ClienteCId", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
		}
		return self::$KM;
	}

}

?>