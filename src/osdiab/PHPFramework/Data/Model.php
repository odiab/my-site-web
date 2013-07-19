<?php
namespace osdiab\PHPFramework\Data\Model;

use osdiab\PHPFramework\Helpers\StringTools;

/**
 * Represents an object with a data binding.
 */
abstract class Model
{
  //*****************
  //* INSTANCE VARS *
  //*****************

  /** @var array */
  protected $data;

  //******************
  //* STATIC METHODS *
  //******************

  protected static function getCollection()
  {
    $collectionName = StringTools::removeNamespaceFromClass(
      get_called_class()
    );
    $database = Application::getDatabase();
    return $database->getCollection($collectionName);
  }

  public static function load(Query $q)
  {
    $data = getCollection()->query($q);

  }

  public static function loadId(Id $id)
  {
    $q = new Query();
    $q->equals($id);
    self::load($q);
  }

  //********************
  //* INSTANCE METHODS *
  //********************

  public function __construct(Collection $collection)
  {
    $this->collection = $collection;
    $data = array();
  }

  public function save()
  {
    if (isset($this->data['id'])) {
      $collection->insert($this->data);
    } else {
      $collection->update($this->data);
    }
  }
}
