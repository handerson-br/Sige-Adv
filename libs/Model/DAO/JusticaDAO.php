<?php
/** @package Sige::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("JusticaMap.php");

/**
 * JusticaDAO provides object-oriented access to the justica table.  This
 * class is automatically generated by ClassBuilder.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * Add any custom business logic to the Model class which is extended from this DAO class.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package Sige::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class JusticaDAO extends Phreezable
{
	/** @var int */
	public $Id;

	/** @var string */
	public $Nome;

	/** @var string */
	public $Descricao;

	/** @var string */
	public $Endereco;

	/** @var int */
	public $Telefone;


	/**
	 * Returns a dataset of Agenda objects with matching JusticaJId
	 * @param Criteria
	 * @return DataSet
	 */
	public function GetJAgendas($criteria = null)
	{
		return $this->_phreezer->GetOneToMany($this, "fk_agenda_justica1", $criteria);
	}


}
?>