<?php


class MemberDAO{
    public function fetchMemberData() {
        $link = PDO_util::createConnection();
        $query = "SELECT * FROM member";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'member');
        PDO_util::closeConnection($link);
        return $result;
    }

    /**
     * @param $usernamemember
     * @return member
     */

    public function logmember($usernamemember) {
        $link = PDO_util::createConnection();
        $query = "SELECT * FROM member WHERE username = ?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $usernamemember);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        PDO_util::closeConnection($link);
        return $stmt->fetchObject('member');
    }
    /**
     * @param $id_member
     * @return member
     */

    public function fetchMember($id_member) {
        $link = PDO_util::createConnection();
        $query = "SELECT * FROM member WHERE id_member = ?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $id_member);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        PDO_util::closeConnection($link);
        return $stmt->fetchObject('member');
    }

    public function addMember(member $member) {
        $result = 0;
        $link = PDO_util::createConnection();
        $query = "INSERT into member (nama_member, poin, tanggal_ulang_tahun, kadaluarsa, email, username) VALUES (?,?,?,?,?,?)";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $member->getNamaMember());
        $stmt->bindValue(2, $member->getPoin());
        $stmt->bindValue(3, $member->getTanggalUlangTahun());
        $stmt->bindValue(4, $member->getKadaluarsa());
        $stmt->bindValue(5, $member->getEmail());
        $link->beginTransaction();
        if ($stmt->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        PDO_util::closeConnection($link);
        return $result;
    }

    public function deleteMember(member $member) {
        $link = PDO_util::createConnection();
        $query = "DELETE FROM member WHERE id_member = ?";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $member->getIdMember());
        $link->beginTransaction();
        if ($stmt->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        PDO_util::closeConnection($link);
    }

    public function updateMember(member $member) {
        $link = PDO_util::createConnection();
        $query = "UPDATE member SET nama_member = ?, poin = ?, tanggal_ulang_tahun = ?, kadaluarsa = ?, email = ? WHERE id_member = ?";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $member->getNamaMember());
        $stmt->bindValue(2, $member->getPoin());
        $stmt->bindValue(3, $member->getTanggalUlangTahun());
        $stmt->bindValue(4, $member->getKadaluarsa());
        $stmt->bindValue(5, $member->getEmail());
        $stmt->bindValue(6, $member->getIdMember());
        $link->beginTransaction();
        if ($stmt->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        PDO_util::closeConnection($link);
    }
}