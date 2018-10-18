<?php
require_once("_inc/cabecalho.php");
?>			
		<!--style="background-image: url('{base_url}assets/site/img/Banner_I.jpg');"-->
        <div class="page-header carousel slide" data-ride="carousel" data-parallax="true" >
            <!--<div class="filter"></div>-->
                <!--<div id="carouselExampleControls">-->
                  <div class="carousel-inner">
                    {banners}
                    <div class="carousel-item{banner_active}">
                      <img class="d-block w-100" src="{base_url}uploads/banners/{banner_imagem}" alt="">
                    </div>
                    {/banners}
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                <!--</div>-->
                <!--<div class="motto text-center">
                    <h1 class="text-home-esqueda"><span class="aspas">"</span>Mais que negócios<span class="aspas">"</span></h1>
                    <h1 class="text-home-direita"><span class="aspas">"</span>Solucões Inteligêntes<span class="aspas">"</span></h1>
                    <br />
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-outline-neutral btn-round"><i class="fa fa-play"></i>Watch video</a>
                    <button type="button" class="btn btn-outline-neutral btn-round">Download</button>
                </div>-->
            
        </div>
        <div class="main"><!-- .main fecha no rodapé -->
			<div class="section-empresa text-center">
                <div class="container">

                    <div class="row">
                        <div class="col-md-7">
                            <h3 class="title-cust-home">PARA SUA EMPRESA</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="cont-1">
                                        <h4 class="title-customizado-inf">Está começando agora?</h4>
                                        <!--a href="{base_url}uploads/arquivos/abra-sua-empresa.pdf" target="_blank" class="btn btn-Customizado-abraEmpresa">ABRA AQUI A SUA EMPRESA</a-->
                                        <a href="javascript:void(0);" target="_blank" class="btn btn-Customizado-abraEmpresa" data-toggle="modal" data-target="#modal-cad-empresa">ABRA AQUI A SUA EMPRESA</a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="cont-2">                                                   
                                        <h4 class="title-customizado-inf">Venha para <span class="estilo-brascont">BRASCONT!</span></h4>
                                        <!--a href="{base_url}uploads/arquivos/transferir-empresa.pdf" target="_blank" class="btn btn-Customizado-migraEmpresa">TRANSFERIR EMPRESA</a-->
                                        <a href="javascript:void(0);" target="_blank" class="btn btn-Customizado-migraEmpresa" data-toggle="modal" data-target="#modal-transf-empresa">TRANSFERIR EMPRESA</a>
                                    </div>
                                </div>
                            </div>       
                        </div>

                        <div class="col-md-1">
                            <div class="coluna-divisor"></div>        
                        </div>
                    
                        <div class="col-md-4">
                            <h3 class="title-cust-home">ÁREA DO CLIENTE</h3>
                        	{mensagem}
                        	{txt_logado}
                            <form action="{base_url}restrito/autenticar" method="post" class="contact-form"{form_acesso}>
                                <input type="email" name="cliente_email" class="form-control" placeholder="E-mail" required="required"><br/>
                                <input type="password" name="cliente_senha" class="form-control" placeholder="Senha" required="required"><br/>
                                <!--p class="cadastro-perg-cliente">Ainda não é Cliente? <a href="{base_url}cadastre-se"><span class="cadastro-cliente">Cadastre-se</span></a></p>-->
                                <button class="btn btn-Customizado">ENTRAR</button><br />
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-links-uteis text-center">
                <div class="container">
                    <h3 class="title-cust-home">LINKS ÚTEIS</h3>
                    <div class="row">
                        <ul id="flexiselDemo3">
                        	{links}
                            <li>
                                <div class="servicos">
                                    <a href="{link_url}" target="_blank" class="info-serv">
                                        <img src="{base_url}assets/site/img/serv1_.png"><br>
                                        <div class="nome-serv" title="{link_titulo}">{link_titulo_limitado}</div><br>
                                    </a>
                                </div>
                            </li>
                            {/links}
                        </ul> 

                    </div>
                </div>
            </div>

              <!-- Modal form abra aqui sua empresa (cadastrar empresa) -->
        <div class="modal fade large" id="modal-cad-empresa" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form action="{base_url}cadastro/empresa/" method="post" class="form-horizontal" id="form-cad-empresa" onsubmit="return false">
                        <div class="modal-header">
                            <h5 class="modal-title">Abra aqui sua empresa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h6>Constituição da empresa</h6>
                            <div class="form-group row">
                                <label class="col-sm-1 col-form-label" for="empresa_data_constituicao">Data:</label>
                                <div class="col-sm-3">
                                    <input type="text" name="empresa_data_constituicao" class="form-control mask-data" id="empresa_data_constituicao">
                                </div>
                            </div>
                            
                            <h6>Informações dos Sócios</h6>
                            
                            <!-- sócio 1 -->
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="empresa_socio1_part"><b>Sócio 1</b> - Participação C.Social:</label>
                                <div class="col-sm-2">
                                    <input type="text" name="empresa_socio1_part" class="form-control" id="empresa_socio1_part" placeholder="Em %">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-1 col-form-label" for="empresa_socio1_nome">Nome:</label>
                                <div class="col-sm-11">
                                    <input type="text" name="empresa_socio1_nome" class="form-control" id="empresa_socio1_nome">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-1 col-form-label" for="empresa_socio1_cpf">CPF:</label>
                                <div class="col-sm-5">
                                    <input type="text" name="empresa_socio1_cpf" class="form-control mask-cpf" id="empresa_socio1_cpf">
                                </div>
                                
                                <label class="col-sm-1 col-form-label" for="empresa_socio1_part">RG/CNH:</label>
                                <div class="col-sm-5">
                                    <input type="text" name="empresa_socio1_part" class="form-control" id="empresa_socio1_part">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="empresa_socio1_emissor">O. Emissor:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="empresa_socio1_emissor" class="form-control" id="empresa_socio1_emissor">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="empresa_socio1_endereco">Endereço:</label>
                                <div class="col-sm-7">
                                    <input type="text" name="empresa_socio1_endereco" class="form-control" id="empresa_socio1_endereco">
                                </div>
                                
                                <label class="col-sm-1 col-form-label" for="empresa_socio1_numero">Nº:</label>
                                <div class="col-sm-2">
                                    <input type="text" name="empresa_socio1_numero" class="form-control" id="empresa_socio1_numero">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="empresa_socio1_complemento">Complemento:</label>
                                <div class="col-sm-5">
                                    <input type="text" name="empresa_socio1_complemento" class="form-control" id="empresa_socio1_complemento">
                                </div>
                                
                                <label class="col-sm-1 col-form-label" for="empresa_socio1_bairro">Bairro:</label>
                                <div class="col-sm-4">
                                    <input type="text" name="empresa_socio1_bairro" class="form-control" id="empresa_socio1_bairro">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="empresa_socio1_cep">CEP:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="empresa_socio1_cep" class="form-control mask-cep" id="empresa_socio1_cep">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="empresa_socio1_municipio">Município:</label>
                                <div class="col-sm-5">
                                    <input type="text" name="empresa_socio1_municipio" class="form-control" id="empresa_socio1_municipio">
                                </div>
                                
                                <label class="col-sm-1 col-form-label" for="empresa_socio1_estado">Estado:</label>
                                <div class="col-sm-4">
                                    <input type="text" name="empresa_socio1_estado" class="form-control" id="empresa_socio1_estado">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="empresa_socio1_estadocivil">Estado Civil:</label>
                                <div class="col-sm-5">
                                    <select name="empresa_socio1_estadocivil" id="empresa_socio1_estadocivil" class="form-control">
                                        <option value="Selecione..."></option>
                                        <option value="1">Solteiro(a)</option>
                                        <option value="2">Casado(a)</option>
                                        <option value="3">Divorciado(a)</option>
                                        <option value="4">Viúvo(a)</option>
                                    </select>
                                </div>
                                
                                <label class="col-sm-1 col-form-label" for="empresa_socio1_regime">Regime:</label>
                                <div class="col-sm-4">
                                    <input type="text" name="empresa_socio1_regime" class="form-control" id="empresa_socio1_regime">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="empresa_socio1_profissao">Profissão:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="empresa_socio1_profissao" class="form-control" id="empresa_socio1_profissao">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="empresa_socio1_datanascimento">Data Nascimento:</label>
                                <div class="col-sm-4">
                                    <input type="text" name="empresa_socio1_datanascimento" class="form-control mask-data" id="empresa_socio1_datanascimento">
                                </div>
                                
                                <label class="col-sm-1 col-form-label" for="empresa_socio1_telefone">Telefone:</label>
                                <div class="col-sm-4">
                                    <input type="text" name="empresa_socio1_telefone" class="form-control mask-telefone" id="empresa_socio1_telefone">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="empresa_socio1_nomemae">Nome da Mãe:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="empresa_socio1_nomemae" class="form-control" id="empresa_socio1_nomemae">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="empresa_socio1_nomepai">Nome do Pai:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="empresa_socio1_nomepai" class="form-control" id="empresa_socio1_nomepai">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="empresa_socio1_pis">PIS Nº:</label>
                                <div class="col-sm-4">
                                    <input type="text" name="empresa_socio1_pis" class="form-control" id="empresa_socio1_pis">
                                </div>
                                
                                <label class="col-sm-2 col-form-label" for="empresa_socio1_tituloeleitor">Título Eleitor:</label>
                                <div class="col-sm-4">
                                    <input type="text" name="empresa_socio1_tituloeleitor" class="form-control" id="empresa_socio1_tituloeleitor">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="empresa_socio1_irpenultima">Nº Recibo IR Penúltima:</label>
                                <div class="col-sm-3">
                                    <input type="text" name="empresa_socio1_irpenultima" class="form-control" id="empresa_socio1_irpenultima">
                                </div>
                                
                                <label class="col-sm-3 col-form-label" for="empresa_socio1_irultima">Nº Recibo IR Última:</label>
                                <div class="col-sm-3">
                                    <input type="text" name="empresa_socio1_irultima" class="form-control" id="empresa_socio1_irultima">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-1 col-form-label" for="empresa_socio1_email">E-mail:</label>
                                <div class="col-sm-11">
                                    <input type="text" name="empresa_socio1_email" class="form-control" id="empresa_socio1_email">
                                </div>
                            </div>
                            
                            <hr />
                            <!-- sócio 2 -->
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="empresa_socio2_part"><b>Sócio 2</b> - Participação C.Social:</label>
                                <div class="col-sm-2">
                                    <input type="text" name="empresa_socio2_part" class="form-control" id="empresa_socio2_part" placeholder="Em %">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-1 col-form-label" for="empresa_socio2_nome">Nome:</label>
                                <div class="col-sm-11">
                                    <input type="text" name="empresa_socio2_nome" class="form-control" id="empresa_socio2_nome">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-1 col-form-label" for="empresa_socio2_cpf">CPF:</label>
                                <div class="col-sm-5">
                                    <input type="text" name="empresa_socio2_cpf" class="form-control mask-cpf" id="empresa_socio2_cpf">
                                </div>
                                
                                <label class="col-sm-1 col-form-label" for="empresa_socio2_part">RG/CNH:</label>
                                <div class="col-sm-5">
                                    <input type="text" name="empresa_socio2_part" class="form-control" id="empresa_socio2_part">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="empresa_socio2_emissor">O. Emissor:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="empresa_socio2_emissor" class="form-control" id="empresa_socio2_emissor">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="empresa_socio2_endereco">Endereço:</label>
                                <div class="col-sm-7">
                                    <input type="text" name="empresa_socio2_endereco" class="form-control" id="empresa_socio2_endereco">
                                </div>
                                
                                <label class="col-sm-1 col-form-label" for="empresa_socio2_numero">Nº:</label>
                                <div class="col-sm-2">
                                    <input type="text" name="empresa_socio2_numero" class="form-control" id="empresa_socio2_numero">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="empresa_socio2_complemento">Complemento:</label>
                                <div class="col-sm-5">
                                    <input type="text" name="empresa_socio2_complemento" class="form-control" id="empresa_socio2_complemento">
                                </div>
                                
                                <label class="col-sm-1 col-form-label" for="empresa_socio2_bairro">Bairro:</label>
                                <div class="col-sm-4">
                                    <input type="text" name="empresa_socio2_bairro" class="form-control" id="empresa_socio2_bairro">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="empresa_socio2_cep">CEP:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="empresa_socio2_cep" class="form-control mask-cep" id="empresa_socio2_cep">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="empresa_socio2_municipio">Município:</label>
                                <div class="col-sm-5">
                                    <input type="text" name="empresa_socio2_municipio" class="form-control" id="empresa_socio2_municipio">
                                </div>
                                
                                <label class="col-sm-1 col-form-label" for="empresa_socio2_estado">Estado:</label>
                                <div class="col-sm-4">
                                    <input type="text" name="empresa_socio2_estado" class="form-control" id="empresa_socio2_estado">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="empresa_socio2_estadocivil">Estado Civil:</label>
                                <div class="col-sm-5">
                                    <select name="empresa_socio2_estadocivil" id="empresa_socio2_estadocivil" class="form-control">
                                        <option value="Selecione..."></option>
                                        <option value="1">Solteiro(a)</option>
                                        <option value="2">Casado(a)</option>
                                        <option value="3">Divorciado(a)</option>
                                        <option value="4">Viúvo(a)</option>
                                    </select>
                                </div>
                                
                                <label class="col-sm-1 col-form-label" for="empresa_socio2_regime">Regime:</label>
                                <div class="col-sm-4">
                                    <input type="text" name="empresa_socio2_regime" class="form-control" id="empresa_socio2_regime">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="empresa_socio2_profissao">Profissão:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="empresa_socio2_profissao" class="form-control" id="empresa_socio2_profissao">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="empresa_socio2_datanascimento">Data Nascimento:</label>
                                <div class="col-sm-4">
                                    <input type="text" name="empresa_socio2_datanascimento" class="form-control mask-data" id="empresa_socio2_datanascimento">
                                </div>
                                
                                <label class="col-sm-1 col-form-label" for="empresa_socio2_telefone">Telefone:</label>
                                <div class="col-sm-4">
                                    <input type="text" name="empresa_socio2_telefone" class="form-control mask-telefone" id="empresa_socio2_telefone">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="empresa_socio2_nomemae">Nome da Mãe:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="empresa_socio2_nomemae" class="form-control" id="empresa_socio2_nomemae">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="empresa_socio2_nomepai">Nome do Pai:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="empresa_socio2_nomepai" class="form-control" id="empresa_socio2_nomepai">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="empresa_socio2_pis">PIS Nº:</label>
                                <div class="col-sm-4">
                                    <input type="text" name="empresa_socio2_pis" class="form-control" id="empresa_socio2_pis">
                                </div>
                                
                                <label class="col-sm-2 col-form-label" for="empresa_socio2_tituloeleitor">Título Eleitor:</label>
                                <div class="col-sm-4">
                                    <input type="text" name="empresa_socio2_tituloeleitor" class="form-control" id="empresa_socio2_tituloeleitor">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="empresa_socio2_irpenultima">Nº Recibo IR Penúltima:</label>
                                <div class="col-sm-3">
                                    <input type="text" name="empresa_socio2_irpenultima" class="form-control" id="empresa_socio2_irpenultima">
                                </div>
                                
                                <label class="col-sm-3 col-form-label" for="empresa_socio2_irultima">Nº Recibo IR Última:</label>
                                <div class="col-sm-3">
                                    <input type="text" name="empresa_socio2_irultima" class="form-control" id="empresa_socio2_irultima">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-1 col-form-label" for="empresa_socio2_email">E-mail:</label>
                                <div class="col-sm-11">
                                    <input type="text" name="empresa_socio2_email" class="form-control" id="empresa_socio2_email">
                                </div>
                            </div>
                            
                            <h6>Informações da Empresa</h6>
                            <h7>Nome Empresarial:</h7>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="empresa_nome_op1">Opção 1:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="empresa_nome_op1" class="form-control" id="empresa_nome_op1">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="empresa_nome_op2">Opção 2:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="empresa_nome_op2" class="form-control" id="empresa_nome_op2">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="empresa_nome_op3">Opção 3:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="empresa_nome_op3" class="form-control" id="empresa_nome_op3">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="empresa_nomefantasia">Nome Fantasia:</label>
                                <div class="col-sm-9">
                                    <input type="text" name="empresa_nomefantasia" class="form-control" id="empresa_nomefantasia">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="empresa_capitalsocial">Capital Social:</label>
                                <div class="col-sm-3">
                                    <input type="text" name="empresa_capitalsocial" class="form-control" id="empresa_capitalsocial">
                                </div>
                                
                                <label class="col-sm-3 col-form-label" for="empresa_inscimobiliaria">Inscrição Imobiliária:</label>
                                <div class="col-sm-3">
                                    <input type="text" name="empresa_inscimobiliaria" class="form-control" id="empresa_inscimobiliaria">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="empresa_endereco">Endereço:</label>
                                <div class="col-sm-7">
                                    <input type="text" name="empresa_endereco" class="form-control" id="empresa_endereco">
                                </div>
                                
                                <label class="col-sm-1 col-form-label" for="empresa_numero">Nº:</label>
                                <div class="col-sm-2">
                                    <input type="text" name="empresa_numero" class="form-control" id="empresa_numero">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="empresa_complemento">Complemento:</label>
                                <div class="col-sm-5">
                                    <input type="text" name="empresa_complemento" class="form-control" id="empresa_complemento">
                                </div>
                                
                                <label class="col-sm-1 col-form-label" for="empresa_bairro">Bairro:</label>
                                <div class="col-sm-4">
                                    <input type="text" name="empresa_bairro" class="form-control" id="empresa_bairro">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="empresa_cep">CEP:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="empresa_cep" class="form-control mask-cep" id="empresa_cep">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-7 col-form-label" for="empresa_horario">Horário de Funcionamento (Horário e dias da semana):</label>
                                <div class="col-sm-5">
                                    <input type="text" name="empresa_horario" class="form-control" id="empresa_horario">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label" for="empresa_metragem">Metragem do Estabelecimento (m²):</label>
                                <div class="col-sm-2">
                                    <input type="text" name="empresa_metragem" class="form-control" id="empresa_metragem">
                                </div>
                                
                                <label class="col-sm-2 col-form-label" for="empresa_inpi">Consulta INPI:</label>
                                <div class="col-sm-3">
                                    <input type="text" name="empresa_inpi" class="form-control" id="empresa_inpi">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label" for="empresa_placapub">Haverá placa de publicidade no local?</label>
                                <div class="col-sm-2">
                                    <select name="empresa_placapub" id="empresa_placapub" class="form-control">
                                        <option value="">Selecione...</option>
                                        <option value="s">Sim</option>
                                        <option value="n">Não</option>
                                    </select>
                                </div>
                                
                                <label class="col-sm-2 col-form-label" for="empresa_telefone">Telefone Corporativo:</label>
                                <div class="col-sm-3">
                                    <input type="text" name="empresa_telefone" class="form-control mask-telefone" id="empresa_telefone">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="empresa_email">E-mail Corporativo:</label>
                                <div class="col-sm-9">
                                    <input type="text" name="empresa_email" class="form-control" id="empresa_email">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label" for="empresa_atividades">Atividades:</label>
                                <div class="col-sm-12">
                                    <textarea name="empresa_atividades" class="form-control" id="empresa_atividades"></textarea>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="empresa_email">Nota Fiscal:</label>
                                <div class="col-sm-3">
                                    <label><input type="radio" name="empresa_nf" value="Papel" /> Papel</label><br />
                                    <label><input type="radio" name="empresa_nf" value="Eletrônica" /> Eletrônica</label>
                                </div>
                                
                                <label class="col-sm-3 col-form-label" for="empresa_email">Certificado Digital:</label>
                                <div class="col-sm-3">
                                    <label><input type="radio" name="empresa_cd" value="s" /> Sim</label><br />
                                    <label><input type="radio" name="empresa_cd" value="n" /> Não</label>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="empresa_regime">Regime de Tributação:</label>
                                <div class="col-sm-8">
                                    <input type="text" name="empresa_regime" class="form-control" id="empresa_regime">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="empresa_aceito">Aceita se cadastrar?</label>
                                <div class="col-sm-9">
                                    <label><input type="checkbox" name="empresa_aceito" value="1" /> Sim</label>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-12" id="result-form-cad-empresa"></div>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <!--button type="button" class="btn btn-primary">Save changes</button-->
                            <button target="_blank" class="btn btn-Customizado-abraEmpresa" style="margin: 5px 5px 5px 0;">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Modal form transferir empresa-->
        <div class="modal fade large" id="modal-transf-empresa" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form action="{base_url}cadastro/transferir/" method="post" class="form-horizontal" id="form-transf-empresa" onsubmit="return false">
                        <div class="modal-header">
                            <h5 class="modal-title">Transferir empresa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="transf_empresa_razaosocial">Razão Social:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="transf_empresa_razaosocial" class="form-control" id="transf_empresa_razaosocial">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="transf_empresa_cnpj">CNPJ:</label>
                                <div class="col-sm-5">
                                    <input type="text" name="transf_empresa_cnpj" class="form-control mask-cnpj" id="transf_empresa_cnpj">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="transf_empresa_responsavel">Responsável:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="transf_empresa_responsavel" class="form-control" id="transf_empresa_responsavel">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="transf_empresa_email">E-mail:</label>
                                <div class="col-sm-6">
                                    <input type="text" name="transf_empresa_email" class="form-control" id="transf_empresa_email">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="transf_empresa_telefone">Telefone:</label>
                                <div class="col-sm-4">
                                    <input type="text" name="transf_empresa_telefone" class="form-control mask-telefone" id="transf_empresa_telefone">
                                </div>
                                
                                <label class="col-sm-2 col-form-label" for="transf_empresa_celular">Celular:</label>
                                <div class="col-sm-4">
                                    <input type="text" name="transf_empresa_celular" class="form-control mask-telefone" id="transf_empresa_celular">
                                </div>
                            </div>
                            
                            <div class="text-center">
                                <a href="{base_url}uploads/arquivos/transferir-empresa.pdf" target="_blank" class="btn btn-Customizado-migraEmpresa">DOCUMENTAÇÃO NECESSÁRIA</a>
                            </div>
                                                
                            <div class="row">
                                <div class="col-sm-12" id="result-form-transf-empresa"></div>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <!--button type="button" class="btn btn-primary">Save changes</button-->
                            <button target="_blank" class="btn btn-Customizado-abraEmpresa" style="margin: 5px 5px 5px 0;">Enviar dados</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.mask-data').mask('00/00/0000', {placeholder: "__/__/____"});
                $('.mask-cpf').mask('000.000.000-00', {placeholder: "Digite apenas números"});
                $('.mask-cnpj').mask('00.000.000.0000-00', {placeholder: "Digite apenas números"});
                $('.mask-cep').mask('00000-000', {placeholder: "Digite apenas números"});
                $('.mask-telefone').mask('(00) 0000-00009', {placeholder: "Digite apenas números"});
            });
        </script>

<?php
require_once("_inc/rodape.php");
?>	