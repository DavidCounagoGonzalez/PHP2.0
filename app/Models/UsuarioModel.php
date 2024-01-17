<?php

namespace Com\Daw2\Models;

class UsuarioModel extends \Com\Daw2\Core\BaseDbModel {

    const SELECT_FROM = "SELECT u.* , ar.nombre_rol  as rol, ac.country_name as country FROM usuario u LEFT JOIN aux_rol ar ON ar.id_rol = u.id_rol LEFT JOIN aux_countries ac ON u.id_country = ac.id";

    function getAllUsers(): array {
        $stmt = $this->pdo->query(self::SELECT_FROM);
        return $stmt->fetchAll();
    }

    function getAllUserOrderBySalar() {
        $stmt = $this->pdo->query(self::SELECT_FROM . " ORDER BY salarioBruto DESC");
        return $stmt->fetchAll();
    }

    function getAllStandardUsers() {
        $stmt = $this->pdo->query(self::SELECT_FROM . " WHERE ar.nombre_rol = 'standard'");
        return $stmt->fetchAll();
    }

    function getAllUsersCarlos() {
        $stmt = $this->pdo->query(self::SELECT_FROM . " WHERE username LIKE 'carlos%'");
        return $stmt->fetchAll();
    }

    function getByRol(int $idRol): array {
        $stmt = $this->pdo->prepare(self::SELECT_FROM . " WHERE u.id_rol = :id_rol");
        $stmt->execute(['id_rol' => $idRol]);
        return $stmt->fetchAll();
    }

    function getByFiltros(int $idRol, string $username, float $minSalar, float $maxSalar, float $minRetencion, float $maxRetencion, $idPaises): array {
        $consulta = self::SELECT_FROM;
        $filtros = [];
        $datos = [];
        $paises = [];

        if (!empty($idRol)) {
            array_push($filtros, " u.id_rol = :id_rol");
            $datos['id_rol'] = $idRol;
        }

        if (!empty($username)) {

            array_push($filtros, " u.username LIKE :username");
            $username = '%' . $username . '%';
            $datos['username'] = $username;
        }

        if (!empty($minSalar)) {

            if ($minSalar < 0) {
                $minSalar = 0;
            }

            array_push($filtros, " u.salarioBruto >= :minSalar");
            $datos['minSalar'] = $minSalar;
        }

        if (!empty($maxSalar)) {

            if ($maxSalar < 0) {
                $maxSalar = 0;
            }

            array_push($filtros, " u.salarioBruto <= :maxSalar");
            $datos['maxSalar'] = $maxSalar;
        }

        if (!empty($minRetencion)) {

            if ($minRetencion < 0) {
                $minRetencion = 0;
            }

            array_push($filtros, " u.retencionIRPF >= :minRetencion");
            $datos['minRetencion'] = $minRetencion;
        }

        if (!empty($maxRetencion)) {

            if ($maxRetencion < 0) {
                $maxRetencion = 0;
            }

            array_push($filtros, " u.retencionIRPF <= :maxRetencion");
            $datos['maxRetencion'] = $maxRetencion;
        }
        if (!empty($idPaises)) {

            foreach ($idPaises as $idPais) {
                $paises[] = " u.id_country = $idPais";
            }
            echo("<script>console.log('PHP: " . var_dump($paises) . "');</script>");
            array_push($filtros, implode(" OR", $paises));

        }

        if (count($datos) > 0 || !empty($idPaises)) {
            $consulta .= " WHERE";
            $consulta .= $filtros[0];
            foreach ($filtros as $key => $filtro) {
                if ($key > 0) {
                    $consulta .= " AND" . $filtro;
                }
            }
        }
        $consulta .= " ORDER BY u.salarioBruto DESC";
        echo("<script>console.log('PHP: " . $consulta . "');</script>");

        $stmt = $this->pdo->prepare($consulta);
        $stmt->execute($datos);
        return $stmt->fetchAll();
    }
}
