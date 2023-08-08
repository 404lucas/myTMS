<?php
class frontend
{

    public static function handleErrors($msg)
    {
        $errorMsg = $msg;
        include 'error.php';
        die;
    }

    public static function alert($icon, $type, $message)
    {
        return '<div class="alert hidden w100 alert-' . $type . ' text-center" role="alert"><i class="fa-solid fa-' . $icon . '" style="margin-right: 10px;"></i>  
        ' . $message . '
        </div>';
    }

    public static function alertCustom($icon, $type, $message)
    {
        return '<div class=" hidden customAlert ' . $type . '"><i class="fa-solid fa-' . $icon . '" style="margin-right: 10px;"></i>  
        ' . $message . '
        </div>';
    }


    public static function loadPage()
    {
        if (isset($_GET['url'])) {
            $url = explode('/', $_GET['url']);
            if (file_exists('./pages/' . $url[0] . '.php')) {
                include('./pages/' . $url[0] . '.php');
            }
        } else {
            include('./pages/dashboard.php');
        }
    }

    // public static function removerAcentos($str)
    // {
    //     return iconv('UTF-8', 'ASCII//TRANSLIT', $str);
    // }

    // public static function formatarString($texto)
    // {
    //     $textoSemAcentos = self::removerAcentos($texto);
    //     return mb_strtolower($textoSemAcentos);
    // }

    private static function returnSubLinks($subButtons)
    {
        foreach ($subButtons as $button) {
            return ' ' . $button['link'] . ' ';
        }
    }


    public static function MenuBtn($id, $title, $icon, $userId)
    {
        $subButtons = self::getSubButtons($title, $userId);
        if (!empty($subButtons)) {
            // $formatedTitle = self::formatarString($title);

            //Componente principal do botão, que é estruturado de acordo com a chamada no frontend para interagir também com o javascript.
            echo '<div id="button' . $id . '"  class="menuBtn btnClosed ' . self::returnSubLinks($subButtons) . '" onclick="toggleContent(\'button' . $id . '\',\'' . $title . '\')"data-toggle="tooltip" data-placement="right" title="' . $title . '">
            <i class="fa-solid ' . $icon . ' menuBtnIcon"></i>
            </div>
    
            <div class="buttonContent content" id="button' . $id . '-content">';
            //Links abaixo
            foreach ($subButtons as $button) {
                echo '<a href="' . INCLUDE_PATH_PAINEL . '?url=' . $button['link'] . '">' . $button['title'] . '</a>';
            }
            echo '</div>';
        }
    }

    public static function MenuBtnMobile($title, $userId)
    {
        $subButtons = self::getSubButtons($title, $userId);
        if (!empty($subButtons)) {
            foreach ($subButtons as $button) {
                echo '<a href="' . INCLUDE_PATH_PAINEL . '?url=' . $button['link'] . '">' . $button['title'] . '</a>';
            }
        }
    }

    private static function getSubButtons($title, $userId)
    {
        //links de cada botão
        $menuLinks = array(
            array(
                'title' => 'Relatórios',
                'subButtons' => array(
                    array(
                        'title' => 'Relatórios NFe',
                        'link' => 'relatorios',
                        'access' => 2 //acessar_relatorios
                    ),
                )
            ),

            array(
                'title' => 'DashBoard',
                'subButtons' => array(
                    array(
                        'title' => 'DashBoard',
                        'link' => 'dashboard',
                        'access' => 0 //default
                    ),
                )
            ),

            array(
                'title' => 'Financeiro',
                'subButtons' => array(
                    array(
                        'title' => 'Financeiro',
                        'link' => 'financeiro',
                        'access' => 0 //default
                    ),
                )
            ),

            array(
                'title' => 'Usuários',
                'subButtons' => array(
                    array(
                        'title' => 'Gerenciar usuários',
                        'link' => 'usuarios',
                        'access' => 3 //editar_acessos
                    ),
                    array(
                        'title' => 'Acessos',
                        'link' => 'acessos',
                        'access' => 3 //editar_acessos
                    ),

                )
            ),

            array(
                'title' => 'Clientes',
                'subButtons' => array(
                    array(
                        'title' => 'Gerenciar clientes',
                        'link' => 'clientes',
                        'access' => 9 //editar_acessos
                    ),


                )
            ),

            array(
                'title' => 'Uploads',
                'subButtons' => array(
                    array(
                        'title' => 'Upload CT-e',
                        'link' => 'uploadCte',
                        'access' => 4 //upload_cte
                    ),
                )
            ),

            array(
                'title' => 'Administração',
                'subButtons' => array(
                    array(
                        'title' => 'Log',
                        'link' => 'logs',
                        'access' => 6 //upload_cte
                    ),
                    array(
                        'title' => 'Comunicados',
                        'link' => 'comunicados',
                        'access' => 8 //acionar_comunicados
                    ),
                )
            ),
        );

        $allowedSubButtons = array();

        foreach ($menuLinks as $value) {
            if ($value['title'] == $title) {
                foreach ($value['subButtons'] as $subButton) {
                    $permited = acesso::verifyAppliedAccess($userId, $subButton['access']);
                    if ($permited || $subButton['access'] == 0) {
                        $allowedSubButtons[] = $subButton;
                    }
                }
            }
        }

        return $allowedSubButtons;
    }




    public static function ticketSingle($currentTicket, $sessionActive, $userID)
    {
        // if ($sessionActive) {
        //     $sessionActive = INCLUDE_PATH_PAINEL . '?url=chat';
        // } else {
        //     $sessionActive = '?chat=true';
        // }

        $deleteBtn = acesso::verifyAppliedAccess($userID, 7) ? '<a class="btn btn-danger" href="functions/deleteTicket.php?id=' . $currentTicket->id . '&userId=' . $userID . '"><i class="fa-solid fa-trash-can"></i></a>' : '';

        return '
        <div class="ticketSingle">
             <div class="ticketBox">
                <div class="ticketHeaderIcon">' . ($currentTicket->finalizado ? '<i class="fa-solid fa-ticket commentIcon" style="color:#808080;"></i>' : '<i class="fa-solid fa-comment commentIcon"></i>') . '</div>
                    <div class="ticketHeader">
                        <div class="adresseeeContainer">
                            <p class="addresseeUpper">Para</p>
                            <p class="addressee">' . $currentTicket->destinatarioTicket . '</p>
                        </div>
                        <p class="sender">' . $currentTicket->nomeAutor . '</p>' .
            $deleteBtn . '
                    </div>
                    <div class="ticketContent">
                        <textarea disabled>' . $currentTicket->conteudo . '</textarea>
                    </div>
                    <form method="post" action="' . $sessionActive . '">
                        <button type="submit" class="btn btn-outline-secondary btn-block" name="ticketId" style="margin-bottom:10px;" value="' . $currentTicket->id . '"><i class="fa-solid fa-message"></i></button>
                    </form>      
                        <div class="ticketFooter">
                        <p>' . $currentTicket->data . '</p>
                    </div>
                    <input type ="hidden" value="' . $currentTicket->id . '">
                </div>
             </div>';
    }

    public static function readingForm($key, $title, $class, $id, $function)
    {
        echo '<div class="form-group insideContainer ' . $class . '">

        <!--Título-->
        <label for="formGroupExampleInput">' . $title . '</label>
        <!--Input-->
        <div class="input-group mb-3">
            <input type="text" id="' . $id, $key . '" name="' . $id . '" class="form-control"
                value="' . $function . '" readonly>
                </input>
            <div class="input-group-append">
                <!--Copiar-->
                <button class="btn btn-outline-secondary" data-toggle="tooltip' . $id . '"
                    data-html="true" title="Copiar"
                    onclick="copyToClipboard(\'' . $id, $key . '\')" type="button"
                    id="button-addon2"><i class="fa-solid fa-copy"></i></button>
            </div>
        </div></div>';
    }

    public static function inputingForm($key, $title, $class, $id)
    {
        echo '<div class="form-group insideContainer ' . $class . '">

        <!--Título-->
        <label for="formGroupExampleInput">' . $title . '</label>
        <!--Input-->
        <div class="input-group mb-3">
            <input name="' . $title . '" type="text" id="' . $id, $key . '" class="form-control">
        </div></div>';
    }
}
