<?php
    function listarClientes($pdo, $nomebusca, $status, $limite_registros, $offset){
        $sql = 'SELECT id, nome, email, telefone, created_at, status FROM clientes WHERE 1=1';
        $parametros = [];

        if($nomebusca !== ''){
            $sql .= ' AND nome LIKE :q';
            $parametros[':q'] = '%' . $nomebusca . '%';
        } 
        
        if($status !== ''){
            $sql .= ' AND status = :status';
            $parametros[':status']  = $status;
        }

        $sql .= ' LIMIT :limite_registros OFFSET :offset';

        $consulta = $pdo->prepare($sql);

        foreach($parametros as $key => $value){
            $consulta->bindValue($key, $value);
        }

        $consulta->bindValue(':limite_registros', $limite_registros, PDO::PARAM_INT);
        $consulta->bindValue(':offset', $offset, PDO::PARAM_INT);

        $consulta->execute();
        return $consulta->fetchAll();
    }

    function contarClientes($pdo, $nomebusca, $status){
        $sqlTotal = 'SELECT COUNT(*) as total FROM clientes WHERE 1=1';
        $parametrosTotal = [];

        if($nomebusca !== ''){
            $sqlTotal .= ' AND nome LIKE :q';
            $parametrosTotal[':q'] = '%' . $nomebusca . '%';
        } 
        
        if($status !== ''){
            $sqlTotal .= ' AND status = :status';
            $parametrosTotal[':status']  = $status;
        }

        $consultaTotal = $pdo->prepare($sqlTotal);
        $consultaTotal->execute($parametrosTotal);
        return $consultaTotal->fetchColumn();
    }
?>