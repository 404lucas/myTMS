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
                $CPFRem = (string)$xml->CTe->infCte->rem->CPF ?? null;
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
                $chaveRem = (string)$xml->CTe->infCte->rem->infNFe->chave ?? null;
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
                $IEDest = (string)$xml->CTe->infCte->dest->IE ?? 'vampeppt';
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
                $xPaisDest = (string)$xml->CTe->infCte->rem->enderDest->xPais ?? 'BRASIL';
                $emailDest = (string)$xml->CTe->infCte->dest->email ?? null;

                $vTPrest = (int)$xml->CTe->infCte->vPrest->vTPrest ?? null;
                $vRec = (int)$xml->CTe->infCte->vPrest->vRec ?? null;
                $vComp1Nome = (string)$xml->CTe->infCte->vPrest->Comp[0]->xNome ?? null;
                $vComp1Valor = (int)$xml->CTe->infCte->vPrest->Comp[0]->vComp ?? null;
                $vComp2Nome = (string)$xml->CTe->infCte->vPrest->Comp[1]->xNome ?? null;
                $vComp2Valor = (string)$xml->CTe->infCte->vPrest->Comp[1]->vComp ?? null;
                $vComp3Nome = (string)$xml->CTe->infCte->vPrest->Comp[2]->xNome ?? null;
                $vComp3Valor = (string)$xml->CTe->infCte->vPrest->Comp[2]->vComp ?? null;
                $vComp4Nome = (string)$xml->CTe->infCte->vPrest->Comp[3]->xNome ?? null;
                $vComp4Valor = (string)$xml->CTe->infCte->vPrest->Comp[3]->vComp ?? null;

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
                $qCarga3Unid = (string)$xml->CTe->infCte->infCTeNorm->infCarga->infQ[2]->cUnid ?? null;
                $qCarga3Med = (string)$xml->CTe->infCte->infCTeNorm->infCarga->infQ[2]->tpMed ?? null;
                $qCarga3Valor = (string)$xml->CTe->infCte->infCTeNorm->infCarga->infQ[2]->qCarga ?? null;
                $vCargaAverb = (string)$xml->CTe->infCte->infCTeNorm->infCarga->vCargaAverb ?? null;
                $chaveNFe = (string)$xml->CTe->infCte->infCTeNorm->infDoc->infNFe->chave ?? null;
                $dPrev = (string)$xml->CTe->infCte->infCTeNorm->infDoc->infNFe->dPrev ?? null;
                $RNTRC = (string)$xml->CTe->infCte->infCTeNorm->infModal->rodo->RNTRC ?? null;

                // Inserindo no banco de dados
                $query = "INSERT INTO `tb_cte`(`cte_id`, `cte_status`, `cte_chCTe`, `cte_ide_cUF`, `cte_ide_cCT`, `cte_ide_CFOP`, `cte_ide_natOp`, `cte_ide_forPag`, `cte_ide_mod`, `cte_ide_serie`, `cte_ide_nCT`, `cte_ide_dhEmi`, `cte_ide_tpImp`, `cte_ide_tpEmis`, `cte_ide_cDV`, `cte_ide_tpAmb`, `cte_ide_tpCTe`, `cte_ide_procEmi`, `cte_ide_verProc`, `cte_ide_cMunEnv`, `cte_ide_xMunEnv`, `cte_ide_UFEnv`, `cte_ide_modal`, `cte_ide_tpServ`, `cte_ide_cMunIni`, `cte_ide_xMunIni`, `cte_ide_UFIni`, `cte_ide_cMunFim`, `cte_ide_xMunFim`, `cte_ide_UFFim`, `cte_ide_retira`, `cte_emit_CNPJ`, `cte_emit_IE`, `cte_emit_xNome`, `cte_emit_xFant`, `cte_emit_enderEmit_xLgr`, `cte_emit_enderEmit_nro`, `cte_emit_enderEmit_xCpl`, `cte_emit_enderEmit_xBairro`, `cte_emit_enderEmit_cMun`, `cte_emit_enderEmit_xMun`, `cte_emit_enderEmit_CEP`, `cte_emit_enderEmit_UF`, `cte_emit_enderEmit_fone`, `cte_rem_CNPJ`, `cte_rem_CPF`, `cte_rem_IE`, `cte_rem_xNome`, `cte_rem_xFant`, `cte_rem_fone`, `cte_rem_enderReme_xLgr`, `cte_rem_enderReme_nro`, `cte_rem_enderReme_xCpl`, `cte_rem_enderReme_xBairro`, `cte_rem_enderReme_cMun`, `cte_rem_enderReme_xMun`, `cte_rem_enderReme_CEP`, `cte_rem_enderReme_UF`, `cte_rem_enderReme_cPais`, `cte_rem_enderReme_xPais`, `cte_rem_email`, `cte_rem_infNF_nRoma`, `cte_rem_infNF_nPed`, `cte_rem_infNF_mod`, `cte_rem_infNF_serie`, `cte_rem_infNF_nDoc`, `cte_rem_infNF_dEmi`, `cte_rem_infNF_vBC`, `cte_rem_infNF_vICMS`, `cte_rem_infNF_vBCST`, `cte_rem_infNF_vST`, `cte_rem_infNF_vProd`, `cte_rem_infNF_vNF`, `cte_rem_infNF_nCFOP`, `cte_rem_infNF_nPeso`, `cte_rem_infNF_PIN`, `cte_rem_infNFe_Chave`, `cte_rem_infNFe_PIN`, `cte_exped_CNPJ`, `cte_exped_CPF`, `cte_exped_IE`, `cte_exped_xNome`, `cte_exped_fone`, `cte_exped_enderExped_xLgr`, `cte_exped_enderExped_nro`, `cte_exped_enderExped_xCpl`, `cte_exped_enderExped_xBairro`, `cte_exped_enderExped_cMun`, `cte_exped_enderExped_xMun`, `cte_exped_enderExped_CEP`, `cte_exped_enderExped_UF`, `cte_exped_enderExped_cPais`, `cte_exped_enderExped_xPais`, `cte_exped_email`, `cte_dest_CNPJ`, `cte_dest_CPF`, `cte_dest_IE`, `cte_dest_xNome`, `cte_dest_fone`, `cte_dest_ISUF`, `cte_dest_enderDest_xLgr`, `cte_dest_enderDest_nro`, `cte_dest_enderDest_xCpl`, `cte_dest_enderDest_xBairro`, `cte_dest_enderDest_cMun`, `cte_dest_enderDest_xMun`, `cte_dest_enderDest_CEP`, `cte_dest_enderDest_UF`, `cte_dest_enderDest_cPais`, `cte_dest_enderDest_xPais`, `cte_dest_email`, `cte_vPrest_vTPrest`, `cte_vPrest_vRec`, `cte_vPrest_Comp_xNome`, `cte_vPrest_Comp_vComp`, `cte_arquivo`, `cte_status_protocolo`, `cte_arquivo_xml`, `cte_cte_data_proc`) 
                VALUES 
                (
                NULL, 1, 'varrrchar44', '$cUF', '$cCT', '$CFOP', '$natOp', 1, '$mod', '$serie', '$nCT', '$dhEmi', '$tpImp', '$tpEmis', '$cDV', '$tpAmb', '$tpCTe', '$procEmi', '$verProc', '$cMunEnv', '$xMunEnv', '$UFEnv', '$modal', '$tpServ', '$cMunIni', '$xMunIni', '$UFIni', '$cMunFim', '$xMunFim', '$UFFim', '$retira',
        
                '$CNPJEmit', '$IEEmit', '$xNomeEmit', '$xFantEmit', '$xLgrEmit', '$nroEmit', '$xCplEmit', '$xBairroEmit', '$cMunEmit', '$xMunEmit', '$CEPEmit', '$UFEmit', '$foneEmit',
         
                '$CNPJRem', '$CPFRem', '$IERem', '$xNomeRem', '$xFantRem', '$foneRem', '$xLgrRem', '$nroRem', '$xCplRem', '$xBairroRem', '$cMunRem', '$xMunRem', '$CEPRem', '$UFRem',

                '$cPaisRem','$xPaisRem','$emailRem','$nRomaRem','$nPedRem','$modRem','$serieRem','$nDocRem','$dEmiRem','$vBCRem','$vICMSRem','$vBCSTRem','$vSTRem','$vProdRem','$vNFRem','$nCFOPRem','$nPesoRem','$pinRem','$chaveRem','$pinNFeRem',

                '$CNPJRcv','$CPFRcv', '$IERcv', '$xNomeRcv', '$foneRcv', '$xLgrRcv', '$nroRcv', '$xCplRcv', '$xBairroRcv', '$cMunRcv', '$xMunRcv', '$CEPRcv', '$UFRcv', '$cPaisRcv','$xPaisRcv','$emailRcv'
        
                '$CNPJDest', '$CPFDest', '$IEDest', '$xNomeDest', '$foneDest', '$ISUFDest', '$xLgrDest', '$nroDest', '$xCplDest', '$xBairroDest', '$cMunDest', '$xMunDest', '$CEPDest', '$UFDest', '$cPaisDest','$xPaisDest','$emailDest',
        
                '$vTPrest', '$vRec', '$vRec',
         
                '$vComp1Nome', '$vComp1Valor', null, 0, NULL, '$dhEmi'
                )";

                $sql = connectionFactory::connect()->prepare($query);
                $sql->execute();

                //'$indIEToma', '$toma', '$xCaracAd', '$xCaracSer', '$xObs', 
            }
        }
    }
}
