<?php
	$this->assign('title','Sige | Agendas');
	$this->assign('nav','agendas');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/agendas.js").wait(function(){
		$(document).ready(function(){
			page.init();
		});
		
		// hack for IE9 which may respond inconsistently with document.ready
		setTimeout(function(){
			if (!page.isInitialized) page.init();
		},1000);
	});
</script>

<div class="container">

<h1>
	<i class="icon-th-list"></i> Agendas
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Buscar..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="agendaCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				
				<th id="header_AProcesso">Cliente/Processo<% if (page.orderBy == 'AProcesso') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_ADataIn">Data Entrada<% if (page.orderBy == 'ADataIn') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_ADateOut">Data Final<% if (page.orderBy == 'ADateOut') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Estatus">Estatus<% if (page.orderBy == 'Estatus') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>

				
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_ClienteCId">Cliente C Id<% if (page.orderBy == 'ClienteCId') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_JusticaJId">Justica J Id<% if (page.orderBy == 'JusticaJId') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_FuncionarioFId">Funcionario F Id<% if (page.orderBy == 'FuncionarioFId') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_AId">A Id<% if (page.orderBy == 'AId') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				
				<th id="header_AObservacao">A Observacao<% if (page.orderBy == 'AObservacao') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('aId')) %>">
				
				<td><%= _.escape(item.get('aProcesso') || '') %></td>
				<td><%if (item.get('aDataIn')) { %><%= _date(app.parseDate(item.get('aDataIn'))).format('MMM D, YYYY') %><% } else { %>NULL<% } %></td>
				<td><%if (item.get('aDateOut')) { %><%= _date(app.parseDate(item.get('aDateOut'))).format('MMM D, YYYY') %><% } else { %>NULL<% } %></td>
				<td><i><%= _.escape(item.get('estatus') || '') %></i></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('aId') || '') %></td>
				<td><%= _.escape(item.get('clienteCId') || '') %></td>
				<td><%= _.escape(item.get('justicaJId') || '') %></td>
				<td><%= _.escape(item.get('funcionarioFId') || '') %></td>
				
				<td><%= _.escape(item.get('aObservacao') || '') %></td>
				
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="agendaModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				
				<div id="aProcessoInputContainer" class="control-group">
					<label class="control-label" for="aProcesso">Descrição</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="aProcesso" placeholder="Nome/Processo" value="<%= _.escape(item.get('aProcesso') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="clienteCIdInputContainer" class="control-group">
					<label class="control-label" for="clienteCId">Cliente</label>
					<div class="controls inline-inputs">
						<select id="clienteCId" name="clienteCId"></select>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="justicaJIdInputContainer" class="control-group">
					<label class="control-label" for="justicaJId">Orgão</label>
					<div class="controls inline-inputs">
						<select id="justicaJId" name="justicaJId"></select>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="funcionarioFIdInputContainer" class="control-group">
					<label class="control-label" for="funcionarioFId">Advogado Responsavel</label>
					<div class="controls inline-inputs">
						<select id="funcionarioFId" name="funcionarioFId"></select>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="aDataInInputContainer" class="control-group">
					<label class="control-label" for="aDataIn">Data de Entrada</label>
					<div class="controls inline-inputs">
						<div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
							<input id="aDataIn" type="text" value="<%= _date(app.parseDate(item.get('aDataIn'))).format('YYYY-MM-DD') %>" />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="aDateOutInputContainer" class="control-group">
					<label class="control-label" for="aDateOut">Data Final</label>
					<div class="controls inline-inputs">
						<div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
							<input id="aDateOut" type="text" value="<%= _date(app.parseDate(item.get('aDateOut'))).format('YYYY-MM-DD') %>" />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="aObservacaoInputContainer" class="control-group">
					<label class="control-label" for="aObservacao">Observações</label>
					<div class="controls inline-inputs">
						<textarea class="input-xlarge" id="aObservacao" rows="3"><%= _.escape(item.get('aObservacao') || '') %></textarea>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="estatusInputContainer" class="control-group">
					<label class="control-label" for="estatus">Estatus</label>
					<div class="controls inline-inputs">
						<select id="estatus" name="estatus">
							<option value=""></option>
							<option value="PENDENTE"<% if (item.get('estatus')=='PENDENTE') { %> selected="selected"<% } %>>PENDENTE</option>
							<option value="CONCLUIDO"<% if (item.get('estatus')=='CONCLUIDO') { %> selected="selected"<% } %>>CONCLUIDO</option>
							<option value="CANCELADO"<% if (item.get('estatus')=='CANCELADO') { %> selected="selected"<% } %>>CANCELADO</option>
							<option value="ANDAMENTO"<% if (item.get('estatus')=='ANDAMENTO') { %> selected="selected"<% } %>>ANDAMENTO</option>
						</select>
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteAgendaButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteAgendaButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Remover Agenda</button>
						<span id="confirmDeleteAgendaContainer" class="hide">
							<button id="cancelDeleteAgendaButton" class="btn btn-mini">Cancelar</button>
							<button id="confirmDeleteAgendaButton" class="btn btn-mini btn-danger">Confirmar</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="agendaDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Editar Agenda
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="agendaModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveAgendaButton" class="btn btn-primary">Salvar Altera&ccedil;&otilde;es</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="agendaCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newAgendaButton" class="btn btn-primary">Adicionar Agenda</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
