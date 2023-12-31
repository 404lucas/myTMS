<?php

class dataFeeder
{
    public static function sendXML()
    {
        // Pasta onde os arquivos XML estão localizados
        $pastaOrigem = 'C:\xampp\htdocs\nexpress\cteBank\\';


        // Lista todos os arquivos da pasta
        $arquivos = scandir($pastaOrigem);

        // Itera sobre os arquivos
        foreach ($arquivos as $arquivo) {
            // Ignora diretórios e arquivos ocultos
            if (!is_file($pastaOrigem . DIRECTORY_SEPARATOR . $arquivo) || substr($arquivo, 0, 1) === '.') {
                continue;
            }

            // Verifica se o arquivo já foi processado
            $consulta = connectionFactory::connect()->prepare("SELECT COUNT(*) FROM `tb_cte` WHERE `cte_ide_cCT` = :nome");
            $consulta->bindParam(':nome', simplexml_load_file($pastaOrigem . $arquivo)->CTe->infCte->ide->cCT);
            $consulta->execute();
            $existe = $consulta->fetchColumn();

            // Se o arquivo não existe no banco de dados, processa-o
            if (!$existe) {
                $caminhoCompleto = $pastaOrigem . $arquivo;

                // Processa o XML (exemplo simples)
                $xml = simplexml_load_file($caminhoCompleto);

                $cUF = (int)$xml->CTe->infCte->ide->cUF ?? null;
                $cCT = (string)$xml->CTe->infCte->ide->cCT ?? null;
                $CFOP = (int)$xml->CTe->infCte->ide->CFOP ?? null;
                $natOp = (string)$xml->CTe->infCte->ide->natOp ?? null;
                $forPag = (int)$xml->CTe->infCte->ide->forPag ?? null;
                $mod = (int)$xml->CTe->infCte->ide->mod ?? null;
                $serie = (int)$xml->CTe->infCte->ide->serie ?? null;
                $nCT = (int)$xml->CTe->infCte->ide->nCT ?? null;
                $dhEmi = (int)$xml->CTe->infCte->ide->dhEmi ?? null;
                $tpImp = (int)$xml->CTe->infCte->ide->tpImp ?? null;
                $tpEmis = (int)$xml->CTe->infCte->ide->tpEmis ?? null;
                $cDV = (int)$xml->CTe->infCte->ide->cDV ?? null;
                $tpAmb = (int)$xml->CTe->infCte->ide->tpAmb ?? null;
                $tpCTe = (int)$xml->CTe->infCte->ide->tpCTe ?? null;
                $procEmi = (int)$xml->CTe->infCte->ide->procEmi ?? null;
                $verProc = (string)$xml->CTe->infCte->ide->verProc ?? null;
                $cMunEnv = (int)$xml->CTe->infCte->ide->cMunEnv ?? null;
                $xMunEnv = (string)$xml->CTe->infCte->ide->xMunEnv ?? null;
                $UFEnv = (string)$xml->CTe->infCte->ide->UFEnv ?? null;
                $modal = (string)$xml->CTe->infCte->ide->modal ?? null;
                $tpServ = (int)$xml->CTe->infCte->ide->tpServ ?? null;
                $cMunIni = (int)$xml->CTe->infCte->ide->cMunIni ?? null;
                $xMunIni = (string)$xml->CTe->infCte->ide->xMunIni ?? null;
                $UFIni = (string)$xml->CTe->infCte->ide->UFIni ?? null;
                $cMunFim = (int)$xml->CTe->infCte->ide->cMunFim ?? null;
                $xMunFim = (string)$xml->CTe->infCte->ide->xMunFim ?? null;
                $UFFim = (string)$xml->CTe->infCte->ide->UFFim ?? null;
                $retira = (string)$xml->CTe->infCte->ide->retira ?? null;

                $indIEToma = (string)$xml->CTe->infCte->ide->indIEToma ?? null;
                $toma = (string)$xml->CTe->infCte->ide->toma3->toma ?? null;
                $xCaracAd = (string)$xml->CTe->infCte->compl->xCaracAd ?? null;
                $xCaracSer = (string)$xml->CTe->infCte->compl->xCaracSer ?? null;
                $xObs = (string)$xml->CTe->infCte->compl->xObs ?? null;

                $CNPJEmit = (string)$xml->CTe->infCte->emit->CNPJ ?? null;
                $IEEmit = (string)$xml->CTe->infCte->emit->IE ?? null;
                $xNomeEmit = (string)$xml->CTe->infCte->emit->xNome ?? null;
                $xFantEmit = (string)$xml->CTe->infCte->emit->xFant ?? null;
                $foneEmit = (string)$xml->CTe->infCte->emit->fone ?? null;
                $xLgrEmit = (string)$xml->CTe->infCte->emit->enderEmit->xLgr ?? null;
                $nroEmit = (string)$xml->CTe->infCte->emit->enderEmit->nro ?? null;
                $xCplEmit = (string)$xml->CTe->infCte->emit->enderEmit->xCpl ?? null ?? null;
                $xBairroEmit = (string)$xml->CTe->infCte->emit->enderEmit->xBairro ?? null;
                $cMunEmit = (int)$xml->CTe->infCte->emit->enderEmit->cMun ?? null;
                $xMunEmit = (string)$xml->CTe->infCte->emit->enderEmit->xMun ?? null;
                $CEPEmit = (string)$xml->CTe->infCte->emit->enderEmit->CEP ?? null;
                $UFEmit = (string)$xml->CTe->infCte->emit->enderEmit->UF ?? null;
                $foneEmit = (string)$xml->CTe->infCte->rem->enderEmit->fone ?? null;

                $CNPJRem = (string)$xml->CTe->infCte->rem->CNPJ ?? null;
                $CPFRem = (string)$xml->CTe->infCte->rem->CPF ?? 'Sem CPF';
                $IERem = (string)$xml->CTe->infCte->rem->IE ?? null;
                $xNomeRem = (string)$xml->CTe->infCte->rem->xNome ?? null;
                $xFantRem = (string)$xml->CTe->infCte->rem->xFant ?? null;
                $foneRem = (string)$xml->CTe->infCte->rem->fone ?? null;
                $xLgrRem = (string)$xml->CTe->infCte->rem->enderReme->xLgr ?? null;
                $nroRem = (string)$xml->CTe->infCte->rem->enderReme->nro ?? null;
                $xCplRem = (string)$xml->CTe->infCte->rem->enderReme->xCpl ?? null ?? null;
                $xBairroRem = (string)$xml->CTe->infCte->rem->enderReme->xBairro ?? null;
                $cMunRem = (int)$xml->CTe->infCte->rem->enderReme->cMun ?? null;
                $xMunRem = (string)$xml->CTe->infCte->rem->enderReme->xMun ?? null;
                $CEPRem = (string)$xml->CTe->infCte->rem->enderReme->CEP ?? null;
                $UFRem = (string)$xml->CTe->infCte->rem->enderReme->UF ?? null;
                $cPaisRem = (int)$xml->CTe->infCte->rem->enderReme->cPais ?? 0000;
                $xPaisRem = (string)$xml->CTe->infCte->rem->enderReme->xPais ?? 'BRASIL';
                $emailRem = (string)$xml->CTe->infCte->rem->email ?? null;
                $nRomaRem = (string)$xml->CTe->infCte->rem->infNF->nRoma ?? null;
                $nPedRem = (string)$xml->CTe->infCte->rem->infNF->nPed ?? null;
                $modRem = (string)$xml->CTe->infCte->rem->infNF->mod ?? null;
                $serieRem = (string)$xml->CTe->infCte->rem->infNF->serie ?? null;
                $nDocRem = (string)$xml->CTe->infCte->rem->infNF->nDoc ?? null;
                $dEmiRem = (string)$xml->CTe->infCte->rem->infNF->dEmi ?? null;
                $dEmiRem = date("Y-m-d H:i:s", strtotime($dEmiRem));

                $vBCRem = (int)$xml->CTe->infCte->rem->infNF->vBC ?? null;
                $vICMSRem = (int)$xml->CTe->infCte->rem->infNF->vICMS ?? null;
                $vBCSTRem = (int)$xml->CTe->infCte->rem->infNF->vBCST ?? null;
                $vSTRem = (int)$xml->CTe->infCte->rem->infNF->vST ?? null;
                $vProdRem = (int)$xml->CTe->infCte->rem->infNF->vProd ?? null;
                $vNFRem = (int)$xml->CTe->infCte->rem->infNF->vNF ?? null;
                $nCFOPRem = (string)$xml->CTe->infCte->rem->infNF->nCFOP ?? null;
                $nPesoRem = (int)$xml->CTe->infCte->rem->infNF->nPeso ?? null;
                $pinRem = (int)$xml->CTe->infCte->rem->infNF->pin ?? null;
                $NFEchave = (string)$xml->CTe->infCte->rem->infNFe->chave ?? null;
                $pinNFeRem = (string)$xml->CTe->infCte->rem->infNFe->pin ?? null;

                $CNPJRcv = (string)$xml->CTe->infCte->receb->CNPJ ?? null;
                $CPFRcv = (string)$xml->CTe->infCte->receb->CPF ?? null;
                $IERcv = (string)$xml->CTe->infCte->receb->IE ?? null;
                $xNomeRcv = (string)$xml->CTe->infCte->receb->xNome ?? null;
                $foneRcv = (string)$xml->CTe->infCte->receb->fone ?? null;
                $xLgrRcv = (string)$xml->CTe->infCte->receb->enderReceb->xLgr ?? null;
                $nroRcv = (string)$xml->CTe->infCte->receb->enderReceb->nro ?? null;
                $xCplRcv = (string)$xml->CTe->infCte->receb->enderReceb->xCpl ?? null;
                $xBairroRcv = (string)$xml->CTe->infCte->receb->enderReceb->xBairro ?? null;
                $cMunRcv = (int)$xml->CTe->infCte->receb->enderReceb->cMun ?? null;
                $xMunRcv = (string)$xml->CTe->infCte->receb->enderReceb->xMun ?? null;
                $CEPRcv = (string)$xml->CTe->infCte->receb->enderReceb->CEP ?? null;
                $UFRcv = (string)$xml->CTe->infCte->receb->enderReceb->UF ?? null;
                $cPaisRcv = (string)$xml->CTe->infCte->rem->enderReme->cPais ?? 0000;
                $xPaisRcv = (string)$xml->CTe->infCte->rem->enderReme->xPais ?? 'BRASIL';
                $emailRcv = (string)$xml->CTe->infCte->rem->email ?? null;

                $CNPJDest = (string)$xml->CTe->infCte->dest->CPF ?? null;
                $CPFDest = (string)$xml->CTe->infCte->dest->CPF ?? null;
                $IEDest = (string)$xml->CTe->infCte->dest->IE ?? null;
                $xNomeDest = (string)$xml->CTe->infCte->dest->xNome ?? null;
                $foneDest = (string)$xml->CTe->infCte->dest->fone ?? null;
                $ISUFDest = (string)$xml->CTe->infCte->dest->ISUF ?? null;
                $xLgrDest = (string)$xml->CTe->infCte->dest->enderDest->xLgr ?? null;
                $nroDest = (string)$xml->CTe->infCte->dest->enderDest->nro ?? null;
                $xCplDest = (string)$xml->CTe->infCte->dest->enderDest->xCpl ?? null;
                $xBairroDest = (string)$xml->CTe->infCte->dest->enderDest->xBairro ?? null;
                $cMunDest = (int)$xml->CTe->infCte->dest->enderDest->cMun ?? null;
                $xMunDest = (string)$xml->CTe->infCte->dest->enderDest->xMun ?? null;
                $CEPDest = (string)$xml->CTe->infCte->dest->enderDest->CEP ?? null;
                $UFDest = (string)$xml->CTe->infCte->dest->enderDest->UF ?? null;
                $cPaisDest = (string)$xml->CTe->infCte->rem->enderDest->cPais ?? 0000;
                $xPaisDest = (string)$xml->CTe->infCte->rem->enderDest->xPais ?? null;
                $emailDest = (string)$xml->CTe->infCte->dest->email ?? null;

                $vTPrest = (int)$xml->CTe->infCte->vPrest->vTPrest ?? null;
                $vRec = (int)$xml->CTe->infCte->vPrest->vRec ?? null;
                $vComp1Nome = (string)$xml->CTe->infCte->vPrest->Comp[0]->xNome ?? null;
                $vComp1Valor = (int)$xml->CTe->infCte->vPrest->Comp[0]->vComp ?? null;
                $vComp2Nome = (string)$xml->CTe->infCte->vPrest->Comp[1]->xNome ?? null;
                $vComp2Valor = (string)$xml->CTe->infCte->vPrest->Comp[1]->vComp ?? null;
                @$vComp3Nome = (string)$xml->CTe->infCte->vPrest->Comp[2]->xNome ?? null;
                @$vComp3Valor = (string)$xml->CTe->infCte->vPrest->Comp[2]->vComp ?? null;
                @$vComp4Nome = (string)$xml->CTe->infCte->vPrest->Comp[3]->xNome ?? null;
                @$vComp4Valor = (string)$xml->CTe->infCte->vPrest->Comp[3]->vComp ?? null;

                $CST = (string)$xml->CTe->infCte->imp->ICMS->ICMS00->CST ?? null;
                $vBC = (string)$xml->CTe->infCte->imp->ICMS->ICMS00->vBC ?? null;
                $pICMS = (string)$xml->CTe->infCte->imp->ICMS->ICMS00->pICMS ?? null;
                $vICMS = (string)$xml->CTe->infCte->imp->ICMS->ICMS00->vICMS ?? null;

                $vCarga = (string)$xml->CTe->infCte->infCTeNorm->infCarga->vCarga ?? null;
                $proPred = (string)$xml->CTe->infCte->infCTeNorm->infCarga->proPred ?? null;
                $qCarga1Unid = (string)$xml->CTe->infCte->infCTeNorm->infCarga->infQ[0]->cUnid ?? null;
                $qCarga1Med = (string)$xml->CTe->infCte->infCTeNorm->infCarga->infQ[0]->tpMed ?? null;
                $qCarga1Valor = (string)$xml->CTe->infCte->infCTeNorm->infCarga->infQ[0]->qCarga ?? null;
                $qCarga2Unid = (string)$xml->CTe->infCte->infCTeNorm->infCarga->infQ[1]->cUnid ?? null;
                $qCarga2Med = (string)$xml->CTe->infCte->infCTeNorm->infCarga->infQ[1]->tpMed ?? null;
                $qCarga2Valor = (string)$xml->CTe->infCte->infCTeNorm->infCarga->infQ[1]->qCarga ?? null;
                @$qCarga3Unid = (string)$xml->CTe->infCte->infCTeNorm->infCarga->infQ[2]->cUnid ?? null;
                @$qCarga3Med = (string)$xml->CTe->infCte->infCTeNorm->infCarga->infQ[2]->tpMed ?? null;
                @$qCarga3Valor = (string)$xml->CTe->infCte->infCTeNorm->infCarga->infQ[2]->qCarga ?? null;
                $vCargaAverb = (string)$xml->CTe->infCte->infCTeNorm->infCarga->vCargaAverb ?? null;
                $chaveNFe = (string)$xml->CTe->infCte->infCTeNorm->infDoc->infNFe->chave ?? null;
                $dPrev = (string)$xml->CTe->infCte->infCTeNorm->infDoc->infNFe->dPrev ?? null;
                $RNTRC = (string)$xml->CTe->infCte->infCTeNorm->infModal->rodo->RNTRC ?? null;
                $chCTe = (string)$xml->protCTe->infProt->chCTe ?? null;
                $cStat = (string)$xml->protCTe->infProt->cStat ?? null;

                $dhRecbto = $xml->protCTe->infProt->dhRecbto ?? null;
                $dhRecebtoDATETIME = date("Y-m-d H:i:s", strtotime($dhRecbto));
                echo $dhRecebtoDATETIME;

                if ($cStat == 100) {
                    // Inserindo no banco de dados
                    if (!cliente::verifyExistence($CNPJRem, $CPFRem)) {
                        $date = date('Y-m-d H:i:s');

                        $query = "INSERT INTO `tb_cliente`(`cli_id`, `cli_id_grupo_cliente`, `cli_id_executivo`, `cli_id_cliente_contato`, `cli_id_operador_atendente`, `cli_status`, `cli_dado_cpf`, `cli_dado_cnpj`, `cli_dado_razao`, `cli_dado_fantasia`, `cli_dado_ie`, `cliente_dado_id_integrador_remoto`, `cliente_dado_id_integrador_coleta`, `cli_end_pais`, `cli_end_uf`, `cli_end_cep`, `cli_end_municipio`, `cli_end_bairro`, `cli_end_logradouro`, `cli_end_numero`, `cli_end_complemento`, `cli_end_base_operacional`, `cli_end_cod_municipal`, `cli_fin_prazo_pagamento`, `cli_fin_ciclo_fatura`, `cli_fin_cris_grupo`, `cli_fin_base_calc_icms`, `cli_fin_tipo_documento`, `cli_fin_tp_remuneracao`, `cli_fin_tp_remuneracao_valor`, `cli_fin_tp_remuneracao_courier`, `cli_fin_diferenca_minima_valor`, `cli_fin_adi_ftp`, `cli_fin_diferenca_prazo`, `cli_fin_vm_adicional`, `cli_fin_fatura_cubagem_rodo`, `cli_fin_percent_adicional`, `cli_cond_expedidor`, `cli_cond_herdeiro_comercial`, `cli_cond_esporadico`, `cli_cond_protestavel`, `cli_cond_tomador`, `cli_cond_isento_icms`, `cli_cond_grupo`, `cli_cond_cobra_seguro`, `cli_cond_op_bloqueada`, `cli_cond_isencao_cubagem_rodo`, `cli_rodo_interno`, `cli_cond_atualiza_email`, `cli_cond_operacao_rodo`, `cli_cond_operacao_courier`, `cli_cond_isencao_cubagem`, `cli_cond_redespacho`, `cli_cond_webservice`, `cli_email_cabecalho`, `cli_email_rodape`, `cli_espec_peso_maximo_rodo`, `cli_espec_peso_minimo_rodo`, `cli_espec_peso_maximo_courier`, `cli_espec_peso_minimo_courier`, `cli_espec_analise_envios`, `cli_fx_inicio`, `cli_tab_fx_fim`, `cli_token`, `cli_media_envio`, `cli_indicador_con`, `cli_data_criacao`, `cli_data_alteracao`, `cli_data_prazo_extra`) VALUES (
                        NULL, NULL, NULL, NULL, NULL, 1, 'n/a', '$CNPJRem', '$xNomeRem', '$xFantRem', '$IERem', NULL, NULL, 'BRASIL', '$UFRem', '$CEPRem', '$xMunRem', '$xBairroRem', '$xLgrRem', '$nroRem', '$xCplRem', NULL, '$cMunRem', NULL, NULL, NULL, '$vICMSRem', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$date', '$date', NULL)";

                        $sql = connectionFactory::connect()->prepare($query);
                        $sql->execute();
                        cliente::newContato($CNPJRem, $CPFRem, $foneRem, $emailRem);

                        echo frontend::alert('user', 'success', 'Usuário relacionado ao documento era inexistente, <b>cadastrado</b>.');
                        logFeeder::log($_SESSION['id'], 'Cadastro de cliente via CT-e. CTe: ' . $nCT . '. CNPJ: ' . $CNPJRem . '.');
                    }

                    $NFEId = nfe::getIdByKey($NFEchave);
                    echo 'ID NFE'.$NFEId;

                    $query = "INSERT INTO `tb_cte`(`cte_id`, `cte_id_nfe`, `cte_chCTe`, 

                    `cte_ide_cUF`, `cte_ide_cCT`, `cte_ide_CFOP`, `cte_ide_natOp`, `cte_ide_forPag`, `cte_ide_mod`, `cte_ide_serie`, `cte_ide_nCT`, 

                    `cte_ide_dhEmi`, `cte_ide_tpImp`, `cte_ide_tpEmis`, `cte_ide_cDV`, `cte_ide_tpAmb`, `cte_ide_tpCTe`, `cte_ide_procEmi`, `cte_ide_verProc`, `cte_ide_cMunEnv`, `cte_ide_xMunEnv`, `cte_ide_UFEnv`, `cte_ide_modal`, 

                    `cte_ide_tpServ`, `cte_ide_cMunIni`, `cte_ide_xMunIni`, `cte_ide_UFIni`, `cte_ide_cMunFim`, `cte_ide_xMunFim`, `cte_ide_UFFim`, `cte_ide_retira`, 
                    
                    `cte_exped_CPF`, `cte_exped_CNPJ`, `cte_exped_IE`, `cte_exped_xNome`, `cte_exped_fone`, `cte_exped_enderExped_xLgr`, `cte_exped_enderExped_nro`, `cte_exped_enderExped_xCpl`, `cte_exped_enderExped_xBairro`, `cte_exped_enderExped_cMun`, `cte_exped_enderExped_xMun`, `cte_exped_enderExped_CEP`, `cte_exped_enderExped_UF`, `cte_exped_enderExped_cPais`, `cte_exped_enderExped_xPais`, `cte_exped_email`, `cte_vPrest_vTPrest`, `cte_vPrest_vRec`, `cte_vPrest_Comp_xNome`, `cte_vPrest_Comp_vComp`, `cte_arquivo`, `cte_status_protocolo`, `cte_arquivo_xml`, `cte_cte_data_proc`) 
                    VALUES 
                    (
                    NULL, '$NFEId', '$chCTe',
                    '$cUF', '$cCT', '$CFOP', '$natOp', 1, '$mod', '$serie', '$nCT',
                    '$dhEmi', '$tpImp', '$tpEmis', '$cDV', '$tpAmb', '$tpCTe', '$procEmi', '$verProc', '$cMunEnv', '$xMunEnv', '$UFEnv', '$modal',
                    '$tpServ', '$cMunIni', '$xMunIni', '$UFIni', '$cMunFim', '$xMunFim', '$UFFim', '$retira',
        
                    '$CPFRcv', '$CNPJRcv', '$IERcv', '$xNomeRcv', '$foneRcv', '$xLgrRcv', '$nroRcv', '$xCplRcv', '$xBairroRcv', '$cMunRcv', '$xMunRcv', '$CEPRcv', '$UFRcv', '$cPaisRcv','$xPaisRcv','$emailRcv',
                
                    '$vTPrest', '$vRec', '$vRec',
         
                    '$vComp1Nome', '$vComp1Valor', 0, '$arquivo', '$dhRecebtoDATETIME'
                    )";

                    $sql = connectionFactory::connect()->prepare($query);
                    $sql->execute();
                    logFeeder::log($_SESSION['id'], 'Cadastro de CT-e ' . $nCT . '.');
                } else {
                    echo frontend::alert('exclamation', 'warning', 'O CT-e não está autorizado');
                }
            }
        }
    }
}
