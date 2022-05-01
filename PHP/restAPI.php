<?php

/**
 * Descricao de Conexão: A presente REST API abre e fecha conexão com o banco de dados relacional,  
 * também interagindo com o mesmo, inserindo e selecionando dados.
 * @autora Ana Andrade
 */

class restAPI {
    
    //ATRIBUTOS
    private $servidor;
    private $usuario;
    private $senha;
    private $banco;
    
    //METODOS
    
    //Inicializa as variáveis de conexão
    public function restAPI() {
        $this->servidor = "localhost";
        $this->usuario = "root";
        $this->senha = "";
        $this->banco = "aplicacao_web_seminario";
    }
    
    //Abre uma conexão com o MySQL Server local
    public function abrirConexao() {
        $conexao = New mysqli($this->servidor, $this->usuario, $this->senha, $this->banco);
        //Verifica se a conexão foi realizada com sucesso. Se sim, retorna a conexão.
        if ($conexao->connect_error) {
            die("Falha na conexão: " .$conexao->connect_error);
        } else {
            return $conexao;
        }
    }
    
    //Fecha a conexão com o MySQL Server local
    public function fecharConexao($conexao) {
        $c = $conexao;
        $c->close();
    }
    
    //Insere os dados passados pelo usuário no banco de dados local
    public function inserirDados($nome, $email, $senha) {
        $conexao = $this->abrirConexao();
        $n = $nome;
        $e = $email;
        $s = $senha;
        $query = "INSERT INTO dados_usuario(nome, email, senha) VALUES('".$n."', '".$e."', '".$s."')";
        $conexao->query($query);
        $this->fecharConexao($conexao);
    }
    
    //Consulta e retorna os dados armazenados no banco de dados local por meio de uma lista
    public function selecionarDados() {
        $conexao = $this->abrirConexao();
        $query = "SELECT * FROM dados_usuario";
        $resultado = $conexao->query($query);
        $tabela = array();
        
        foreach ($resultado as $linha) {
            $tabela[] = $linha;
        }
        
        return $tabela;
    }
}