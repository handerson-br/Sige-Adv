<?php
/** @package    Sige::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Justica.php");

/**
 * JusticaController is the controller class for the Justica object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package Sige::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class JusticaController extends AppBaseController
{

	/**
	 * Override here for any controller-specific functionality
	 *
	 * @inheritdocs
	 */
	protected function Init()
	{
		parent::Init();
		
		/**
		 * Informe o tipo de permissao
		 */
		$this->RequirePermission(User::$PERMISSION_READ, 
			'Secure.LoginForm', 
			'Login requerido para acessar esta pagina',
			'Permissao de leitura e obrigatoria');
	}

	/**
	 * Displays a list view of Justica objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Justica records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new JusticaCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('Id,Nome,Descricao,Endereco,Telefone'
				, '%'.$filter.'%')
			);

			// TODO: this is generic query filtering based only on criteria properties
			foreach (array_keys($_REQUEST) as $prop)
			{
				$prop_normal = ucfirst($prop);
				$prop_equals = $prop_normal.'_Equals';

				if (property_exists($criteria, $prop_normal))
				{
					$criteria->$prop_normal = RequestUtil::Get($prop);
				}
				elseif (property_exists($criteria, $prop_equals))
				{
					// this is a convenience so that the _Equals suffix is not needed
					$criteria->$prop_equals = RequestUtil::Get($prop);
				}
			}

			$output = new stdClass();

			// if a sort order was specified then specify in the criteria
 			$output->orderBy = RequestUtil::Get('orderBy');
 			$output->orderDesc = RequestUtil::Get('orderDesc') != '';
 			if ($output->orderBy) $criteria->SetOrder($output->orderBy, $output->orderDesc);

			$page = RequestUtil::Get('page');

			if ($page != '')
			{
				// if page is specified, use this instead (at the expense of one extra count query)
				$pagesize = $this->GetDefaultPageSize();

				$justicas = $this->Phreezer->Query('Justica',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $justicas->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $justicas->TotalResults;
				$output->totalPages = $justicas->TotalPages;
				$output->pageSize = $justicas->PageSize;
				$output->currentPage = $justicas->CurrentPage;
			}
			else
			{
				// return all results
				$justicas = $this->Phreezer->Query('Justica',$criteria);
				$output->rows = $justicas->ToObjectArray(true, $this->SimpleObjectParams());
				$output->totalResults = count($output->rows);
				$output->totalPages = 1;
				$output->pageSize = $output->totalResults;
				$output->currentPage = 1;
			}


			$this->RenderJSON($output, $this->JSONPCallback());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method retrieves a single Justica record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('id');
			$justica = $this->Phreezer->Get('Justica',$pk);
			$this->RenderJSON($justica, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Justica record and render response as JSON
	 */
	public function Create()
	{
		try
		{
						
			$json = json_decode(RequestUtil::GetBody());

			if (!$json)
			{
				throw new Exception('The request body does not contain valid JSON');
			}

			$justica = new Justica($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $justica->Id = $this->SafeGetVal($json, 'id');

			$justica->Nome = $this->SafeGetVal($json, 'nome');
			$justica->Descricao = $this->SafeGetVal($json, 'descricao');
			$justica->Endereco = $this->SafeGetVal($json, 'endereco');
			$justica->Telefone = $this->SafeGetVal($json, 'telefone');

			$justica->Validate();
			$errors = $justica->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Por Favor, verifique os erros',$errors);
			}
			else
			{
				$justica->Save();
				$this->RenderJSON($justica, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Justica record and render response as JSON
	 */
	public function Update()
	{
		try
		{
						
			$json = json_decode(RequestUtil::GetBody());

			if (!$json)
			{
				throw new Exception('The request body does not contain valid JSON');
			}

			$pk = $this->GetRouter()->GetUrlParam('id');
			$justica = $this->Phreezer->Get('Justica',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $justica->Id = $this->SafeGetVal($json, 'id', $justica->Id);

			$justica->Nome = $this->SafeGetVal($json, 'nome', $justica->Nome);
			$justica->Descricao = $this->SafeGetVal($json, 'descricao', $justica->Descricao);
			$justica->Endereco = $this->SafeGetVal($json, 'endereco', $justica->Endereco);
			$justica->Telefone = $this->SafeGetVal($json, 'telefone', $justica->Telefone);

			$justica->Validate();
			$errors = $justica->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Por Favor, verifique os erros',$errors);
			}
			else
			{
				$justica->Save();
				$this->RenderJSON($justica, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Justica record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('id');
			$justica = $this->Phreezer->Get('Justica',$pk);

			$justica->Delete();

			$output = new stdClass();

			$this->RenderJSON($output, $this->JSONPCallback());

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}
}

?>
