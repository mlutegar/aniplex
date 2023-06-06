<?php
    require_once('Connection.php');

    function fnAddFilme($titulo, $anime ,$diretor, $duracao, $categoria, $sumario, $capa, $nota){
        $con = getConnection();
        $sql = "insert into filme (titulo, anime ,diretor, duracao, categoria, sumario, capa, nota) values (:pTitulo, :pAnime, :pDiretor, :pDuracao, :pCategoria, :pSumario, :pCapa, :pNota)";
        $stmt = $con->prepare($sql);

        $stmt->bindParam(":pTitulo", $titulo);
        $stmt->bindParam(":pAnime", $anime);
        $stmt->bindParam(":pDiretor", $diretor);
        $stmt->bindParam(":pDuracao", $duracao);
        $stmt->bindParam(":pCategoria", $categoria);
        $stmt->bindParam(":pSumario", $sumario);
        $stmt->bindParam(":pCapa", $capa);
        $stmt->bindParam(":pNota", $nota);

        return $stmt->execute();
    }

    function fnListFilmes(){
        $con = getConnection();
        $sql = "select * from filme";
        $result = $con->query($sql);
        $lstFilmes = array();

        while($filme = $result->fetch(PDO::FETCH_OBJ)){
            array_push($lstFilmes, $filme);
        }

        return $lstFilmes;

    }

    function fnLocalizaFilmePorTitulo($titulo){
        $con = getConnection();
        $sql = "select * from filme where titulo like :pTitulo limit 20";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(":pTitulo", "%{$titulo}%");

        if($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            return $stmt->fetchAll();
        }
    }

    function fnLocalizaFilmePorAnime($anime) {
        $con = getConnection();
        $sql = "select * from filme where anime like :pAnime limit 20";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(":pAnime", "%{$anime}%");

        if($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            return $stmt->fetchAll();
        }
    } 

    function fnLocalizaFilmePorCategoria($categoria){
        $con = getConnection();
        $sql = "select * from filme where categoria like :pCategoria limit 20";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(":pCategoria", "%{$categoria}%");

        if($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            return $stmt->fetchAll();
        }
    }

    function fnLocalizaFilmePorId($id){
        $con = getConnection();
        $sql = "select * from filme where id = :pID";
        
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id);
        
        if($stmt->execute()){
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
        return null;
    }

    function fnUpdateFilme($id, $titulo, $anime, $diretor, $duracao, $categoria, $sumario, $nota){
        $con = getConnection();
        $sql = "update filme set titulo = :pTitulo, anime = :pAnime, diretor = :pDiretor, duracao = :pDuracao, categoria = :pCategoria, sumario = :pSumario, nota = :pNota where id = :pID";

        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id);
        $stmt->bindParam(":pTitulo", $titulo);
        $stmt->bindParam(":pAnime", $anime);
        $stmt->bindParam(":pDiretor", $diretor);
        $stmt->bindParam(":pDuracao", $duracao);
        $stmt->bindParam(":pCategoria", $categoria);
        $stmt->bindParam(":pSumario", $sumario);
        $stmt->bindParam(":pNota", $nota);

        return $stmt->execute();
    }

    function fnDeleteFilme($id){
        $con = getConnection();
        $sql = "delete from filme where id = :pID";
        
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id);

        return $stmt->execute();
    }

    
    function fnUpdateNota($nota) {
        $con = getConnection();
        $sql = "update filme set nota = :Nota where id = :pID";
        
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id);
        $stmt->bindParam(":Nota", $nota);

        return $stmt->execute();
    }