<?php
    require_once('Connection.php');

    function fnAddMusica($nome_musica, $titulo ,$anime, $duracao, $categoria ,$capa, $conteudo, $nota){
        $con = getConnection();
        $sql = "insert into musica (nome_musica, titulo ,anime, duracao, categoria ,capa, conteudo, nota) values (:pNome_musica, :pTitulo ,:pAnime, :pDuracao, :pCategoria ,:pCapa, :pConteudo, :pNota)";
        $stmt = $con->prepare($sql);

        $stmt->bindParam(":pNome_musica", $nome_musica);
        $stmt->bindParam(":pTitulo", $titulo);
        $stmt->bindParam(":pAnime", $anime);
        $stmt->bindParam(":pDuracao", $duracao);
        $stmt->bindParam(":pCategoria", $categoria);
        $stmt->bindParam(":pCapa", $capa);
        $stmt->bindParam(":pConteudo", $conteudo);
        $stmt->bindParam(":pNota", $nota);

        return $stmt->execute();
    }

    function fnListMusicas() {
        $con = getConnection();
        $sql = "select * from musica";
        $result = $con->query($sql);
        $lstMusicas = array();

        while($musica = $result->fetch(PDO::FETCH_OBJ)){
            array_push($lstMusicas, $musica);
        }

        return $lstMusicas;
    }

    function fnLocalizaMusicaPorTitulo($nome_musica) {
        $con = getConnection();
        $sql = "select * from musica where nome_musica like :pNome_musica limit 20";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(":pNome_musica", "%{$nome_musica}%");

        if($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            return $stmt->fetchAll();
        }
    }
    
    function fnLocalizaMusicaPorAnime($anime) {
        $con = getConnection();
        $sql = "select * from musica where anime like :pAnime limit 20";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(":pAnime", "%{$anime}%");

        if($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            return $stmt->fetchAll();
        }
    } 

    function fnLocalizaMusicaPorCategoria($categoria) {
        $con = getConnection();
        $sql = "select * from musica where categoria like :pCategoria limit 20";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(":pCategoria", "%{$categoria}%");

        if($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            return $stmt->fetchAll();
        }
    } 

    function fnLocalizaMusicaPorId($id) {
        $con = getConnection();
        $sql = "select * from musica where id = :pID";
        
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id);
        
        if($stmt->execute()){
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
        return null;
    }
    
    function fnUpdateMusica($id, $nome_musica, $titulo ,$anime, $duracao, $categoria , $nota) {
        $con = getConnection();
        $sql = "update musica set nome_musica = :pNome_musica, titulo = :pTitulo ,anime= :pAnime, duracao = :pDuracao, categoria = :pCategoria, nota = :pNota where id = :pID";
        
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id);
        $stmt->bindParam(":pNome_musica", $nome_musica);
        $stmt->bindParam(":pTitulo", $titulo);
        $stmt->bindParam(":pAnime", $anime);
        $stmt->bindParam(":pDuracao", $duracao);
        $stmt->bindParam(":pCategoria", $categoria);
        $stmt->bindParam(":pNota", $nota);

        return $stmt->execute();
    }

    function fnDeleteMusica($id, $conteudo) {
        unlink($conteudo);
        
        $con = getConnection();
        $sql = "delete from musica where id = :pID";
        
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id);

        return $stmt->execute();
    }

    function fnUpdateNota($nota) {
        $con = getConnection();
        $sql = "update musica set nota = :Nota where id = :pID";
        
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id);
        $stmt->bindParam(":Nota", $nota);

        return $stmt->execute();
    }

