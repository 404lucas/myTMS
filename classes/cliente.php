<?php

class cliente
{

    private $id;
    private $grupoId;
    private $executivoId;
    private $contatoId;
    private $operadorAtendenteId;
    private $status;
    private $cpf;
    private $cnpj;
    private $razao;
    private $fantasia;
    private $ie;
    private $integradorRemoto;
    private $integradorColeta;
    private $pais;
    private $uf;
    private $cep;
    private $municipio;
    private $bairro;
    private $logradouro;
    private $numero;
    private $complemento;
    private $baseOperacional;
    private $codMun;
    private $prazoPagamento;
    private $cicloFatura;
    private $crisGrupo;
    private $calcIcms;
    private $documento;
    private $remuneracao;
    private $remuneracaoValor;
    private $remuneracaoCourrier;
    private $diferencaMinimaValor;
    private $adiFTP;
    private $diferencaPrazo;
    private $vmAdicional;
    private $cubagemRodo;
    private $percentAdicional;
    private $expedidor;
    private $herdeirocomercial;
    private $esporadico;
    private $protestavel;
    private $tomador;
    private $isentoICMS;
    private $grupo;
    private $cobraSeguro;
    private $opBloqueada;
    private $isencaoCubagem;
    private $interno;
    private $atualizaEmail;
    private $operacaoRodo;
    private $operadorCourier;
    private $isenscaoCubagem;
    private $redespacho;
    private $webService;
    private $cabecalho;
    private $rodape;
    private $pesoMaximoRodo;
    private $pesoMinimoRodo;
    private $pesoMaximoCourier;
    private $pesoMinimoCourier;
    private $analiseEnvios;
    private $fxInicio;
    private $tabfxFim;
    private $token;
    private $mediaEnvio;
    private $indicadorCon;
    private $dataCriacao;
    private $dataAlteracao;
    private $prazoExtra;


    // Método construtor
    public function __construct($id, $grupoId, $executivoId, $contatoId, $operadorAtendenteId, $status, $cpf, $cnpj, $razao, $fantasia, $ie, $integradorRemoto, $integradorColeta, $pais, $uf, $cep, $municipio, $bairro, $logradouro, $numero, $complemento, $baseOperacional, $codMun, $prazoPagamento, $cicloFatura, $crisGrupo, $calcIcms, $documento, $remuneracao, $remuneracaoValor, $remuneracaoCourrier, $diferencaMinimaValor, $adiFTP, $diferencaPrazo, $vmAdicional, $cubagemRodo, $percentAdicional, $expedidor, $herdeirocomercial, $esporadico, $protestavel, $tomador, $isentoICMS, $grupo, $cobraSeguro, $opBloqueada, $isencaoCubagem, $interno, $atualizaEmail, $operacaoRodo, $operadorCourier, $isenscaoCubagem, $redespacho, $webService, $cabecalho, $rodape, $pesoMaximoRodo, $pesoMinimoRodo, $pesoMaximoCourier, $pesoMinimoCourier, $analiseEnvios, $fxInicio, $tabfxFim, $token, $mediaEnvio, $indicadorCon, $dataCriacao, $dataAlteracao, $prazoExtra)
    {
        $this->id = $id;
        $this->grupoId = $grupoId;
        $this->executivoId = $executivoId;
        $this->contatoId = $contatoId;
        $this->operadorAtendenteId = $operadorAtendenteId;
        $this->status = $status;
        $this->cpf = $cpf;
        $this->cnpj = $cnpj;
        $this->razao = $razao;
        $this->fantasia = $fantasia;
        $this->ie = $ie;
        $this->integradorRemoto = $integradorRemoto;
        $this->integradorColeta = $integradorColeta;
        $this->pais = $pais;
        $this->uf = $uf;
        $this->cep = $cep;
        $this->municipio = $municipio;
        $this->bairro = $bairro;
        $this->logradouro = $logradouro;
        $this->numero = $numero;
        $this->complemento = $complemento;
        $this->baseOperacional = $baseOperacional;
        $this->codMun = $codMun;
        $this->prazoPagamento = $prazoPagamento;
        $this->cicloFatura = $cicloFatura;
        $this->crisGrupo = $crisGrupo;
        $this->calcIcms = $calcIcms;

        $this->documento = $documento;
        $this->remuneracao = $remuneracao;
        $this->remuneracaoValor = $remuneracaoValor;
        $this->remuneracaoCourrier = $remuneracaoCourrier;
        $this->diferencaMinimaValor = $diferencaMinimaValor;

        $this->adiFTP = $adiFTP;
        $this->diferencaPrazo = $diferencaPrazo;
        $this->vmAdicional = $vmAdicional;
        $this->cubagemRodo = $cubagemRodo;
        $this->percentAdicional = $percentAdicional;
        $this->expedidor = $expedidor;

        $this->herdeirocomercial = $herdeirocomercial;
        $this->esporadico = $esporadico;
        $this->protestavel = $protestavel;
        $this->tomador = $tomador;
        $this->isentoICMS = $isentoICMS;
        $this->grupo = $grupo;
        $this->cobraSeguro = $cobraSeguro;
        $this->opBloqueada = $opBloqueada;
        $this->isencaoCubagem = $isencaoCubagem;
        $this->interno = $interno;
        $this->atualizaEmail = $atualizaEmail;
        $this->operacaoRodo = $operacaoRodo;

        $this->operadorCourier = $operadorCourier;
        $this->isenscaoCubagem = $isenscaoCubagem;
        $this->redespacho = $redespacho;
        $this->webService = $webService;
        $this->cabecalho = $cabecalho;
        $this->rodape = $rodape;
        $this->pesoMaximoRodo = $pesoMaximoRodo;
        $this->pesoMinimoRodo = $pesoMinimoRodo;
        $this->pesoMaximoCourier = $pesoMaximoCourier;
        $this->pesoMinimoCourier = $pesoMinimoCourier;
        $this->analiseEnvios = $analiseEnvios;
        $this->fxInicio = $fxInicio;
        $this->tabfxFim = $tabfxFim;
        $this->token = $token;
        $this->mediaEnvio = $mediaEnvio;
        $this->indicadorCon = $indicadorCon;
        $this->dataCriacao = $dataCriacao;
        $this->dataAlteracao = $dataAlteracao;
        $this->prazoExtra = $prazoExtra;
    }

    // Métodos para retornar os dados do usuário
    public function getId()
    {
        return $this->id;
    }
    public function getGrupoId()
    {
        return $this->grupoId;
    }
    public function getExecutivoId()
    {
        return $this->executivoId;
    }
    public function getContatoId()
    {
        return $this->contatoId;
    }
    public function getOperadorAtendenteId()
    {
        return $this->operadorAtendenteId;
    }
    public function getStatus()
    {
        return $this->status;
    }
    public function getCpf()
    {
        return $this->cpf;
    }
    public function getCnpj()
    {
        return $this->cnpj;
    }
    public function getRazao()
    {
        return $this->razao;
    }
    public function getFantasia()
    {
        return $this->fantasia;
    }
    public function getIe()
    {
        return $this->ie;
    }
    public function getIntegradorRemoto()
    {
        return $this->integradorRemoto;
    }
    public function getIntegradorColeta()
    {
        return $this->integradorColeta;
    }
    public function getPais()
    {
        return $this->pais;
    }
    public function getUf()
    {
        return $this->uf;
    }
    public function getCep()
    {
        return $this->cep;
    }
    public function getMunicipio()
    {
        return $this->municipio;
    }
    public function getBairro()
    {
        return $this->bairro;
    }
    public function getLogradouro()
    {
        return $this->logradouro;
    }
    public function getNumero()
    {
        return $this->numero;
    }
    public function getComplemento()
    {
        return $this->complemento;
    }
    public function getBaseOperacional()
    {
        return $this->baseOperacional;
    }
    public function getCodMun()
    {
        return $this->codMun;
    }
    public function getPrazoPagamento()
    {
        return $this->prazoPagamento;
    }
    public function getCicloFatura()
    {
        return $this->cicloFatura;
    }
    public function getCrisGrupo()
    {
        return $this->crisGrupo;
    }
    public function getCalcIcms()
    {
        return $this->calcIcms;
    }
    public function getDocumento()
    {
        return $this->documento;
    }
    public function getRemuneracao()
    {
        return $this->remuneracao;
    }
    public function getRemuneracaoValor()
    {
        return $this->remuneracaoValor;
    }
    public function getRemuneracaoCourrier()
    {
        return $this->remuneracaoCourrier;
    }
    public function getDiferencaMinimaValor()
    {
        return $this->diferencaMinimaValor;
    }
    public function getAdiFTP()
    {
        return $this->adiFTP;
    }
    public function getDiferencaPrazo()
    {
        return $this->diferencaPrazo;
    }
    public function getVmAdicional()
    {
        return $this->vmAdicional;
    }
    public function getCubagemRodo()
    {
        return $this->cubagemRodo;
    }
    public function getPercentAdicional()
    {
        return $this->percentAdicional;
    }
    public function getExpedidor()
    {
        return $this->expedidor;
    }
    public function getHerdeirocomercial()
    {
        return $this->herdeirocomercial;
    }
    public function getEsporadico()
    {
        return $this->esporadico;
    }
    public function getProtestavel()
    {
        return $this->protestavel;
    }
    public function getTomador()
    {
        return $this->tomador;
    }
    public function getIsentoICMS()
    {
        return $this->isentoICMS;
    }
    public function getGrupo()
    {
        return $this->grupo;
    }
    public function getCobraSeguro()
    {
        return $this->cobraSeguro;
    }
    public function getOpBloqueada()
    {
        return $this->opBloqueada;
    }
    public function getIsencaoCubagem()
    {
        return $this->isencaoCubagem;
    }
    public function getInterno()
    {
        return $this->interno;
    }
    public function getAtualizaEmail()
    {
        return $this->atualizaEmail;
    }
    public function getOperacaoRodo()
    {
        return $this->operacaoRodo;
    }
    public function getOperadorCourier()
    {
        return $this->operadorCourier;
    }
    public function getIsenscaoCubagem()
    {
        return $this->isenscaoCubagem;
    }
    public function getRedespacho()
    {
        return $this->redespacho;
    }
    public function getWebService()
    {
        return $this->webService;
    }
    public function getCabecalho()
    {
        return $this->cabecalho;
    }
    public function getRodape()
    {
        return $this->rodape;
    }
    public function getPesoMaximoRodo()
    {
        return $this->pesoMaximoRodo;
    }
    public function getPesoMinimoRodo()
    {
        return $this->pesoMinimoRodo;
    }
    public function getPesoMaximoCourier()
    {
        return $this->pesoMaximoCourier;
    }
    public function getPesoMinimoCourier()
    {
        return $this->pesoMinimoCourier;
    }
    public function getAnaliseEnvios()
    {
        return $this->analiseEnvios;
    }
    public function getFxInicio()
    {
        return $this->fxInicio;
    }
    public function getTabfxFim()
    {
        return $this->tabfxFim;
    }
    public function getToken()
    {
        return $this->token;
    }
    public function getMediaEnvio()
    {
        return $this->mediaEnvio;
    }
    public function getIndicadorCon()
    {
        return $this->indicadorCon;
    }
    public function getDataCriacao()
    {
        return $this->dataCriacao;
    }
    public function getDataAlteracao()
    {
        return $this->dataAlteracao;
    }
    public function getPrazoExtra()
    {
        return $this->prazoExtra;
    }

    // public static function newCliente($cliente)
    // {
    //     $query = "INSERT INTO `tb_cliente`(`cli_id`, `cli_id_grupo_cliente`, `cli_id_executivo`, `cli_id_cliente_contato`, `cli_id_operador_atendente`, `cli_status`, `cli_dado_cpf`, `cli_dado_cnpj`, `cli_dado_razao`, `cli_dado_fantasia`, `cli_dado_ie`, `cliente_dado_id_integrador_remoto`, `cliente_dado_id_integrador_coleta`, `cli_end_pais`, `cli_end_uf`, `cli_end_cep`, `cli_end_municipio`, `cli_end_bairro`, `cli_end_logradouro`, `cli_end_numero`, `cli_end_complemento`, `cli_end_base_operacional`, `cli_end_cod_municipal`, `cli_fin_prazo_pagamento`, `cli_fin_ciclo_fatura`, `cli_fin_cris_grupo`, `cli_fin_base_calc_icms`, `cli_fin_tipo_documento`, `cli_fin_tp_remuneracao`, `cli_fin_tp_remuneracao_valor`, `cli_fin_tp_remuneracao_courier`, `cli_fin_diferenca_minima_valor`, `cli_fin_adi_ftp`, `cli_fin_diferenca_prazo`, `cli_fin_vm_adicional`, `cli_fin_fatura_cubagem_rodo`, `cli_fin_percent_adicional`, `cli_cond_expedidor`, `cli_cond_herdeiro_comercial`, `cli_cond_esporadico`, `cli_cond_protestavel`, `cli_cond_tomador`, `cli_cond_isento_icms`, `cli_cond_grupo`, `cli_cond_cobra_seguro`, `cli_cond_op_bloqueada`, `cli_cond_isencao_cubagem_rodo`, `cli_rodo_interno`, `cli_cond_atualiza_email`, `cli_cond_operacao_rodo`, `cli_cond_operacao_courier`, `cli_cond_isencao_cubagem`, `cli_cond_redespacho`, `cli_cond_webservice`, `cli_email_cabecalho`, `cli_email_rodape`, `cli_espec_peso_maximo_rodo`, `cli_espec_peso_minimo_rodo`, `cli_espec_peso_maximo_courier`, `cli_espec_peso_minimo_courier`, `cli_espec_analise_envios`, `cli_fx_inicio`, `cli_tab_fx_fim`, `cli_token`, `cli_media_envio`, `cli_indicador_con`, `cli_data_criacao`, `cli_data_alteracao`, `cli_data_prazo_extra`) VALUES (
    //      NULL, NULL, $cliente->grupoId, $cliente->executivoId, $cliente->contatoId, $cliente->operadorAtendenteId, $cliente->status, $cliente->cpf, $cliente->cnpj, $cliente->razao, $cliente->fantasia, $cliente->ie, $cliente->integradorRemoto, $cliente->integradorColeta, $cliente->pais, $cliente->uf, $cliente->cep, $cliente->municipio, $cliente->bairro, $cliente->logradouro, $cliente->numero, $cliente->complemento, $cliente->baseOperacional, $cliente->codMun, $cliente->prazoPagamento, $cliente->cicloFatura, $cliente->crisGrupo, $cliente->calcIcms, $cliente->documento, $cliente->remuneracao, $cliente->remuneracaoValor, $cliente->remuneracaoCourrier, $cliente->diferencaMinimaValor, $cliente->adiFTP, $cliente->diferencaPrazo, $cliente->vmAdicional, $cliente->cubagemRodo, $cliente->percentAdicional, $cliente->expedidor, $cliente->herdeirocomercial, $cliente->esporadico, $cliente->protestavel, $cliente->tomador, $cliente->isentoICMS, $cliente->grupo, $cliente->cobraSeguro, $cliente->opBloqueada, $cliente->isencaoCubagem, $cliente->interno, $cliente->atualizaEmail, $cliente->operacaoRodo, $cliente->operadorCourier, $cliente->isenscaoCubagem, $cliente->redespacho, $cliente->webService, $cliente->cabecalho, $cliente->rodape, $cliente->pesoMaximoRodo, $cliente->pesoMinimoRodo, $cliente->pesoMaximoCourier, $cliente->pesoMinimoCourier, $cliente->analiseEnvios, $cliente->fxInicio, $cliente->tabfxFim, $cliente->token, $cliente->mediaEnvio, $cliente->indicadorCon, $cliente->dataCriacao, $cliente->dataAlteracao, $cliente->prazoExtra)";

    //     echo $query;
    //     $sql = connectionFactory::connect()->prepare($query);
    //     $sql->execute();
    //     echo frontend::alert('user','success','Usuário relacionado ao documento era inexistente, <b>cadastrado</b>.');
    // }

    public static function newContato($cnpj, $cpf, $telefone, $email)
    {
        $firstQuery = $cpf != null ? "SELECT `cli_id` FROM `tb_cliente` WHERE `cli_dado_cpf` = '$cpf'" : "SELECT `cli_id` FROM `tb_cliente` WHERE `cli_dado_cnpj` = '$cnpj'";

        $getter = connectionFactory::connect()->prepare($firstQuery);
        $getter->execute();
        $clienteId = $getter->fetch();
        $clienteId = $clienteId['cli_id'];

        $query = "INSERT INTO `tb_cliente_contato`(`clictt_id`, `clictt_id_cliente`, `clictt_email`, `clictt_telefone`) VALUES (NULL ,'$clienteId','$email','$telefone')";
        $sql = connectionFactory::connect()->prepare($query);
        $sql->execute();
    }

    public static function getAllClientNames()
    {
        $query = "SELECT `cli_dado_fantasia`, `cli_dado_cnpj` FROM `tb_cliente` ORDER BY `cli_dado_fantasia` ASC";

        $sql = connectionFactory::connect()->prepare($query);
        $sql->execute();
        $sql = $sql->fetchAll();

        return $sql;
    }

    public static function getSingleClient($cnpj)
    {
        $query = "SELECT `cli_id`, `cli_id_grupo_cliente`, `cli_id_executivo`, `cli_id_cliente_contato`, `cli_id_operador_atendente`, `cli_status`, `cli_dado_cpf`, `cli_dado_cnpj`, `cli_dado_razao`, `cli_dado_fantasia`, `cli_dado_ie`, `cliente_dado_id_integrador_remoto`, `cliente_dado_id_integrador_coleta`, `cli_end_pais`, `cli_end_uf`, `cli_end_cep`, `cli_end_municipio`, `cli_end_bairro`, `cli_end_logradouro`, `cli_end_numero`, `cli_end_complemento`, `cli_end_base_operacional`, `cli_end_cod_municipal`, `cli_fin_prazo_pagamento`, `cli_fin_ciclo_fatura`, `cli_fin_cris_grupo`, `cli_fin_base_calc_icms`, `cli_fin_tipo_documento`, `cli_fin_tp_remuneracao`, `cli_fin_tp_remuneracao_valor`, `cli_fin_tp_remuneracao_courier`, `cli_fin_diferenca_minima_valor`, `cli_fin_adi_ftp`, `cli_fin_diferenca_prazo`, `cli_fin_vm_adicional`, `cli_fin_fatura_cubagem_rodo`, `cli_fin_percent_adicional`, `cli_cond_expedidor`, `cli_cond_herdeiro_comercial`, `cli_cond_esporadico`, `cli_cond_protestavel`, `cli_cond_tomador`, `cli_cond_isento_icms`, `cli_cond_grupo`, `cli_cond_cobra_seguro`, `cli_cond_op_bloqueada`, `cli_cond_isencao_cubagem_rodo`, `cli_rodo_interno`, `cli_cond_atualiza_email`, `cli_cond_operacao_rodo`, `cli_cond_operacao_courier`, `cli_cond_isencao_cubagem`, `cli_cond_redespacho`, `cli_cond_webservice`, `cli_email_cabecalho`, `cli_email_rodape`, `cli_espec_peso_maximo_rodo`, `cli_espec_peso_minimo_rodo`, `cli_espec_peso_maximo_courier`, `cli_espec_peso_minimo_courier`, `cli_espec_analise_envios`, `cli_fx_inicio`, `cli_tab_fx_fim`, `cli_token`, `cli_media_envio`, `cli_indicador_con`, `cli_data_criacao`, `cli_data_alteracao`, `cli_data_prazo_extra` FROM `tb_cliente` WHERE `cli_dado_cnpj` = '$cnpj'";

        $sql = connectionFactory::connect()->prepare($query);
        $sql->execute();
        $sql = $sql->fetch();

        if (!$sql) {
            echo frontend::alert('times', 'dark', '<b>Desculpe!</b> O cliente solicitado não foi encontrado.');
        } else {
            $cliente = new cliente(
                $sql['cli_id'],
                $sql['cli_id_grupo_cliente'],
                $sql['cli_id_executivo'],
                $sql['cli_id_cliente_contato'],
                $sql['cli_id_operador_atendente'],
                $sql['cli_status'],
                $sql['cli_dado_cpf'],
                $sql['cli_dado_cnpj'],
                $sql['cli_dado_razao'],
                $sql['cli_dado_fantasia'],
                $sql['cli_dado_ie'],
                $sql['cliente_dado_id_integrador_remoto'],
                $sql['cliente_dado_id_integrador_coleta'],
                $sql['cli_end_pais'],
                $sql['cli_end_uf'],
                $sql['cli_end_cep'],
                $sql['cli_end_municipio'],
                $sql['cli_end_bairro'],
                $sql['cli_end_logradouro'],
                $sql['cli_end_numero'],
                $sql['cli_end_complemento'],
                $sql['cli_end_base_operacional'],
                $sql['cli_end_cod_municipal'],
                $sql['cli_fin_prazo_pagamento'],
                $sql['cli_fin_ciclo_fatura'],
                $sql['cli_fin_cris_grupo'],
                $sql['cli_fin_base_calc_icms'],
                $sql['cli_fin_tipo_documento'],
                $sql['cli_fin_tp_remuneracao'],
                $sql['cli_fin_tp_remuneracao_valor'],
                $sql['cli_fin_tp_remuneracao_courier'],
                $sql['cli_fin_diferenca_minima_valor'],
                $sql['cli_fin_adi_ftp'],
                $sql['cli_fin_diferenca_prazo'],
                $sql['cli_fin_vm_adicional'],
                $sql['cli_fin_fatura_cubagem_rodo'],
                $sql['cli_fin_percent_adicional'],
                $sql['cli_cond_expedidor'],
                $sql['cli_cond_herdeiro_comercial'],
                $sql['cli_cond_esporadico'],
                $sql['cli_cond_protestavel'],
                $sql['cli_cond_tomador'],
                $sql['cli_cond_isento_icms'],
                $sql['cli_cond_grupo'],
                $sql['cli_cond_cobra_seguro'],
                $sql['cli_cond_op_bloqueada'],
                $sql['cli_cond_isencao_cubagem_rodo'],
                $sql['cli_rodo_interno'],
                $sql['cli_cond_atualiza_email'],
                $sql['cli_cond_operacao_rodo'],
                $sql['cli_cond_operacao_courier'],
                $sql['cli_cond_isencao_cubagem'],
                $sql['cli_cond_redespacho'],
                $sql['cli_cond_webservice'],
                $sql['cli_email_cabecalho'],
                $sql['cli_email_rodape'],
                $sql['cli_espec_peso_maximo_rodo'],
                $sql['cli_espec_peso_minimo_rodo'],
                $sql['cli_espec_peso_maximo_courier'],
                $sql['cli_espec_peso_minimo_courier'],
                $sql['cli_espec_analise_envios'],
                $sql['cli_fx_inicio'],
                $sql['cli_tab_fx_fim'],
                $sql['cli_token'],
                $sql['cli_media_envio'],
                $sql['cli_indicador_con'],
                $sql['cli_data_criacao'],
                $sql['cli_data_alteracao'],
                $sql['cli_data_prazo_extra']
            );
            return $cliente;
        }
    }

    public static function conditionedUpdate($cnpj, $nRazaosocial, $nFantasia, $nCPF, $nCNPJ, $nIE, $nPais, $nUF, $nCEP, $nMunicipio, $nBairro, $nLogradouro, $nNumero, $nComplemento, $nCMUN)
    {
        $currentClient = self::getSingleClient($cnpj);

        // Compare os valores atuais com os novos valores
        $colunasAlteradas = [];
        if ($currentClient->razao != $nRazaosocial) {
            $colunasAlteradas[] = "cli_dado_razao = '$nRazaosocial'";
        }
        if ($currentClient->fantasia != $nFantasia) {
            $colunasAlteradas[] = "cli_dado_fantasia = '$nFantasia'";
        }
        if ($currentClient->cpf != $nCPF) {
            $colunasAlteradas[] = "cli_dado_cpf = '$nCPF'";
        }
        if ($currentClient->cnpj != $nCNPJ) {
            $colunasAlteradas[] = "cli_dado_cnpj = '$nCNPJ'";
        }
        if ($currentClient->ie != $nIE) {
            $colunasAlteradas[] = "cli_dado_ie = '$nIE'";
        }
        if ($currentClient->pais != $nPais) {
            $colunasAlteradas[] = "cli_end_pais = '$nPais'";
        }
        if ($currentClient->uf != $nUF) {
            $colunasAlteradas[] = "cli_end_uf = '$nUF'";
        }
        if ($currentClient->cep != $nCEP) {
            $colunasAlteradas[] = "cli_end_cep = '$nCEP'";
        }
        if ($currentClient->municipio != $nMunicipio) {
            $colunasAlteradas[] = "cli_end_municipio = '$nMunicipio'";
        }
        if ($currentClient->bairro != $nBairro) {
            $colunasAlteradas[] = "cli_end_bairro = '$nBairro'";
        }
        if ($currentClient->logradouro != $nLogradouro) {
            $colunasAlteradas[] = "cli_end_logradouro = '$nLogradouro'";
        }
        if ($currentClient->numero != $nNumero) {
            $colunasAlteradas[] = "cli_end_numero = '$nNumero'";
        }
        if ($currentClient->complemento != $nComplemento) {
            $colunasAlteradas[] = "cli_end_complemento = '$nComplemento'";
        }
        if ($currentClient->codMun != $nCMUN) {
            $colunasAlteradas[] = "cli_end_cod_municipal = '$nCMUN'";
        }

        $data = connectionFactory::dateGetter();
        // Se houver colunas alteradas, construa e execute a consulta UPDATE
        if (!empty($colunasAlteradas)) {
            $query = "UPDATE `tb_cliente` SET " . implode(', ', $colunasAlteradas) . ", `cli_data_alteracao` = '$data' WHERE `cli_dado_cnpj` = $cnpj";
            echo $query;
            $sql = connectionFactory::connect()->prepare($query);
            $sql->execute();
        }
    }

    public static function verifyExistence($cnpjData, $cpfData)
    {
        $CNPJ = connectionFactory::connect()->prepare("SELECT `cli_dado_cnpj` FROM `tb_cliente` WHERE `cli_dado_cnpj` = '$cnpjData'");
        $CNPJ->execute();

        $CPF = connectionFactory::connect()->prepare("SELECT `cli_dado_cnpj` FROM `tb_cliente` WHERE `cli_dado_cnpj` = '$cpfData'");
        $CPF->execute();

        if ($CPF->rowCount() >= 1 || $CNPJ->rowCount() >= 1) {
            return true;
        } else {
            return false;
        }
    }

    public static function getMainCTEData($chave)
    {
        $sql = connectionFactory::connect()->prepare("SELECT `cte_id`, `cte_chCTe`, `cte_ide_nCT`, `cte_ide_cCT`, `cte_rem_infNF_vBC`, `cte_rem_infNF_nPeso`, `cte_arquivo_xml` FROM `tb_cte` WHERE `cte_chCTe` = '$chave' LIMIT 1");

        $sql->execute();
        $sql = $sql->fetch();

        return $sql;
    }
}
