<?php

function getAllProduk($conn) {
    $result = $conn->query("SELECT * FROM produk ORDER BY produk_id DESC");
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getProdukById($conn, $id) {
    $stmt = $conn->prepare("SELECT * FROM produk WHERE produk_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function tambahProduk($conn, $nama, $harga, $stok) {
    $stmt = $conn->prepare("INSERT INTO produk (nama_produk, harga, stok) VALUES (?, ?, ?)");
    $stmt->bind_param("sdi", $nama, $harga, $stok);
    return $stmt->execute();
}

function updateProduk($conn, $id, $nama, $harga, $stok) {
    $stmt = $conn->prepare("UPDATE produk SET nama_produk = ?, harga = ?, stok = ? WHERE produk_id = ?");
    $stmt->bind_param("sdii", $nama, $harga, $stok, $id);
    return $stmt->execute();
}

function hapusProduk($conn, $id) {
    $stmt = $conn->prepare("DELETE FROM produk WHERE produk_id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
