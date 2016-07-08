<?php
/** @package Sige::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("ClienteMap.php");

/**
 * ClienteDAO provides object-oriented access to the cliente table.  This
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
class ClienteDAO extends Phreezable
{
	/** @var int */
	public $Id;

	/** @var string */
	public $Nome;

	/** @var string */
	public $Sobrenome;

	/** @var string */
	public $Endereco;

	/** @var string */
	public $Cep;

	/** @var enum */
	public $Estado;

	/** @var int */
	public $Cpf;

	/** @var int */
	public $Rg;

	/** @var string */
	public $Telefone;

	/** @var string */
	public $Email;

	/** @var string */
	public $Observacao;


	/**
	 * Returns a dataset of Agenda objects with matching ClienteCId
	 * @param Criteria
	 * @return DataSet
	 */
	public function GetCAgendas($criteria = null)
	{
		return $this->_phreezer->GetOneToMany($this, "fk_agenda_cliente1", $criteria);
	}


}
?>