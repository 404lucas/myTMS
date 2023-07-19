<?php
header('Content-Type: application/json');

define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DATABASE', 'next_express');

class filter
{
    private $whereClause;

    public function __construct()
    {
        $this->whereClause = '';
    }

    public function addWhere($condition)
    {
        if (empty($this->whereClause)) {
            $this->whereClause = "WHERE {$condition}";
        } else {
            $this->whereClause .= " AND {$condition}";
        }
    }

    public function getWhereClause()
    {
        return $this->whereClause;
    }

    public static function filterSearcher($column, $IdColumn, $table, $extraQuery)
    {
        $pdo = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USER, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $sql = $pdo->prepare("SELECT $column, $IdColumn FROM `$table` $extraQuery;");
        $sql->execute();
        $sql = $sql->fetchAll();
        return $sql;
    }

    public function getFilter($column, $IdColumn, $table, $extraQuery)
    {
        $sql = self::filterSearcher($column, $IdColumn, $table, $extraQuery);

        print_r($sql);

        #Listando os resultados como option
        foreach ($sql as $value) {
            echo '<option value="' . $value[$IdColumn] . '">'
                . $value[$column] . '
            </option>';
        }
    }

    public static function getListJoined($limitQuery, $orderQuery, $whereQuery)
    {
        $pdo = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USER, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $query = "SELECT DISTINCT 
        /*Dados da nota*/
        `nfe_id`, `nfe_ativa`, `nfe_id_cliente`, `nfe_id_volume`, `nfe_id_fornecedor`, `nfe_id_parceiro`, `nfe_id_servico`, `nfe_serial_pedido`, `nfe_serial_codigo`, `nfe_serial_serie`, `nfe_serial_verProc`, `nfe_serial_nnf`, `nfe_serial_data_protocolo`, `nfe_serial_emissor_protocolo`, `nfe_doc_awb`, `nfe_doc_gris`, `nfe_doc_seguro`, `nfe_doc_CFOP`, `nfe_doc_justificativa`, `nfe_doc_sigla_tabela`, `nfe_doc_declaracao`, `nfe_doc_icsm`, `nfe_doc_rodo_courier`, `nfe_dest_razao`, `nfe_dest_cpl`, `nfe_dest_cpf`, `nfe_dest_cnpj`, `nfe_dest_uf`, `nfe_dest_cidade`, `nfe_dest_bairro`, `nfe_dest_logradouro`, `nfe_dest_complemento`, `nfe_dest_p_referencia`, `nfe_CTe`, `nfe_CTe_chave`, `nfe_CTe_cCT`, `nfe_CTe_origem`, `nfe_entrega_data`, `nfe_entrega_previsao`, `nfe_entrega_prazo`, `nfe_entrega_monitorar`, `nfe_total_BC`, `nfe_total_ICMS`, `nfe_total_produto`, `nfe_total_seguro`, `nfe_total_desconto`, `nfe_total_PIS`, `nfe_total_COFINS`, `nfe_total_NF`, `nfe_arquivo_XML`, `nfe_complementar`, `nfe_data_criacao`, `nfe_data_alteracao`, 
            
        /*Dados do cliente*/
        `cli_dado_fantasia`, `cli_dado_cpf`, `cli_dado_cnpj`, `cli_dado_razao`, `cli_dado_ie`,  `cli_end_cep`, `cli_end_municipio`, `cli_end_logradouro`, `cli_end_numero`, `cli_end_complemento`, `cli_end_bairro`,  
        
        /*Dados adicionais*/
        `vol_item`,
        `forn_fantasia`,
        `parc_fantasia`,
        `serv_nome`,
        `log_nome`,
        `stt_descricao`,
        `stta_data_alteracao`,
        `stta_id_status`,
        `stt_cor`,
        `stt_nome`
        
        FROM `tb_nfe` 
    
        LEFT JOIN `tb_status_apply` ON `tb_nfe`.`nfe_id` = `tb_status_apply`.`stta_id_nfe` 
        LEFT JOIN `tb_status` ON `tb_status_apply`.`stta_id_status` = `tb_status`.`stt_id` 
        INNER JOIN `tb_volume` ON `tb_nfe`.`nfe_id_volume` = `tb_volume`.`vol_id` 
        INNER JOIN `tb_servico` ON `tb_nfe`.`nfe_id_servico` = `tb_servico`.`serv_id`
        INNER JOIN `tb_cliente` ON `tb_nfe`.`nfe_id_cliente` = `tb_cliente`.`cli_id`
        INNER JOIN `tb_login` ON `tb_cliente`.`cli_id_operador_atendente` = `tb_login`.`log_id` 
        INNER JOIN `tb_parceiro` ON `tb_nfe`.`nfe_id_parceiro` = `tb_parceiro`.`parc_id` 
        INNER JOIN `tb_fornecedor` ON `tb_nfe`.`nfe_id_fornecedor` = `tb_fornecedor`.`forn_id`
        $whereQuery
        GROUP BY `nfe_id`
        $orderQuery
        LIMIT 10
        ";

        $sql = $pdo->prepare($query);

        $sql->execute();
        $sql = $sql->fetchAll();

        return $sql;
    }
}

// Verifique se os filtros foram enviados
if (!empty($_POST)) {



    $currentFilter = new filter;

    //Cliente
    isset($_POST['cliente']) ? $currentFilter->addWhere("nfe_id_cliente = " . $_POST['cliente']) : NULL;
    //Atendente
    isset($_POST['atendente']) ? $currentFilter->addWhere("log_id = " . $_POST['atendente']) : NULL;
    //Executivo
    isset($_POST['executivo']) ? $currentFilter->addWhere("nfe_id_executivo = " . $_POST['executivo']) : NULL;
    //Parceiro
    isset($_POST['parceiro']) ? $currentFilter->addWhere("nfe_id_parceiro = " . $_POST['parceiro']) : NULL;
    //Cliente
    isset($_POST['dataInicial']) && $_POST['dataInicial'] != '' && $_POST['dataInicial'] != "1969-12-31 21:00:00" ? $currentFilter->addWhere("nfe_criacao >= " . $_POST['dataInicial']) : NULL;

    isset($_POST['dataFinal']) && $_POST['dataFinal'] != '' && $_POST['dataFinal'] != "1969-12-31 21:00:00"  ? $currentFilter->addWhere("nfe_criacao >= " . $_POST['dataFinal']) : NULL;
    //Cliente
    isset($_POST['status']) ? $currentFilter->addWhere("stta_id_status = " . $_POST['status']) : NULL;

    $order = $_POST['order'] ?? 'nfe_id';
    $direction = $_POST['direction'] ?? 'DESC';

    switch ($order) {
        case 'cte':
            $column = 'nfe_CTe';
            break;
        case 'nfe':
            $column = 'nfe_id';
            break;
        case 'remetente':
            $column = 'cli_dado_fantasia';
            break;
        case 'destinatario':
            $column = 'nfe_dest_razao ';
            break;
        case 'dataProcessamento':
            $column = 'nfe_data_alteracao';
            break;
        case 'previsao':
            $column = 'nfe_entrega_previsao';
            break;
        case 'cidade':
            $column = 'nfe_dest_cidade';
            break;
        case 'uf':
            $column = 'nfe_dest_uf';
            break;
        case 'dataStatus':
            $column = 'stta_data_alteracao';
            break;
        case 'descStatus':
            $column = 'stt_descricao';
            break;
        default:
            $column = 'nfe_id';
            break;
    }

    $orderBy = "ORDER BY {$column} {$direction}";
    $whereQuery = $currentFilter->getWhereClause();
    // Exemplo:
    $resultados = filter::getListJoined('', $orderBy ?? '', $whereQuery ?? '');

    // Formatando os resultados para exibição

    echo json_encode($resultados);
}
