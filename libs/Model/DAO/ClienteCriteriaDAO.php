<?php
/** @package    Sige::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Criteria.php");

/**
 * ClienteCriteria allows custom querying for the Cliente object.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * Add any custom business logic to the ModelCriteria class which is extended from this class.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @inheritdocs
 * @package Sige::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class ClienteCriteriaDAO extends Criteria
{

	public $Id_Equals;
	public $Id_NotEquals;
	public $Id_IsLike;
	public $Id_IsNotLike;
	public $Id_BeginsWith;
	public $Id_EndsWith;
	public $Id_GreaterThan;
	public $Id_GreaterThanOrEqual;
	public $Id_LessThan;
	public $Id_LessThanOrEqual;
	public $Id_In;
	public $Id_IsNotEmpty;
	public $Id_IsEmpty;
	public $Id_BitwiseOr;
	public $Id_BitwiseAnd;
	public $Nome_Equals;
	public $Nome_NotEquals;
	public $Nome_IsLike;
	public $Nome_IsNotLike;
	public $Nome_BeginsWith;
	public $Nome_EndsWith;
	public $Nome_GreaterThan;
	public $Nome_GreaterThanOrEqual;
	public $Nome_LessThan;
	public $Nome_LessThanOrEqual;
	public $Nome_In;
	public $Nome_IsNotEmpty;
	public $Nome_IsEmpty;
	public $Nome_BitwiseOr;
	public $Nome_BitwiseAnd;
	public $Sobrenome_Equals;
	public $Sobrenome_NotEquals;
	public $Sobrenome_IsLike;
	public $Sobrenome_IsNotLike;
	public $Sobrenome_BeginsWith;
	public $Sobrenome_EndsWith;
	public $Sobrenome_GreaterThan;
	public $Sobrenome_GreaterThanOrEqual;
	public $Sobrenome_LessThan;
	public $Sobrenome_LessThanOrEqual;
	public $Sobrenome_In;
	public $Sobrenome_IsNotEmpty;
	public $Sobrenome_IsEmpty;
	public $Sobrenome_BitwiseOr;
	public $Sobrenome_BitwiseAnd;
	public $Endereco_Equals;
	public $Endereco_NotEquals;
	public $Endereco_IsLike;
	public $Endereco_IsNotLike;
	public $Endereco_BeginsWith;
	public $Endereco_EndsWith;
	public $Endereco_GreaterThan;
	public $Endereco_GreaterThanOrEqual;
	public $Endereco_LessThan;
	public $Endereco_LessThanOrEqual;
	public $Endereco_In;
	public $Endereco_IsNotEmpty;
	public $Endereco_IsEmpty;
	public $Endereco_BitwiseOr;
	public $Endereco_BitwiseAnd;
	public $Cep_Equals;
	public $Cep_NotEquals;
	public $Cep_IsLike;
	public $Cep_IsNotLike;
	public $Cep_BeginsWith;
	public $Cep_EndsWith;
	public $Cep_GreaterThan;
	public $Cep_GreaterThanOrEqual;
	public $Cep_LessThan;
	public $Cep_LessThanOrEqual;
	public $Cep_In;
	public $Cep_IsNotEmpty;
	public $Cep_IsEmpty;
	public $Cep_BitwiseOr;
	public $Cep_BitwiseAnd;
	public $Estado_Equals;
	public $Estado_NotEquals;
	public $Estado_IsLike;
	public $Estado_IsNotLike;
	public $Estado_BeginsWith;
	public $Estado_EndsWith;
	public $Estado_GreaterThan;
	public $Estado_GreaterThanOrEqual;
	public $Estado_LessThan;
	public $Estado_LessThanOrEqual;
	public $Estado_In;
	public $Estado_IsNotEmpty;
	public $Estado_IsEmpty;
	public $Estado_BitwiseOr;
	public $Estado_BitwiseAnd;
	public $Cpf_Equals;
	public $Cpf_NotEquals;
	public $Cpf_IsLike;
	public $Cpf_IsNotLike;
	public $Cpf_BeginsWith;
	public $Cpf_EndsWith;
	public $Cpf_GreaterThan;
	public $Cpf_GreaterThanOrEqual;
	public $Cpf_LessThan;
	public $Cpf_LessThanOrEqual;
	public $Cpf_In;
	public $Cpf_IsNotEmpty;
	public $Cpf_IsEmpty;
	public $Cpf_BitwiseOr;
	public $Cpf_BitwiseAnd;
	public $Rg_Equals;
	public $Rg_NotEquals;
	public $Rg_IsLike;
	public $Rg_IsNotLike;
	public $Rg_BeginsWith;
	public $Rg_EndsWith;
	public $Rg_GreaterThan;
	public $Rg_GreaterThanOrEqual;
	public $Rg_LessThan;
	public $Rg_LessThanOrEqual;
	public $Rg_In;
	public $Rg_IsNotEmpty;
	public $Rg_IsEmpty;
	public $Rg_BitwiseOr;
	public $Rg_BitwiseAnd;
	public $Telefone_Equals;
	public $Telefone_NotEquals;
	public $Telefone_IsLike;
	public $Telefone_IsNotLike;
	public $Telefone_BeginsWith;
	public $Telefone_EndsWith;
	public $Telefone_GreaterThan;
	public $Telefone_GreaterThanOrEqual;
	public $Telefone_LessThan;
	public $Telefone_LessThanOrEqual;
	public $Telefone_In;
	public $Telefone_IsNotEmpty;
	public $Telefone_IsEmpty;
	public $Telefone_BitwiseOr;
	public $Telefone_BitwiseAnd;
	public $Email_Equals;
	public $Email_NotEquals;
	public $Email_IsLike;
	public $Email_IsNotLike;
	public $Email_BeginsWith;
	public $Email_EndsWith;
	public $Email_GreaterThan;
	public $Email_GreaterThanOrEqual;
	public $Email_LessThan;
	public $Email_LessThanOrEqual;
	public $Email_In;
	public $Email_IsNotEmpty;
	public $Email_IsEmpty;
	public $Email_BitwiseOr;
	public $Email_BitwiseAnd;
	public $Observacao_Equals;
	public $Observacao_NotEquals;
	public $Observacao_IsLike;
	public $Observacao_IsNotLike;
	public $Observacao_BeginsWith;
	public $Observacao_EndsWith;
	public $Observacao_GreaterThan;
	public $Observacao_GreaterThanOrEqual;
	public $Observacao_LessThan;
	public $Observacao_LessThanOrEqual;
	public $Observacao_In;
	public $Observacao_IsNotEmpty;
	public $Observacao_IsEmpty;
	public $Observacao_BitwiseOr;
	public $Observacao_BitwiseAnd;

}

?>