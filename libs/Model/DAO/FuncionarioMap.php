<?php
/** @package    Sige::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * FuncionarioMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the FuncionarioDAO to the funcionario datastore.
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
class FuncionarioMap implements IDaoMap, IDaoMap2
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
			self::$FM["Id"] = new FieldMap("Id","funcionario","f_id",true,FM_TYPE_INT,11,null,true,true);
			self::$FM["Registro"] = new FieldMap("Registro","funcionario","f_registro",false,FM_TYPE_INT,45,null,false,true);
			self::$FM["Nome"] = new FieldMap("Nome","funcionario","f_nome",false,FM_TYPE_VARCHAR,45,null,false,false);
			self::$FM["Telefone"] = new FieldMap("Telefone","funcionario","f_telefone",false,FM_TYPE_VARCHAR,45,null,false,false);
			self::$FM["Email"] = new FieldMap("Email","funcionario","f_email",false,FM_TYPE_VARCHAR,45,null,false,true);
			self::$FM["Nivel"] = new FieldMap("Nivel","funcionario","f_nivel",false,FM_TYPE_ENUM,array("ADVOGADO","BACHAREL","ESTAGIARIO"),null,false,false);
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
			self::$KM["fk_agenda_funcionario"] = new KeyMap("fk_agenda_funcionario", "Id", "Agenda", "FuncionarioFId", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
		}
		return self::$KM;
	}

}

?>