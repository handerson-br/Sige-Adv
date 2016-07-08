<?php
/** @package    Sige::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * AgendaMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the AgendaDAO to the agenda datastore.
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
class AgendaMap implements IDaoMap, IDaoMap2
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
			self::$FM["AId"] = new FieldMap("AId","agenda","a_id",true,FM_TYPE_INT,11,null,true,true);
			self::$FM["AProcesso"] = new FieldMap("AProcesso","agenda","a_processo",false,FM_TYPE_VARCHAR,45,null,false,true);
			self::$FM["ClienteCId"] = new FieldMap("ClienteCId","agenda","cliente_c_id",false,FM_TYPE_INT,11,null,false,true);
			self::$FM["JusticaJId"] = new FieldMap("JusticaJId","agenda","justica_j_id",false,FM_TYPE_INT,11,null,false,true);
			self::$FM["FuncionarioFId"] = new FieldMap("FuncionarioFId","agenda","funcionario_f_id",false,FM_TYPE_INT,11,null,false,true);
			self::$FM["ADataIn"] = new FieldMap("ADataIn","agenda","a_data_in",false,FM_TYPE_DATE,null,null,false,false);
			self::$FM["ADateOut"] = new FieldMap("ADateOut","agenda","a_date_out",false,FM_TYPE_DATE,null,null,false,false);
			self::$FM["AObservacao"] = new FieldMap("AObservacao","agenda","a_observacao",false,FM_TYPE_TEXT,null,null,false,false);
			self::$FM["Estatus"] = new FieldMap("Estatus","agenda","estatus",false,FM_TYPE_ENUM,array("PENDENTE","CONCLUIDO","CANCELADO","ANDAMENTO"),null,false,true);
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
			self::$KM["fk_agenda_cliente1"] = new KeyMap("fk_agenda_cliente1", "ClienteCId", "Cliente", "Id", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["fk_agenda_funcionario"] = new KeyMap("fk_agenda_funcionario", "FuncionarioFId", "Funcionario", "Id", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["fk_agenda_justica1"] = new KeyMap("fk_agenda_justica1", "JusticaJId", "Justica", "Id", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>