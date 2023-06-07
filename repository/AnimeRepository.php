<?php
    require_once('Connection.php');

    function fnAddAnime($titulo, $anime, $episodios, $temporadas, $categoria, $sumario, $capa, $conteudo, $nota){
        $con = getConnection();
        $sql = "insert into anime (titulo, anime, episodios, temporadas, categoria, sumario, capa, conteudo, nota) values (:pTitulo, :pAnime, :pEpisodios, :pTemporadas, :pCategoria, :pSumario, :pCapa, :pConteudo, :pNota)";
        $stmt = $con->prepare($sql);

        $stmt->bindParam(":pTitulo", $titulo);
        $stmt->bindParam(":pAnime", $anime);
        $stmt->bindParam(":pEpisodios", $episodios);
        $stmt->bindParam(":pTemporadas", $temporadas);
        $stmt->bindParam(":pCategoria", $categoria);
        $stmt->bindParam(":pSumario", $sumario);
        $stmt->bindParam(":pCapa", $capa);
        $stmt->bindParam(":pConteudo", $conteudo);
        $stmt->bindParam(":pNota", $nota);

        return $stmt->execute();
    }


    function fnListAnimes() {
        $con = getConnection();
        $sql = "select * from anime";
        $result = $con->query($sql);
        $lstAnimes = array();

        while($anime = $result->fetch(PDO::FETCH_OBJ)){
            array_push($lstAnimes, $anime);
        }

        return $lstAnimes;
    }

    function fnLocalizaAnimePorTitulo($titulo) {
        $con = getConnection();
        $sql = "select * from anime where titulo like :pTitulo limit 20";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(":pTitulo", "%{$titulo}%");

        if($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            return $stmt->fetchAll();
        }
    }

    function fnLocalizaAnimePorAnime($anime) {
        $con = getConnection();
        $sql = "select * from anime where anime like :pAnime limit 20";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(":pAnime", "%{$anime}%");

        if($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            return $stmt->fetchAll();
        }
    }

    function fnLocalizaAnimePorCategoria($categoria) {
        $con = getConnection();
        $sql = "select * from anime where categoria like :pCategoria limit 20";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(":pCategoria", "%{$categoria}%");

        if($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            return $stmt->fetchAll();
        }
    } 

    function fnLocalizaAnimePorId($id) {
        $con = getConnection();
        $sql = "select * from anime where id = :pID";
        
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id);
        
        if($stmt->execute()){
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
        return null;
    }

    function fnUpdateAnime($id, $titulo, $anime, $episodios, $temporadas, $categoria, $sumario, $nota) {
        $con = getConnection();
        $sql = "update anime set titulo = :pTitulo, anime= :pAnime, episodios = :pEpisodios, temporadas = :pTemporadas, categoria = :pCategoria, nota = :pNota, sumario = :pSumario where id = :pID";
        
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id);
        $stmt->bindParam(":pTitulo", $titulo);
        $stmt->bindParam(":pAnime", $anime);
        $stmt->bindParam(":pEpisodios", $episodios);
        $stmt->bindParam(":pTemporadas", $temporadas);
        $stmt->bindParam(":pCategoria", $categoria);
        $stmt->bindParam(":pNota", $nota);
        $stmt->bindParam(":pSumario", $sumario);

        return $stmt->execute();
    }

    function fnDeleteAnime($id, $conteudo) {
        unlink($conteudo);
        
        $con = getConnection();
        $sql = "delete from anime where id = :pID";
        
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id);

        return $stmt->execute();
    }

    function fnUpdateNota($nota) {
        $con = getConnection();
        $sql = "update anime set nota = :Nota where id = :pID";
        
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id);
        $stmt->bindParam(":Nota", $nota);

        return $stmt->execute();
    }