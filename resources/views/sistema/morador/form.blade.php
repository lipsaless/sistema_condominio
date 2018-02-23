<div class="tabs-wrapper profile-tabs">
	<ul class="nav nav-tabs">
			<li class="active"><a href="#tab-dados" data-toggle="tab">Dados</a></li>
			<li><a href="#tab-car" data-toggle="tab">Automóveis</a></li>
			<li><a href="#tab-bike" data-toggle="tab">Bicicletas</a></li>
	 		<li><a href="#tab-authorization" data-toggle="tab">Autorizações</a></li>
			<li><a href="#tab-reserve" data-toggle="tab">Reservas</a></li>
			<li><a href="#tab-employee" data-toggle="tab">Prestadores de serviço</a></li>
			<li><a href="#tab-animals" data-toggle="tab">Animais</a></li>
			<li><a href="#tab-owner" data-toggle="tab">Proprietário</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane fade in active" id="tab-dados">
			<div id="newsfeed">
				<div class="story">
					<form id="form" role="form" class="ui form" action="<?php echo $this->baseUrl().'/'.$this->module.'/'.$this->controller.'/gravar';?>" method="post">
						<h3 class="ui dividing header">Morador</h3>
						<div class="row">>
								<div class="col-sm-12 col-md-12 col-lg-1">
									<div class="field" id="proprietario">
										<label for="no_morador">Selecionar</label>
									    <a href="#" type="button" id="btn-search-proprietario" class="fluid ui button orange">
									    	<i class="fa fa-flag"></i>
									    </a>
										<!--                 <label for="no_morador">Selecionar</label> -->
										<!--                 <input type="button" id="btn-search-proprietario" class="ui button orange" value="Proprietário"> -->
									</div>
								</div>
							<div class="col-md-6">
								<div class="field">
									<label for="no_morador">Nome: *</label>
								    <input type="text" id="no_morador" name="no_morador" class="validate[required]" value="<?php echo $this->obj->no_morador;?>">
								</div>
							</div>
							<div class="col-md-3">
								<div class="field">
									<label for="id_morador_tipo">Tipo de Morador: *</label>
								    <?php echo View_Helper::formSelect('id_morador_tipo', $this->obj->id_morador_tipo, $this->arrMoradorTipo, array('class' => 'validate[required]'));?>
								</div>
							</div>
							<div class="col-md-3">
								<div class="field">
									<label for="id_morador_grupo">Grupo de Morador: *</label>
                                    <input type="text">
								</div>
							</div>
							<div class="col-md-3">
								<div class="field">
									<label for="id_morador_grupo">Grau Parentesco:</label>
                                    <input type="text">
								</div>
							</div>
							<div class="col-md-3">
								<div class="field">
									<label for="nu_cpf">CPF:</label>
								    <input type="text" id="nu_cpf" name="nu_cpf" class="" value="">
								</div>
							</div>
							<div class="col-md-3">
								<div class="field">
									<label for="nu_rg">RG:</label>
								    <input type="text" id="nu_rg" name="nu_rg" class="" value="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<div class="field">
									<label for="id_estado_civil">Estado civil:</label>
                                    <input type="text">
								</div>
							</div>
							<div class="col-md-3">
								<div class="field">
									<label for="sg_sexo">Sexo: *</label>
                                    <input type="text">
								</div>
							</div>
							<div class="col-md-6">
								<div class="field">
									<label for="ds_profissao">Profissão:</label>
										<!-- <input type="text" id="ds_profissao" name="ds_profissao" class="" value="<?php // echo $this->obj->ds_profissao;?>"> -->
                                        <input type="text">
								    </div>
							</div>
						</div>
							<div class="row">
								<div class="col-md-1">
									<div class="field">
								    	<label for="nu_ddd_telefone">DDD:</label>
								        <input type="text" id="nu_ddd_telefone" name="nu_ddd_telefone" class="format-ddd-tel" value="">
								    </div>
								</div>
							<div class="col-md-2">
								<div class="field">
									<label for="nu_ddd_telefone">Telefone:</label>
								    <input type="text" id="nu_telefone" name="nu_telefone" class="format-tel trk-phone" value="">
								</div>
							</div>
							<div class="col-md-1">
								<div class="field">
									<label for="nu_ddd_celular">DDD:</label>
								    <input type="text" id="nu_ddd_celular" name="nu_ddd_celular" class=" format-ddd-tel" value="">
								</div>
							</div>
							<div class="col-md-2">
								<div class="field">
									<label for="nu_ddd_celular">Celular: <div class="ui blue mini label trk-popup" data-html="SMS's serão enviados para esse número">sms</div> </label>
								    <input type="text" id="nu_celular" name="nu_celular" class="format-tel trk-phone" value="">
								</div>
							</div>
							<div class="col-md-3">
								<div class="field">
									<label for="dt_nascimento">Data Nascimento:</label>
								    <input type="text" id="dt_nascimento" name="dt_nascimento" class="date" value="" >
								</div>
							</div>
							<div class="col-md-2">
								<div class="field">
									<label for="dt_inicio">Data cadastro:</label>
									<input type="text" id="dt_inicio" name="dt_inicio" class="" value="" disabled>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<div class="field">
									<label for="dt_inicio">Recebe visitas:</label>
                                    <input type="text">
								</div>
							</div>
								<div class="col-md-3">
									<div class="field">
										<label for="dt_inicio">Recebe e-mail visitantes:</label>
                                        <input type="text">
									</div>
								</div>
						</div>
						<h3 class="ui dividing header">Dados de Acesso</h3>
							<div class="row">
								<div class="col-md-2">
									<div class="field">
								    	<label for="st_morador">Status: *</label>
                                        <input type="text">
								     </div>
								</div>
								<div class="col-md-6">
									<div class="field">
								    	<label for="ds_email">E-mail:</label>
								        <input type="email" id="ds_email" name="ds_email" class="validate[custom[email]]" value="">
								    </div>
								</div>
								<div class="col-md-2">
									<div class="field">
								    	<label for="ds_senha">Senha:</label>
								        <input type="password" id="ds_senha" name="ds_senha" >
								    </div>
								</div>
								<div class="col-md-2">
									<div class="field">
								     	<label for="ds_senha_confirm">Confirme sua Senha:</label>
								     	<input type="password" id="ds_senha_confirm" name="ds_senha_confirm" class="validate[equals[ds_senha]]">
								   	</div>
								</div>
							</div>

</div>