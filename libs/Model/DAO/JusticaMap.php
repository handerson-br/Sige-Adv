<?php
/** @package    Sige::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * JusticaMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the JusticaDAO to the justica datastore.
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
class JusticaMap implements IDaoMap, IDaoMap2
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
			self::$FM["Id"] = new FieldMap("Id","justica","j_id",true,FM_TYPE_INT,11,null,true,true);
			self::$FM["Nome"] = new FieldMap("Nome","justica","j_nome",false,FM_TYPE_VARCHAR,45,null,false,true);
			self::$FM["Descricao"] = new FieldMap("Descricao","justica","j_descricao",false,FM_TYPE_TEXT,null,null,false,false);
			self::$FM["Endereco"] = new FieldMap("Endereco","justica","j_endereco",false,FM_TYPE_VARCHAR,64,null,false,true);
			self::$FM["Telefone"] = new FieldMap("Telefone","justica","j_telefone",false,FM_TYPE_INT,16,null,false,true);
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
			self::$KM["fk_agenda_justica1"] = new KeyMap("fk_agenda_justica1", "Id", "Agenda", "JusticaJId", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
		}
		return self::$KM;
	}

}

?>