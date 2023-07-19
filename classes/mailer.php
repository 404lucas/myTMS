<?php

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class mailer
{
    public static function sendRegisterEmail($nome, $cnpj, $telefone, $email, $obs)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->CharSet = "UTF-8";
            $mail->Host = 'mail.nextexpress.com.br';
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->Username = 'acesso@nextexpress.com.br';
            $mail->Password = '3bBKa2l-fSk&';

            $mail->setFrom('acesso@nextexpress.com.br', 'Formulários');
            $mail->addAddress('lucas@dlog.com.br');
            $mail->AddEmbeddedImage('./img/logo.jpeg', 'nexx');
            $mail->Subject = 'Solicitação de cadastro - ' . $nome;
            $mail->Body =
            '<div style="background-color:#fff; color: #606060"; display: flex; flex-direction:column;><img src="cid:nexx" height: "100px";><h1>Nova solicitação de cadastro no sistema Next:</h1></div>
            <h3>Nome do usuário: ' . $nome . '</h6>
            <h3>CNPJ: ' . $cnpj . '</p></h6>
            <h3>Telefone: ' . $telefone . '</h6>
            <h3>Email: ' . $email . '</h6>
            <h3>Observação: ' . $obs . '</h6>
            ';

            $mail->IsHTML(true);
            $mail->send();
            echo frontend::alertCustom('envelope', 'success', 'Seu cadastro foi solicitado! Nossa equipe retornará em breve.');
        } catch (Exception $e) {
            echo frontend::alertCustom('envelope', 'fail', $e->getMessage() . ' Erro ao enviar email');;
        }
    }
}

(string)$xmlString = '<cteProc xmlns="http://www.portalfiscal.inf.br/cte" versao="3.00">
        <CTe xmlns="http://www.portalfiscal.inf.br/cte">
        <infCte versao="3.00" Id="CTe42230711497307000166570020035349991386574409">
        <ide>
        <cUF>42</cUF>
        <cCT>38657440</cCT>
        <CFOP>6353</CFOP>
        <natOp>TRANSPORTE DE CARGA</natOp>
        <mod>57</mod>
        <serie>2</serie>
        <nCT>3534999</nCT>
        <dhEmi>2023-07-06T10:47:48-03:00</dhEmi>
        <tpImp>1</tpImp>
        <tpEmis>1</tpEmis>
        <cDV>9</cDV>
        <tpAmb>1</tpAmb>
        <tpCTe>0</tpCTe>
        <procEmi>0</procEmi>
        <verProc>2.0.5.10</verProc>
        <cMunEnv>4205902</cMunEnv>
        <xMunEnv>Gaspar</xMunEnv>
        <UFEnv>SC</UFEnv>
        <modal>01</modal>
        <tpServ>0</tpServ>
        <cMunIni>4205902</cMunIni>
        <xMunIni>Gaspar</xMunIni>
        <UFIni>SC</UFIni>
        <cMunFim>3550308</cMunFim>
        <xMunFim>SAO PAULO</xMunFim>
        <UFFim>SP</UFFim>
        <retira>0</retira>
        <indIEToma>1</indIEToma>
        <toma3>
        <toma>0</toma>
        </toma3>
        </ide>
        <compl>
        <xCaracAd>ENTREGA</xCaracAd>
        <xCaracSer>ENTREGA</xCaracSer>
        <xObs>CODIGO: 2924814383</xObs>
        </compl>
        <emit>
        <CNPJ>11497307000166</CNPJ>
        <IE>258951486</IE>
        <xNome>Next Express Transportes LTDA ME</xNome>
        <xFant>Next Express Transportes</xFant>
        <enderEmit>
        <xLgr>Rua Anfiloquio Nunes Pires</xLgr>
        <nro>3500</nro>
        <xBairro>Bela Vista</xBairro>
        <cMun>4205902</cMun>
        <xMun>Gaspar</xMun>
        <CEP>89110645</CEP>
        <UF>SC</UF>
        <fone>4732373771</fone>
        </enderEmit>
        </emit>
        <rem>
        <CNPJ>34158043000111</CNPJ>
        <IE>260188824</IE>
        <xNome>Vanessa Reinert Muller 07279735924</xNome>
        <xFant>armonizzistore.com.br - MAGAZORD</xFant>
        <fone>47996066408</fone>
        <enderReme>
        <xLgr>Rua Geral Poco Grande</xLgr>
        <nro>6005</nro>
        <xCpl>Casa 2</xCpl>
        <xBairro>Lagoa</xBairro>
        <cMun>4205902</cMun>
        <xMun>Gaspar</xMun>
        <CEP>89115450</CEP>
        <UF>SC</UF>
        </enderReme>
        </rem>
        <receb>
        <CPF>35174894842</CPF>
        <IE/>
        <xNome>BRUNA APARECIDA MASAHARU SANTOS DE SOUZA</xNome>
        <fone>11954539185</fone>
        <enderReceb>
        <xLgr>RUA ITAPERIMA</xLgr>
        <nro>252</nro>
        <xCpl>CASA 2</xCpl>
        <xBairro>VILA GRACIOSA</xBairro>
        <cMun>3550308</cMun>
        <xMun>SAO PAULO</xMun>
        <CEP>03160110</CEP>
        <UF>SP</UF>
        </enderReceb>
        </receb>
        <dest>
        <CPF>35174894842</CPF>
        <xNome>BRUNA APARECIDA MASAHARU SANTOS DE SOUZA</xNome>
        <fone>11954539185</fone>
        <enderDest>
        <xLgr>RUA ITAPERIMA</xLgr>
        <nro>252</nro>
        <xCpl>CASA 2</xCpl>
        <xBairro>VILA GRACIOSA</xBairro>
        <cMun>3550308</cMun>
        <xMun>SAO PAULO</xMun>
        <CEP>03160110</CEP>
        <UF>SP</UF>
        </enderDest>
        </dest>
        <vPrest>
        <vTPrest>7.73</vTPrest>
        <vRec>7.73</vRec>
        <Comp>
        <xNome>FRETE PESO</xNome>
        <vComp>6.53</vComp>
        </Comp>
        <Comp>
        <xNome>ICMS</xNome>
        <vComp>0.93</vComp>
        </Comp>
        <Comp>
        <xNome>ADVALOREM</xNome>
        <vComp>0.07</vComp>
        </Comp>
        <Comp>
        <xNome>GRIS</xNome>
        <vComp>0.20</vComp>
        </Comp>
        </vPrest>
        <imp>
        <ICMS>
        <ICMS00>
        <CST>00</CST>
        <vBC>7.73</vBC>
        <pICMS>12.00</pICMS>
        <vICMS>0.93</vICMS>
        </ICMS00>
        </ICMS>
        </imp>
        <infCTeNorm>
        <infCarga>
        <vCarga>67.68</vCarga>
        <proPred>Diversos</proPred>
        <infQ>
        <cUnid>01</cUnid>
        <tpMed>PESO REAL</tpMed>
        <qCarga>0.7000</qCarga>
        </infQ>
        <infQ>
        <cUnid>01</cUnid>
        <tpMed>PESO BASE DE CALCULO</tpMed>
        <qCarga>0.7000</qCarga>
        </infQ>
        <infQ>
        <cUnid>03</cUnid>
        <tpMed>QTDE VOLUMES</tpMed>
        <qCarga>1.0000</qCarga>
        </infQ>
        <vCargaAverb>67.68</vCargaAverb>
        </infCarga>
        <infDoc>
        <infNFe>
        <chave>42230734158043000111550020000125991000128541</chave>
        <dPrev>2023-07-11</dPrev>
        </infNFe>
        </infDoc>
        <infModal versaoModal="3.00">
        <rodo>
        <RNTRC>52178655</RNTRC>
        </rodo>
        </infModal>
        </infCTeNorm>
        </infCte>
        <infCTeSupl>
        <qrCodCTe>
        <![CDATA[ https://dfe-portal.svrs.rs.gov.br/cte/qrCode?chCTe=42230711497307000166570020035349991386574409&tpAmb=1 ]]>
        </qrCodCTe>
        </infCTeSupl>
        <Signature xmlns="http://www.w3.org/2000/09/xmldsig#">
        <SignedInfo>
        <CanonicalizationMethod Algorithm="http://www.w3.org/TR/2001/REC-xml-c14n-20010315"/>
        <SignatureMethod Algorithm="http://www.w3.org/2000/09/xmldsig#rsa-sha1"/>
        <Reference URI="#CTe42230711497307000166570020035349991386574409">
        <Transforms>
        <Transform Algorithm="http://www.w3.org/2000/09/xmldsig#enveloped-signature"/>
        <Transform Algorithm="http://www.w3.org/TR/2001/REC-xml-c14n-20010315"/>
        </Transforms>
        <DigestMethod Algorithm="http://www.w3.org/2000/09/xmldsig#sha1"/>
        <DigestValue>VrIarfwkDchRRvGZdrJ0dA27Hgw=</DigestValue>
        </Reference>
        </SignedInfo>
        <SignatureValue>XYn9l+xKrHLtcyNBlepZ0CKwsVktYO4SNUWiQ7ZdJ7ALqBd0X+hM9wEz5rZyICWtAGJh/M/1YiTeLtuAsRIW2ZLpSc/jjkz8FSXEhq/8sj8pGBzyWhWjpf+K8pK3j5NUt5PP730Ecq6DiVTQToJ/Og5tNJVgdP+duhtVBsCo6azTReTqU4O4lF4jzYHSYGLo0oqe/vPZx8ucezpCCQPHxZrFJPnyg6TZM3395Tk+O712PyFBTyRTmoXZ31RTUsNiXV6FJcByfIMYm2MSqAKKZ8PTCcIBBx+StKXLR/XYfuppwmevD/3F8FwvcJyvGwU7cQo2nBtjX5bY3lDEBSRZMQ==</SignatureValue>
        <KeyInfo>
        <X509Data>
        <X509Certificate>MIIIZTCCBk2gAwIBAgIQNEbCZMrvOMhYB++3GIpvpjANBgkqhkiG9w0BAQsFADCBgDELMAkGA1UEBhMCQlIxEzARBgNVBAoTCklDUC1CcmFzaWwxNjA0BgNVBAsTLVNlY3JldGFyaWEgZGEgUmVjZWl0YSBGZWRlcmFsIGRvIEJyYXNpbCAtIFJGQjEkMCIGA1UEAxMbQUMgSW5zdGl0dXRvIEZlbmFjb24gUkZCIEczMB4XDTIzMDYxMjE4NTAwN1oXDTI0MDYxMTE4NTAwN1owggEeMQswCQYDVQQGEwJCUjETMBEGA1UECgwKSUNQLUJyYXNpbDELMAkGA1UECAwCU0MxDzANBgNVBAcMBkdBU1BBUjEWMBQGA1UECwwNUkZCIGUtQ05QSiBBMTE2MDQGA1UECwwtU2VjcmV0YXJpYSBkYSBSZWNlaXRhIEZlZGVyYWwgZG8gQnJhc2lsIC0gUkZCMRcwFQYDVQQLDA44Mzc5NzE5MTAwMDE5MTEZMBcGA1UECwwQVklERU9DT05GRVJFTkNJQTEhMB8GA1UECwwYQUMgSW5zdGl0dXRvIEZlbmFjb24gUkZCMTUwMwYDVQQDDCxORVhUIEVYUFJFU1MgVFJBTlNQT1JURVMgTFREQToxMTQ5NzMwNzAwMDE2NjCCASIwDQYJKoZIhvcNAQEBBQADggEPADCCAQoCggEBALJ5RWNjzFA+vXmnTT6okLIEbwMqSZBqMKRnST58Z+LS/5DRtfDTeqaxJDIm3vJ6ZvTU3Fe8Q/L88y0dVbjzceYKU5mlCZPjBHq+SQ5wtre9dQOP8ZqzMFeQqRLMMi8CBiiYgi5VAVUYgQvi8ySqOOXCf9BtNHpU9fLjtm8amQX/wdWDriqGzIgewPQBL3s7PSK6JZcmPhGHntI5D5JkbF0BLWroWDkH3yIVd2oAart7qPaQn/QqRXnJp7FpaPR27HxKA606M6fiSXjT+Lvj7dMeaSOVDQhuOTvo6RWN0/T7dvgqEGyM5D/9bLcqN6mV4Tvdaon1JucPk/pwpNI1zbsCAwEAAaOCAzgwggM0MIHCBgNVHREEgbowgbegQgYFYEwBAwSgOQQ3MTgwODE5ODQwNTE3NTkzMjk3NzAwMDAwMDAwMDAwMDAwMDAwMDA0NDU5MzU2MDAwMDBTU1BTQ6AeBgVgTAEDAqAVBBNESUVHTyBBTFRJTk8gTVVTU0FLoBkGBWBMAQMDoBAEDjExNDk3MzA3MDAwMTY2oBcGBWBMAQMHoA4EDDAwMDAwMDAwMDAwMIEdZmluYW5jZWlyb0BuZXh0ZXhwcmVzcy5jb20uYnIwCQYDVR0TBAIwADAfBgNVHSMEGDAWgBQmx5Q9eod+f0t4ioc94M+1zqmw2jCBhgYDVR0gBH8wfTB7BgZgTAECASIwcTBvBggrBgEFBQcCARZjaHR0cDovL2ljcC1icmFzaWwuYWNmZW5hY29uLmNvbS5ici9yZXBvc2l0b3Jpby9kcGMvQUMtSW5zdGl0dXRvLUZlbmFjb24tUkZCL0RQQ19BQ19JRmVuYWNvbl9SRkIucGRmMIHKBgNVHR8EgcIwgb8wXqBcoFqGWGh0dHA6Ly9pY3AtYnJhc2lsLmFjZmVuYWNvbi5jb20uYnIvcmVwb3NpdG9yaW8vbGNyL0FDSW5zdGl0dXRvRmVuYWNvblJGQkczL0xhdGVzdENSTC5jcmwwXaBboFmGV2h0dHA6Ly9pY3AtYnJhc2lsLm91dHJhbGNyLmNvbS5ici9yZXBvc2l0b3Jpby9sY3IvQUNJbnN0aXR1dG9GZW5hY29uUkZCRzMvTGF0ZXN0Q1JMLmNybDAOBgNVHQ8BAf8EBAMCBeAwHQYDVR0lBBYwFAYIKwYBBQUHAwIGCCsGAQUFBwMEMIG7BggrBgEFBQcBAQSBrjCBqzBmBggrBgEFBQcwAoZaaHR0cDovL2ljcC1icmFzaWwuYWNmZW5hY29uLmNvbS5ici9yZXBvc2l0b3Jpby9jZXJ0aWZpY2Fkb3MvQUNfSW5zdGl0dXRvX0ZlbmFjb25fUkZCRzMucDdjMEEGCCsGAQUFBzABhjVodHRwOi8vb2NzcC1hYy1pbnN0aXR1dG8tZmVuYWNvbi1yZmIuY2VydGlzaWduLmNvbS5icjANBgkqhkiG9w0BAQsFAAOCAgEAN8zVuH55tVC7eXr2Bm5Hgz9CcWwsXl58rhTiMkaWZ8Vy7pBYDKRIS7IMYazqWSCfsxH7nibIOjwZdCHMIrDubDNMvDmfE7iiVgzfoQU15wpAz4wbCgc8Z9ZWmeqYrAezWdfJ/vyMLD/TVpzliaBphpFlM0z0VpRu1d1kz7AGMgDOYKN8SVcL/mE/H8qiKZoijjlVF18j1s7a+ThCz7RXqsEf2yVPQqoTp3U5u0Qr5YUz2bcnPE+YMv105Ci8kZwlM7yNAOc97wa3ggEkOCvxMbE2dShiyyvFAILKXqaiYD/cqKn3lRhhhzUZflAeMXKib6MJYCHo93ulCXL8reHHVmi7vhbo//9UdnKGMZZtBqixBZzK31veCuBpB4Ly1IBn8xm2+reytd+OsNbsJ5prPk0HPtoXzazjuzMnSNqhdHCxkEEKFQTTU8xS/d5AedDaVLyc+BwRvmZlB5t9f+/oVzIQAnuLjdRM7EY/XJtBYMlKYMaTgXNReDKRYelGvpuF0xN9hXjNaZx/oBmlx9YA6WKfwz1eF7e4w+fw93csMh+4SD2LGZ3b4b0eBm/JUsbfzMh2kVcUkrLqLZADbL16JeuFZMGP6z/WMCSzWdiIgao0Dndz+s3GlNWq9Gn6ga3UsIiuYc4odCLalPC5L8gwaokuhOYmWIT07KMB2aX36Rg=</X509Certificate>
        </X509Data>
        </KeyInfo>
        </Signature>
        </CTe>
        <protCTe xmlns="http://www.portalfiscal.inf.br/cte" versao="3.00">
        <infProt Id="CTe342230149457293">
        <tpAmb>1</tpAmb>
        <verAplic>RS20230701144148</verAplic>
        <chCTe>42230711497307000166570020035349991386574409</chCTe>
        <dhRecbto>2023-07-06T10:47:48-03:00</dhRecbto>
        <nProt>342230149457293</nProt>
        <digVal>VrIarfwkDchRRvGZdrJ0dA27Hgw=</digVal>
        <cStat>100</cStat>
        <xMotivo>Autorizado o uso do CTe</xMotivo>
        </infProt>
        </protCTe>
        </cteProc>';