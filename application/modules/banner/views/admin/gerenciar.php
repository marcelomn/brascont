<?php
defined('BASEPATH') OR exit('O silêncio vale ouro!');
echo Modules::run(DIR_TEMPLATE.'/admin_cabecalho');
?>
	
					<!-- start: page -->
					<div class="row">
						<div class="col-md-12 col-lg-12 col-xl-12">
							<section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>
					
									<h2 class="panel-title">{titulo_area}</h2>
								</header>
								<div class="panel-body">
									<section class="panel">
										{mensagem}
										<table class="table table-bordered table-striped mb-none" id="datatable-default">
											<thead>
												<tr>
													<th width="180">Banner</th>
													<th>Nome</th>
													<th class="text-center" width="180">Ação</th>
												</tr>
											</thead>
											<tbody>
												{banners}
												<tr class="gradeX">
													<td><img src="{base_url}uploads/banners/{banner_imagem}" alt="" width="180" /></td>
													<td>{banner_nome}</td>
													<td class="text-center">{botoes_acao}</td>
												</tr>
												{/banners}
											</tbody>
										</table>
									</section>
								</div>
							</section>
						</div>
					</div>
					

<?php
echo Modules::run(DIR_TEMPLATE.'/admin_rodape');