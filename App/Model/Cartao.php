<?php

require_once "App/Model/Usuario.php";
require_once "ConexaoBD.php";
class Cartao
{
    private $titularCartao;
    private $numCartao;
    private $dataValidade;
    private $cvv;
    private $idUsuario;
    private $lastIdCartao;

    // function __construct(Usuario $idUsuario)
    // {
    //     $this->idUsuario = $;
    // }

    /**
     * Get the value of titularCartao
     */
    public function getTitularCartao()
    {
        return $this->titularCartao;
    }

    /**
     * Set the value of titularCartao
     *
     * @return  self
     */
    public function setTitularCartao($titularCartao)
    {
        $this->titularCartao = $titularCartao;

        return $this;
    }

    /**
     * Get the value of numCartao
     */
    public function getNumCartao()
    {
        return $this->numCartao;
    }

    /**
     * Set the value of numCartao
     *
     * @return  self
     */
    public function setNumCartao($numCartao)
    {
        $this->numCartao = $numCartao;

        return $this;
    }

    /**
     * Get the value of dataValidade
     */
    public function getDataValidade()
    {
        return $this->dataValidade;
    }

    /**
     * Set the value of dataValidade
     *
     * @return  self
     */
    public function setDataValidade($dataValidade)
    {
        $this->dataValidade = $dataValidade;

        return $this;
    }

    /**
     * Get the value of cvv
     */
    public function getCvv()
    {
        return $this->cvv;
    }

    /**
     * Set the value of cvv
     *
     * @return  self
     */
    public function setCvv($cvv)
    {
        $this->cvv = $cvv;

        return $this;
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
        return $this;
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function setIdCartao($lastIdCartao)
    {
        $this->lastIdCartao = $lastIdCartao;

        return $this;
    }

    public function getIdCartao()
    {
        return $this->lastIdCartao;
    }

    public function cadastrarCartao()
    {
        try {
            $conn = ConexaoBD::Conexao();

            // $sql = $conn->prepare("SELECT * FROM findinn.usuario");

            // $sql->execute();

            // $idUser = $conn->lastInsertId();

            $titularCartao = $this->getTitularCartao();
            $numCartao = $this->getNumCartao();
            $dataValidade = $this->getDataValidade();
            $cvv = $this->getCvv();
            $idUsuario = $this->getIdUsuario();

            $sql = $conn->prepare('INSERT INTO findinn.cartao (titular, numero, vencimento, cvv, id_usuario) VALUES (:titularCartao, :numCartao, :dataValidade, :cvv, :idUsuario)');

            $sql->bindParam('titularCartao', $titularCartao);
            $sql->bindParam('numCartao', $numCartao);
            $sql->bindParam('dataValidade', $dataValidade);
            $sql->bindParam('cvv', $cvv);
            $sql->bindParam('idUsuario', $idUsuario);

            $sql->execute();

            $lastIdCartao = $conn->lastInsertId();
            $this->setIdCartao($lastIdCartao);
            $_SESSION['idCartao'] = $lastIdCartao;
            return $lastIdCartao;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
