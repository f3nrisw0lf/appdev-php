<?php
include_once("../../DBConnection.php");
include_once("Nav.php");

if (empty($_GET["getUpdate"])) {
  include_once("Retriever.php");
} else {
  include_once("Update.php");
}
