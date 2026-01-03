const express = require("express");
const router = express.Router();
const db = require("../config/db");

// add user
router.post("/", (req, res) => {
  if (!req.is("application/json")) {
    return res.status(400).json({ message: "Request harus JSON" });
  }

  const { name, email } = req.body;

  if (!name || !email) {
    return res.status(400).json({ message: "Name dan email wajib diisi" });
  }

  const sql = "INSERT INTO users (name, email) VALUES (?, ?)";
  db.query(sql, [name, email], (err, result) => {
    if (err) {
      if (err.code === "ER_DUP_ENTRY") {
        return res.status(409).json({ message: "Email sudah terdaftar" });
      }
      return res.status(500).json(err);
    }

    res.status(201).json({
      message: "User berhasil ditambahkan",
      id: result.insertId,
    });
  });
});

// get all users
router.get("/", (req, res) => {
  console.log(1);
  db.query("SELECT * FROM users", (err, results) => {
    if (err) return res.status(500).json(err);
    res.json(results);
  });
});

// user by id
router.get("/:id", (req, res) => {
  const { id } = req.params;

  db.query("SELECT * FROM users WHERE id = ?", [id], (err, results) => {
    if (err) return res.status(500).json(err);

    if (results.length === 0) {
      return res.status(404).json({ message: "User tidak ditemukan" });
    }

    res.json(results[0]);
  });
});

// Delete
router.delete("/:id", (req, res) => {
  const { id } = req.params;

  db.query("DELETE FROM users WHERE id = ?", [id], (err, result) => {
    if (err) return res.status(500).json(err);

    if (result.affectedRows === 0) {
      return res.status(404).json({ message: "User tidak ditemukan" });
    }

    res.json({ message: "User berhasil dihapus" });
  });
});

module.exports = router;
