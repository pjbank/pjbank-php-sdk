<?php

namespace PJBank\Boleto;

/**
 * Boleto Registrado
 * @author Matheus Fidelis
 * @email matheus.fidelis@superlogica.com
 */
class Boleto
{

    /**
     * Vencimento do boleto bancário
     * @var date
     */
    private $vencimento;
    /**
     * Valor total do boleto
     * @var
     */
    private $valor;
    /**
     * Valor do juros cobrado no boleto
     * @var float
     */
    private $juros;
    /**
     * valor da multa cobrada em um boleto
     * @var float
     */
    private $multa;
    /**
     * Valor de um desconto
     * @var float
     */
    private $desconto;
    /**
     * Nome do cliente final
     * @var
     */
    private $nome_cliente;
    /**
     * CPF do cliente final
     * @var
     */
    private $cpf_cliente;
    /**
     * Endereço do cliente final
     * @var
     */
    private $endereco_cliente;
    /**
     * Numero residencial do cliente final
     * @var
     */
    private $numero_cliente;
    /**
     * Complemento opcional do endereço do cliente
     * @var
     */
    private $complemento_cliente;
    /**
     * Bairro do cliente final
     * @var
     */
    private $bairro_cliente;
    /**
     * Cidade do cliente final
     * @var
     */
    private $cidade_cliente;
    /**
     * Cidade do cliente final
     * @var
     */
    private $cep_cliente;
    /**
     * Link do logo impresso no boleto
     * @var
     */
    private $logo_url;
    /**
     * Texto opcional do corpo do boleto
     * @var
     */
    private $texto;
    /**
     * Grupo
     * @var
     */
    private $grupo;
    /**
     * Link do boleto
     * @var
     */
    private $link;
    /**
     * Nosso numero de boleto
     * @var
     */
    private $nosso_numero;
    /**
     * Numero do pedido informado pelo cliente
     * @var
     */
    private $pedido_numero;

    /**
     * @var
     */
    private $credencial_boleto;

    private $linha_digitavel;
    
    private $id_unico;

    /**
     * @var
     */
    private $chave_boleto;

    /**
     * Boleto constructor.
     * @param $credencial
     * @param $chave
     */
    public function __construct($credencial, $chave)
    {
        $this->credencial_boleto = $credencial;
        $this->chave_boleto = $chave;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @return mixed
     */
    public function getNossoNumero()
    {
        return $this->nosso_numero;
    }

    /**
     * Undocumented function
     * @return void
     */
    public function getIdUnico()
    {
        return $this->id_unico;
    }

    /**
     * Setter do numero do pedido
     * @param $pedido_numero
     */
    public function setPedidoNumero($pedido_numero)
    {
        $this->pedido_numero = $pedido_numero;
        return $this;
    }

    /**
     * Numero do pedido
     * @return mixed
     */
    public function getPedidoNumero() {
        return $this->pedido_numero;
    }

    /**
     * Undocumented function
     * @return void
     */
    public function getLinhaDigitavel()
    {
        return $this->linha_digitavel;
    }

    /**
     * @return mixed
     */
    public function getCredencialBoleto()
    {
        return $this->credencial_boleto;
    }

    /**
     * @param mixed $credencial_boleto
     * @return Boleto
     */
    public function setCredencialBoleto($credencial_boleto)
    {
        $this->credencial_boleto = $credencial_boleto;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getChaveBoleto()
    {
        return $this->chave_boleto;
    }

    /**
     * @param mixed $chave_boleto
     * @return Boleto
     */
    public function setChaveBoleto($chave_boleto)
    {
        $this->chave_boleto = $chave_boleto;
        return $this;
    }



    /**
     * @return date
     */
    public function getVencimento()
    {
        return $this->vencimento;
    }

    /**
     * @param date $vencimento
     * @return Boleto
     */
    public function setVencimento($vencimento)
    {
        $this->vencimento = $vencimento;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param mixed $valor
     * @return Boleto
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
        return $this;
    }

    /**
     * @return float
     */
    public function getJuros()
    {
        return $this->juros;
    }

    /**
     * @param float $juros
     * @return Boleto
     */
    public function setJuros($juros)
    {
        $this->juros = $juros;
        return $this;
    }

    /**
     * @return float
     */
    public function getMulta()
    {
        return $this->multa;
    }

    /**
     * @param float $multa
     * @return Boleto
     */
    public function setMulta($multa)
    {
        $this->multa = $multa;
        return $this;
    }

    /**
     * @return float
     */
    public function getDesconto()
    {
        return $this->desconto;
    }

    /**
     * @param float $desconto
     * @return Boleto
     */
    public function setDesconto($desconto)
    {
        $this->desconto = $desconto;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNomeCliente()
    {
        return $this->nome_cliente;
    }

    /**
     * @param mixed $nome_cliente
     * @return Boleto
     */
    public function setNomeCliente($nome_cliente)
    {
        $this->nome_cliente = $nome_cliente;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCpfCliente()
    {
        return $this->cpf_cliente;
    }

    /**
     * @param mixed $cpf_cliente
     * @return Boleto
     */
    public function setCpfCliente($cpf_cliente)
    {
        $this->cpf_cliente = $cpf_cliente;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEnderecoCliente()
    {
        return $this->endereco_cliente;
    }

    /**
     * @param mixed $endereco_cliente
     * @return Boleto
     */
    public function setEnderecoCliente($endereco_cliente)
    {
        $this->endereco_cliente = $endereco_cliente;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumeroCliente()
    {
        return $this->numero_cliente;
    }

    /**
     * @param mixed $numero_cliente
     * @return Boleto
     */
    public function setNumeroCliente($numero_cliente)
    {
        $this->numero_cliente = $numero_cliente;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getComplementoCliente()
    {
        return $this->complemento_cliente;
    }

    /**
     * @param mixed $complemento_cliente
     * @return Boleto
     */
    public function setComplementoCliente($complemento_cliente)
    {
        $this->complemento_cliente = $complemento_cliente;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBairroCliente()
    {
        return $this->bairro_cliente;
    }

    /**
     * @param mixed $bairro_cliente
     * @return Boleto
     */
    public function setBairroCliente($bairro_cliente)
    {
        $this->bairro_cliente = $bairro_cliente;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCidadeCliente()
    {
        return $this->cidade_cliente;
    }

    /**
     * @param mixed $cidade_cliente
     * @return Boleto
     */
    public function setCidadeCliente($cidade_cliente)
    {
        $this->cidade_cliente = $cidade_cliente;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCepCliente()
    {
        return $this->cep_cliente;
    }

    /**
     * @param mixed $cep_cliente
     * @return Boleto
     */
    public function setCepCliente($cep_cliente)
    {
        $this->cep_cliente = $cep_cliente;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLogoUrl()
    {
        return $this->logo_url;
    }

    /**
     * @param mixed $logo_url
     * @return Boleto
     */
    public function setLogoUrl($logo_url)
    {
        $this->logo_url = $logo_url;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * @param mixed $texto
     * @return Boleto
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGrupo()
    {
        return $this->grupo;
    }

    /**
     * @param mixed $grupo
     * @return Boleto
     */
    public function setGrupo($grupo)
    {
        $this->grupo = $grupo;
        return $this;
    }


    /**
     * Pega os campos utilizados para a emissão do boleto bancário. 
     * @return array
     */
    public function getValues() 
    {
        $objectValues = get_object_vars($this);
        $boletoValues = array();
        foreach ($objectValues as $key => $value) {
            if (!is_null($value)) {
                $boletoValues[$key] = $value;
            }
        }

        return $boletoValues;
    }



    /**
     * Gera um boleto bancário no PJBank
     * via API
     */
    public function gerar() {
        $emissor = new Emissor($this);
        $boletoGerado = $emissor->emitir();

        $this->nosso_numero = $boletoGerado->nossonumero;
        $this->id_unico = $boletoGerado->id_unico;
        $this->linha_digitavel = $boletoGerado->linhaDigitavel;
        $this->link = $boletoGerado->linkBoleto;
    }


}
