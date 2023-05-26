<?php
    require_once('Connection.php');

    function fnAddManga($titulo, $anime, $volume,$categoria, $nota, $sumario, $capa, $conteudo){
        $con = getConnection();
        $sql = "insert into manga (titulo, anime, volume,categoria, nota, sumario, capa, conteudo) values (:pTitulo, :pAnime, :pVolume, :pCategoria, :pNota, :pSumario, :pCapa, :pConteudo)";
        $stmt = $con->prepare($sql);

        $stmt->bindParam(":pTitulo", $titulo);
        $stmt->bindParam(":pAnime", $anime);
        $stmt->bindParam(":pVolume", $volume);
        $stmt->bindParam(":pCategoria", $categoria);
        $stmt->bindParam(":pNota", $nota);
        $stmt->bindParam(":pSumario", $sumario);
        $stmt->bindParam(":pCapa", $capa);
        $stmt->bindParam(":pConteudo", $conteudo);

        return $stmt->execute();
    }

    function fnListMangas() {
        $con = getConnection();
        $sql = "select * from manga";
        $result = $con->query($sql);
        $lstMangas = array();

        while($manga = $result->fetch(PDO::FETCH_OBJ)){
            array_push($lstMangas, $manga);
        }

        return $lstMangas;
    }

    function fnLocalizaMangaPorTitulo($titulo) {
        $con = getConnection();
        $sql = "select * from manga where titulo like :pTitulo limit 20";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(":pTitulo", "%{$titulo}%");

        if($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            return $stmt->fetchAll();
        }
    } 

    function fnLocalizaMangaPorAnime($anime) {
        $con = getConnection();
        $sql = "select * from manga where anime like :pAnime limit 20";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(":pAnime", "%{$anime}%");

        if($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            return $stmt->fetchAll();
        }
    } 

    function fnLocalizaMangaPorCategoria($categoria) {
        $con = getConnection();
        $sql = "select * from manga where categoria like :pCategoria limit 20";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(":pCategoria", "%{$categoria}%");

        if($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            return $stmt->fetchAll();
        }
    } 

    function fnLocalizaMangaPorId($id) {
        $con = getConnection();
        $sql = "select * from manga where id = :pID";
        
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id);
        
        if($stmt->execute()){
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
        return null;
    }

    function fnUpdateManga($id, $titulo, $anime, $volume, $categoria, $nota, $sumario) {
        $con = getConnection();
        $sql = "update manga set titulo = :pTitulo, anime= :pAnime, volume = :pVolume, categoria = :pCategoria, nota = :pNota, sumario = :pSumario where id = :pID";
        
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id);
        $stmt->bindParam(":pTitulo", $titulo);
        $stmt->bindParam(":pAnime", $anime);
        $stmt->bindParam(":pVolume", $volume);
        $stmt->bindParam(":pCategoria", $categoria);
        $stmt->bindParam(":pNota", $nota);
        $stmt->bindParam(":pSumario", $sumario);

        return $stmt->execute();
    }

    function fnDeleteManga($id, $conteudo) {
        unlink($conteudo);
        
        $con = getConnection();
        $sql = "delete from manga where id = :pID";
        
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id);

        return $stmt->execute();
    }

    function fnUpdateNota($nota) {
        $con = getConnection();
        $sql = "update manga set nota = :Nota where id = :pID";
        
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id);
        $stmt->bindParam(":Nota", $nota);

        return $stmt->execute();
    }