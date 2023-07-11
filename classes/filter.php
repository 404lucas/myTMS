<?php
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
        $sql = connectionFactory::connect()->prepare("SELECT $column, $IdColumn FROM `$table` $extraQuery;");

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

}
?>