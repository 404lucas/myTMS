<?php

class nfe
{
    private $id;
    private $ativa;
    private $idCliente;
    private $idFornecedor;
    private $idParceiro;
    private $idServico;
    private $serialPedido;
    private $serialCodigo;
    private $serialSerie;
    private $serialVerProc;
    private $serialNNF;
    private $serialDataProtocolo;
    private $serialEmissorProtocolo;
    private $docAWB;
    private $docGris;
    private $docSeguro;
    private $docCFOP;
    private $docJustificativa;
    private $docSiglaTabela;
    private $docDeclaracao;
    private $docICSM;
    private $docRodoCourier;
    private $destRazao;
    private $destFantasia;
    private $destCPL;
    private $destCPF;
    private $destCNPJ;
    private $destUF;
    private $destCidade;
    private $destBairro;
    private $destLogradouro;
    private $destComplemento;
    private $destPReferencia;
    private $destNumero;
    private $cte;
    private $cteChave;
    private $ctecct;
    private $cteOrigem;
    private $entregaData;
    private $entregaPrevisao;
    private $entregaPrazo;
    private $entregaMonitorar;
    private $totalBC;
    private $totalICMS;
    private $totalProduto;
    private $totalSeguro;
    private $totalDesconto;
    private $totalPIS;
    private $totalCOFINS;
    private $totalNF;
    private $arquivoXML;
    private $complementar;
    private $dataCriacao;
    private $dataAlteracao;
    private $cliRazao;
    private $cliFantasia;
    private $cliCidade;
    private $clilogradouro;
    private $cliNumero;
    private $cliComplemento;
    private $cliBairro;
    private $cliCNPJ;
    private $cliCEP;
    private $cliIE;
    private $fornFantasia;
    private $parcFantasia;
    private $servNome;
    private $operadorNome;
    private $executivoNome;
    private $sttDescricao;
    private $sttaDataAlteracao;
    private $sttCor;
    private $sttNome;
    private $sttFinalizado;
    private $tktDestinatario;
    private $chCTe;
    private $nCTe;
    private $cCT;
    private $arquivoXMLCTE;
    private $dataProtocolo;

    public function __construct($id, $ativa, $idCliente, $idFornecedor, $idParceiro, $idServico, $serialPedido, $serialCodigo, $serialSerie, $serialVerProc, $serialNNF, $serialDataProtocolo, $serialEmissorProtocolo, $docAWB, $docGris, $docSeguro, $docCFOP, $docJustificativa, $docSiglaTabela, $docDeclaracao, $docICSM, $docRodoCourier, $destFantasia, $destRazao, $destCPL, $destCPF, $destCNPJ, $destUF, $destCidade, $destBairro, $destLogradouro, $destComplemento, $destPReferencia, $destNumero, $entregaData, $entregaPrevisao, $entregaPrazo, $entregaMonitorar, $totalBC, $totalICMS, $totalProduto, $totalSeguro, $totalDesconto, $totalPIS, $totalCOFINS, $totalNF, $arquivoXML, $complementar, $dataCriacao, $dataAlteracao, $cliRazao, $cliCNPJ, $cliIE, $cliFantasia, $cliCEP, $cliCidade, $clilogradouro, $cliNumero, $cliComplemento, $cliBairro, $fornFantasia, $parcFantasia, $servNome, $operadorNome, $executivoNome, $sttDescricao, $sttaDataAlteracao, $sttCor, $sttNome, $sttFinalizado, $tktDestinatario, $chCTe, $nCTe, $cCT, $arquivoXMLCTE, $dataProtocolo)
    {
        $this->id = $id;
        $this->ativa = $ativa;
        $this->idCliente = $idCliente;
        $this->idFornecedor = $idFornecedor;
        $this->idParceiro = $idParceiro;
        $this->idServico = $idServico;
        $this->serialPedido = $serialPedido;
        $this->serialCodigo = $serialCodigo;
        $this->serialSerie = $serialSerie;
        $this->serialVerProc = $serialVerProc;
        $this->serialNNF = $serialNNF;
        $this->serialDataProtocolo = $serialDataProtocolo;
        $this->serialEmissorProtocolo = $serialEmissorProtocolo;
        $this->docAWB = $docAWB;
        $this->docGris = $docGris;
        $this->docSeguro = $docSeguro;
        $this->docCFOP = $docCFOP;
        $this->docJustificativa = $docJustificativa;
        $this->docSiglaTabela = $docSiglaTabela;
        $this->docDeclaracao = $docDeclaracao;
        $this->docICSM = $docICSM;
        $this->docRodoCourier = $docRodoCourier;
        $this->destRazao = $destRazao;
        $this->destFantasia = $destFantasia;
        $this->destCPL = $destCPL;
        $this->destCPF = $destCPF;
        $this->destCNPJ = $destCNPJ;
        $this->destUF = $destUF;
        $this->destCidade = $destCidade;
        $this->destBairro = $destBairro;
        $this->destLogradouro = $destLogradouro;
        $this->destComplemento = $destComplemento;
        $this->destPReferencia = $destPReferencia;
        $this->destNumero = $destNumero;
        $this->entregaData = $entregaData;
        $this->entregaPrevisao = $entregaPrevisao;
        $this->entregaPrazo = $entregaPrazo;
        $this->entregaMonitorar = $entregaMonitorar;
        $this->totalBC = $totalBC;
        $this->totalICMS = $totalICMS;
        $this->totalProduto = $totalProduto;
        $this->totalSeguro = $totalSeguro;
        $this->totalDesconto = $totalDesconto;
        $this->totalPIS = $totalPIS;
        $this->totalCOFINS = $totalCOFINS;
        $this->totalNF = $totalNF;
        $this->arquivoXML = $arquivoXML;
        $this->complementar = $complementar;
        $this->dataCriacao = $dataCriacao;
        $this->dataAlteracao = $dataAlteracao;
        $this->cliRazao = $cliRazao;
        $this->cliCNPJ = $cliCNPJ;
        $this->cliIE = $cliIE;
        $this->cliFantasia = $cliFantasia;
        $this->cliCEP = $cliCEP;
        $this->cliCidade = $cliCidade;
        $this->clilogradouro = $clilogradouro;
        $this->cliNumero = $cliNumero;
        $this->cliComplemento = $cliComplemento;
        $this->cliBairro = $cliBairro;
        $this->fornFantasia = $fornFantasia;
        $this->parcFantasia = $parcFantasia;
        $this->servNome = $servNome;
        $this->operadorNome = $operadorNome;
        $this->executivoNome = $executivoNome;
        $this->sttDescricao = $sttDescricao;
        $this->sttaDataAlteracao = $sttaDataAlteracao;
        $this->sttCor = $sttCor;
        $this->sttNome = $sttNome;
        $this->sttFinalizado = $sttFinalizado;
        $this->tktDestinatario = $tktDestinatario;
        $this->chCTe = $chCTe;
        $this->nCTe = $nCTe;
        $this->cCT = $cCT;
        $this->arquivoXMLCTE = $arquivoXMLCTE;
        $this->dataProtocolo = $dataProtocolo;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAtiva()
    {
        return $this->ativa;
    }

    public function getIdCliente()
    {
        return $this->idCliente;
    }

    public function getIdFornecedor()
    {
        return $this->idFornecedor;
    }

    public function getIdParceiro()
    {
        return $this->idParceiro;
    }

    public function getIdServico()
    {
        return $this->idServico;
    }

    public function getSerialPedido()
    {
        return $this->serialPedido;
    }

    public function getSerialCodigo()
    {
        return $this->serialCodigo;
    }


    public function getSerialSerie()
    {
        return $this->serialSerie;
    }

    public function getSerialVerProc()
    {
        return $this->serialVerProc;
    }

    public function getSerialNNF()
    {
        return $this->serialNNF;
    }

    public function getSerialDataProtocolo()
    {
        return $this->serialDataProtocolo;
    }

    public function getSerialEmissorProtocolo()
    {
        return $this->serialEmissorProtocolo;
    }


    public function getDocAWB()
    {
        return $this->docAWB;
    }

    public function getDocGris()
    {
        return $this->docGris;
    }

    public function getDocSeguro()
    {
        return $this->docSeguro;
    }

    public function getDocCFOP()
    {
        return $this->docCFOP;
    }


    public function getDocJustificativa()
    {
        return $this->docJustificativa;
    }

    public function getDocSiglaTabela()
    {
        return $this->docSiglaTabela;
    }

    public function getDocRodoCourier()
    {
        return $this->docRodoCourier;
    }

    public function getDocDeclaracao()
    {
        return $this->docDeclaracao;
    }

    public function getDocICSM()
    {
        return $this->docICSM;
    }

    public function getDestRazao()
    {
        return $this->destRazao;
    }

    public function getDestFantasia()
    {
        return $this->destFantasia;
    }

    public function getDestCPL()
    {
        return $this->destCPL;
    }

    public function getDestCPF()
    {
        return $this->destCPF;
    }

    public function getDestCNPJ()
    {
        return $this->destCNPJ;
    }

    public function getDestUF()
    {
        return $this->destUF;
    }

    public function getDestCidade()
    {
        return $this->destCidade;
    }

    public function getDestBairro()
    {
        return $this->destBairro;
    }

    public function getDestLogradouro()
    {
        return $this->destLogradouro;
    }

    public function getDestComplemento()
    {
        return $this->destComplemento;
    }

    public function getDestPReferencia()
    {
        return $this->destPReferencia;
    }

    public function getDestNumero()
    {
        return $this->destNumero;
    }

    public function getCte()
    {
        return $this->cte;
    }

    public function getCteChave()
    {
        return $this->cteChave;
    }

    public function getCtecct()
    {
        return $this->ctecct;
    }

    public function getCteOrigem()
    {
        return $this->cteOrigem;
    }

    public function getEntregaData()
    {
        $data = new DateTime($this->entregaData);
        $dataFormatada = $data->format("d/m/Y H:i");
        return $dataFormatada;
    }

    public function getEntregaPrevisao()
    {
        $data = new DateTime($this->entregaPrevisao);
        $dataFormatada = $data->format("d/m/Y");
        return $dataFormatada;
    }

    public function getEntregaPrazo()
    {
        $data = new DateTime($this->entregaPrazo);
        $dataFormatada = $data->format("d/m/Y");
        return $dataFormatada;
    }

    public function getEntregaMonitorar()
    {
        return $this->entregaMonitorar;
    }

    public function getTotalBC()
    {
        return $this->totalBC;
    }

    public function getTotalICMS()
    {
        return $this->totalICMS;
    }

    public function getTotalProduto()
    {
        return $this->totalProduto;
    }

    public function getTotalSeguro()
    {
        return $this->totalSeguro;
    }

    public function getTotalDesconto()
    {
        return $this->totalDesconto;
    }

    public function getTotalPIS()
    {
        return $this->totalPIS;
    }

    public function getTotalCOFINS()
    {
        return $this->totalCOFINS;
    }

    public function getTotalNF()
    {
        return $this->totalNF;
    }

    public function getArquivoXML()
    {
        return $this->arquivoXML;
    }

    public function getComplementar()
    {
        return $this->complementar;
    }

    public function getDataCriacao()
    {
        $data = new DateTime($this->dataCriacao);
        $dataFormatada = $data->format("d/m/Y H:i");
        return $dataFormatada;
    }

    public function getDataAlteracao()
    {
        $data = new DateTime($this->dataAlteracao);
        $dataFormatada = $data->format("d/m/Y H:i");
        return $dataFormatada;
    }

    public function getCliRazao()
    {
        return $this->cliRazao;
    }

    public function getCliCNPJ()
    {
        return $this->cliCNPJ;
    }

    public function getCliIE()
    {
        return $this->cliIE;
    }

    public function getCliFantasia()
    {
        return $this->cliFantasia;
    }

    public function getCliCEP()
    {
        return $this->cliCEP;
    }

    public function getCliMunicipio()
    {
        return $this->cliCidade;
    }

    public function getClilogradouro()
    {
        return $this->clilogradouro;
    }
    public function getCliNumero()
    {
        return $this->cliNumero;
    }
    public function getCliComplemento()
    {
        return $this->cliComplemento;
    }
    public function getCliBairro()
    {
        return $this->cliBairro;
    }
    public function getFornFantasia()
    {
        return $this->fornFantasia;
    }

    public function getParcFantasia()
    {
        return $this->parcFantasia;
    }

    public function getServNome()
    {
        return $this->servNome;
    }

    public function getOperadorNome()
    {
        return $this->operadorNome;
    }
    public function getExecutivoNome()
    {
        return $this->executivoNome;
    }
    public function getSttDescricao()
    {
        $stt = status::requestSingleStatusForNFE($this->id);
        return $stt['stt_descricao'] ?? '';
    }
    public function getSttaDataAlteracao()
    {
        $stt = status::requestSingleStatusForNFE($this->id);
        $dataAlteracao = $stt['stta_data_alteracao'] ?? '';

        if ($dataAlteracao) {
            $data = new DateTime($dataAlteracao);
            $dataFormatada = $data->format("d/m/Y H:i");
            return $dataFormatada;
        } else {
            return '';
        }
    }
    public function getSttCor()
    {
        $stt = status::requestSingleStatusForNFE($this->id);
        return $stt['stt_cor'] ?? '';
    }
    public function getSttNome()
    {
        $stt = status::requestSingleStatusForNFE($this->id);
        return $stt['stt_nome'] ?? 'Sem status aplicado.';
    }
    public function getSttFinalizado()
    {
        return $this->sttFinalizado;
    }
    public function getTktDestinatario()
    {
        return $this->tktDestinatario;
    }
    public function getChCTe()
    {
        return $this->chCTe;
    }
    public function getNCTe()
    {
        return $this->nCTe;
    }
    public function getCCT()
    {
        return $this->cCT;
    }
    public function getArquivoXMLCTE()
    {
        return $this->arquivoXMLCTE;
    }
    public function getDataProtocolo()
    {
        return $this->dataProtocolo;
    }


    public static function getListJoined($limitQuery, $orderQuery, $whereQuery)
    {
        $query = "SELECT DISTINCT `nfe_id`, `nfe_ativa`, `nfe_id_status`, `nfe_id_cliente`, `nfe_id_fornecedor`, `nfe_id_servico`, `nfe_id_parceiro`, `nfe_serial_pedido`, `nfe_serial_codigo`, `nfe_serial_serie`, `nfe_serial_verProc`, `nfe_serial_nnf`, `nfe_serial_data_protocolo`, `nfe_serial_emissor_protocolo`, `nfe_doc_awb`, `nfe_doc_gris`, `nfe_doc_seguro`, `nfe_doc_CFOP`, `nfe_doc_justificativa`, `nfe_doc_sigla_tabela`, `nfe_doc_declaracao`, `nfe_doc_icsm`, `nfe_doc_rodo_courier`, `nfe_dest_razao`, `nfe_dest_fantasia`, `nfe_dest_cpl`, `nfe_dest_cpf`, `nfe_dest_cnpj`, `nfe_dest_uf`, `nfe_dest_cidade`, `nfe_dest_bairro`, `nfe_dest_logradouro`, `nfe_dest_complemento`, `nfe_dest_p_referencia`, `nfe_dest_numero`, `nfe_entrega_data`, `nfe_entrega_previsao`, `nfe_entrega_prazo`, `nfe_entrega_monitorar`, `nfe_total_BC`, `nfe_total_ICMS`, `nfe_total_produto`, `nfe_total_seguro`, `nfe_total_desconto`, `nfe_total_PIS`, `nfe_total_COFINS`, `nfe_total_NF`, `nfe_arquivo_XML`, `nfe_complementar`, `nfe_data_criacao`, `nfe_data_alteracao`,
            
        /*Dados do cliente*/
        `cli_dado_fantasia`, `cli_dado_cpf`, `cli_dado_cnpj`, `cli_dado_razao`, `cli_dado_ie`,  `cli_end_cep`, `cli_end_municipio`, `cli_end_logradouro`, `cli_end_numero`, `cli_end_complemento`, `cli_end_bairro`,  
        
        /*Dados adicionais*/
        `forn_fantasia`,
        `parc_fantasia`,
        `serv_nome`,
        `log_nome`,
        `stt_descricao`,
        `stta_data_alteracao`,
        `stta_id_status`,
        `stt_cor`,
        `stt_nome`,
        `stt_finalizador`,        
        `tkt_destinatario`,
        `cte_chCTe`,
        `cte_ide_nCT`,
        `cte_ide_cCT`,
        `cte_arquivo_xml`,
        `cte_cte_data_proc`

        FROM `tb_nfe` 
    
        LEFT JOIN `tb_status_apply` ON `tb_nfe`.`nfe_id` = `tb_status_apply`.`stta_id_nfe` 
        LEFT JOIN `tb_status` ON `tb_status_apply`.`stta_id_status` = `tb_status`.`stt_id` 

        LEFT JOIN `tb_ticket` ON `tb_nfe`.`nfe_id` = `tb_ticket`.`tkt_id_nfe` 

        LEFT JOIN `tb_cte` ON `tb_cte`.`cte_id_nfe` = `tb_nfe`.`nfe_id`

        INNER JOIN `tb_servico` ON `tb_nfe`.`nfe_id_servico` = `tb_servico`.`serv_id`
        INNER JOIN `tb_cliente` ON `tb_nfe`.`nfe_id_cliente` = `tb_cliente`.`cli_id`
        INNER JOIN `tb_login` ON `tb_cliente`.`cli_id_operador_atendente` = `tb_login`.`log_id` 
        INNER JOIN `tb_parceiro` ON `tb_nfe`.`nfe_id_parceiro` = `tb_parceiro`.`parc_id` 
        INNER JOIN `tb_fornecedor` ON `tb_nfe`.`nfe_id_fornecedor` = `tb_fornecedor`.`forn_id`
        $whereQuery
        GROUP BY `nfe_id`
        $orderQuery
        $limitQuery";

        $sql = connectionFactory::connect()->prepare($query);

        $sql->execute();
        $sql = $sql->fetchAll();

        return $sql;
    }


    public static function defaultFunction($query)
    {
        $sql = connectionFactory::connect()->prepare($query);
        $sql->execute();
        $sql = $sql->fetchColumn();
        return $sql;
    }

    public static function getIdByKey($key)
    {
        $sql = connectionFactory::connect()->prepare("SELECT `nfe_id` FROM `tb_nfe` WHERE `nfe_serial_codigo` = '$key' LIMIT 1");
        $sql->execute();
        $sql = $sql->fetchColumn();

        return $sql ? $sql : 1;
    }

    public static function defaultFunctionAll($query)
    {
        $sql = connectionFactory::connect()->prepare($query);
        $sql->execute();
        $sql = $sql->fetchAll();
        return $sql;
    }

    //Pegar apenas o nome do destinatário na página de tracking.
    public static function getDestNomeSingleForTracking($cpf)
    {
        $sql = connectionFactory::connect()->prepare("SELECT `nfe_dest_fantasia` FROM `tb_nfe` WHERE `nfe_dest_cpf` = '$cpf'");
        $sql->execute();
        $sql = $sql->fetchColumn();
        return $sql;
    }
}
