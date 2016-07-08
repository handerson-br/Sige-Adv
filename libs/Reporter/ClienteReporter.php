<?php
/** @package    Sige::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the Cliente object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package Sige::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class ClienteReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `cliente` table
	public $CustomFieldExample;

	public $Id;
	public $Nome;
	public $Sobrenome;
	public $Endereco;
	public $Cep;
	public $Estado;
	public $Cpf;
	public $Rg;
	public $Telefone;
	public $Email;
	public $Observacao;

	/*
	* GetCustomQuery returns a fully formed SQL statement.  The result columns
	* must match with the properties of this reporter object.
	*
	* @see Reporter::GetCustomQuery
	* @param Criteria $criteria
	* @return string SQL statement
	*/
	static function GetCustomQuery($criteria)
	{
		$sql = "select
			'custom value here...' as CustomFieldExample
			,`cliente`.`c_id` as Id
			,`cliente`.`c_nome` as Nome
			,`cliente`.`c_sobrenome` as Sobrenome
			,`cliente`.`c_endereco` as Endereco
			,`cliente`.`c_cep` as Cep
			,`cliente`.`c_estado` as Estado
			,`cliente`.`c_cpf` as Cpf
			,`cliente`.`c_rg` as Rg
			,`cliente`.`c_telefone` as Telefone
			,`cliente`.`c_email` as Email
			,`cliente`.`c_observacao` as Observacao
		from `cliente`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();
		$sql .= $criteria->GetOrder();

		return $sql;
	}
	
	/*
	* GetCustomCountQuery returns a fully formed SQL statement that will count
	* the results.  This query must return the correct number of results that
	* GetCustomQuery would, given the same criteria
	*
	* @see Reporter::GetCustomCountQuery
	* @param Criteria $criteria
	* @return string SQL statement
	*/
	static function GetCustomCountQuery($criteria)
	{
		$sql = "select count(1) as counter from `cliente`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>