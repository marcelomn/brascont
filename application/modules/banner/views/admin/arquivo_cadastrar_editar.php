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
										<form action="{base_url_admin}banner/{acao}/" class="form-horizontal form-bordered" method="post" enctype="multipart/form-data">
											<div class="panel-body">
												
												<div class="form-group">
													<label class="col-md-3 control-label" for="banner_nome">Nome do banner</label>
													<div class="col-md-6">
														<input type="text" name="banner_nome" class="form-control" id="banner_nome" value="{banner_nome}" required="required">
													</div>
												</div>
												
												<div class="form-group">
													<label class="col-md-3 control-label" for="banner_link">Link/URL</label>
													<div class="col-md-6">
														<input type="text" name="banner_link" class="form-control" id="banner_link" value="{banner_link}">
													</div>
												</div>
												
												<div class="form-group">
													<label class="col-md-3 control-label" for="banner_target">Abrir em</label>
													<div class="col-md-6">
														<select name="banner_target" class="form-control mb-md">
															<option value="_self"{selected_self}>Mesma janela/aba</option>
															<option value="_blank"{selected_blank}>Nova janela/aba</option>
														</select>
													</div>
												</div>
												
												<div class="form-group">
													<label class="col-md-3 control-label" for="imagem">Imagem</label>
													<div class="col-md-6">
														<div id="area-campo-file">
															<input type="file" name="arquivo" id="campo-file">
															<input type="text" id="campo-file-text" value="Selecione o arquivo" />
													  	</div>
													  	{imagem}
													</div>
												</div>
												
												<div class="form-group">
													<label class="control-label col-md-3">Exibir?</label>
													<div class="col-md-9">
														<div class="col-md-3">
															<div class="switch switch-sm switch-success">
																<input type="checkbox" name="banner_status" data-plugin-ios-switch value="1"{checked_status} />
															</div>
														</div>
													</div>
												</div>
											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="col-sm-9 col-sm-offset-3">
														<button class="btn btn-primary">Salvar</button>
														<button type="reset" class="btn btn-default">Limpar</button>
													</div>
												</div>
											</footer>
										</form>
									</section>
								</div>
							</section>
						</div>
					</div>

<?php
echo Modules::run(DIR_TEMPLATE.'/admin_rodape');