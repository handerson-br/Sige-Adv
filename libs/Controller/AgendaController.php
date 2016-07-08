<?php
/** @package    Sige::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Agenda.php");

/**
 * AgendaController is the controller class for the Agenda object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package Sige::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class AgendaController extends AppBaseController
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
	 * Displays a list view of Agenda objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Agenda records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new AgendaCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('AId,AProcesso,ClienteCId,JusticaJId,FuncionarioFId,ADataIn,ADateOut,AObservacao,Estatus'
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

				$agendas = $this->Phreezer->Query('Agenda',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $agendas->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $agendas->TotalResults;
				$output->totalPages = $agendas->TotalPages;
				$output->pageSize = $agendas->PageSize;
				$output->currentPage = $agendas->CurrentPage;
			}
			else
			{
				// return all results
				$agendas = $this->Phreezer->Query('Agenda',$criteria);
				$output->rows = $agendas->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single Agenda record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('aId');
			$agenda = $this->Phreezer->Get('Agenda',$pk);
			$this->RenderJSON($agenda, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Agenda record and render response as JSON
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

			$agenda = new Agenda($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $agenda->AId = $this->SafeGetVal($json, 'aId');

			$agenda->AProcesso = $this->SafeGetVal($json, 'aProcesso');
			$agenda->ClienteCId = $this->SafeGetVal($json, 'clienteCId');
			$agenda->JusticaJId = $this->SafeGetVal($json, 'justicaJId');
			$agenda->FuncionarioFId = $this->SafeGetVal($json, 'funcionarioFId');
			$agenda->ADataIn = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'aDataIn')));
			$agenda->ADateOut = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'aDateOut')));
			$agenda->AObservacao = $this->SafeGetVal($json, 'aObservacao');
			$agenda->Estatus = $this->SafeGetVal($json, 'estatus');

			$agenda->Validate();
			$errors = $agenda->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Por Favor, verifique os erros',$errors);
			}
			else
			{
				$agenda->Save();
				$this->RenderJSON($agenda, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Agenda record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('aId');
			$agenda = $this->Phreezer->Get('Agenda',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $agenda->AId = $this->SafeGetVal($json, 'aId', $agenda->AId);

			$agenda->AProcesso = $this->SafeGetVal($json, 'aProcesso', $agenda->AProcesso);
			$agenda->ClienteCId = $this->SafeGetVal($json, 'clienteCId', $agenda->ClienteCId);
			$agenda->JusticaJId = $this->SafeGetVal($json, 'justicaJId', $agenda->JusticaJId);
			$agenda->FuncionarioFId = $this->SafeGetVal($json, 'funcionarioFId', $agenda->FuncionarioFId);
			$agenda->ADataIn = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'aDataIn', $agenda->ADataIn)));
			$agenda->ADateOut = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'aDateOut', $agenda->ADateOut)));
			$agenda->AObservacao = $this->SafeGetVal($json, 'aObservacao', $agenda->AObservacao);
			$agenda->Estatus = $this->SafeGetVal($json, 'estatus', $agenda->Estatus);

			$agenda->Validate();
			$errors = $agenda->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Por Favor, verifique os erros',$errors);
			}
			else
			{
				$agenda->Save();
				$this->RenderJSON($agenda, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Agenda record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('aId');
			$agenda = $this->Phreezer->Get('Agenda',$pk);

			$agenda->Delete();

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
