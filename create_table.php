<?php
main();

function main() {
  while (true) {
    $dir_path = 'application/migrations/';
    echo "Enter table name:";
    $table_name = trim(fgets(STDIN));
    if (strcasecmp($table_name, 'q') === 0) {
      echo 'Exiting create table script.';
      break;
    }

    $uppercase_table_name = ucfirst($table_name);

    $content = <<<EOD
    <?php defined('BASEPATH') or exit('No direct script access allowed');

    class Migration_$uppercase_table_name extends CI_Migration {
      public function up() {}

      public function down() {
        \$this->dbforge->drop_table('$table_name');
      }
    }
    EOD;

    $timestamp = date('YmdHis');
    $file_name = $timestamp . "_" . $table_name . ".php";

    if (file_exists($dir_path . $file_name)) {
      echo $file_name . " file is already exsits.\n";
      echo 'Try another table name.\n';
    } else {
      create_migration_file($dir_path . $file_name, $content);
    }
  }
}

function create_migration_file($file_path, $content) {
  if (file_put_contents($file_path, $content) !== false) {
    echo $file_path . " is created.\n";
  } else {
    echo "Error creating file.\n";
  }
}
