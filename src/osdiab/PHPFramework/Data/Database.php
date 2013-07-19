<?php
namespace osdiab\PHPFramework\Data\Database;

/**
 * Represents a collection in a database system.
 */
abstract class Collection
{
  abstract public function query(Query $q);
  abstract public function insert($data);
  abstract public function update($data);
  abstract public function delete($data);
}
