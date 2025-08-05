<?php

class User
{
    protected $conn;

    public function __construct()
    {
        $this->conn = connectDB(); // kết nối DB
        
    }

    public function findByEmail($email)
    {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->conn->prepare("INSERT INTO users (name, email, password, phone, address, role, created_at)
                                      VALUES (:name, :email, :password, :phone, :address, :role, NOW())");
        return $stmt->execute($data);
    }
    public function getAllCustomers()
    {
        $sql = "SELECT * FROM users WHERE role = 'customer'";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function deleteUser($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function updateProfile($id, $data)
    {
        $stmt = $this->conn->prepare("UPDATE users SET name = :name, phone = :phone, address = :address WHERE id = :id");
        return $stmt->execute([
            ':name' => $data['name'],
            ':phone' => $data['phone'],
            ':address' => $data['address'],
            ':id' => $id
        ]);
    }

}
