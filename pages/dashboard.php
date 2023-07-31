<div class="mainContent">
    <header>
        <h1><i class="fa-solid fa-gauge-high"></i>
            Bem vindo, <o><?php echo $_SESSION['nome']; ?></o>
        </h1>
    </header>

    <div class="mainContainer">
        <i class="fa-solid fa-gear" style="font-size: 40px;"></i>
        <h1> Página em desenvolvimento.</h1>
        <img src="./img/logo.jpeg">
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
        <?php /*$currentNfe = new nfe($value['nfe_id'], $value['nfe_ativa'], $value['nfe_id_cliente'], $value['nfe_id_volume'], $value['nfe_id_fornecedor'], $value['nfe_id_parceiro'], $value['nfe_id_servico'], $value['nfe_serial_pedido'], $value['nfe_serial_codigo'], $value['nfe_serial_serie'], $value['nfe_serial_verProc'], $value['nfe_serial_nnf'], $value['nfe_serial_data_protocolo'], $value['nfe_serial_emissor_protocolo'], $value['nfe_doc_awb'], $value['nfe_doc_gris'], $value['nfe_doc_seguro'], $value['nfe_doc_CFOP'], $value['nfe_doc_justificativa'], $value['nfe_doc_sigla_tabela'], $value['nfe_doc_declaracao'], $value['nfe_doc_icsm'], $value['nfe_doc_rodo_courier'], $value['nfe_dest_razao'], $value['nfe_dest_cpl'], $value['nfe_dest_cpf'], $value['nfe_dest_cnpj'], $value['nfe_dest_uf'], $value['nfe_dest_cidade'], $value['nfe_dest_bairro'], $value['nfe_dest_logradouro'], $value['nfe_dest_complemento'], $value['nfe_dest_p_referencia'], $value['nfe_CTe'], $value['nfe_CTe_chave'], $value['nfe_CTe_cCT'], $value['nfe_CTe_origem'], $value['nfe_entrega_data'], $value['nfe_entrega_previsao'], $value['nfe_entrega_prazo'], $value['nfe_entrega_monitorar'], $value['nfe_total_BC'], $value['nfe_total_ICMS'], $value['nfe_total_produto'], $value['nfe_total_seguro'], $value['nfe_total_desconto'], $value['nfe_total_PIS'], $value['nfe_total_COFINS'], $value['nfe_total_NF'], $value['nfe_arquivo_XML'], $value['nfe_complementar'], $value['nfe_data_criacao'], $value['nfe_data_alteracao'], $value['stt_descricao'], $value['cli_dado_fantasia'], $value['cli_end_municipio'], $value['cli_end_endereco'], $value['cli_end_numero'], $value['cli_end_complemento'], $value['cli_end_bairro'], $value['cli_dado_cnpj'], $value['cli_end_cep'], $value['cli_dado_ie'], $value['vol_item'], $value['forn_fantasia'], $value['parc_fantasia'], $value['serv_nome'], $value['stt_data_alteracao'], $value['stttipo_tipo'], $value['stttipo_cor'], $value['log_nome'], $value['log_nome']);z*/?>
    </div>

    <style>
        .mainContainer {
            border-radius: 20px;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #fff;
            min-height: 100%;
            min-width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .mainContainer i {
            color: #F06021;
            border-radius: 50%;
            padding: 10px;
            width: 70px;
            border: #F06021 4px solid;
            margin-bottom: 20px;
            text-align: center;
            animation-duration: 5s;
            animation-iteration-count: infinite;
            animation-name: flipIcon;
            animation-timing-function: ease-in-out;
        }

        .mainContainer h1 {
            font-weight: 700;
        }

        .mainContainer img {
            margin-top: 20px;
            height: 40px;
        }

        button {
            margin-top: 20px;
            background-color: #FFf;
            border: 2px solid #F06021;
            padding: 8px 30px;
            color: #F06021;
            border-radius: 10px;
            font-weight: 600;
            transition: 0.2s;
        }

        button:hover {
            outline: none;
            cursor: pointer;
            background-color: #F06021;
            color: #fff;
            transition: 0.2s;
        }

        ::selection {
            color: #fff;
            background: var(--mainOrange);
        }

        @keyframes flipIcon {
            0% {}

            100% {
                transform: rotate(360deg);
            }
        }
    </style>