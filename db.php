<?php

function dbInsert($mariadbCode)
{
  $servername = "localhost";
  $username = "db-mahdii";
  $password = "1883hsh";
  $dbname = "PhoneBook";

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $mariadbCode;
    // use exec() because no results are returned
    $conn->exec($sql);
  } catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }

  $conn = null;
}

function dbSelect($mariadbCode, $column)
{
  $servername = "localhost";
  $username = "db-mahdii";
  $password = "1883hsh";
  $dbname = "PhoneBook";

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare($mariadbCode);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $row) {
      $data = $row[$column];
    }
  } catch (PDOException $e) {
    echo $result . "<br>" . $e->getMessage();
  }
  $conn = null;
  return $data;
}
function dbColumnMultiSelect($mariadbCode, $column)
{
  $servername = "localhost";
  $username = "db-mahdii";
  $password = "1883hsh";
  $dbname = "PhoneBook";

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare($mariadbCode);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $dataArray = [];
    foreach ($result as $row) {
      $data = $row[$column];
      array_push($dataArray, $data);
    }
  } catch (PDOException $e) {
    return 98;
  }
  $conn = null;
  return $dataArray;
}
function dbRowMultiSelect($mariadbCode)
{
  $servername = "localhost";
  $username = "db-mahdii";
  $password = "1883hsh";
  $dbname = "PhoneBook";

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare($mariadbCode);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $dataArray = [];
    foreach ($result as $row) {
      $data = $row;
      array_push($dataArray, $data);
    }
  } catch (PDOException $e) {
    return 98;
  }
  $conn = null;
  return $dataArray;
}